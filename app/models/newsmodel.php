<?php
class Newsmodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	//按时间排序的新闻列表   函数new_open(表名)
	function news_index($tablename){
		$query = $this -> db -> where('entertime <=',date("Y-m-d"));
		$query = $this -> db -> order_by('entertime','desc');
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