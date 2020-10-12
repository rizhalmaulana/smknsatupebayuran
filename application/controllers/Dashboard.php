<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        if(empty($this->session->userdata('Login'))){
            redirect('auth');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('profilmodel');
        $this->load->model('hubinmodel');
        $this->load->model('kurikulummodel');
        $this->load->model('kesiswaanmodel');
        $this->load->model('dashboardmodel');
    }
    
    public function index()
    {
        $data['pendidik'] = $this->dashboardmodel->count_pendidik();
        $data['kependidikan'] = $this->dashboardmodel->count_kependidikan();
        $data['jurusan'] = $this->dashboardmodel->count_jurusan();
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
    
    // FUNCTION PROFIL
    public function profil()
    {
        $data = array(
            'data_struktur' => $this->profilmodel->get_profil_struktur(),
            'data_pendidik' => $this->profilmodel->get_profil_tenaga_pendidik(),
            'data_kependidikan' => $this->profilmodel->get_profil_tenaga_kependidikan()
        );
        $data['data'] = $this->db->get('profil_identitas_sekolah')->result();
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

    public function insert_identitas()
    {
        $this->form_validation->set_rules('sejarah_sekolah', 'Sejarah', 'required');
        $this->form_validation->set_rules('visi', 'Visi', 'required');
        $this->form_validation->set_rules('misi', 'Misi', 'required');

        $config['upload_path']          = './assets/upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);
        
        if (!empty($_FILES['file_gambar']))
        {
            $this->upload->do_upload('file_gambar');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }

        if ($this->form_validation->run()){
            $sejarah = $this->input->post('sejarah_sekolah', true);
            $visi    = $this->input->post('visi', true);
            $misi    = $this->input->post('misi', true);

            $data = [
                    'file_gambar' => $file1,
                    'sejarah_sekolah' => $sejarah,
                    'visi' => $visi,
                    'misi' => $misi,
                    'date_created' => date('Y-m-d H:i:s'),
            ];

            $insert = $this->db->insert('profil_identitas_sekolah', $data);
            if ($insert){
                $this->session->set_flashdata('messageidentitas', '<div style="text-size: 11px;" class="alert 
                alert-success" role="alert">Data anda berhasil dimasukkan! Silahkan cek halaman utama</div>');
                redirect('dashboard/profil');
            }else{
                $this->session->set_flashdata('messageidentitas', '<div style="text-size: 11px;" class="alert 
                alert-danger" role="alert">Data anda gagal dimasukkan! Silahkan coba lagi</div>');
                redirect('dashboard/profil');
            }

        }else{
            $this->profil();
        }

    }
    
    public function insert_struktur()
    {
        $this->form_validation->set_rules('nipStruktur', 'Nip', 'required');
        $this->form_validation->set_rules('namaStruktur', 'Struktur', 'required');
        $this->form_validation->set_rules('tempatLahirStruktur', 'Tempat', 'required');
        $this->form_validation->set_rules('tanggalLahirStruktur', 'Tanggal', 'required');
        $this->form_validation->set_rules('jeniskelaminStruktur', 'Gender', 'required');
        $this->form_validation->set_rules('jabatanStruktur', 'Jabatan', 'required');

        if ($this->form_validation->run()){
            $nip            = $this->input->post('nipStruktur', true);
            $struktur       = $this->input->post('namaStruktur', true);
            $tempatLahir    = $this->input->post('tempatLahirStruktur', true);
            $tanggalLahir   = $this->input->post('tanggalLahirStruktur', true);
            $genderStruktur = $this->input->post('jeniskelaminStruktur', true);
            $jabatan        = $this->input->post('jabatanStruktur', true);

            if ($genderStruktur == "L") {
                $jenisKelamin = "Laki - laki";
            } else {
                $jenisKelamin = "Perempuan";
            }

            $data = [
                    'nip' => $nip,
                    'nama_pendidik' => $struktur,
                    'tempat_lahir' => $tempatLahir,
                    'tanggal_lahir' => $tanggalLahir,
                    'jenis_kelamin' => $jenisKelamin,
                    'jabatan' => $jabatan,
                    'date_created' => date('Y-m-d H:i:s'),
            ];

            $insert = $this->db->insert('profil_struktur_organisasi', $data);
            if ($insert){
                $this->session->set_flashdata('messagestruktur', '<div style="text-size: 11px;" class="alert 
                alert-success" role="alert">Data anda berhasil dimasukkan! Silahkan cek tabel</div>');
                redirect('dashboard/profil');
            }else{
                $this->session->set_flashdata('messagestruktur', '<div style="text-size: 11px;" class="alert 
                alert-danger" role="alert">Data anda gagal dimasukkan! Silahkan coba lagi</div>');
                redirect('dashboard/profil');
            }

        }else{
            $this->profil();
        }
    }
    
    public function insert_pendidik()
    {
        $this->form_validation->set_rules('nipPendidik', 'Nip', 'required');
        $this->form_validation->set_rules('namaPendidik', 'Pendidik', 'required');
        $this->form_validation->set_rules('tempatLahirPendidik', 'Tempat', 'required');
        $this->form_validation->set_rules('tanggalLahirPendidik', 'Tanggal', 'required');
        $this->form_validation->set_rules('jenisKelaminPendidik', 'Gender', 'required');
        $this->form_validation->set_rules('jabatanPendidik', 'Jabatan', 'required');

        if ($this->form_validation->run()){
            $nip            = $this->input->post('nipPendidik', true);
            $pendidik       = $this->input->post('namaPendidik', true);
            $tempatLahir    = $this->input->post('tempatLahirPendidik', true);
            $tanggalLahir   = $this->input->post('tanggalLahirPendidik', true);
            $genderPendidik = $this->input->post('jenisKelaminPendidik', true);
            $jabatan        = $this->input->post('jabatanPendidik', true);

            if ($genderPendidik == "L") {
                $jenisKelamin = "Laki - laki";
            } else {
                $jenisKelamin = "Perempuan";
            }

            $data = [
                    'nip' => $nip,
                    'nama_pendidik' => $pendidik,
                    'tempat_lahir' => $tempatLahir,
                    'tanggal_lahir' => $tanggalLahir,
                    'jenis_kelamin' => $jenisKelamin,
                    'jabatan' => $jabatan,
                    'date_created' => date('Y-m-d H:i:s'),
            ];

            $insert = $this->db->insert('profil_tenaga_pendidik', $data);
            if ($insert){
                $this->session->set_flashdata('messagependidik', '<div style="text-size: 11px;" class="alert 
                alert-success" role="alert">Data anda berhasil dimasukkan! Silahkan cek tabel</div>');
                redirect('dashboard/profil');
            }else{
                $this->session->set_flashdata('messagependidik', '<div style="text-size: 11px;" class="alert 
                alert-danger" role="alert">Data anda gagal dimasukkan! Silahkan coba lagi</div>');
                redirect('dashboard/profil');
            }

        }else{
            $this->profil();
        }
    }
    
    public function insert_kependidikan()
    {
        $this->form_validation->set_rules('nipKependidikan', 'Nip', 'required');
        $this->form_validation->set_rules('namaKependidikan', 'Kependidikan', 'required');
        $this->form_validation->set_rules('tempatLahirKependidikan', 'Tempat', 'required');
        $this->form_validation->set_rules('tanggalLahirKependidikan', 'Tanggal', 'required');
        $this->form_validation->set_rules('jenisKelaminKependidikan', 'Gender', 'required');
        $this->form_validation->set_rules('jabatanKependidikan', 'Jabatan', 'required');

        if ($this->form_validation->run()){
            $nip            = $this->input->post('nipKependidikan', true);
            $kependidikan   = $this->input->post('namaKependidikan', true);
            $tempatLahir    = $this->input->post('tempatLahirKependidikan', true);
            $tanggalLahir   = $this->input->post('tanggalLahirKependidikan', true);
            $genderKependidikan = $this->input->post('jenisKelaminKependidikan', true);
            $jabatan        = $this->input->post('jabatanKependidikan', true);

            if ($genderKependidikan == "L") {
                $jenisKelamin = "Laki - laki";
            } else {
                $jenisKelamin = "Perempuan";
            }

            $data = [
                    'nip' => $nip,
                    'nama_pendidik' => $kependidikan,
                    'tempat_lahir' => $tempatLahir,
                    'tanggal_lahir' => $tanggalLahir,
                    'jenis_kelamin' => $jenisKelamin,
                    'jabatan' => $jabatan,
                    'date_created' => date('Y-m-d H:i:s'),
            ];

            $insert = $this->db->insert('profil_tenaga_kependidikan', $data);
            if ($insert){
                $this->session->set_flashdata('messagekependidikan', '<div style="text-size: 11px;" class="alert 
                alert-success" role="alert">Data anda berhasil dimasukkan! Silahkan cek tabel</div>');
                redirect('dashboard/profil');
            }else{
                $this->session->set_flashdata('messagekependidikan', '<div style="text-size: 11px;" class="alert 
                alert-danger" role="alert">Data anda gagal dimasukkan! Silahkan coba lagi</div>');
                redirect('dashboard/profil');
            }

        }else{
            $this->profil();
        }
    }
    
    public function edit_struktur($id)
    {
        $struktur = $this->profilmodel->get_profil_struktur(" where id='$id'");
        $data = array(
            "id" => $struktur[0]->id,
            "nip" => $struktur[0]->nip,
            "nama_pendidik" => $struktur[0]->nama_pendidik,
            "tempat_lahir" => $struktur[0]->tempat_lahir,
            "tanggal_lahir" => $struktur[0]->tanggal_lahir,
            "jenis_kelamin" => $struktur[0]->jenis_kelamin,
            "jabatan" => $struktur[0]->jabatan,
        );
        
        $data['headline'] = "Edit Struktur";
        $data['title'] = "Form Master Edit Struktur Organisasi";
        $data['url'] = "dashboard/update_struktur";
        
        $data['judul'] = 'Edit Struktur | SMKN 1 PEBAYURAN';
        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('main/header', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('edit/edit', $data);
        $this->load->view('main/footer');
    }
    
    public function edit_pendidik($id)
    {
        $struktur = $this->profilmodel->get_profil_tenaga_pendidik(" where id='$id'");
        $data = array(
            "id" => $struktur[0]->id,
            "nip" => $struktur[0]->nip,
            "nama_pendidik" => $struktur[0]->nama_pendidik,
            "tempat_lahir" => $struktur[0]->tempat_lahir,
            "tanggal_lahir" => $struktur[0]->tanggal_lahir,
            "jenis_kelamin" => $struktur[0]->jenis_kelamin,
            "jabatan" => $struktur[0]->jabatan,
        );
        
        $data['headline'] = "Edit Pendidik";
        $data['title'] = "Form Master Edit Tenaga Pendidik";
        $data['url'] = "dashboard/update_pendidik";
        
        $data['judul'] = 'Edit Pendidik | SMKN 1 PEBAYURAN';
        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('main/header', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('edit/edit', $data);
        $this->load->view('main/footer');
    }
    
    public function edit_kependidikan($id)
    {
        $struktur = $this->profilmodel->get_profil_tenaga_kependidikan(" where id='$id'");
        $data = array(
            "id" => $struktur[0]->id,
            "nip" => $struktur[0]->nip,
            "nama_pendidik" => $struktur[0]->nama_pendidik,
            "tempat_lahir" => $struktur[0]->tempat_lahir,
            "tanggal_lahir" => $struktur[0]->tanggal_lahir,
            "jenis_kelamin" => $struktur[0]->jenis_kelamin,
            "jabatan" => $struktur[0]->jabatan,
        );
        
        $data['headline'] = "Edit Kependidikan";
        $data['title'] = "Form Master Edit Tenaga Kependidikan";
        $data['url'] = "dashboard/update_kependidikan";
        
        $data['judul'] = 'Edit Kependidikan | SMKN 1 PEBAYURAN';
        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('main/header', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('edit/edit', $data);
        $this->load->view('main/footer');
    }
    
    public function update_struktur()
    {
        $id = $_POST['idStruktur'];
        $nip = $_POST['nipStruktur'];
        $nama_pendidik = $_POST['namaStruktur'];
        $tempat_lahir = $_POST['tempatLahirStruktur'];
        $tanggal_lahir =  $_POST['tanggalLahirStruktur'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        if ($jenis_kelamin == "L") {
            $kelamin = "Laki - laki";
        } else {
            $kelamin = "Perempuan";
        }
        $jabatan = $_POST['jabatanStruktur'];
        
        $data_update = array(
            'nip' => $nip,
            'nama_pendidik' => $nama_pendidik,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $kelamin,
            'jabatan' => $jabatan
        );
        $where = array('id' => $id); //Kita ubah yang ini okeh
        $res = $this->profilmodel->UpdateData('profil_struktur_organisasi', $data_update, $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Update');
            document.location.href = "<?= base_url('dashboard/profil') ?>";
            </script>
            <?php
        }
    }
    
    public function update_pendidik()
    {
        $nip = $_POST['nipStruktur'];
        $nama_pendidik = $_POST['namaStruktur'];
        $tempat_lahir = $_POST['tempatLahirStruktur'];
        $tanggal_lahir =  $_POST['tanggalLahirStruktur'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        if ($jenis_kelamin == "L") {
            $kelamin = "Laki - laki";
        } else {
            $kelamin = "Perempuan";
        }
        $jabatan = $_POST['jabatanStruktur'];
        
        $data_update = array(
            'nip' => $nip,
            'nama_pendidik' => $nama_pendidik,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $kelamin,
            'jabatan' => $jabatan
        );
        $where = array('nip' => $nip);
        $res = $this->profilmodel->UpdateData('profil_tenaga_pendidik', $data_update, $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Update');
            document.location.href = "<?= base_url('dashboard/profil') ?>";
            </script>
            <?php
        }
    }
    
    public function update_kependidikan()
    {
        $nip = $_POST['nipStruktur'];
        $nama_pendidik = $_POST['namaStruktur'];
        $tempat_lahir = $_POST['tempatLahirStruktur'];
        $tanggal_lahir =  $_POST['tanggalLahirStruktur'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        if ($jenis_kelamin == "L") {
            $kelamin = "Laki - laki";
        } else {
            $kelamin = "Perempuan";
        }
        $jabatan = $_POST['jabatanStruktur'];
        
        $data_update = array(
            'nip' => $nip,
            'nama_pendidik' => $nama_pendidik,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $kelamin,
            'jabatan' => $jabatan
        );
        $where = array('nip' => $nip);
        $res = $this->profilmodel->UpdateData('profil_tenaga_kependidikan', $data_update, $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Update');
            document.location.href = "<?= base_url('dashboard/profil') ?>";
            </script>
            <?php
        }
    }
    
    public function hapus_struktur($id)
    {
        $where = array('id' => $id);
        $res = $this->profilmodel->DeleteData('profil_struktur_organisasi', $where);

        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Hapus');
            document.location.href = "<?= base_url('dashboard/profil') ?>";
            </script>
            <?php
        } else {
            ?>
            <script language="javascript">
            alert('Maaf, Data Anda Gagal di Hapus');
            document.location.href = "<?= base_url('dashboard/profil') ?>";
            </script>
            <?php
        }
    }
    
    public function hapus_pendidik($id)
    {
        $where = array('id' => $id);
        $res = $this->profilmodel->DeleteData('profil_tenaga_pendidik', $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Hapus');
            document.location.href = "<?= base_url('dashboard/profil') ?>";
            </script>
            <?php
        } else {
            ?>
            <script language="javascript">
            alert('Maaf, Data Anda Gagal di Hapus');
            document.location.href = "<?= base_url('dashboard/profil') ?>";
            </script>
            <?php
        }
    }
    
    public function hapus_kependidikan($id)
    {
        $where = array('id' => $id);
        $res = $this->profilmodel->DeleteData('profil_tenaga_kependidikan', $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Hapus');
            document.location.href = "<?= base_url('dashboard/profil') ?>";
            </script>
            <?php
        } else {
            ?>
            <script language="javascript">
            alert('Maaf, Data Anda Gagal di Hapus');
            document.location.href = "<?= base_url('dashboard/profil') ?>";
            </script>
            <?php
        }
    }
    // FUNCTION PROFIL
    

    // FUNCTION HUBIN
    public function hubin()
    {
        $data = array(
            'data_hubin_mitra' => $this->hubinmodel->get_hubin_mitra()
        );
        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['judul'] = "Hubin Master | SMKN 1 PEBAYURAN";
        
        $this->load->view('main/header', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('dashboard/hubin', $data);
        $this->load->view('main/footer', $data);
    }

    public function insert_hubin()
    {
        $this->form_validation->set_rules('namaPerusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('tentangPerusahaan', 'Keterangan', 'required');

        $config['upload_path']          = './assets/upload/hubin/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);
        
        if (!empty($_FILES['gambarPerusahaan']))
        {
            $this->upload->do_upload('gambarPerusahaan');
            $data1 = $this->upload->data();
            $filehubin = $data1['file_name'];
        }

        if ($this->form_validation->run()){
            $nama       = $this->input->post('namaPerusahaan', true);
            $tentang    = $this->input->post('tentangPerusahaan', true);

            $data = [
                'gambar' => $filehubin,
                'nama_perusahaan' => $nama,
                'tentang_perusahaan' => $tentang,
                'date_created' => date('Y-m-d H:i:s'),
            ];

            $insert = $this->db->insert('hubin_mitra_industri', $data);

            if ($insert){
                $this->session->set_flashdata('messagehubin', '<div style="text-size: 11px;" class="alert 
                alert-success" role="alert">Data anda berhasil dimasukkan! Silahkan cek tabel</div>');
                redirect('dashboard/hubin');
            }else{
                $this->session->set_flashdata('messagehubin', '<div style="text-size: 11px;" class="alert 
                alert-danger" role="alert">Data anda gagal dimasukkan! Silahkan coba lagi</div>');
                redirect('dashboard/hubin');
            }
        }else{
            $this->hubin();
        }
    }

    public function hapus_hubin($id)
    {
        $where = array('id' => $id);
        $res = $this->hubinmodel->DeleteData('hubin_mitra_industri', $where);

        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Hapus');
            document.location.href = "<?= base_url('dashboard/hubin') ?>";
            </script>
            <?php
        } else {
            ?>
            <script language="javascript">
            alert('Maaf, Data Anda Gagal di Hapus');
            document.location.href = "<?= base_url('dashboard/hubin') ?>";
            </script>
            <?php
        }
    }

    public function edit_hubin($id)
    {
        $struktur = $this->hubinmodel->get_hubin_mitra(" where id='$id'");
        $data = array(
            "id" => $struktur[0]->id,
            "gambar" => $struktur[0]->gambar,
            "nama_perusahaan" => $struktur[0]->nama_perusahaan,
            "tentang_perusahaan" => $struktur[0]->tentang_perusahaan,
        );
        
        $data['headline'] = "Edit Hubin";
        $data['title'] = "Form Master Edit Hubin Sekolah";
        $data['url'] = "dashboard/update_hubin";
        
        $data['judul'] = 'Edit Hubin | SMKN 1 PEBAYURAN';
        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('main/header', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('edit/edit_hubin', $data);
        $this->load->view('main/footer');
    }

    public function update_hubin()
    {
        $idHubin    = $_POST['idHubin']; 
        $nama       = $_POST['namaHubin'];
        $tentang    = $_POST['tentangHubin'];

        $config['upload_path']          = './assets/upload/hubin/';
        $config['allowed_types']        = 'jpeg|png|gif|jpg';
        $config['max_size']             = 50000;

        $this->load->library('upload', $config);
        
        if (!empty($_FILES['gambarHubin']))
        {
            $this->upload->do_upload('gambarHubin');
            $data1 = $this->upload->data();
            $fileedithubin = $data1['file_name'];
        }

        $data_update = array(
            'id'    => $idHubin,
            'gambar' => $fileedithubin,
            'nama_perusahaan' => $nama,
            'tentang_perusahaan' => $tentang,
            'date_created' => date('Y-m-d H:i:s'),
        );
        $where = array('id' => $idHubin); //Kita ubah yang ini okeh
        $res = $this->hubinmodel->UpdateData('hubin_mitra_industri', $data_update, $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Update');
            document.location.href = "<?= base_url('dashboard/hubin') ?>";
            </script>
            <?php
        }else{
            ?>
            <script language="javascript">
            alert('Maaf, Data Anda Gagal di Update');
            document.location.href = "<?= base_url('dashboard/hubin') ?>";
            </script>
            <?php
        }
    }
    // FUNCTION HUBIN
    
    
    // FUNCTION KURIKULUM
    public function kurikulum()
    {
        $data = array(
            'data_kurikulum_administrasi' => $this->kurikulummodel->get_kurikulum_administrasi(),
            'data_kurikulum_perpustakaan' => $this->kurikulummodel->get_kurikulum_perpustakaan(),
            'data_kurikulum_jurusan_tei' => $this->kurikulummodel->get_kurikulum_jurusan_tei(),
            'data_kurikulum_jurusan_to' => $this->kurikulummodel->get_kurikulum_jurusan_to(),
            'data_kurikulum_jurusan_tkj'=> $this->kurikulummodel->get_kurikulum_jurusan_tkj()
        );
        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['judul'] = "Kurikulum Master | SMKN 1 PEBAYURAN";
        
        $this->load->view('main/header', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('dashboard/kurikulum', $data);
        $this->load->view('main/footer');
    }
    
    public function insert_kurikulum_administrasi()
    {
        $this->form_validation->set_rules('tanggalAdministrasi', 'Tanggal Administrasi', 'required');
        $this->form_validation->set_rules('keteranganAdministrasi', 'Keterangan ', 'required');

        $config['upload_path']          = './assets/upload/kurikulum/administrasi/';
        $config['allowed_types']        = 'pdf|xls|doc|docx';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);
        
        if (!empty($_FILES['uploadAdministrasi']))
        {
            $this->upload->do_upload('uploadAdministrasi');
            $data1 = $this->upload->data();
            $fileadministrasi = $data1['file_name'];
        }

        if ($this->form_validation->run()){
            $tanggal       = $this->input->post('tanggalAdministrasi', true);
            $keterangan    = $this->input->post('keteranganAdministrasi', true);

            $data = [
                'berkas_file' => $fileadministrasi,
                'tanggal_upload' => $tanggal,
                'keterangan_berkas' => $keterangan,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $insert = $this->db->insert('kurikulum_administrasi_guru', $data);

            if ($insert){
                $this->session->set_flashdata('messageadministrasi', '<div style="text-size: 11px;" class="alert 
                alert-success" role="alert">Data anda berhasil dimasukkan! Silahkan cek tabel</div>');
                redirect('dashboard/kurikulum');
            }else{
                $this->session->set_flashdata('messageadministrasi', '<div style="text-size: 11px;" class="alert 
                alert-danger" role="alert">Data anda gagal dimasukkan! Silahkan coba lagi</div>');
                redirect('dashboard/kurikulum');
            }
        }else{
            $this->kurikulum();
        }
    }
    
    public function edit_kurikulum_administrasi($id)
    {
        $administrasi = $this->kurikulummodel->get_kurikulum_administrasi(" where id='$id'");
        $data = array(
            "id" => $administrasi[0]->id,
            "berkas_file" => $administrasi[0]->berkas_file,
            "tanggal_upload" => $administrasi[0]->tanggal_upload,
            "keterangan_berkas" => $administrasi[0]->keterangan_berkas,
        );
        
        $data['headline'] = "Edit Administrasi";
        $data['title'] = "Form Master Edit Administrasi";
        $data['url'] = "dashboard/update_administrasi";
        
        $data['judul'] = 'Edit Administrasi | SMKN 1 PEBAYURAN';
        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('main/header', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('edit/edit_administrasi', $data);
        $this->load->view('main/footer');
    }

    public function hapus_kurikulum_administrasi($id)
    {
        $where = array('id' => $id);
        $res = $this->kurikulummodel->DeleteData('kurikulum_administrasi_guru', $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Hapus');
            document.location.href = "<?= base_url('dashboard/kurikulum') ?>";
            </script>
            <?php
        } else {
            ?>
            <script language="javascript">
            alert('Maaf, Data Anda Gagal di Hapus');
            document.location.href = "<?= base_url('dashboard/kurikulum') ?>";
            </script>
            <?php
        }
    }

    public function update_administrasi()
    {
        $idAdmin        = $_POST['idAdministrasi'];
        $tanggal        = $_POST['tanggalAdministrasi'];
        $keterangan     = $_POST['keteranganAdministrasi'];
        
        $config['upload_path']          = './assets/upload/kurikulum/administrasi';
        $config['allowed_types']        = 'pdf|doc|docx|xls';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);
        
        if (!empty($_FILES['berkasAdministrasi']))
        {
            $this->upload->do_upload('berkasAdministrasi');
            $data1 = $this->upload->data();
            $fileeditadmin = $data1['file_name'];
        }

        $data_update = array(
            'id' => $idAdmin,
            'berkas_file' => $fileeditadmin,
            'tanggal_upload' => $tanggal,
            'keterangan_berkas' => $keterangan,
        );

        $where = array('id' => $idAdmin);
        $res = $this->kurikulummodel->UpdateData('kurikulum_administrasi_guru', $data_update, $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Update');
            document.location.href = "<?= base_url('dashboard/kurikulum') ?>";
            </script>
            <?php
        }
    }

    public function insert_kurikulum_perpustakaan()
    {
        $this->form_validation->set_rules('tanggalPerpustakaan', 'Tanggal Perpustakaan', 'required');
        $this->form_validation->set_rules('keteranganPerpustakaan', 'Keterangan ', 'required');

        $config['upload_path']          = './assets/upload/kurikulum/perpustakaan/';
        $config['allowed_types']        = 'pdf|xls|doc|docx';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);
        
        if (!empty($_FILES['berkasPerpustakaan']))
        {
            $this->upload->do_upload('berkasPerpustakaan');
            $data1 = $this->upload->data();
            $fileperpustakaan = $data1['file_name'];
        }

        if ($this->form_validation->run()){
            $tanggal       = $this->input->post('tanggalPerpustakaan', true);
            $keterangan    = $this->input->post('keteranganPerpustakaan', true);

            $data = [
                'berkas_file' => $fileperpustakaan,
                'tanggal_upload' => $tanggal,
                'keterangan_berkas' => $keterangan,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $insert = $this->db->insert('kurikulum_perpustakaan_sekolah', $data);

            if ($insert){
                $this->session->set_flashdata('messageperpustakaan', '<div style="text-size: 11px;" class="alert 
                alert-success" role="alert">Data anda berhasil dimasukkan! Silahkan cek tabel</div>');
                redirect('dashboard/kurikulum');
            }else{
                $this->session->set_flashdata('messageperpustakaan', '<div style="text-size: 11px;" class="alert 
                alert-danger" role="alert">Data anda gagal dimasukkan! Silahkan coba lagi</div>');
                redirect('dashboard/kurikulum');
            }
        }else{
            $this->kurikulum();
        }
    }

    public function edit_kurikulum_perpustakaan($id)
    {
        $perpustakaan = $this->kurikulummodel->get_kurikulum_perpustakaan(" where id='$id'");
        $data = array(
            "id" => $perpustakaan[0]->id,
            "berkas_file" => $perpustakaan[0]->berkas_file,
            "tanggal_upload" => $perpustakaan[0]->tanggal_upload,
            "keterangan_berkas" => $perpustakaan[0]->keterangan_berkas,
        );
        
        $data['headline'] = "Edit Perpustakaan";
        $data['title'] = "Form Master Edit Perpustakaan";
        $data['url'] = "dashboard/update_perpustakaan";
        
        $data['judul'] = 'Edit Perpustakaan | SMKN 1 PEBAYURAN';
        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('main/header', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('edit/edit_perpustakaan', $data);
        $this->load->view('main/footer');
    }

    public function update_perpustakaan()
    {
        $idPerpustakaan = $_POST['idPerpustakaan'];
        $tanggal        = $_POST['tanggalPerpustakaan'];
        $keterangan     = $_POST['keteranganPerpustakaan'];
        
        $config['upload_path']          = './assets/upload/kurikulum/perpustakaan';
        $config['allowed_types']        = 'pdf|doc|docx|xls';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);
        
        if (!empty($_FILES['berkasPerpustakaan']))
        {
            $this->upload->do_upload('berkasPerpustakaan');
            $data1 = $this->upload->data();
            $fileeditperpus = $data1['file_name'];
        }

        $data_update = array(
            'id' => $idPerpustakaan,
            'berkas_file' => $fileeditperpus,
            'tanggal_upload' => $tanggal,
            'keterangan_berkas' => $keterangan,
        );
        $where = array('id' => $idPerpustakaan);
        $res = $this->kurikulummodel->UpdateData('kurikulum_perpustakaan_sekolah', $data_update, $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Update');
            document.location.href = "<?= base_url('dashboard/kurikulum') ?>";
            </script>
            <?php
        }
    }

    public function hapus_kurikulum_perpustakaan($id)
    {
        $where = array('id' => $id);
        $res = $this->kurikulummodel->DeleteData('kurikulum_perpustakaan_sekolah', $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Hapus');
            document.location.href = "<?= base_url('dashboard/kurikulum') ?>";
            </script>
            <?php
        } else {
            ?>
            <script language="javascript">
            alert('Maaf, Data Anda Gagal di Hapus');
            document.location.href = "<?= base_url('dashboard/kurikulum') ?>";
            </script>
            <?php
        }
    }

    public function insert_kurikulum_jurusan_tei()
    {
        $upload        = $_POST['berkasJurusan'];
        $keterangan    = $_POST['keteranganJurusan'];
        
        $data_insert = array(
            'id' => '',
            'berkas_file' => $upload,
            'keterangan_berkas' => $keterangan,
        );
        $res = $this->kurikulummodel->InsertData('kurikulum_jurusan_tei', $data_insert);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert("Berhasil! Data Berhasil Di input!");
            document.location.href = "../dashboard/kurikulum";
            </script>
            <?php
        }
    }

    public function edit_kurikulum_jurusan_tei($id)
    {
        $jurusan = $this->kurikulummodel->get_kurikulum_jurusan_tei(" where id='$id'");
        $data = array(
            "id" => $jurusan[0]->id,
            "berkas_file" => $jurusan[0]->berkas_file,
            "keterangan_berkas" => $jurusan[0]->keterangan_berkas,
        );
        
        $data['headline'] = "Edit Jurusan Teknik Elektronika Industri ";
        $data['title'] = "Form Master Edit Teknik Elektronika Industri ";
        $data['url'] = "dashboard/update_jurusan_tei";
        
        $data['judul'] = 'Edit Jurusan | SMKN 1 PEBAYURAN';
        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('main/header', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('edit/edit_jurusan_tei', $data);
        $this->load->view('main/footer');
    }

    public function update_jurusan_tei()
    {
        $idJurusan = $_POST['idJurusan']; 
        $keterangan = $_POST['keteranganJurusan'];
        
        $config['upload_path']          = './assets/upload/kurikulum/tei';
        $config['allowed_types']        = 'jpeg|png|jpg';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);
        
        if (!empty($_FILES['berkasJurusan']))
        {
            $this->upload->do_upload('berkasJurusan');
            $data1 = $this->upload->data();
            $fileedittei = $data1['file_name'];
        }

        $data_update = array(
            'id' => $idJurusan,
            'berkas_file' => $fileedittei,
            'keterangan_berkas' => $keterangan,
        );
        $where = array('id' => $idJurusan);
        $res = $this->kurikulummodel->UpdateData('kurikulum_jurusan_tei', $data_update, $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Update');
            document.location.href = "<?= base_url('dashboard/kurikulum') ?>";
            </script>
            <?php
        }
    }

    public function insert_kurikulum_jurusan_to()
    {
        $upload        = $_POST['logoJurusan'];
        $keterangan    = $_POST['tentangJurusan'];
        
        $data_insert = array(
            'id' => '',
            'berkas_file' => $upload,
            'keterangan_berkas' => $keterangan,
        );
        $res = $this->kurikulummodel->InsertData('kurikulum_jurusan_to', $data_insert);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert("Berhasil! Data Berhasil Di input!");
            document.location.href = "../dashboard/kurikulum";
            </script>
            <?php
        }
    }

    public function edit_kurikulum_jurusan_to($id)
    {
        $jurusan = $this->kurikulummodel->get_kurikulum_jurusan_to(" where id='$id'");
        $data = array(
            "id" => $jurusan[0]->id,
            "berkas_file" => $jurusan[0]->berkas_file,
            "keterangan_berkas" => $jurusan[0]->keterangan_berkas,
        );
        
        $data['headline'] = "Edit Jurusan Teknik Ototronik ";
        $data['title'] = "Form Master Edit Teknik Ototronik ";
        $data['url'] = "dashboard/update_jurusan_to";
        
        $data['judul'] = 'Edit Jurusan | SMKN 1 PEBAYURAN';
        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('main/header', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('edit/edit_jurusan_to', $data);
        $this->load->view('main/footer');
    }

    public function update_jurusan_to()
    {
        $idJurusan = $_POST['idJurusan']; 
        $keterangan = $_POST['keteranganJurusan'];
        
        $config['upload_path']          = './assets/upload/kurikulum/to';
        $config['allowed_types']        = 'jpeg|png|jpg';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);
        
        if (!empty($_FILES['berkasJurusan']))
        {
            $this->upload->do_upload('berkasJurusan');
            $data1 = $this->upload->data();
            $fileeditto = $data1['file_name'];
        }

        $data_update = array(
            'id' => $idJurusan,
            'berkas_file' => $fileeditto,
            'keterangan_berkas' => $keterangan,
        );
        $where = array('id' => $idJurusan);
        $res = $this->kurikulummodel->UpdateData('kurikulum_jurusan_to', $data_update, $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Update');
            document.location.href = "<?= base_url('dashboard/kurikulum') ?>";
            </script>
            <?php
        }
    }

    public function insert_kurikulum_jurusan_tkj()
    {
        $upload        = $_POST['logoJurusan'];
        $keterangan    = $_POST['tentangJurusan'];
        
        $data_insert = array(
            'id' => '',
            'berkas_file' => $upload,
            'keterangan_berkas' => $keterangan,
        );
        $res = $this->kurikulummodel->InsertData('kurikulum_jurusan_tkj', $data_insert);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert("Berhasil! Data Berhasil Di input!");
            document.location.href = "../dashboard/kurikulum";
            </script>
            <?php
        }
    }

    public function edit_kurikulum_jurusan_tkj($id)
    {
        $jurusan = $this->kurikulummodel->get_kurikulum_jurusan_tkj(" where id='$id'");
        $data = array(
            "id" => $jurusan[0]->id,
            "berkas_file" => $jurusan[0]->berkas_file,
            "keterangan_berkas" => $jurusan[0]->keterangan_berkas,
        );
        
        $data['headline'] = "Edit Jurusan Teknik Komputer dan Jaringan ";
        $data['title'] = "Form Master Edit Teknik Komputer dan Jaringan ";
        $data['url'] = "dashboard/update_jurusan_tkj";
        
        $data['judul'] = 'Edit Jurusan | SMKN 1 PEBAYURAN';
        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('main/header', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('edit/edit_jurusan_tkj', $data);
        $this->load->view('main/footer');
    }

    public function update_jurusan_tkj()
    {
        $idJurusan = $_POST['idJurusan']; 
        $keterangan = $_POST['keteranganJurusan'];
        
        $config['upload_path']          = './assets/upload/kurikulum/tkj';
        $config['allowed_types']        = 'jpeg|png|jpg';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);
        
        if (!empty($_FILES['berkasJurusan']))
        {
            $this->upload->do_upload('berkasJurusan');
            $data1 = $this->upload->data();
            $fileedittkj = $data1['file_name'];
        }

        $data_update = array(
            'id' => $idJurusan,
            'berkas_file' => $fileedittkj,
            'keterangan_berkas' => $keterangan,
        );
        $where = array('id' => $idJurusan);
        $res = $this->kurikulummodel->UpdateData('kurikulum_jurusan_tkj', $data_update, $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Update');
            document.location.href = "<?= base_url('dashboard/kurikulum') ?>";
            </script>
            <?php
        }
    }
    // FUNCTION KURIKULUM


    public function news()
    {
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
    
    // FUNCTION KESISWAAN
    public function kesiswaan()
    {
        $data = array(
            'data_kesiswaan_ekskul' => $this->kesiswaanmodel->get_kesiswaan_ekskul_sekolah()
        );

        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['judul'] = "Ekskul Master | SMKN 1 PEBAYURAN";
        
        $this->load->view('main/header', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('dashboard/kesiswaan', $data);
        $this->load->view('main/footer');
    }

    public function insert_kesiswaan_ekskul()
    {
        $this->form_validation->set_rules('tanggalekskul', 'Tanggal Ekskul', 'required');
        $this->form_validation->set_rules('author', 'Author ', 'required');
        $this->form_validation->set_rules('headlinelomba', 'Headline Lomba', 'required');
        $this->form_validation->set_rules('keteranganlomba', 'Keterangan Lomba ', 'required');

        $config['upload_path']          = './assets/upload/kesiswaan/ekskul';
        $config['allowed_types']        = 'jpeg|png|gif|jpg';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);
        
        if (!empty($_FILES['uploadgambarekskul']))
        {
            $this->upload->do_upload('uploadgambarekskul');
            $data1 = $this->upload->data();
            $fileekskul = $data1['file_name'];
        }

        if ($this->form_validation->run()){
            $tanggal        = $this->input->post('tanggalekskul', true);
            $author         = $this->input->post('author', true);
            $headline       = $this->input->post('headlinelomba', true);
            $keterangan     = $this->input->post('keteranganlomba', true);

            $data = [
                'upload_gambar' => $fileekskul,
                'tanggal' => $tanggal,
                'author' => $author,
                'headline_lomba' => $headline,
                'keterangan_lomba' => $keterangan,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $insert = $this->db->insert('kesiswaan_ekskul_sekolah', $data);

            if ($insert){
                $this->session->set_flashdata('messageekskul', '<div style="text-size: 11px;" class="alert 
                alert-success" role="alert">Data anda berhasil dimasukkan! Silahkan cek tabel</div>');
                redirect('dashboard/kesiswaan');
            }else{
                $this->session->set_flashdata('messageekskul', '<div style="text-size: 11px;" class="alert 
                alert-danger" role="alert">Data anda gagal dimasukkan! Silahkan coba lagi</div>');
                redirect('dashboard/kesiswaan');
            }
        }else{
            $this->kesiswaan();
        }
    }

    public function edit_kesiswaan_ekskul($id)
    {
        $kesiswaan = $this->kesiswaanmodel->get_kesiswaan_ekskul_sekolah(" where id='$id'");
        $data = array(
            "id" => $kesiswaan[0]->id,
            "upload_gambar" => $kesiswaan[0]->upload_gambar,
            "tanggal" => $kesiswaan[0]->tanggal,
            "author" => $kesiswaan[0]->author,
            "headline_lomba" => $kesiswaan[0]->headline_lomba,
            "keterangan_lomba" => $kesiswaan[0]->keterangan_lomba,
        );
        
        $data['headline'] = "Edit Pengembangan Diri";
        $data['title'] = "Form Master Edit Pengembangan Diri";
        $data['url'] = "dashboard/update_kesiswaan_ekskul";
        
        $data['judul'] = 'Edit Pengembangan Diri | SMKN 1 PEBAYURAN';
        $data['user'] = $this->db->get_where('pebayuran_admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('main/header', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('main/sidebar');
        $this->load->view('main/rightbar');
        $this->load->view('main/mobile');
        $this->load->view('edit/edit_kesiswaan', $data);
        $this->load->view('main/footer');
    }

    public function update_kesiswaan_ekskul()
    {
        $idEkskul   = $_POST['idEkskul']; 
        $tanggal    = $_POST['edittanggalEkskul'];
        $author     = $_POST['editauthor'];
        $headline   = $_POST['editheadline'];
        $keterangan = $_POST['editketeranganEkskul'];

        $config['upload_path']          = './assets/upload/kesiswaan/';
        $config['allowed_types']        = 'jpeg|png|gif|jpg';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);
        
        if (!empty($_FILES['edituploadgambarekskul']))
        {
            $this->upload->do_upload('edituploadgambarekskul');
            $data1 = $this->upload->data();
            $fileeditekskul = $data1['file_name'];
        }
        
        $data_update = array(
            'id' => $idEkskul,
            'upload_gambar' => $fileeditekskul,
            'tanggal' => $tanggal,
            'author' => $author,
            'headline_lomba' => $headline,
            'keterangan_lomba' => $keterangan,
            'created_at' => date('Y-m-d H:i:s'),
        );
        $where = array('id' => $idEkskul);
        $res = $this->kurikulummodel->UpdateData('kesiswaan_ekskul_sekolah', $data_update, $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Update');
            document.location.href = "<?= base_url('dashboard/kesiswaan') ?>";
            </script>
            <?php
        }
    }

    public function hapus_kesiswaan_ekskul($id)
    {
        $where = array('id' => $id);
        $res = $this->kurikulummodel->DeleteData('kesiswaan_ekskul_sekolah', $where);
        
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert('Horeee, Data Anda Berhasil di Hapus');
            document.location.href = "<?= base_url('dashboard/kesiswaan') ?>";
            </script>
            <?php
        } else {
            ?>
            <script language="javascript">
            alert('Maaf, Data Anda Gagal di Hapus');
            document.location.href = "<?= base_url('dashboard/kesiswaan') ?>";
            </script>
            <?php
        }
    }
    
}