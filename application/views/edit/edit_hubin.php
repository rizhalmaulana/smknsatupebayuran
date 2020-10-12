<div id="content">
    <div class="col-md-12" style="padding:20px;">
        <div class="col-md-12 padding-0">
            <div class="col-md-12 padding-0">
                <div class="panel-body form-element-padding">
                    <div class="col-md-12 panel-heading">
                        <h3 class="animated fadeInLeft">Master Edit Hubin Sekolah</h3>
                        <p class="animated fadeInDown">
                            Dashboard <span class="fa-angle-right fa"></span> Hubin Sekolah <span class="fa-angle-right fa"></span> <?= $headline; ?>
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
                                    <?= form_open_multipart($url); ?>
                                        <div class="form-element">
                                            <div class="col-md-12 padding-0">
                                                <div class="col-md-12">
                                                    <div class=" form-element-padding">
                                                        <div class="panel-body" style="padding-bottom:30px;">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Id</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="idHubin" value="<?= $id; ?>" autocomplete="off" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Gambar</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="file" class="form-control" name="gambarHubin" value="<?= $gambar; ?>" autocomplete="off">
                                                                        <label class="control-label">*Ukuran Maksimal  2MB *jpeg/jpg/png </label>
                                                                        <?= form_error('gambarHubin', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Nama Perusahaan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="namaHubin" value="<?= $nama_perusahaan; ?>" autocomplete="off">
                                                                        <?= form_error('namaHubin', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Tentang Perusahaan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="tentangHubin" value="<?= $tentang_perusahaan; ?>" autocomplete="off">
                                                                        <?= form_error('tentangHubin', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                    <?= form_close(); ?>
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