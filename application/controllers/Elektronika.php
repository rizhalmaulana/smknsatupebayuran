<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Elektronika extends CI_Controller{
    public function index(){
        $data['judul'] = 'Teknik Elektronika Industri | SMK Negeri 1 Pebayuran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('kurikulum/elektronika');
        $this->load->view('templates/footer');
    }
}