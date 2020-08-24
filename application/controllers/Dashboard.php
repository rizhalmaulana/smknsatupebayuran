<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('profilmodel');
    }

    public function index(){

        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['judul'] = "Dashboard | SMKN 1 PEBAYURAN";

        $this->load->view('primary/header', $data);
        $this->load->view('primary/topbar', $data);
        $this->load->view('primary/sidebar');
        $this->load->view('primary/rightbar');
        $this->load->view('primary/mobile');
        $this->load->view('dashboard/index', $data);
        $this->load->view('primary/footer');
    }

    public function profil(){
        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['judul'] = "Profil Master | SMKN 1 PEBAYURAN";

        $this->load->view('main/header', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('dashboard/profil', $data);
        $this->load->view('main/footer');
    }

    public function hubin(){
        $hubin['user'] = $this->db->get_where('pebayuran_admin', ['email' => 
        $this->session->userdata('email')])->row_array();
        $hubin['judul'] = "Hubin Master | SMKN 1 PEBAYURAN";

        $this->load->view('main/header', $hubin);
        $this->load->view('main/topbar', $hubin);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('dashboard/hubin', $hubin);
        $this->load->view('main/footer');

    }

    public function news(){
        $news['user'] = $this->db->get_where('pebayuran_admin', ['email' => 
        $this->session->userdata('email')])->row_array();
        $news['judul'] = "News Master | SMKN 1 PEBAYURAN";

        $this->load->view('main/header', $news);
        $this->load->view('main/topbar', $news);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('dashboard/news', $news);
        $this->load->view('main/footer');

    }

    public function kurikulum(){
        $kurikulum['user'] = $this->db->get_where('pebayuran_admin', ['email' => 
        $this->session->userdata('email')])->row_array();
        $kurikulum['judul'] = "Kurikulum Master | SMKN 1 PEBAYURAN";

        $this->load->view('main/header', $kurikulum);
        $this->load->view('main/topbar', $kurikulum);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('dashboard/kurikulum', $kurikulum);
        $this->load->view('main/footer');
        
    }

    public function kesiswaan(){
        $ekskul['user'] = $this->db->get_where('pebayuran_admin', ['email' => 
        $this->session->userdata('email')])->row_array();
        $ekskul['judul'] = "Ekskul Master | SMKN 1 PEBAYURAN";

        $this->load->view('main/header', $ekskul);
        $this->load->view('main/topbar', $ekskul);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('dashboard/kesiswaan', $ekskul);
        $this->load->view('main/footer');

    }

    public function insert_identitas(){
        $gambar     = $_POST['file_gambar'];
        $sejarah    = $_POST['sejarah'];
        $visi       = $_POST['visi'];
        $misi       = $_POST['misi'];
        $data_insert = array(
            'id' => '',
            'file_gambar' => $gambar,
            'sejarah_sekolah' => $sejarah,
            'visi' => $visi,
            'misi' => $misi,
        );
        $res = $this->profilmodel->InsertData('profil_identitas_sekolah', $data_insert);
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert("Berhasil!, Data Berhasil Di input!");
            document.location.href = "../dashboard/profil";
            </script>
            <?php
        }
    }

    public function insert_struktur(){
        
    }

    public function insert_pendidik(){
        
    }

    public function insert_kependidikan(){
        
    }
}