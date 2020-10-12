<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
    style="background-image: url('assets/images/course_6.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Pengembangan Diri</h2>
            </div>
        </div>
    </div>
</div>

<div class="news-updates">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">

                    <?php foreach($ekskul as $datas) { ?>
                        <div class="post-entry-big horizontal d-flex mb-4">
                            <a href="#" class="img-link mr-4"><img src="assets/upload/kesiswaan/ekskul/<?= $datas->upload_gambar; ?>" alt="Image" class="img-fluid"></a>
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#"><?= $datas->tanggal; ?></a>
                                    <span class="mx-1">/</span>
                                    <a href="#">Admin</a>, <a href="#"><?= $datas->author; ?></a>
                                </div>
                                <h3 class="post-heading"><a href="#"><?= $datas->headline_lomba; ?></a></h3>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="section-heading">
                    <h2 class="text-black">Foto Kegiatan</h2>
                </div>
                <img src="assets/images/course_6.jpg" alt="Image" class="img-fluid">
                <br><br>
                <img src="assets/images/course_3.jpg" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>