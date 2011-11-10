<?php
class Usermodel extends CI_Model{
  function __construct(){
    parent::__construct();
  }

  function login($username, $password) {
    $sql = "SELECT * FROM `member` WHERE `username` = ? AND `password` = ?";
    $query = $this->db->query($sql, array($username, md5($password)));
    $rs = $query->result_array();
    return isset($rs[0]) ? $rs[0] : array();
  }
}