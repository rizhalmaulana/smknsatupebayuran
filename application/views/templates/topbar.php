<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <div class="py-2 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <!-- <div class="col-lg-9 d-none d-lg-block">
                    <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Pertanyaan?</a>
                    <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> 10 20 123 456</a>
                    <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span>info@smkn1pebayuran.com</a>
                </div>
                <div class="col-lg-3 text-right">
                    <a href="auth" class="small mr-3"><span class="icon-unlock-alt"></span> Masuk</a>
                </div> -->
            </div>
        </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container">
            <div class="d-flex align-items-center">
                <div class="site-logo">
                    <a href="<?= base_url('home'); ?>" class="d-block">
                        <img src="assets/images/beranda/logo-sekolah.png" alt="Image" class="img-fluid">
                    </a>
                </div>
                <div class="mr-auto">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li class="active">
                                <a href="<?= base_url('home'); ?>" class="nav-link text-left">Home</a>
                            </li>
                            <li class="has-children">
                                <a href="" class="nav-link text-left">Profil</a>
                                <ul class="dropdown">
                                    <li><a href="<?= base_url('identitas'); ?>">Identitas Sekolah</a></li>
                                    <li><a href="<?= base_url('struktur'); ?>">Struktur Organisasi</a></li>
                                    <li><a href="<?= base_url('pendidik'); ?>">Tenaga Pendidik</a></li>
                                    <li><a href="<?= base_url('kependidikan'); ?>">Tenaga Kependidikan</a></li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="" class="nav-link text-left">Kurikulum</a>
                                <ul class="dropdown">
                                    <li><a href="<?= base_url('administrasi'); ?>">Administrasi Guru</a></li>
                                    <li><a href="#">Penilaian</a></li>
                                    <li><a href="<?= base_url('perpustakaan'); ?>">Perpustakaan</a></li>
                                    <li><a href="<?= base_url('elektronika'); ?>">Teknik Elektronika Industri</a></li>
                                    <li><a href="<?= base_url('ototronik'); ?>">Teknik Ototronik</a></li>
                                    <li><a href="<?= base_url('jaringan'); ?>">Teknik Komputer & Jaringan</a></li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="" class="nav-link text-left">Kesiswaan</a>
                                <ul class="dropdown">
                                    <li><a href="<?= base_url('ekskul'); ?>">Pengembangan Diri</a></li>
                                    <li><a href="#">Data siswa</a></li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="" class="nav-link text-left">Hubin</a>
                                <ul class="dropdown">
                                    <li><a href="<?= base_url('mitra'); ?>">Daftar Mitra Industri</a></li>
                                    <li><a href="#">PKL</a></li>
                                    <li><a href="#">Bursa Kerja Khusus</a></li>
                                    <li><a href="#">Pemanfaatan Alumni</a></li>
                                </ul>
                            </li>
                        </ul>    
                    </nav>
                </div>
                <div class="ml-auto">
                <div class="social-wrap">
                    <a href="<?= base_url('auth'); ?>"><span class="icon-unlock-alt"></span></a>
                    <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                </div>
          </div>
                <div class="ml-auto">
                    <div class="social-wrap">
                        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                                class="icon-menu h3"></span></a>
                    </div>
                </div>

            </div>
        </div>

    </header>