<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
    style="background-image: url('assets/images/bg1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Identitas SMK Negeri 1 Pebayuran</h2>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
        <?php 
        foreach($identitas->result_array() as $row):
            $gambar = $row['file_gambar'];
            $sejarah = $row['sejarah_sekolah'];
            $visi = $row['visi'];
            $misi = $row['misi'];

            ?>
            <div class="col-md-9 mb-4">
                <p class="mb-5">
                    <img src="assets/images/beranda/<?= $gambar; ?>" alt="Image" class="img-fluid">
                </p>
                <h2 class="section-title-underline mb-5">
                    <span><b>Sejarah SMK Negeri 1 Pebayuran</b></span>
                </h2>
                <p class="text-justify"><?= $sejarah; ?></p>
                <br>
                <h2 class="section-title-underline mb-5">
                    <span><b>Visi dan Misi SMK Negeri 1 Pebayuran</b></span>
                </h2>
                <h4><b>Visi</b></h4>
                <p class="text-justify"><?= $visi; ?></p>
                <br>
                <h4><b>Misi</b></h4>
                <p class="text-justify"><?= $misi; ?></p>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
</div>