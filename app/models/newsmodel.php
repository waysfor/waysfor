<?php
class Newsmodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	//按时间排序的新闻列表   
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

	//新闻分类列表且按时间倒序 函数new_open(表名，新闻类型|可选)
	function news_tpye($tablename,$type=NULL){
		if(!empty($type)){
			$query = $this -> db -> where('newstype',$type);
		}
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