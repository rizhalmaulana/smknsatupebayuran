<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('profilmodel');
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

    public function hubin()
    {
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

    public function kurikulum()
    {
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

    public function kesiswaan()
    {
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
        $this->load->view('dashboard/edit', $data);
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
        $this->load->view('dashboard/edit', $data);
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
        $this->load->view('dashboard/edit', $data);
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
}
