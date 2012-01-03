<?php
class Trainer_course_model extends CI_Model{
    private $table_name = 'trainer_resource';
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
	
	function add($data){
		if ($this->db->insert($this->table_name, $data)) {
        	header("Location: /manage/trainer/list");
		} else {
		    echo 'error';//temp
		}
	}
	function del($id){
	    $con = 'id = ' . $id;
	    $sql = "DELETE FROM " .$this->table_name. " WHERE " . $con;
        if ($this->db->query($sql)) {
        	header("Location: /manage/trainer/list");
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
	function edit_save($data,$con){
		if ($this->db->update($this->table_name, $data, $con)) {
        	header("Location: /manage/trainer/list");
		} else {
		    echo 'error';
		}
	}
}