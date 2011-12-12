<?php
class Coursemodel extends CI_Model{
  function __construct(){
    parent::__construct();
  }

  function get($where = '1', $order = '', $start = 0, $limit = 0) {
    $sql = "SELECT * FROM `class_resource`";
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