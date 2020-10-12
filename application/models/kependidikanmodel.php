<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kependidikanmodel extends CI_Model
{
    public function get_tenaga_kependidikan($where = "")
    {
        $query = $this->db->query('SELECT * FROM profil_tenaga_kependidikan' . $where);
        return $query->result();
    }
}