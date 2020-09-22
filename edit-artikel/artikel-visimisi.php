<?php
session_start();

if( !isset($_SESSION["login"])){
    header("location: ../login.php");
    exit;
}
?>

<?php
include '../config.php';
$contoh = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=2");
$post = mysqli_fetch_array($contoh);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=13");
$fungsi = mysqli_fetch_array($query);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=3");
$tujuan = mysqli_fetch_array($query);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=11");
$mukerkot = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi dan Misi - PMI DEPOK</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>>

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
        <section class="clean-block clean-post dark" style="background-image:url(&quot;../assets/img/wallpaper/bg-motif.jpg&quot;)">
            <div class="container">
                <div class="block-content">
                    <div class="post-body">
                    <form action="" method="post">
                    <a href="edit.php?id=<?= $post["id"]; ?>" class="btn btn-primary btn-lg float-right" type="submit" name="buat"><i class="fa fa-cog"> Edit Artikel</i></a>
                    </form>
                        <h3><?php echo $post["judul"];?></h3>
                        <div class="post-info"><span>By <?php echo $post["nama_penulis"];?></span><span><?php echo $post["tgl"];?></span></div>
                        <div class="text-center">
                        <img src="gambar/<?php echo $post["gambar"];?>">
                        </div>
                        <p><?php echo $post["isi"];?></p>
                        <div class="block-heading">
                            <div class="text-info">
                                <h2>Related Post</h2>
                                </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card text-center"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $mukerkot["gambar"];?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $mukerkot["judul"];?></h5>
                                        </div>
                                        <div><a href="artikel-muskerkot.php"><button class="btn btn-outline-primary" type="button">Baca Selengkapnya</button></a></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card text-center"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $fungsi["gambar"];?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $fungsi["judul"];?></h5>
                                        </div>
                                        <div><a href="artikel-fungsi.php"><button class="btn btn-outline-primary" type="button">Baca Selengkapnya</button></a></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card text-center"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $tujuan["gambar"];?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $tujuan["judul"];?></h5>
                                        </div>
                                        <div><a href="artikel-tujuan.php"><button class="btn btn-outline-primary" type="button">Baca Selengkapnya</button></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
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