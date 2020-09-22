<?php
require '../config.php';

if(isset($_POST["daftar"])){

    if( daftar($_POST) > 0){
        header("location: daftar.php?daftar-berhasil");
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
    <title>Daftar Menjadi Pendonor - PMI DEPOK</title>
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
    <main class="page registration-page">
        <section class="clean-block clean-form dark" style="background-image:url(&quot;../assets/img/wallpaper/bg-motif.jpg&quot;)">
            <div class="container">
                <div class="block-heading">
                    <img class="img-icon" src="../assets/img/logo/give-blood.png" alt="icon donor darah">
                    <h2 class="text-info">Daftar Menjadi Pendonor</h2>
                </div>
                <div class="post-body">
                    <form method="post">
                    <?php if(isset($_GET["daftar-gagal"])) {?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Mohon maaf, Anda <strong>gagal</strong> terdaftar! Silakan daftar ulang
                        </div>
                    <?php } ?>
                    <?php 
                        if(isset($_GET["daftar-berhasil"])) {?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Pendaftaran <strong>berhasil</strong>!
                            </div>
                    <?php } ?>
                    <div><label for="nama">Nama Pendonor*</label></div>
                    <div class="row">
                        <div class="col" >
                        <input type="text" class="form-control" placeholder="Nama depan" name="nama_depan">
                        </div>
                        <div class="col">
                        <input type="text" class="form-control" placeholder="Nama belakang" name="nama_belakang">
                        </div>
                    </div>
                    <p>
                    <div><label for="jenis-kelamin">Jenis Kelamin*</label></div>
                    <div class="form-check form-check-inline"> 
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-laki">
                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan">
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>
                    <p>
                    <p>
                    <div class="form-group"><label for="tempat_lahir">Tempat Lahir*</label><input class="form-control item" type="text" name="tempat_lahir"></div>                 
                    <div class="form-group"><label for="date">Tanggal Lahir*</label><input class="form-control item" type="date" id="date" name="tgl_lahir"></div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="no-hp">No. HP*</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Alamat*</label>
                        <input type="text" class="form-control" id="inputAddress" name="alamat">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputCity">Kota</label>
                        <input type="text" class="form-control" id="inputCity" name="kota">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputState">Provinsi</label>
                        <select id="inputState" class="form-control" name="provinsi">
                            <option selected>Select...</option>
                            <option>Jawa Barat</option>
                            <option>DKI Jakarta</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Golongan Darah*</label>
                        <select id="inputState" class="form-control" name="gol_darah">
                            <option selected></option>
                            <option>A</option>
                            <option>B</option>
                            <option>AB</option>
                            <option>O</option>
                            <option>A-</option>
                            <option>B-</option>
                            <option>AB-</option>
                            <option>O-</option>
                            <option>A+</option>
                            <option>B+</option>
                            <option>AB+</option>
                            <option>O+</option>
                            <option>-</option>
                        </select>
                        </div>
                    <div class="form-group"><label>Riwayat Penyakit</label><textarea class="form-control" name="riwayat_penyakit"></textarea></div>
                    <p style="font-style: italic">*wajib diisi</p>
                    <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger" name="daftar">Daftar</button>
                    </div>
                    </div>
                    </form>
                    </div>
                </div>
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
