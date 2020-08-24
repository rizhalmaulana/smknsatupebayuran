<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrasi extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Administrasi Guru | SMK Negeri 1 Pebayuran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('kurikulum/administrasi');
        $this->load->view('templates/footer');
    }
}