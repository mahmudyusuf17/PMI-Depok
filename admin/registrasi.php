<?php
require '../config.php';

if(isset($_POST["submit_registrasi"])){

    if( registrasi($_POST) > 0){
        header("location: login.php?daftar-berhasil");
    }else{
        echo mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin - PMI DEPOK</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
</head>


<body>
    <main class="page registration-page">
        <section class="clean-block clean-form dark" style="background-image:url(&quot;../assets/img/wallpaper/bg-regis.jpg&quot;)">
            <div class="container">
                <div class="block-heading">
                <img class="img-icon" src="../assets/img/logo/icon-registrasi.png" alt="icon registrasi">
                    <h2 class="text-danger"><strong>Registrasi Admin <br> PMI Depok</strong></h2>
                </div>
                <form action="" method="post">
                <?php if(isset($_GET["failed"])) {?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Proses Daftar <strong>gagal</strong>!. Field tidak boleh kosong.
                    </div>
                <?php } ?>
                    <div class="form-group"><label for="no_pegawai">Nomor Pegawai*</label><input class="form-control item" type="text" name="no_pegawai"></div>
                    <div class="form-group"><label for="nama">Nama*</label><input class="form-control item" type="text" name="nama"></div>
                    <div class="form-group"><label for="username">Username*</label><input class="form-control item" type="text" name="username"></div>
                    <div class="form-group"><label for="password">Password*</label><input class="form-control item" type="password" name="password"></div>
                    <div class="form-group"><label for="password2">Konfirmasi Password*</label><input class="form-control item" type="password" name="password2"></div>
                    <p style="font-style: italic">*wajib diisi</p>
                    <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger" name="submit_registrasi">Daftar</button>
                    </div>
                    </div>
                    <p style="font-style: italic"> Sudah punya akun? Silakan <a href="login.php">Login</a></p>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="footer-copyright">
            <p>PMI Depok © 2019</p>
        </div>
    </footer>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>
