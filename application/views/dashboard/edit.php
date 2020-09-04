<div id="content">
    <div class="col-md-12" style="padding:20px;">
        <div class="col-md-12 padding-0">
            <div class="col-md-12 padding-0">
                <div class="panel-body form-element-padding">
                    <div class="col-md-12 panel-heading">
                        <h3 class="animated fadeInLeft">Master Edit Profil Sekolah</h3>
                        <p class="animated fadeInDown">
                            Dashboard <span class="fa-angle-right fa"></span> Profil Sekolah <span class="fa-angle-right fa"></span> <?= $headline; ?>
                        </p>
                    </div>
                </div>
                <!-- Form Kedua -->
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12">
                            <div class="panel form-element-padding">
                                <div class="panel-heading">
                                    <h4><?= $title; ?></h4>
                                </div>
                                <div class="panel-body" style="padding-bottom:30px;">
                                    <!-- Tabel Input Struktur -->
                                    <form method="POST" action="<?= base_url() . $url; ?>">
                                        <div class="form-element">
                                            <div class="col-md-12 padding-0">
                                                <div class="col-md-12">
                                                    <div class=" form-element-padding">
                                                        <div class="panel-body" style="padding-bottom:30px;">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Id</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="idStruktur" value="<?= $id; ?>" autocomplete="off" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">NIP</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="nipStruktur" value="<?= $nip; ?>" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Nama</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="namaStruktur" value="<?= $nama_pendidik; ?>" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Tempat Lahir</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="tempatLahirStruktur" value="<?= $tempat_lahir; ?>" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Tanggal Lahir</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="date" class="form-control" name="tanggalLahirStruktur" value="<?= $tanggal_lahir; ?>" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Jenis
                                                                        Kelamin</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="col-sm-12 padding-0">
                                                                            <input type="radio" name="jenis_kelamin" value="L" <?php if ($jenis_kelamin == "Laki - laki") echo "checked"; ?>> Laki - laki
                                                                        </div>
                                                                        <div class="col-sm-12 padding-0">
                                                                            <input type="radio" name="jenis_kelamin" value="P" <?php if ($jenis_kelamin == "Perempuan") echo "checked"; ?>> Perempuan
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Jabatan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="jabatanStruktur" value="<?= $jabatan; ?>" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class=" panel-body">
                                                                <div class="col-md-12">
                                                                    <br>
                                                                    <button class="btn ripple btn-3d btn-primary form-control">
                                                                        <div>
                                                                            <span>Edit</span>
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
            </div>
        </div>
    </div>
</div>