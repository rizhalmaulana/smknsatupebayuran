<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
    style="background-image: url('assets/images/depan.png')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Jurusan Teknik Komputer Dan Jaringan</h2>
            </div>
        </div>
    </div>
</div>

<?php foreach($tkj as $jaringan) { ?>
<p class="mb-5">
    <center><img src="<?= base_url() ?>assets/upload/kurikulum/tkj/<?= $jaringan->berkas_file; ?>" style="width: 180px; height: 200px;" alt="Image" class="img-fluid"></center>
</p>
<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 mb-4">
                <h2 class="section-title-underline mb-5">
                    <span><b>Tentang</b></span>
                </h2>
                <p class="text-justify"><?= $jaringan->keterangan_berkas; ?></p>
            </div>

        </div>
    </div>
</div>
<?php } ?>
</div>