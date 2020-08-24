<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur extends CI_Controller{
    public function index(){
        $data['judul'] = 'Struktur Organisasi | SMK Negeri 1 Pebayuran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('profile/struktur');
        $this->load->view('templates/footer');
    }
}