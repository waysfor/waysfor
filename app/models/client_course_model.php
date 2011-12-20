<?php
class Client_course_model extends CI_Model{
    private $table_name = 'client_resource';
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
		if ($this->db->insert($this->table_name, $data)) {
        	header("Location: /manage/client/list");
		} else {
		    echo 'error';//temp
		}
	}
	function del($id){
	    $con = 'id = ' . $val;
	    $sql = "DELETE FROM " .$this->table_name. " WHERE " . $con;
        if ($this->db->query($sql)) {
        	header("Location: /manage/client/list");
		} else {
		    echo 'error';//temp
		}
	}
	function change(){
		
	}
}