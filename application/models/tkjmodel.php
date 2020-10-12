<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tkjmodel extends CI_Model
{
    public function get_tkj($where = "")
    {
        $query = $this->db->query('SELECT * FROM kurikulum_jurusan_tkj' . $where);
        return $query->result();
    }
}