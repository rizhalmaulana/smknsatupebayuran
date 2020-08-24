<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kependidikan extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Tenaga Kependidikan | SMK Negeri 1 Pebayuran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('profile/kependidikan');
        $this->load->view('templates/footer');
    }
}