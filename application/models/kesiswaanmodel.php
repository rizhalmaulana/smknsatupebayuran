<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kesiswaanmodel extends CI_Model
{
    public function get_kesiswaan_ekskul_sekolah($where = "")
    {
        $query = $this->db->query('SELECT * FROM kesiswaan_ekskul_sekolah' . $where);
        return $query->result();
    }

    public function InsertData($tabelName, $where)
    {
        $res = $this->db->insert($tabelName, $where);
        return $res;
    }

    public function UpdateData($tabelName, $data, $where)
    {
        $res = $this->db->update($tabelName, $data, $where);
        return $res;
    }

    public function DeleteData($tabelName, $where)
    {
        $res = $this->db->delete($tabelName, $where);
        return $res;
    }
}