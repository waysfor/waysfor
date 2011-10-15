<?php
class Managemodel extends CI_Model{
	function __construct(){
		$this -> load -> database();
		parent::__construct();
	}
	function check_login($username, $password) {
		$sql = "SELECT `id` FROM `member` WHERE `username` = ? AND `password` = ?";
		$query = $this->db->query($sql, array($username, md5($password)));
		$rs = $query->result_array();
		return isset($rs[0]['id']) ? $rs[0]['id'] : 0;
	}
}
?>