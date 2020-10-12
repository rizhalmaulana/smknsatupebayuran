<?php
defined('BASEPATH') or exit('No direct script access allowed');

class strukturmodel extends CI_Model{

    public function get_struktur_sekolah($where = "")
    {
        $query = $this->db->query('SELECT * FROM profil_struktur_organisasi' . $where);
        return $query->result();
    }
}