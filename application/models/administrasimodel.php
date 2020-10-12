<?php
defined('BASEPATH') or exit('No direct script access allowed');

class administrasimodel extends CI_Model
{
    public function get_administrasi_guru($where = "")
    {
        $query = $this->db->query('SELECT * FROM kurikulum_administrasi_guru' . $where);
        return $query->result();
    }
}