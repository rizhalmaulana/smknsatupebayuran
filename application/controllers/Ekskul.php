<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekskul extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ekskulmodel');
    }

    public function index(){
        $data['ekskul'] = $this->ekskulmodel->get_all_ekskul();
        $data['judul'] = 'Pengembangan Diri | SMK Negeri 1 Pebayuran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('kesiswaan/ekskul');
        $this->load->view('templates/footer');
    }

}