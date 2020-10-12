<?php
defined('BASEPATH') or exit('No direct script access allowed');

class teimodel extends CI_Model
{
    public function get_tei($where = "")
    {
        $query = $this->db->query('SELECT * FROM kurikulum_jurusan_tei' . $where);
        return $query->result();
    }
}