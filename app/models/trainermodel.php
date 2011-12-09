<?php
class Trainermodel extends CI_Model{
	function __construct(){
		parent::__construct();
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