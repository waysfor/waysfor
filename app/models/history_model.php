<?php
class History_model extends CI_Model{
    private $table_name = 'history';
	private $table_info = 'classinfo';
	function __construct(){
		parent::__construct();
	}

	function get($where = '1', $order = '', $start = 0, $limit = 0) {
		$sql = "SELECT * FROM " . $this->table_name;
		if($where != '') {
			$sql .= " WHERE " . $where;
		}
		if($order != '') {
			$sql .= " ORDER BY " . $order;
		}
		if($limit > 0) {
			$sql .= " LIMIT $start, $limit";
		}
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function getAllrows(){
		$this -> db ->count_all_results($this->table_name);
		return $this -> db -> count_all_results($this->table_name);
	}
	
	function add($data,$datainfo){
		if($data['status'] == 1){
			if ($this->db->insert($this->table_name, $data)) {
				$oid = $this->db->insert_id();
				$total = count($datainfo['opentime']);
				for($i=0;$i<$total;$i++){
					if(isset($datainfo['address'][$i]) && $datainfo['address'][$i]!='0'){
						$CourseInfo = array(
							'cid' => $oid,
							'opentime' => $datainfo['opentime'][$i],
							'endtime' => $datainfo['endtime'][$i],
							'address' => $datainfo['address'][$i],
							);
						if($this->db->insert($this->table_info, $CourseInfo)) {
							$id = $this->db->insert_id();
							header("Location: /manage/history/list");
						} else {
							echo 'error';//temp
						}
					} else {
						die("地址没有填写");
					}
				}
			} else {
				echo 'error';//temp
			}
		} else {
			$this->db->insert($this->table_name,$data);
			header("Location: /manage/history/list");
		}
	}

	function edit_save($data,$datainfo,$con,$con_info,$id){
		if($data['status'] == '1'){
			if ($this->db->update($this->table_name, $data, $con)) {
				$total = count($datainfo['opentime']);
				for($i=0;$i<$total;$i++){
					if(isset($datainfo['address'][$i]) && $datainfo['address'][$i]!='0'){
						$CourseInfo = array(
							'nid' => $datainfo['nid'][$i],
							'cid' => $id,
							'opentime' => $datainfo['opentime'][$i],
							'endtime' => $datainfo['endtime'][$i],
							'address' => $datainfo['address'][$i],
							);
						if(!empty($datainfo['nid'][$i])){
							$cons = $con_info . " AND nid = ".$datainfo['nid'][$i];
							$this->db->update($this->table_info, $CourseInfo, $cons);
						} else {
							$this->db->insert($this->table_info, $CourseInfo);
						}
					} else {
						if(!empty($datainfo['nid'][$i])){
							$con = 'nid = '.$datainfo['nid'][$i];
							$sql = "DELETE FROM " .$this->table_info. " WHERE " .$con;
							$this->db->query($sql);
						} else {
							//空信息，直接放走
						}
					}
				}
				header("Location:/manage/history/list");
			} else {
				echo 'error';
			}
		} else {
			$this->db->update($this->table_name, $data, $con);
			header("Location:/manage/history/list");
		}
	}

	function del($id){
	    $con = 'id = ' . $id;
	    $sql = "DELETE FROM " .$this->table_name. " WHERE " . $con;
        if ($this->db->query($sql)) {
			$con = 'cid = ' . $id;
			$sql = "DELETE FROM " .$this->table_info. " WHERE " . $con;
			if ($this->db->query($sql)){
        		header("Location: /manage/history/list");
			} else {
				echo 'error';//temp
			}
		} else {
		    echo 'error';//temp
		}
	}

	function edit($id){
		$con = 'id = ' . $id;
	    $sql = "SELECT * FROM " . $this->table_name. " WHERE ".$con;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function edit_info($id){
		$con = 'cid = ' . $id;
	    $sql = "SELECT * FROM " . $this->table_info. " WHERE ".$con;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}