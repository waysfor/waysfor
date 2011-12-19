<?php
class Coursemodel extends CI_Model{
    private $table_name = 'class_resource';
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
	
	function add($data){
		if ($this->db->insert('class_resource', $data)) {
        	header("Location: /manage/course/list");
		} else {
		    echo 'error';//temp
		}
	}
	function del($id){
	    $con = 'id = ' . $val;
	    $sql = "DELETE FROM class_resource WHERE " . $con;
        if ($this->db->query($sql)) {
        	header("Location: /manage/course/list");
		} else {
		    echo 'error';//temp
		}
	}
	function change(){
		
	}
}