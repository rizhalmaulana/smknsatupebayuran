<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidik extends CI_Controller{
    public function index(){
        $data['judul'] = 'Tenaga Pendidik | SMK Negeri 1 Pebayuran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('profile/pendidik');
        $this->load->view('templates/footer');
    }
}