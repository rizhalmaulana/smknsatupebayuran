        <!-- start: content -->
        <div id="content">
            <div class="panel">
                <div class="panel-body">
                    <img src="assets/images/ppdb/depan.png" class="img-responsive"
                        style="width: 1500px; height: 300px;" />
                </div>
            </div>
            <div class="col-md-12" style="padding:20px;">
                <div class="col-md-12 padding-0">
                    <div class="col-md-8 padding-0">
                        <div class="col-md-12 padding-0">
                            <div class="col-md-4">
                                <div class="panel box-v1">
                                    <div class="panel-heading bg-white border-none">
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                            <h4 class="text-left">Jumlah Pendidik</h4>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                            <h4>
                                                <span class="icon-user icons icon text-right"></span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="panel-body text-center">
                                    <?php 
                                        foreach($pendidik->result_array() as $row):
                                        $pendidik = $row['pendidik'];
                                    ?>
                                        <h1><?= htmlentities($pendidik , ENT_QUOTES, 'UTF-8');?></h1>
                                    <?php endforeach; ?>
                                        <p>User aktif</p>
                                        <hr />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel box-v1">
                                    <div class="panel-heading bg-white border-none">
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                            <h4 class="text-left">Jumlah Kependidikan</h4>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                            <h4>
                                                <span class="icon-people icons icon text-right"></span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="panel-body text-center">
                                    <?php 
                                        foreach($kependidikan->result_array() as $row):
                                        $kependidikan = $row['kependidikan'];
                                    ?>
                                        <h1><?= htmlentities($kependidikan , ENT_QUOTES, 'UTF-8');?></h1>
                                    <?php endforeach; ?>
                                        <p>User aktif</p>
                                        <hr />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel box-v1">
                                    <div class="panel-heading bg-white border-none">
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                            <h4 class="text-left">Jumlah Jurusan</h4>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                            <h4>
                                                <span class="icon-graduation icons icon text-right"></span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="panel-body text-center">
                                    <?php 
                                        foreach($jurusan->result_array() as $row):
                                        $jurusan = $row['jurusan'];
                                    ?>
                                        <h1><?= htmlentities($jurusan , ENT_QUOTES, 'UTF-8');?></h1>
                                    <?php endforeach; ?>
                                        <p>Jurusan aktif</p>
                                        <hr />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />
                        <br />
                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="sticky-top mb-3">
                                            <div class="card">
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <!-- /.col -->
                                    <div class="col-md-12" id="external-events">
                                        <div class="card card-primary">
                                            <div class="card-body p-0">
                                                <!-- THE CALENDAR -->
                                                <div id="calendar"></div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12 padding-0">
                            <div class="panel box-v2">
                                <div class="panel-heading padding-0">
                                    <img src="assets/primary/img/bg2.jpg" class="box-v2-cover img-responsive" />
                                    <div class="box-v2-detail">
                                        <img src="assets/primary/img/all-user.png" class="img-responsive" />
                                        <h4><?= $user['nama']; ?></h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12 padding-0 text-center">
                                        <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                            <h3>Phone</h3>
                                            <p><?= $user['phone']; ?></p>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                                            <h3>Username</h3>
                                            <p><?= $user['username']; ?></p>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                                            <h3>Since</h3>
                                            <p><?= $user['date_created']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 padding-0">
                            <div class="panel box-v1">
                                <div class="panel-heading bg-white border-none">
                                    <h4><span class="fa fa-map-marker"></span> Pebayuran</h4>
                                    <h4>Cloudy</h4>
                                    <h4>24<sup>o</sup></h4>
                                </div>
                                <div class="panel-body" style="padding-bottom:75px;">
                                    <center>
                                        <div class="mostly-suny suny">
                                            <div class="sun animated pulse infinite">
                                            </div>
                                            <div class="cloudy animated pulse infinite">
                                                <div class="shadow">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hazy cloudy animated pulse infinite">
                                            <div class="shadow">
                                            </div>
                                        </div>
                                </div>
                                </center>
                            </div>
                        </div>
                        <div class="col-md-12 padding-0">
                            <div class="panel bg-light-blue">
                                <div class="panel-body text-white">
                                    <p class="animated fadeInUp quote">Setiap orang menjadi guru, setiap rumah menjadi
                                        sekolah"</p>
                                    <div class="col-md-12 padding-0">
                                        <div class="text-left col-md-7 col-xs-12 col-sm-7 padding-0">
                                        </div>
                                        <div style="padding-top:8px;"
                                            class="text-right col-md-5 col-xs-12 col-sm-5 padding-0">
                                            <span class="fa fa-user fa-1x"></span>
                                            <span> Ki Hajar Dewantara</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: content -->