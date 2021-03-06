<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perpustakaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('perpustakaanmodel');
    }


    public function index()
    {
        $data['dataperpustakaan'] = $this->perpustakaanmodel->get_perpustakaan(); 
        $data['judul'] = 'Perpustakaan | SMK Negeri 1 Pebayuran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('kurikulum/perpustakaan');
        $this->load->view('templates/footer');
    }
}