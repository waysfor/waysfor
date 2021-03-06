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
	function get_count($table_name = 'null', $where = '1', $field = '*'){
		$sql = "SELECT COUNT(`".$field."`) AS count FROM " .$table_name;
		if($where != '') {
			$sql .= " WHERE " . $where;
		}
		$query = $this->db->query($sql);
		$ret = $query->result();
		if(isset($ret[0]->count)){
		   return  $ret[0]->count;
		}
	}
	function get_time_count($table_info = 'null',$symbol = 'null', $field = '', $start = 0, $limit = 0){
		$condition1 = "Select min(cid) FROM classinfo where opentime ".$symbol." '".date("Y-m-d")."' group by cid order by opentime desc";
		$condition2 = "Select min(opentime) FROM classinfo where opentime ".$symbol." '".date("Y-m-d")."' group by cid order by opentime desc";
		$where = " cid in(".$condition1.") AND opentime in(".$condition2.")";
		$sql = "SELECT COUNT(".$field.") AS count FROM " . $table_info;
		if($where != ''){
			$sql .= " WHERE " . $where;
		}
		if($limit > 0) {
			$sql .= " LIMIT $start, $limit";
		}
		$query = $this->db->query($sql);
		$ret = $query->result();
		if(isset($ret[0]->count)){
		   return  $ret[0]->count;
		}
	}
	function get_time($table_info = 'null',$symbol = 'null', $field = '', $start = 0, $limit = 0){
		$condition1 = "Select min(cid) FROM classinfo where opentime ".$symbol." '".date("Y-m-d")."' group by cid order by opentime desc";
		$condition2 = "Select min(opentime) FROM classinfo where opentime ".$symbol." '".date("Y-m-d")."' group by cid order by opentime desc";
		$where = " cid in(".$condition1.") AND opentime in(".$condition2.")";
		$sql = "SELECT ".$field." FROM " . $table_info;
		if($where != ''){
			$sql .= " WHERE " . $where;
		}
		if($limit > 0) {
			$sql .= " LIMIT $start, $limit";
		}
		$query = $this->db->query($sql);
		$result = $query->result_array();
		if(isset($result)){
			$list = array();
			foreach($result as $key => $v){
				$key_id = $v['cid'];
				$info_id = $v['nid'];
				$sql = "SELECT history.id,history.classname,classinfo.opentime FROM `history`,`classinfo` WHERE history.id = ".$key_id." AND classinfo.nid = ".$info_id;
				$query = $this->db->query($sql)->result_array();
					$list[$key]['id'] = $query[0]['id'];
					$list[$key]['classname'] = $query[0]['classname'];
					$list[$key]['opentime'] = $query[0]['opentime'];
			}
			return $list;
		}
	}
	function get_address($table_info = 'null', $field, $type_num = 1, $start = 0, $limit = 0){
		$where = " id in(SELECT cid FROM `classinfo` WHERE address=" .$type_num.")";
		$sql = "SELECT ".$field." FROM " . $table_info;
		if($where != ''){
			$sql .= " WHERE " . $where;
		}
		if($limit > 0) {
			$sql .= " LIMIT $start, $limit";
		}
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function get_address_count($table_info = 'null', $field, $type_num = 1, $start = 0, $limit = 0){
		$where = " id in(SELECT cid FROM `classinfo` WHERE address=" .$type_num.")";
		$sql = "SELECT ".$field." AS count FROM " . $table_info;
		if($where != ''){
			$sql .= " WHERE " . $where;
		}
		if($limit > 0) {
			$sql .= " LIMIT $start, $limit";
		}
		$query = $this->db->query($sql);
		$ret = $query->result();
		if(isset($ret[0]->count)){
		   return  $ret[0]->count;
		}
	}
	function get_classinfo($start = 0,$limit = 0){
		$sql = "SELECT * FROM classinfo WHERE `opentime` > '".date("Y-m-d")."' group by `cid` order by `opentime` ASC";
		if($limit > 0) {
			$sql .= " LIMIT $start, $limit";
		}
		$query = $this ->db ->query($sql);
		$result = $query->result_array();
		if(isset($result)){
			$list = array();
			foreach($result as $key => $v){
				$key_id = $v['cid'];
				$key_nid = $v['nid'];
				$sql = "SELECT * FROM history,classinfo WHERE history.id = '".$key_id."'AND classinfo.nid ='".$key_nid."' group by id";
				$query = $this->db->query($sql)->result_array();
					$list[$key]['id'] = $query[0]['id'];
					$list[$key]['classname'] = $query[0]['classname'];
					$list[$key]['address'] = $query[0]['address'];
					$list[$key]['opentime'] = $query[0]['opentime'];
			}
			return $list;
		}
	}
	function get_classinfo_count($start = 0,$limit = 0){
		$sql = "SELECT * FROM classinfo WHERE `opentime` > '".date("Y-m-d")."' group by `cid` order by `opentime` ASC";
		if($limit > 0) {
			$sql .= " LIMIT $start, $limit";
		}
		$query = $this ->db ->query($sql);
		$result = $query->result_array();
		if(isset($result)){
			return count($result);
		}
	}
}