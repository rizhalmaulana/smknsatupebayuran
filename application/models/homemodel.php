<?php
defined('BASEPATH') or exit('No direct script access allowed');

class homemodel extends CI_Model{
    
    public function get_ekskul(){
        $this->db->select('id, upload_gambar, tanggal, author, headline_lomba, keterangan_lomba');
        $this->db->group_by('id');
        $this->db->order_by('id', 'ASC');

        $hasil = $this->db->get('kesiswaan_ekskul_sekolah');
        return $hasil;
    }

    public function get_jurusan_tei()
    {
        $this->db->select('id, berkas_file, keterangan_berkas');
        $this->db->group_by('id');

        $hasil = $this->db->get('kurikulum_jurusan_tei');
        return $hasil;
    }

    public function get_jurusan_to()
    {
        $this->db->select('id, berkas_file, keterangan_berkas');
        $this->db->group_by('id');

        $hasil = $this->db->get('kurikulum_jurusan_to');
        return $hasil;
    }

    public function get_jurusan_tkj()
    {
        $this->db->select('id, berkas_file, keterangan_berkas');
        $this->db->group_by('id');

        $hasil = $this->db->get('kurikulum_jurusan_tkj');
        return $hasil;
    }

    public function get_identitas_sekolah()
    {
        $this->db->select('id, file_gambar, sejarah_sekolah, visi, misi');
        $this->db->group_by('id');

        $hasil = $this->db->get('profil_identitas_sekolah');
        return $hasil;
    }

}