<?php

class Base extends CI_Model {

    private $table_name = 'auction';
    
    function __construct() {
    	parent::__construct();
    	$this->load->database();
    }

    public function create($data) {
        assert(is_array($data) && count($data)>0);
        return ($this->db->insert($this->table_name, $data)) ? $this->db->insert_id() : false;
    }

    public function read($con) {
        $con = !empty($con) ? $con : '1';
        $sql = "SELECT * FROM " . $this->table_name . " WHERE " . $con;
        return ($query = $this->db->query($sql)) ? $query->result_array() : false;
    }

    public function update($data) {
        assert(is_array($data) && count($data)>0);
		$con = "id = " . $data['id'];
		return ($this->db->update($this->table_name, $data, $con)) ? true : false;
    }
    
    public function del($con) {
        if (!isset($con) && empty($con)) {
            return false;
        }
        $sql = "DELETE FROM " . $this->table_name . " WHERE " . $con;
        return ($this->db->query($sql)) ? true : false;
    }
}