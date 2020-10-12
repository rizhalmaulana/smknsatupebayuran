<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('strukturmodel');
    }

    public function index(){
        $data['datastruktur'] = $this->strukturmodel->get_struktur_sekolah();
        $data['judul'] = 'Struktur Organisasi | SMK Negeri 1 Pebayuran';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('profile/struktur', $data);
        $this->load->view('templates/footer');
    }
}