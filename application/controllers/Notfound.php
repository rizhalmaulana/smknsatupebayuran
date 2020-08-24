<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notfound extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'File Tidak Ditemukan';
        $this->load->view('templates/header', $data);
        $this->output->set_status_header('404');
        $this->load->view('notfound.php', array());
    }
}