<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kurikulummodel extends CI_Model
{
    public function get_kurikulum_administrasi($where = "")
    {
        $query = $this->db->query('SELECT * FROM kurikulum_administrasi_guru' . $where);
        return $query->result();
    }
}