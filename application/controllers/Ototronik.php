<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ototronik extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tomodel');
    }

    public function index(){
        $data['to'] = $this->tomodel->get_to();
        $data['judul'] = 'Teknik Ototronik | SMK Negeri 1 Pebayuran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('kurikulum/ototronik');
        $this->load->view('templates/footer');
    }
}