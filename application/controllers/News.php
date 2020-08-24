<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller{
    public function index(){
        $data['judul'] = 'News | SMK Negeri 1 Pebayuran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('news/index');
        $this->load->view('templates/footer');
    }
}