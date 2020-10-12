<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ekskulmodel extends CI_Model
{
    public function get_all_ekskul($where = "")
    {
        $query = $this->db->query('SELECT * FROM kesiswaan_ekskul_sekolah' . $where);
        return $query->result();
    }
}