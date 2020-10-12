<div id="content">
    <div class="col-md-12" style="padding:20px;">
        <div class="col-md-12 padding-0">
            <div class="col-md-12 padding-0">
                <div class="panel-body form-element-padding">
                    <div class="col-md-12 panel-heading">
                        <h3 class="animated fadeInLeft">Master Edit Jurusan</h3>
                        <p class="animated fadeInDown">
                            Dashboard <span class="fa-angle-right fa"></span> Kurikulum <span
                                class="fa-angle-right fa"></span> <?= $headline; ?>
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
                                                                    <label
                                                                        class="col-sm-2 control-label text-right">Id</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="idJurusan" value="<?= $id; ?>" autocomplete="off" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        class="col-sm-2 control-label text-right">Logo Jurusan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="file" class="form-control" name="berkasJurusan" value="<?= $berkas_file; ?>" autocomplete="off">
                                                                        <label class="control-label">*Ukuran Maksimal 2MB *jpeg/jpg/png </label>
                                                                        <?= form_error('berkasJurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        class="col-sm-2 control-label text-right">Keterangan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="keteranganJurusan" value="<?= $keterangan_berkas; ?>" autocomplete="off">
                                                                        <?= form_error('keteranganJurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class=" panel-body">
                                                                    <div class="col-md-12">
                                                                        <br>
                                                                        <button
                                                                            class="btn ripple btn-3d btn-primary form-control">
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