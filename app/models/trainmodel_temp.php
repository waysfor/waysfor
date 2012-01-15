<?php
class Trainmodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	//内训课程   函数train(表名)
	function train_index($tablename,$status_open=NULL){
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
}