<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profilmodel extends CI_Model
{

    public function get_profil_identitas($where = "")
    {
        $query = $this->db->query('SELECT * FROM profil_identitas_sekolah' . $where);
        return $query->result();
    }

    public function get_profil_struktur($where = "")
    {
        $query = $this->db->query('SELECT * FROM profil_struktur_organisasi' . $where);
        return $query->result();
    }

    public function get_profil_tenaga_pendidik($where = "")
    {
        $query = $this->db->query('SELECT * FROM profil_tenaga_pendidik' . $where);
        return $query->result();
    }

    public function get_profil_tenaga_kependidikan($where = "")
    {
        $query = $this->db->query('SELECT * FROM profil_tenaga_kependidikan' . $where);
        return $query->result();
    }

    public function DeleteData($tabelName, $where)
    {
        $res = $this->db->delete($tabelName, $where);
        return $res;
    }

    public function UpdateData($tabelName, $data, $where)
    {
        $res = $this->db->update($tabelName, $data, $where);
        return $res;
    }

    public function InsertData($tabelName, $where)
    {
        $res = $this->db->insert($tabelName, $where);
        return $res;
    }
}
