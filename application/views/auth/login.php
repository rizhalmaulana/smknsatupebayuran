<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul; ?></title>
    <link rel="shotcut icon" href="assets/images/beranda/logo-sekolah.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
            <a href="home"><i class="fas fa-arrow-left"></i></a>
                <center><a href="home"><img src="assets/images/beranda/logo-sekolah.png" alt="logo"></a>
                </center>
                <center><a href="#"><b>LOGIN</b></a></center>
                <center><a href="#"><b>SMKN 1 PEBAYURAN</b></a></center>
                <br>

                <?= $this->session->flashdata('message'); ?>
                <form class="user" method="post" action="auth">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda..." value="<?= set_value('email'); ?>" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('sandi', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" name="sandi" class="form-control" placeholder="Password" value="<?= set_value('sandi'); ?>" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <div class="col-4">
                            <button style="margin-left: -110px" type="submit" name="login" value="Log In"
                                class="btn btn-primary btn-block">Masuk</button>
                        </div>
                    </div>
                </form>
                <div class="text-center">
                    <a class="small" href="auth/daftar">Belum punya akun? Daftar Disini</a>
                </div>
            
                <hr>
                <center><b><p>Developed by SMKN 1 Pebayuran</p></b></center>
            </div>
        </div>
    </div>

    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/adminlte.min.js"></script>

</body>
<script type="text/javascript">
function Validasi() {
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;
    if (email != "" && pass != "") {
        return true;
    } else {
        alert('Username dan Password harus di isi !');
    }
}
</script>

</html>