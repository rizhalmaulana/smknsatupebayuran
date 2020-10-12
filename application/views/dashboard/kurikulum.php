<div id="content">
    <div class="col-md-12" style="padding:20px;">
        <div class="col-md-12 padding-0">
            <div class="col-md-12 padding-0">
                <div class="panel-body form-element-padding">
                    <div class="col-md-12 panel-heading">
                        <h3 class="animated fadeInLeft">Master Kurikulum Sekolah</h3>
                        <p class="animated fadeInDown">
                            Dashboard <span class="fa-angle-right fa"></span> Kurikulum Sekolah
                        </p>
                    </div>
                </div>

                <!-- Form Pertama -->
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12">
                            <div class="panel form-element-padding">
                                <div class="panel-heading">
                                    <h4>Form Master Administrasi Guru</h4>
                                </div>
                                <!-- tabel -->
                                <div class="col-md-12">
                                    <div class="col-md-12 top-20 padding-0">
                                        <div class="col-md-12">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <div class="responsive-table">
                                                    <?= $this->session->flashdata('messageadministrasi'); ?>
                                                        <table id="datatables-example"
                                                            class="table table-striped table-bordered" width="100%"
                                                            cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">No</th>
                                                                    <th class="text-center">Berkas File</th>
                                                                    <th class="text-center">Tanggal Upload</th>
                                                                    <th class="text-center">Keterangan Berkas</th>
                                                                    <th class="text-center">AKSI</th>
                                                                </tr>
                                                                </th>
                                                            <tbody class="text-center">
                                                                <?php
                                                                $id = 1;
                                                                $num_char = 100; 
                                                                foreach ($data_kurikulum_administrasi as $kurikulum) { ?>
                                                                <tr>
                                                                    <td><?= $id++; ?></td>
                                                                    <td><a target="blank" href="<?= base_url() ?>assets/upload/kurikulum/administrasi/<?= $kurikulum->berkas_file; ?>"><?= $kurikulum->berkas_file; ?></a></td>
                                                                    <td><?= $kurikulum->tanggal_upload; ?></td>
                                                                    <td><?= substr($kurikulum->keterangan_berkas, 0, $num_char) . '...'; ?></td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <a class="submit btn btn-success" href="<?= "../dashboard/edit_kurikulum_administrasi/" . $kurikulum->id; ?>">Edit</a>
                                                                            <a class="submit btn btn-danger" onclick="return confirm('Yakin Kamu Mau Hapus?')" href="<?= "../dashboard/hapus_kurikulum_administrasi/" . $kurikulum->id; ?>">Hapus</a>
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
                                <?= form_open_multipart('dashboard/insert_kurikulum_administrasi'); ?>
                                    <div class="panel-body" style="padding-bottom:30px;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Upload Berkas File</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="uploadAdministrasi">
                                                    <label class="control-label">*Ukuran Maksimal  2MB *pdf/doc/docx/xls </label>
                                                    <?= form_error('uploadAdministrasi', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Tanggal</label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" name="tanggalAdministrasi">
                                                    <?= form_error('tanggalAdministrasi', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Keterangan Berkas</label>
                                                <div class="col-sm-10">
                                                    <textarea name="keteranganAdministrasi" rows="10" cols="30" class="form-control"></textarea>
                                                    <?= form_error('keteranganAdministrasi', '<small class="text-danger pl-3">', '</small>'); ?>
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

                <!-- Form Kedua -->
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12">
                            <div class="panel form-element-padding">
                                <div class="panel-heading">
                                    <h4>Form Master Perpustakaan Sekolah</h4>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12 top-20 padding-0">
                                        <div class="col-md-12">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <div class="responsive-table">
                                                    <?= $this->session->flashdata('messageperpustakaan'); ?>
                                                        <table id="datatables-example"
                                                            class="table table-striped table-bordered" width="100%"
                                                            cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">No</th>
                                                                    <th class="text-center">Berkas File</th>
                                                                    <th class="text-center">Tanggal Upload</th>
                                                                    <th class="text-center">Keterangan Berkas</th>
                                                                    <th class="text-center">AKSI</th>
                                                                </tr>
                                                                </th>
                                                            <tbody class="text-center">
                                                            <?php
                                                                $id = 1;
                                                                $num_char = 100; 
                                                                foreach ($data_kurikulum_perpustakaan as $perpustakaan) { ?>
                                                                <tr>
                                                                    <td><?= $id++; ?></td>
                                                                    <td><a target="blank" href="<?= base_url() ?>assets/upload/kurikulum/perpustakaan/<?= $perpustakaan->berkas_file; ?>"><?= $perpustakaan->berkas_file; ?></a></td>
                                                                    <td><?= $perpustakaan->tanggal_upload; ?></td>
                                                                    <td><?= substr($perpustakaan->keterangan_berkas, 0, $num_char) . '...'; ?></td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <a class="submit btn btn-success" href="<?= "../dashboard/edit_kurikulum_perpustakaan/" . $perpustakaan->id; ?>">Edit</a>
                                                                            <a onclick="return confirm('Yakin Kamu Mau Hapus?')" class="submit btn btn-danger" href="<?= "../dashboard/hapus_kurikulum_perpustakaan/" . $perpustakaan->id; ?>">Hapus</a>
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
                                <?= form_open_multipart('dashboard/insert_kurikulum_perpustakaan'); ?>
                                <div class="panel-body" style="padding-bottom:30px;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label text-right">Upload Berkas File</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="berkasPerpustakaan">
                                                <label class="control-label">*Ukuran Maksimal 2MB *pdf/doc/docx/xls </label>
                                                <?= form_error('berkasPerpustakaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label text-right">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tanggalPerpustakaan">
                                                <?= form_error('tanggalPerpustakaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label text-right">Keterangan Berkas</label>
                                            <div class="col-sm-10">
                                                <textarea name="keteranganPerpustakaan" rows="10" cols="30" class="form-control"></textarea>
                                                <?= form_error('keteranganPerpustakaan', '<small class="text-danger pl-3">', '</small>'); ?>
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
                <!-- Form Kedua -->

                <!-- Form Ketiga -->
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12">
                            <div class="panel form-element-padding">
                                <div class="panel-heading">
                                    <h4>Form Master Jurusan Teknik Elektronika Industri</h4>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12 top-20 padding-0">
                                        <div class="col-md-12">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <div class="responsive-table">
                                                        <table id="datatables-example"
                                                            class="table table-striped table-bordered" width="100%"
                                                            cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">No</th>
                                                                    <th class="text-center">Logo Jurusan</th>
                                                                    <th class="text-center">Tentang Jurusan</th>
                                                                    <th class="text-center">AKSI</th>
                                                                </tr>
                                                                </th>
                                                            <tbody class="text-center">
                                                            <?php
                                                                $id = 1;
                                                                foreach ($data_kurikulum_jurusan_tei as $jurusan) { ?>
                                                                <tr>
                                                                    <td><?= $id++; ?></td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <img src="<?= base_url() ?>assets/upload/kurikulum/tei/<?= $jurusan->berkas_file; ?>" style="width: 80px; 100px" alt="Image" class="img-fluid">
                                                                        </div>
                                                                    </td>
                                                                    <td><?= $jurusan->keterangan_berkas; ?></td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <a class="submit btn btn-success"
                                                                                href="<?= "../dashboard/edit_kurikulum_jurusan_tei/" . $jurusan->id; ?>">Edit
                                                                            </a>
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
                                <div class="panel-body" style="padding-bottom:30px;">
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
                                    <h4>Form Master Jurusan Teknik Ototronik</h4>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12 top-20 padding-0">
                                        <div class="col-md-12">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <div class="responsive-table">
                                                        <table id="datatables-example"
                                                            class="table table-striped table-bordered" width="100%"
                                                            cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">No</th>
                                                                    <th class="text-center">Logo Jurusan</th>
                                                                    <th class="text-center">Tentang Jurusan</th>
                                                                    <th class="text-center">AKSI</th>
                                                                </tr>
                                                                </th>
                                                            <tbody class="text-center">
                                                            <?php
                                                                $id = 1;
                                                                foreach ($data_kurikulum_jurusan_to as $jurusan) { ?>
                                                                <tr>
                                                                    <td><?= $id++; ?></td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <img src="<?= base_url() ?>assets/upload/kurikulum/to/<?= $jurusan->berkas_file; ?>" style="width: 80px; 100px" alt="Image" class="img-fluid">
                                                                        </div>
                                                                    </td>
                                                                    <td><?= $jurusan->keterangan_berkas; ?></td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <a class="submit btn btn-success"
                                                                                href="<?= "../dashboard/edit_kurikulum_jurusan_to/" . $jurusan->id; ?>">Edit
                                                                            </a>
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
                                <div class="panel-body" style="padding-bottom:30px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Keempat -->

                <!-- Form Kelima -->
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12">
                            <div class="panel form-element-padding">
                                <div class="panel-heading">
                                    <h4>Form Master Jurusan Teknik Komputer dan Jaringan</h4>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12 top-20 padding-0">
                                        <div class="col-md-12">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <div class="responsive-table">
                                                        <table id="datatables-example"
                                                            class="table table-striped table-bordered" width="100%"
                                                            cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">No</th>
                                                                    <th class="text-center">Logo Jurusan</th>
                                                                    <th class="text-center">Tentang Jurusan</th>
                                                                    <th class="text-center">AKSI</th>
                                                                </tr>
                                                                </th>
                                                            <tbody class="text-center">
                                                            <?php
                                                                $id = 1;
                                                                foreach ($data_kurikulum_jurusan_tkj as $jurusan) { ?>
                                                                <tr>
                                                                    <td><?= $id++; ?></td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <img src="<?= base_url() ?>assets/upload/kurikulum/tkj/<?= $jurusan->berkas_file; ?>" style="width: 80px; 100px" alt="Image" class="img-fluid">
                                                                        </div>
                                                                    </td>
                                                                    <td><?= $jurusan->keterangan_berkas; ?></td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <a class="submit btn btn-success"
                                                                                href="<?= "../dashboard/edit_kurikulum_jurusan_tkj/" . $jurusan->id; ?>">Edit
                                                                            </a>
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
                                <div class="panel-body" style="padding-bottom:30px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Kelima -->
            </div>
        </div>
    </div>
</div>