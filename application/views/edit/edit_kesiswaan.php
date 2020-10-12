<div id="content">
    <div class="col-md-12" style="padding:20px;">
        <div class="col-md-12 padding-0">
            <div class="col-md-12 padding-0">
                <div class="panel-body form-element-padding">
                    <div class="col-md-12 panel-heading">
                        <h3 class="animated fadeInLeft">Master Edit Pengembangan Diri</h3>
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
                                                                    <label class="col-sm-2 control-label text-right">Id</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="idEkskul" value="<?= $id; ?>" autocomplete="off" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Upload Gambar</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="file" class="form-control" name="edituploadgambarekskul" value="<?= $upload_gambar; ?>" autocomplete="off">
                                                                        <label class="control-label">*Ukuran Maksimal  2MB *jpeg/jpg/png </label>
                                                                        <?= form_error('edituploadgambarekskul', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Tanggal</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="date" class="form-control" name="edittanggalEkskul" value="<?= $tanggal; ?>" autocomplete="off">
                                                                        <?= form_error('edittanggalEkskul', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Author</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="editauthor" value="<?= $author; ?>" autocomplete="off">
                                                                        <?= form_error('editauthor', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Headline</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="editheadline" value="<?= $headline_lomba; ?>" autocomplete="off">
                                                                        <?= form_error('editheadline', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label text-right">Keterangan</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea type="text" rows="10" cols="30" class="form-control" name="editketeranganEkskul" autocomplete="off"><?= $keterangan_lomba; ?></textarea>
                                                                        <?= form_error('editketeranganEkskul', '<small class="text-danger pl-3">', '</small>'); ?>
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