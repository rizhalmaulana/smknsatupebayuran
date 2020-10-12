<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('homemodel');
    }

    public function index(){
        $data['identitas'] = $this->homemodel->get_identitas_sekolah();
        $data['judul'] = 'Identitas Sekolah | SMK Negeri 1 Pebayuran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('profile/identitas', $data);
        $this->load->view('templates/footer');
    }
}