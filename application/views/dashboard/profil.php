<div id="content">
    <div class="col-md-12" style="padding:20px;">
        <div class="col-md-12 padding-0">
            <div class="col-md-12 padding-0">
                <div class="panel-body form-element-padding">
                    <div class="col-md-12 panel-heading">
                        <h3 class="animated fadeInLeft">Master Profil Sekolah</h3>
                        <p class="animated fadeInDown">
                            Dashboard <span class="fa-angle-right fa"></span> Profil Sekolah
                        </p>
                    </div>
                </div>

                <!-- Form Pertama -->
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12">
                            <div class="panel form-element-padding">
                                <div class="panel-heading">
                                    <h4>Form Master Identitas Sekolah</h4>
                                </div>

                                <?= form_open_multipart('dashboard/insert_identitas'); ?>
                                    <div class="panel-body" style="padding-bottom:30px;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?= $this->session->flashdata('messageidentitas'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Upload Gambar</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="file_gambar">
                                                    <?= form_error('file_gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Sejarah Sekolah</label>
                                                <div class="col-sm-10" style="margin-top:10px;">
                                                    <textarea name="sejarah_sekolah" rows="10" cols="20" class="form-control" autocomplete="off"></textarea>
                                                    <?= form_error('sejarah_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Visi</label>
                                                <div class="col-sm-10" style="margin-top:10px;">
                                                    <textarea name="visi" rows="10" cols="30" class="form-control" autocomplete="off"></textarea>
                                                    <?= form_error('visi', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Misi</label>
                                                <div class="col-sm-10" style="margin-top:10px;">
                                                    <textarea name="misi" rows="10" cols="30" class="form-control" autocomplete="off"></textarea>
                                                    <?= form_error('misi', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12" style="margin-top:30px;">
                                                <button type="submit" name="btnSubmit" value="Simpan" class="btn ripple btn-3d btn-primary form-control">
                                                    <div>
                                                        <span>Submit</span>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <!-- </form> -->
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Pertama -->

                <!-- Form Kedua -->
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12">
                            <div class="panel form-element-padding">
                                <div class="panel-heading">
                                    <h4>Form Master Struktur Organisasi</h4>
                                </div>
                                <div class="panel-body" style="padding-bottom:30px;">
                                    <div class="col-md-12">
                                        <div class="col-md-12 top-20 padding-0">
                                            <div class="col-md-12">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="responsive-table">
                                                            <?= $this->session->flashdata('messagestruktur'); ?>
                                                            <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No</th>
                                                                        <th class="text-center">Nama</th>
                                                                        <th class="text-center">Tempat Lahir</th>
                                                                        <th class="text-center">Tanggal Lahir</th>
                                                                        <th class="text-center">Jenis Kelamin</th>
                                                                        <th class="text-center">NIP</th>
                                                                        <th class="text-center">Jabatan</th>
                                                                        <th class="text-center">AKSI</th>
                                                                    </tr>
                                                                    </th>
                                                                <tbody class="text-center">
                                                                    <?php
                                                                    $id = 1;
                                                                    foreach ($data_struktur as $struktur) { ?>
                                                                        <tr>
                                                                            <td><?= $id++; ?></td>
                                                                            <td><?= $struktur->nama_pendidik; ?></td>
                                                                            <td><?= $struktur->tempat_lahir; ?></td>
                                                                            <td><?= $struktur->tanggal_lahir; ?></td>
                                                                            <td><?= $struktur->jenis_kelamin; ?></td>
                                                                            <td><?= $struktur->nip; ?></td>
                                                                            <td><?= $struktur->jabatan; ?></td>
                                                                            <td>
                                                                                <div class="col-md-6">
                                                                                    <a class="submit btn btn-success" href="<?= "../dashboard/edit_struktur/" . $struktur->id; ?>">Edit </a>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <a onclick="return confirm('Yakin Kamu Mau Hapus?')" href="<?= "../dashboard/hapus_struktur/" . $struktur->id; ?>" class="submit btn btn-danger">Hapus </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tabel Input Struktur -->
                                    <form method="POST" action="<?= base_url() . "dashboard/insert_struktur"; ?>">
                                        <div class="form-element">
                                            <div class="col-md-12 padding-0">
                                                <div class="col-md-12">
                                                    <div class=" form-element-padding">
                                                        <div class="panel-body" style="padding-bottom:30px;">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">NIP</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="nipStruktur" autocomplete="off">
                                                                        <?= form_error('nipStruktur', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Nama</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="namaStruktur" autocomplete="off">
                                                                        <?= form_error('namaStruktur', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Tempat Lahir</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="tempatLahirStruktur" autocomplete="off">
                                                                        <?= form_error('tempatLahirStruktur', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Tanggal Lahir</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="date" class="form-control" name="tanggalLahirStruktur" autocomplete="off">
                                                                        <?= form_error('tanggalLahirStruktur', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Jenis
                                                                        Kelamin</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="col-sm-12 padding-0">
                                                                            <input type="radio" name="jeniskelaminStruktur" value="L" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "L") echo "checked"; ?>> Laki - laki
                                                                        </div>
                                                                        <div class="col-sm-12 padding-0">
                                                                            <input type="radio" name="jeniskelaminStruktur" value="P" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "P") echo "checked"; ?>> Perempuan
                                                                        </div>
                                                                        <?= form_error('jeniskelaminStruktur', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Jabatan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="jabatanStruktur" autocomplete="off">
                                                                        <?= form_error('jabatanStruktur', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="col-md-12">
                                                                    <br>
                                                                    <button class="btn ripple btn-3d btn-primary form-control">
                                                                        <div>
                                                                            <span>Submit</span>
                                                                        </div>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- Tabel Input Struktur -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Kedua -->

                <!-- Form Ketiga -->
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12">
                            <div class="panel form-element-padding">
                                <div class="panel-heading">
                                    <h4>Form Master Tenaga Pendidik</h4>
                                </div>
                                <div class="panel-body" style="padding-bottom:30px;">
                                    <div class="col-md-12">
                                        <div class="col-md-12 top-20 padding-0">
                                            <div class="col-md-12">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="responsive-table">
                                                            <?= $this->session->flashdata('messagependidik'); ?>
                                                            <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No</th>
                                                                        <th class="text-center">Nama</th>
                                                                        <th class="text-center">Tempat Lahir</th>
                                                                        <th class="text-center">Tanggal Lahir</th>
                                                                        <th class="text-center">Jenis Kelamin</th>
                                                                        <th class="text-center">NIP</th>
                                                                        <th class="text-center">Jabatan</th>
                                                                        <th class="text-center">AKSI</th>
                                                                    </tr>
                                                                    </th>
                                                                <tbody class="text-center">
                                                                    <?php
                                                                    $no = 1;
                                                                    foreach ($data_pendidik as $pendidik) { ?>
                                                                        <tr>
                                                                            <td>
                                                                                <?= $no++; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $pendidik->nama_pendidik; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $pendidik->tempat_lahir; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $pendidik->tanggal_lahir; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $pendidik->jenis_kelamin; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $pendidik->nip; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $pendidik->jabatan; ?>
                                                                            </td>
                                                                            <td>
                                                                                <div class="col-md-6">
                                                                                    <a class="submit btn btn-success" href="<?= "../dashboard/edit_pendidik/" . $pendidik->id; ?>">Edit </a>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <a class="submit btn btn-danger" onclick="return confirm('Yakin Kamu Mau Hapus?')" href="<?= "../dashboard/hapus_pendidik/" . $pendidik->id; ?>">Hapus </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tabel Input Pendidik -->
                                    <form method="POST" action="<?= base_url() . "dashboard/insert_pendidik"; ?>">
                                        <div class="form-element">
                                            <div class="col-md-12 padding-0">
                                                <div class="col-md-12">
                                                    <div class=" form-element-padding">
                                                        <div class="panel-body" style="padding-bottom:30px;">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">NIP</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="nipPendidik" autocomplete="off">
                                                                        <?= form_error('nipPendidik', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Nama</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="namaPendidik" autocomplete="off">
                                                                        <?= form_error('namaPendidik', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Tempat
                                                                        Lahir</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="tempatLahirPendidik" autocomplete="off">
                                                                        <?= form_error('tempatLahirPendidik', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Tanggal
                                                                        Lahir</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="date" class="form-control" name="tanggalLahirPendidik" autocomplete="off">
                                                                        <?= form_error('tanggalLahirPendidik', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Jenis
                                                                        Kelamin</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="col-sm-12 padding-0">
                                                                            <input type="radio" name="jenisKelaminPendidik" value="L" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "L") echo "checked"; ?>> Laki - laki
                                                                        </div>
                                                                        <div class="col-sm-12 padding-0">
                                                                            <input type="radio" name="jenisKelaminPendidik" value="P" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "P") echo "checked"; ?>> Perempuan
                                                                        </div>
                                                                        <?= form_error('jenisKelaminPendidik', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Jabatan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="jabatanPendidik" autocomplete="off">
                                                                        <?= form_error('jabatanPendidik', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="col-md-12">
                                                                    <br>
                                                                    <button class="btn ripple btn-3d btn-primary form-control">
                                                                        <div>
                                                                            <span>Submit</span>
                                                                        </div>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- Tabel Input Pendidik -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Ketiga -->

                <!-- Form Keempat -->
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12">
                            <div class="panel form-element-padding">
                                <div class="panel-heading">
                                    <h4>Form Master Tenaga Kependidikan</h4>
                                </div>
                                <div class="panel-body" style="padding-bottom:30px;">
                                    <div class="col-md-12">
                                        <div class="col-md-12 top-20 padding-0">
                                            <div class="col-md-12">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="responsive-table">
                                                            <?= $this->session->flashdata('messagekependidikan'); ?>
                                                            <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No</th>
                                                                        <th class="text-center">Nama</th>
                                                                        <th class="text-center">Tempat Lahir</th>
                                                                        <th class="text-center">Tanggal Lahir</th>
                                                                        <th class="text-center">Jenis Kelamin</th>
                                                                        <th class="text-center">NIP</th>
                                                                        <th class="text-center">Jabatan</th>
                                                                        <th class="text-center">AKSI</th>
                                                                    </tr>
                                                                    </th>
                                                                <tbody class="text-center">
                                                                    <?php
                                                                    $no = 1;
                                                                    foreach ($data_kependidikan as $kependidikan) { ?>
                                                                        <tr>
                                                                            <td><?= $no++; ?></td>
                                                                            <td><?= $kependidikan->nama_pendidik; ?></td>
                                                                            <td><?= $kependidikan->tempat_lahir; ?></td>
                                                                            <td><?= $kependidikan->tanggal_lahir; ?></td>
                                                                            <td><?= $kependidikan->jenis_kelamin; ?></td>
                                                                            <td><?= $kependidikan->nip; ?></td>
                                                                            <td><?= $kependidikan->jabatan; ?></td>
                                                                            <td>
                                                                                <div class="col-md-6">
                                                                                    <a class="submit btn btn-success" href="<?= "../dashboard/edit_kependidikan/" . $kependidikan->id; ?>">Edit </a>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <a class="submit btn btn-danger" onclick="return confirm('Yakin Kamu Mau Hapus?')" href="<?= "../dashboard/hapus_kependidikan/" . $kependidikan->id; ?>">Hapus </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tabel Input Kependidikan -->
                                    <form method="POST" action="<?= base_url() . "dashboard/insert_kependidikan"; ?>">
                                        <div class="form-element">
                                            <div class="col-md-12 padding-0">
                                                <div class="col-md-12">
                                                    <div class=" form-element-padding">
                                                        <div class="panel-body" style="padding-bottom:30px;">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">NIP</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="nipKependidikan" autocomplete="off">
                                                                        <?= form_error('nipKependidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Nama</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="namaKependidikan" autocomplete="off">
                                                                        <?= form_error('namaKependidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Tempat
                                                                        Lahir</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="tempatLahirKependidikan" autocomplete="off">
                                                                        <?= form_error('tempatLahirKependidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Tanggal
                                                                        Lahir</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="date" class="form-control" name="tanggalLahirKependidikan" autocomplete="off">
                                                                        <?= form_error('tanggalLahirKependidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Jenis
                                                                        Kelamin</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="col-sm-12 padding-0">
                                                                            <input type="radio" name="jenisKelaminKependidikan" value="L" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "L") echo "checked"; ?>> Laki - laki
                                                                        </div>
                                                                        <div class="col-sm-12 padding-0">
                                                                            <input type="radio" name="jenisKelaminKependidikan" value="P" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "P") echo "checked"; ?>> Perempuan
                                                                        </div>
                                                                        <?= form_error('jenisKelaminKependidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Jabatan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="jabatanKependidikan" autocomplete="off">
                                                                        <?= form_error('jabatanKependidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="col-md-12">
                                                                    <br>
                                                                    <button class="btn ripple btn-3d btn-primary form-control">
                                                                        <div>
                                                                            <span>Submit</span>
                                                                        </div>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- Tabel Input Kependidikan -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Keempat -->
            </div>
        </div>
    </div>
</div>