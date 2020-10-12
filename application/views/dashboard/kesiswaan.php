<div id="content">
    <div class="col-md-12" style="padding:20px;">
        <div class="col-md-12 padding-0">
            <div class="col-md-12 padding-0">
                <div class="panel-body form-element-padding">
                    <div class="col-md-12 panel-heading">
                        <h3 class="animated fadeInLeft">Master Kesiswaan</h3>
                        <p class="animated fadeInDown">
                            Dashboard <span class="fa-angle-right fa"></span> Kesiswaan
                        </p>
                    </div>
                </div>

                <!-- Form Pertama -->
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12">
                            <div class="panel form-element-padding">
                                <div class="panel-heading">
                                    <h4>Form Master Pengembangan Diri</h4>
                                </div>
                                <!-- tabel -->
                                <div class="col-md-12">
                                    <div class="col-md-12 top-20 padding-0">
                                        <div class="col-md-12">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <div class="responsive-table">
                                                    <?= $this->session->flashdata('messageekskul'); ?>
                                                    <?= $this->session->flashdata('messageeditekskul'); ?>
                                                        <table id="datatables-example"
                                                            class="table table-striped table-bordered" width="100%"
                                                            cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">No</th>
                                                                    <th class="text-center">Upload Gambar</th>
                                                                    <th class="text-center">Tanggal</th>
                                                                    <th class="text-center">Author</th>
                                                                    <th class="text-center">Nama Ekskul</th>
                                                                    <th class="text-center">Keterangan Ekskul</th>
                                                                    <th class="text-center">AKSI</th>
                                                                </tr>
                                                                </th>
                                                            <tbody class="text-center">
                                                                <?php
                                                                $id = 1;
                                                                $num_char = 100;
                                                                foreach ($data_kesiswaan_ekskul as $kesiswaan) { ?>
                                                                <tr>
                                                                    <td><?= $id++; ?></td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <img src="<?= base_url() ?>assets/upload/kesiswaan/<?= $kesiswaan->upload_gambar; ?>" style="width: 80px; 100px" alt="Image" class="img-fluid">
                                                                        </div>
                                                                    </td>
                                                                    <td><?= $kesiswaan->tanggal; ?></td>
                                                                    <td><?= $kesiswaan->author; ?></td>
                                                                    <td><?= $kesiswaan->headline_lomba; ?></td>
                                                                    <td><?= substr($kesiswaan->keterangan_lomba, 0, $num_char) . '...'; ?></td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <a class="submit btn btn-success" href="<?= "../dashboard/edit_kesiswaan_ekskul/" . $kesiswaan->id; ?>">Edit</a>
                                                                            <a onclick="return confirm('Yakin Kamu Mau Hapus?')" class="submit btn btn-danger" href="<?= "../dashboard/hapus_kesiswaan_ekskul/" . $kesiswaan->id; ?>">Hapus</a>
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
                                <!-- tabel -->
                                <?= form_open_multipart('dashboard/insert_kesiswaan_ekskul'); ?>
                                <div class="panel-body" style="padding-bottom:30px;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label text-right">Upload Gambar</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="uploadgambarekskul"> 
                                                <label class="control-label">*Ukuran Maksimal  2MB *jpeg/jpg/png </label>
                                                <?= form_error('uploadgambarekskul', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label text-right">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tanggalekskul">
                                                <?= form_error('tanggalekskul', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label text-right">Pembina</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="author" autocomplete="off" placeholder="admin / pembina ekskul">
                                                <?= form_error('author', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label text-right">Nama Ekskul</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="headlinelomba" autocomplete="off" placeholder="Nama ekskul">
                                                <?= form_error('headlinelomba', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label text-right">Keterangan Ekskul</label>
                                            <div class="col-sm-10">
                                                <textarea name="keteranganlomba" rows="10" cols="30" class="form-control"></textarea>
                                                <?= form_error('keteranganlomba', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Pertama -->
            </div>
        </div>
    </div>
</div>