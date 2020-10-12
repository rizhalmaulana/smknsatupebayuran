<div id="content">
    <div class="col-md-12" style="padding:20px;">
        <div class="col-md-12 padding-0">
            <div class="col-md-12 padding-0">
                <div class="panel-body form-element-padding">
                    <div class="col-md-12 panel-heading">
                        <h3 class="animated fadeInLeft">Master Hubungan Industri dan Masyarakat</h3>
                        <p class="animated fadeInDown">
                            Dashboard <span class="fa-angle-right fa"></span> Hubin
                        </p>
                    </div>
                </div>

                <!-- Form Pertama -->
                    <div class="form-element">
                        <div class="col-md-12 padding-0">
                            <div class="col-md-12">
                                <div class="panel form-element-padding">
                                    <div class="panel-heading">
                                        <h4>Form Daftar Mitra Industri Sekolah</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12 top-20 padding-0">
                                            <div class="col-md-12">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="responsive-table">
                                                            <?= $this->session->flashdata('messagehubin'); ?>
                                                            <table id="datatables-example"
                                                                class="table table-striped table-bordered" width="100%"
                                                                cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No</th>
                                                                        <th class="text-center">Foto Perusahaan</th>
                                                                        <th class="text-center">Nama Perusahaan</th>
                                                                        <th class="text-center">Tentang Perusahaan</th>
                                                                        <th class="text-center">AKSI</th>
                                                                    </tr>
                                                                    </th>
                                                                <tbody class="text-center">
                                                                    <?php
                                                                    $id = 1;
                                                                    $num_char = 100; 
                                                                    foreach ($data_hubin_mitra as $hubin) { ?>
                                                                    <tr>
                                                                        <td><?= $id++; ?></td>
                                                                        <td>
                                                                            <div class="col-md-12">
                                                                                <img src="<?= base_url() ?>assets/upload/hubin/<?= $hubin->gambar; ?>" style="width: 80px; 100px" alt="Image" class="img-fluid">
                                                                            </div>
                                                                        </td>
                                                                        <td><?= $hubin->nama_perusahaan; ?></td>
                                                                        <td><?= substr($hubin->tentang_perusahaan, 0, $num_char) . '...'; ?></td>
                                                                        <td>
                                                                            <div class="col-md-6">
                                                                                <a class="submit btn btn-success" href="<?= "../dashboard/edit_hubin/" . $hubin->id; ?>">Edit</a>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <a onclick="return confirm('Yakin Kamu Mau Hapus?')" href="<?= "../dashboard/hapus_hubin/" . $hubin->id; ?>" class="submit btn btn-danger">Hapus</a>
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
                                    <?= form_open_multipart('dashboard/insert_hubin'); ?>
                                    <div class="panel-body" style="padding-bottom:30px;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Upload Gambar</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="gambarPerusahaan" autocomplete="off">
                                                    <label class="control-label">*Ukuran Maksimal  2MB *jpeg/jpg/png </label>
                                                    <?= form_error('gambarPerusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Nama Perusahaan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Nama perusahaan terkait" name="namaPerusahaan" autocomplete="off">
                                                    <?= form_error('namaPerusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Tentang Perusahaan</label>
                                                <div class="col-sm-10">
                                                    <textarea name="tentangPerusahaan" rows="10" cols="30" class="form-control"></textarea>
                                                    <?= form_error('tentangPerusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
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