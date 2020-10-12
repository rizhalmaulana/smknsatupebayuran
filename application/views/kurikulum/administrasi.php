<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
    style="background-image: url('assets/images/bg1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Administrasi Guru SMK Negeri 1 Pebayuran</h2>
            </div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="responsive-table">
                                <table id="datatables-example" class="table table-striped table-bordered" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Berkas Administrasi</th>
                                            <th>Tanggal Upload</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $id = 1;
                                        foreach ($dataadministrasi as $datas) { ?>
                                        <tr class="text-center">
                                            <td><?= $id++; ?></td>
                                            <td><i class="fas fa-file-alt"></i> <a href="<?= base_url() ?>assets/upload/kurikulum/administrasi/<?= $datas->berkas_file; ?>" target="_blank"><?= $datas->berkas_file; ?></a></td>
                                            <td><?= $datas->tanggal_upload; ?></td>
                                            <td><?= $datas->keterangan_berkas; ?></td>
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
    </div>
</div>