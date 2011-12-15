<?php
class Trainermodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}

  function get($where = '1', $order = '', $start = 0, $limit = 0) {
    $sql = "SELECT * FROM `trainer_resource`";
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

	//首页讲师推荐   函数train(表名)
	function trainer_index($tablename){
		$query = $this -> db -> where('recommend','1');
		$query = $this -> db -> get($tablename,10);
		$datas = $query -> result_array();
		$data = array();
		foreach($datas as $val)
		{
			$data[] = $val;
		}
		return $data;
	}
}