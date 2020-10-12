<?php
defined('BASEPATH') or exit('No direct script access allowed');

class perpustakaanmodel extends CI_Model
{
    public function get_perpustakaan($where = "")
    {
        $query = $this->db->query('SELECT * FROM kurikulum_perpustakaan_sekolah' . $where);
        return $query->result();
    }
}