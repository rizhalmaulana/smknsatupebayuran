<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboardmodel extends CI_Model{
    
    public function count_pendidik(){
        $this->db->select('COUNT(id) AS pendidik, nip, nama_pendidik, tempat_lahir, tanggal_lahir, jenis_kelamin, jabatan');
        $this->db->group_by('nama_pendidik');
        $this->db->order_by('id', 'ASC');
        $hasil = $this->db->get('profil_tenaga_pendidik');
        
        return $hasil;
    }

    public function count_kependidikan(){
        $this->db->select('COUNT(id) AS kependidikan, nip, nama_pendidik, tempat_lahir, tanggal_lahir, jenis_kelamin, jabatan');
        $this->db->group_by('nama_pendidik');
        $this->db->order_by('id', 'ASC');
        $hasil = $this->db->get('profil_tenaga_kependidikan');
        
        return $hasil;
    }

    public function count_jurusan(){
        $this->db->select('COUNT(id) AS jurusan, nama_jurusan, tentang');
        $this->db->order_by('id', 'ASC');
        $hasil = $this->db->get('dashboard_jumlah_jurusan');
        
        return $hasil;
    }
}