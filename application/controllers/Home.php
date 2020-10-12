<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('homemodel');
    }

    public function index(){
        $data['ekskul'] = $this->homemodel->get_ekskul();
        $data['tei'] = $this->homemodel->get_jurusan_tei();
        $data['to'] = $this->homemodel->get_jurusan_to();
        $data['tkj'] = $this->homemodel->get_jurusan_tkj();
        
        $data['judul'] = 'Home | SMK Negeri 1 Pebayuran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

}