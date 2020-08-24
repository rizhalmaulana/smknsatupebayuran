<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller{
    public function index(){
        $data['judul'] = 'Identitas Sekolah | SMK Negeri 1 Pebayuran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('profile/identitas');
        $this->load->view('templates/footer');
    }
}