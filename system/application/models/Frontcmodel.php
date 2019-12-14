<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Frontcmodel extends CI_Model {
    function __construct() {
        parent::__construct();
		$this->load->database();
    }
	//update query 	  
	function update_where($tb,$data,$where) {
		
		$this->db->where($where);
		return $this->db->update($tb,$data);
	}
	
	function update_where_set($tb,$set,$set_add,$where) {
		
		$this->db->set($set, $set.'+'.$set_add, FALSE);
		$this->db->where($where);
		return $this->db->update($tb);
	}
}

