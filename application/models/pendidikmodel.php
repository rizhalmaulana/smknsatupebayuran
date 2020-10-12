<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pendidikmodel extends CI_Model
{
    public function get_tenaga_pendidik($where = "")
    {
        $query = $this->db->query('SELECT * FROM profil_tenaga_pendidik' . $where);
        return $query->result();
    }
}