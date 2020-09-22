<?php
require '../config.php';

if(isset($_POST["kirim"])){

    if( kirim($_POST) > 0){
        header("location: hubungi-kami.php?pesan-berhasil");
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
    <title>Hubungi Kami - PMI DEPOK</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    </head>

<body>
<nav class="navbar navbar-dark navbar-expand-lg fixed-top clean-navbar" style="background-color: #dc3545;">
        <div class="container"><a class="navbar-brand logo" href="home.php"><img src="../assets/img/logo/logo.png" class="img-logo"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="home.php"><i class="fa fa-home"> Home</i></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus-square"> 
                            Tentang PMI</i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="sejarah.php">Sejarah PMI</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="visi-dan-misi.php">Visi dan Misi</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="tujuan-strategis.php">Tujuan Strategis</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="struktur-organisasi.php">Struktur Organisasi</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-newspaper">
                        Aktivitas</i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="kegiatan.php">Kegiatan Donor Darah</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="daftar.php">Daftar Menjadi Pendonor</a>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="stok-darah.php"><i class="fa fa-medkit"> Stok Darah</i></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="hubungi-kami.php"><i class="fa fa-envelope"> Hubungi Kami</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark" style="background-image:url(&quot;../assets/img/wallpaper/bg-regis.jpg&quot;)">
            <div class="container">
                <div class="block-heading">
                    <img class="img-icon" src="../assets/img/logo/icon-email.png" alt="icon email">
                    <h2 class="text-danger">Hubungi Kami</h2>
                    <p><strong> PMI Kota Depok</strong></p>
                    <p>Jl. Boulevard GDC Kota Kembang</p>
                    <p>Kel. Kalimulya Kec. Cilodong – Kota Depok 16413</p>
                    <p>Telp. 021-87927211</p>
                    <p>email : pmikotadpk@gmail.com</p>
                </div>
                <form action="" method="post">
                <?php if(isset($_GET["pesan-gagal"])) {?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Pengiriman Pesan <strong>gagal</strong>! Silakan kirim ulang
                    </div>
                <?php } ?>
                <?php 
                    if(isset($_GET["pesan-berhasil"])) {?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Pesan <strong>berhasil</strong> terkirim!
                        </div>
                    <?php } ?>
                    <div class="form-group"><label for="nama">Nama</label><input class="form-control" type="text" name="nama"></div>
                    <div class="form-group"><label for="subject">Subject</label><input class="form-control" type="text" name="subject"></div>
                    <div class="form-group"><label for="email">Email*</label><input class="form-control" type="email" name="email"></div>
                    <div class="form-group"><label for="pesan">Pesan*</label><textarea class="form-control" name="pesan"></textarea></div>
                    <p style="font-style: italic">*wajib diisi</p>
                    <div class="form-group"><button class="btn btn-danger btn-block" type="submit" name="kirim"><i class="fa fa-envelope"> Kirim</i></button></div>
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