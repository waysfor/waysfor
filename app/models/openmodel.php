<?php
class Openmodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	//近期开课的公开课   函数new_open(表名，课程状态)
	function new_open($tablename,$status_open=NULL){
		if(!empty($status_open)){
			$query = $this -> db -> where('status',$status_open);
		}
		$query = $this -> db -> where('opentime >',date("Y-m-d"));
		$query = $this -> db -> get($tablename,10);
		$datas = $query -> result_array();
		$data = array();
		foreach($datas as $val)
		{
			$data[] = $val;
		}
		return $data;
	}

	//推荐公开课   函数new_open(表名，课程状态)
	function recommend_open($tablename,$status_open=NULL){
		if(!empty($status_open)){
			$query = $this -> db -> where('status',$status_open);
		}
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

	//最近结束的公开课   函数old_open(表名，课程状态)
	function old_open($tablename,$status_open=NULL){
		if(!empty($status_open)){
			$query = $this -> db -> where('status',$status_open);
		}
		$query = $this -> db -> where('opentime <',date("Y-m-d"));
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