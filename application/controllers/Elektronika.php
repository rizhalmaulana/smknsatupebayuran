<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Elektronika extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('teimodel');
    }

    public function index(){
        $data['tei'] = $this->teimodel->get_tei();
        $data['judul'] = 'Teknik Elektronika Industri | SMK Negeri 1 Pebayuran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('kurikulum/elektronika');
        $this->load->view('templates/footer');
    }
}