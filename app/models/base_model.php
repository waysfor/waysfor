<?php
class Base_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function get($table_name='null',$where = '1', $order = '', $start = 0, $limit = 0) {
		$sql = "SELECT * FROM " . $table_name;
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
}