<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
    style="background-image: url('assets/images/bg1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Tenaga Pendidik SMK Negeri 1 Pebayuran</h2>
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
                                            <th>NIP</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Asal</th>
                                            <th>Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $id = 1;
                                        foreach ($datapendidik as $datas) { ?>
                                        <tr class="text-center">
                                            <td><?= $id++; ?></td>
                                            <td><?= $datas->nip; ?></td>
                                            <td><?= $datas->nama_pendidik; ?></td>
                                            <td><?= $datas->tanggal_lahir; ?></td>
                                            <td><?= $datas->tempat_lahir; ?></td>
                                            <td><?= $datas->jabatan; ?></td>
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