<?php
session_start();

if( !isset($_SESSION["login"])){
    header("location: ../login.php");
    exit;
}
?>


<?php
require '../config.php';

$id = $_GET['id'];
$row = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id = $id");
$artikel = mysqli_fetch_array($row);

if(isset($_POST["ubah"])){

    if( artikel($_POST) > 0){
        echo "<script>
            alert('Artikel berhasil diperbarui');
            document.location.href = '../admin/home.php#artikel';
        </script>";
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
    <title>Edit Artikel - PMI DEPOK</title>
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
        <div class="container"><a class="navbar-brand logo" href="../admin/home.php"><img src="../assets/img/logo/logo.png" class="img-logo"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="../admin/home.php"><i class="fa fa-home"> Home</i></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus-square"> 
                            Tentang PMI</i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="artikel-sejarah.php">Sejarah PMI</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="artikel-visimisi.php">Visi dan Misi</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="artikel-tujuan.php">Tujuan Strategis</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="artikel-struktur.php">Struktur Organisasi</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-newspaper">
                        Aktivitas</i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../admin/jadwal-donor.php">Kegiatan Donor Darah</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../admin/pendonor.php">Daftar Para Pendonor</a>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../admin/edit-stok.php"><i class="fa fa-medkit"> Stok Darah</i></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../admin/logout.php"><i class="fa fa-sign-out-alt"> Log out</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page blog-post">
    <section class="clean-block clean-post dark">
            <div class="container">
                <div class="block-content">
                <div class="post-body">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="block-heading">
                    <h2 class="text-info"><strong>Edit Artikel</strong></h2>
                </div>
                <?php 
                if(isset($_GET["gagal-mengubah"])) {?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Edit artikel <strong>gagal</strong>!. Judul atau isi tidak boleh kosong.
                    </div>
                <?php } ?>
                <div><input type="hidden" name="id" value="<?= $artikel ["id"];?>"></div>
                <div><input type="hidden" name="gambarLama" value="<?= $artikel ["gambar"];?>"></div>
                <div class="form-group"><label for="nama_penulis"><strong>Penulis</strong></label>
                <input class="form-control item" type="text" name="nama_penulis" value="<?= $artikel ["nama_penulis"]; ?>"></div>
                <div class="form-group"><label for="judul"><strong>Judul Artikel</strong></label>
                <input class="form-control item" type="text" name="judul" value="<?= $artikel ["judul"]; ?>"></div>
                <br>
                <div class="form-group"><label for="isi"><strong>Isi Konten</strong></label>
                <textarea class="ckeditor" id="ckedtor" name="isi" value="<?= $artikel ["isi"]; ?>"></textarea></div>
                <br>
                <div class="form-group">
                <label for="exampleFormControlFile1"><strong>Gambar</strong></label><br>
                <img src="./gambar/<?=$artikel["gambar"]; ?>" width="300"><br><br>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar">
            </div>
            <br>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="ubah">Update</button>
                        <button type="submit" class="btn btn-danger" name="kembali">Kembali</button>
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
    <script src="../assets/ckeditor/ckeditor.js"></script>
</body>

</html>