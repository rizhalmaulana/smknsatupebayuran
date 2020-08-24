<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('sandi', 'Sandi', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login Admin | SMK Negeri 1 Pebayuran';
            $this->load->view('auth/login', $data);
        } else {
            // validasinya success
            $this->_login();
        }
    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('sandi');

        $user = $this->db->get_where('pebayuran_admin', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['sandi'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                       Password Anda Salah</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                    Akun Anda Tidak Aktif!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Akun Belum Terdaftar</div>');
            redirect('auth');
        }
    }

    public function daftar()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pebayuran_admin.email]', [
            'is_unique' => 'Akun Email Ini Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|is_unique[pebayuran_admin.phone]', [
            'is_unique' => 'No. Handphone Ini Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('sandi', 'Sandi', 'required|trim|min_length[8]', [
            'min_length' => 'Password Terlalu Pendek!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Daftar Akun | SMK Negeri 1 Pebayuran';
            $this->load->view('auth/daftar', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'phone' => htmlspecialchars($this->input->post('phone', true)),
                'sandi' => password_hash($this->input->post('sandi'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => date('Y-m-d H:i:s'),
                'foto' => 'default.jpg'
            ];

            $this->db->insert('pebayuran_admin', $data);
            $this->session->set_flashdata('message', '<div style="text-size: 11px;" class="alert 
            alert-success" role="alert">Akun Anda Berhasil Terdaftar, Silahkan Login!</div>');
            redirect('auth');
        }
    }

    public function keluar(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div style="text-size: 11px;" class="alert 
            alert-success" role="alert">Akun Anda Berhasil Keluar, Terima Kasih!</div>');
            redirect('auth');
    }
}