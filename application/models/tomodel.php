<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tomodel extends CI_Model
{
    public function get_to($where = "")
    {
        $query = $this->db->query('SELECT * FROM kurikulum_jurusan_to' . $where);
        return $query->result();
    }
}