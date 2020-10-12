<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hubinmodel extends CI_Model{
    
    public function get_hubin_mitra($where = ""){
        $query = $this->db->query('SELECT * FROM hubin_mitra_industri' . $where);
        return $query->result();
    }

    public function DeleteData($tabelName, $where)
    {
        $res = $this->db->delete($tabelName, $where);
        return $res;
    }

    public function UpdateData($tabelName, $data, $where)
    {
        $res = $this->db->update($tabelName, $data, $where);
        return $res;
    }

    public function InsertData($tabelName, $where)
    {
        $res = $this->db->insert($tabelName, $where);
        return $res;
    }
}