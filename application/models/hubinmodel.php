<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hubinmodel extends CI_Model{
    
    public function get_hubin_mitra($where = ""){
        $query = $this->db->$query('SELECT * FROM hubin_mitra_industri' . $where);
        return $query->result();
    }
}