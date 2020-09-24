<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kurikulummodel extends CI_Model
{
    public function get_kurikulum_administrasi($where = "")
    {
        $query = $this->db->query('SELECT * FROM kurikulum_administrasi_guru' . $where);
        return $query->result();
    }

    public function get_kurikulum_perpustakaan($where = "")
    {
        $query = $this->db->query('SELECT * FROM kurikulum_perpustakaan_sekolah' . $where);
        return $query->result();
    }

    public function get_kurikulum_jurusan_tei($where = "")
    {
        $query = $this->db->query('SELECT * FROM kurikulum_jurusan_tei' . $where);
        return $query->result();
    }

    public function get_kurikulum_jurusan_to($where = "")
    {
        $query = $this->db->query('SELECT * FROM kurikulum_jurusan_to' . $where);
        return $query->result();
    }

    public function get_kurikulum_jurusan_tkj($where = "")
    {
        $query = $this->db->query('SELECT * FROM kurikulum_jurusan_tkj' . $where);
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