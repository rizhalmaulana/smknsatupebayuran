<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profilmodel');
        $this->load->model('hubinmodel');
        $this->load->model('kurikulummodel');
        $this->load->model('kesiswaanmodel');
    }
    
    public function index()
    {
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
            alert("Berhasil! Data Berhasil Di input!");
            document.location.href = "../dashboard/profil";
            </script>
            <?php
        }
    }
    
    public function insert_struktur()
    {
        $nip            = $_POST['nipStruktur'];
        $nama           = $_POST['namaStruktur'];
        $tempatLahir    = $_POST['tempatLahirStruktur'];
        $tanggalLahir   = $_POST['tanggalLahirStruktur'];
        $kelamin        = $_POST['jenis_kelamin'];
        $jabatan        = $_POST['jabatanStruktur'];
        
        if ($kelamin == "L") {
            $jenisKelamin = "Laki - laki";
        } else {
            $jenisKelamin = "Perempuan";
        }
        
        $data_insert = array(
            'id' => '',
            'nip' => $nip,
            'nama_pendidik' => $nama,
            'tempat_lahir' => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'jabatan' => $jabatan,
        );
        $res = $this->profilmodel->InsertData('profil_struktur_organisasi', $data_insert);
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert("Berhasil! Data Berhasil Di input!");
            document.location.href = "../dashboard/profil";
            </script>
            <?php
        }
    }
    
    public function insert_pendidik()
    {
        $nip            = $_POST['nipPendidik'];
        $nama           = $_POST['namaPendidik'];
        $tempatLahir    = $_POST['tempatLahirPendidik'];
        $tanggalLahir   = $_POST['tanggalLahirPendidik'];
        $kelamin        = $_POST['jenisKelamin'];
        $jabatan        = $_POST['jabatanPendidik'];
        
        if ($kelamin == "L") {
            $jenisKelamin = "Laki - laki";
        } else {
            $jenisKelamin = "Perempuan";
        }
        
        $data_insert = array(
            'id' => '',
            'nip' => $nip,
            'nama_pendidik' => $nama,
            'tempat_lahir' => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'jabatan' => $jabatan,
        );
        $res = $this->profilmodel->InsertData('profil_tenaga_pendidik', $data_insert);
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert("Berhasil! Data Berhasil Di input!");
            document.location.href = "../dashboard/profil";
            </script>
            <?php
        }
    }
    
    public function insert_kependidikan()
    {
        $nip            = $_POST['nipKependidikan'];
        $nama           = $_POST['namaKependidikan'];
        $tempatLahir    = $_POST['tempatLahirKependidikan'];
        $tanggalLahir   = $_POST['tanggalLahirKependidikan'];
        $kelamin        = $_POST['jenisKelamin'];
        $jabatan        = $_POST['jabatanKependidikan'];
        
        if ($kelamin == "L") {
            $jenisKelamin = "Laki - laki";
        } else {
            $jenisKelamin = "Perempuan";
        }
        
        $data_insert = array(
            'id' => '',
            'nip' => $nip,
            'nama_pendidik' => $nama,
            'tempat_lahir' => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'jabatan' => $jabatan,
        );
        $res = $this->profilmodel->InsertData('profil_tenaga_kependidikan', $data_insert);
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert("Berhasil! Data Berhasil Di input!");
            document.location.href = "../dashboard/profil";
            </script>
            <?php
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
        $where = array('id' => $id); //ini buat ngapus berdasarkan id
        $res = $this->profilmodel->DeleteData('profil_struktur_organisasi', $where);
        // ini buat manggil model sesuai yang mau kita hapus, 
        //kalo struktur ya berarti kita harus panggil model struktur okeh :)
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
        $this->load->view('main/footer');
    }

    public function insert_hubin()
    {
        $gambar     = $_POST['gambarPerusahaan'];
        $nama       = $_POST['namaPerusahaan'];
        $tentang    = $_POST['tentangPerusahaan'];
        
        $data_insert = array(
            'id' => '',
            'gambar' => $gambar,
            'nama_perusahaan' => $nama,
            'tentang_perusahaan' => $tentang,
        );
        $res = $this->profilmodel->InsertData('hubin_mitra_industri', $data_insert);
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert("Berhasil! Data Berhasil Di input!");
            document.location.href = "../dashboard/hubin";
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
        $upload        = $_POST['uploadAdministrasi'];
        $tanggal       = $_POST['tanggalAdministrasi'];
        $keterangan    = $_POST['keteranganAdministrasi'];
        
        $data_insert = array(
            'id' => '',
            'berkas_file' => $upload,
            'tanggal_upload' => $tanggal,
            'keterangan_berkas' => $keterangan,
        );
        $res = $this->kurikulummodel->InsertData('kurikulum_administrasi_guru', $data_insert);
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert("Berhasil! Data Berhasil Di input!");
            document.location.href = "../dashboard/kurikulum";
            </script>
            <?php
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
        $idAdministrasi = $_POST['idAdministrasi']; 
        $upload = $_POST['berkasAdministrasi'];
        $tanggal = $_POST['tanggalAdministrasi'];
        $keterangan = $_POST['keteranganAdministrasi'];
        
        $data_update = array(
            'id' => $idAdministrasi,
            'berkas_file' => $upload,
            'tanggal_upload' => $tanggal,
            'keterangan_berkas' => $keterangan,
        );
        $where = array('id' => $idAdministrasi);
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
        $upload        = $_POST['berkasPerpustakaan'];
        $tanggal       = $_POST['tanggalPerpustakaan'];
        $keterangan    = $_POST['keteranganPerpustakaan'];
        
        $data_insert = array(
            'id' => '',
            'berkas_file' => $upload,
            'tanggal_upload' => $tanggal,
            'keterangan_berkas' => $keterangan,
        );
        $res = $this->kurikulummodel->InsertData('kurikulum_perpustakaan_sekolah', $data_insert);
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert("Berhasil! Data Berhasil Di input!");
            document.location.href = "../dashboard/kurikulum";
            </script>
            <?php
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
        $upload = $_POST['berkasPerpustakaan'];
        $tanggal = $_POST['tanggalPerpustakaan'];
        $keterangan = $_POST['keteranganPerpustakaan'];
        
        $data_update = array(
            'id' => $idPerpustakaan,
            'berkas_file' => $upload,
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
        $jurusan = $this->kurikulummodel->get_kurikulum_jurusan(" where id='$id'");
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
        $upload = $_POST['berkasJurusan'];
        $keterangan = $_POST['keteranganJurusan'];
        
        $data_update = array(
            'id' => $idJurusan,
            'berkas_file' => $upload,
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
        $upload = $_POST['berkasJurusan'];
        $keterangan = $_POST['keteranganJurusan'];
        
        $data_update = array(
            'id' => $idJurusan,
            'berkas_file' => $upload,
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
        $upload = $_POST['berkasJurusan'];
        $keterangan = $_POST['keteranganJurusan'];
        
        $data_update = array(
            'id' => $idJurusan,
            'berkas_file' => $upload,
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
        $upload     = $_POST['uploadgambarekskul'];
        $tanggal       = $_POST['tanggalekskul'];
        $author        = $_POST['author'];
        $headline      = $_POST['healinelomba'];
        $keterangan    = $_POST['keteranganlomba'];
        
        $data_insert = array(
            'id' => '',
            'upload_gambar'  => $upload,
            'tanggal'        => $tanggal,
            'author'         => $author,
            'headline_lomba' => $headline,
            'keterangan_lomba'     => $keterangan,
        );
        $res = $this->kesiswaanmodel->InsertData('kesiswaan_ekskul_sekolah', $data_insert);
        if ($res >= 1) {
            ?>
            <script language="javascript">
            alert("Berhasil! Data Berhasil Di input!");
            document.location.href = "../dashboard/kesiswaan";
            </script>
            <?php
        }
    }

    public function edit_kesiswaan_ekskul($id)
    {
        $kesiswaan = $this->kesiswaanmodel->get_kesiswaan_ekskul_sekolah()(" where id='$id'");
        $data = array(
            "id" => $kesiswaan[0]->id,
            "upload_gambar" => $kesiswaan[0]->upload_gambar,
            "tanggal" => $kesiswaan[0]->tanggal,
            "author" => $kesiswaan[0]->author,
            "headline_lomba" => $kesiswaan[0]->headline_lomba,
            "keterangan" => $kesiswaan[0]->keterangan,
        );
        
        $data['headline'] = "Edit Pengembangan Diri";
        $data['title'] = "Form Master Edit Pengembangan Diri";
        $data['url'] = "dashboard/update_kesiswaan";
        
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
        $idAdministrasi = $_POST['idAdministrasi']; 
        $upload = $_POST['berkasAdministrasi'];
        $tanggal = $_POST['tanggalAdministrasi'];
        $keterangan = $_POST['keteranganAdministrasi'];
        
        $data_update = array(
            'id' => $idAdministrasi,
            'berkas_file' => $upload,
            'tanggal_upload' => $tanggal,
            'keterangan_berkas' => $keterangan,
        );
        $where = array('id' => $idAdministrasi);
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
    
}