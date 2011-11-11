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

  function get($where = '1', $order = '', $start = 0, $limit = 0) {
    $sql = "SELECT * FROM `member`";
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
}