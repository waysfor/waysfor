<?php
class Catemodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	//按时间排序的新闻列表   函数new_open(表名)
	function cate($tablename){
		$query = $this -> db -> get($tablename);
		$datas = $query -> result_array();
		$data = array();
		foreach($datas as $val)
		{
			$data[] = $val;
		}
		return $data;
	}
}