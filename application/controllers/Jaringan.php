<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jaringan extends CI_Controller{
    public function index(){
        $data['judul'] = 'Teknik Komputer dan Jaringan | SMK Negeri 1 Pebayuran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('kurikulum/jaringan');
        $this->load->view('templates/footer');
    }
}