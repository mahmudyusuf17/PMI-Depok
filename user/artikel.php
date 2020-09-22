<?php
session_start();

if( !isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=1");
$sejarah = mysqli_fetch_array($query);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=2");
$visimisi = mysqli_fetch_array($query);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=3");
$tujuan = mysqli_fetch_array($query);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=4");
$struktur = mysqli_fetch_array($query);
?>


<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=6");
$manfaat = mysqli_fetch_array($query);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=7");
$tips = mysqli_fetch_array($query);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=8");
$jenis = mysqli_fetch_array($query);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=9");
$karakteristik = mysqli_fetch_array($query);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=10");
$pengurus = mysqli_fetch_array($query);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=11");
$mukerkot = mysqli_fetch_array($query);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=12");
$gedung = mysqli_fetch_array($query);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=13");
$fungsi = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Artikel - PMI DEPOK</title>
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
    <main class="page service-page">
        <section class="clean-block clean-services dark" style="background-image:url(&quot;../assets/img/wallpaper/bg-abu.jpg&quot;)">
            <div class="container">
            <div class="block-heading"><br><br>
                        <h2 class="text-info"><strong>Daftar Artikel PMI Depok</strong></h2>
                        <p>Kumpulan artikel mengenai informasi seputar donor darah.</p><br>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="card"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $sejarah["gambar"];?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $sejarah["judul"];?></h4>
                                    <p class="card-text">Sejarah terbentuknya Palang Merah Indonesia hingga kini yang telah tersebar kepenjuru Indonesia.</p>
                                </div>
                                <div><a href="sejarah.php"><button class="btn btn-outline-primary btn-sm" type="button">Baca Selengkapnya</button></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $tujuan["gambar"];?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $tujuan["judul"];?></h4>
                                    <p class="card-text">Tujuan strategis dari Palang Merah Indonesia untuk memajukan dan memperbesar organisasi PMI.</p>
                                </div>
                                <div><a href="tujuan-strategis.php"><button class="btn btn-outline-primary btn-sm" type="button">Baca Selengkapnya</button></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $struktur["gambar"];?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $struktur["judul"];?></h4>
                                    <p class="card-text">Struktur dari organisasi Palang Merah Indonesia tahun 2014-2019 yang berisi dari ketua umum hingga anggota dari PMI.</p>
                                </div>
                                <div><a href="struktur-organisasi.php"><button class="btn btn-outline-primary btn-sm" type="button">Baca Selengkapnya</button></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $jenis["gambar"];?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $jenis["judul"];?></h4>
                                    <p class="card-text">Jenis-jenis komponen darah yang terdiri dari whole blood, PRC, TC, FFP dan Cryo-AHF.</p>
                                </div>
                                <div><a href="jenis-darah.php"><button class="btn btn-outline-primary btn-sm" type="button">Baca Selengkapnya</button></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $karakteristik["gambar"];?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $karakteristik["judul"];?></h4>
                                    <p class="card-text">Memahami karakteristik dari golongan darah A, B, AB dan O untuk mencocokan darah pendonor dan penerima.</p>
                                </div>
                                <div><a href="karakteristik-goldar.php"><button class="btn btn-outline-primary btn-sm" type="button">Baca Selengkapnya</button></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $tips["gambar"];?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $tips["judul"];?></h4>
                                    <p class="card-text">Tips apa saja yang harus dilakukan pendonor sebelum dan setelah melakukan donor darah.</p>
                                </div>
                                <div><a href="tips-donor.php"><button class="btn btn-outline-primary btn-sm" type="button">Baca Selengkapnya</button></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $manfaat["gambar"];?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $manfaat["judul"];?></h4>
                                    <p class="card-text">Mendonor darah bukan hanya untuk kesehatan orang lain, tapi untuk kesehatan pendonornya juga.</p>
                                </div>
                                <div><a href="manfaat-donor.php"><button class="btn btn-outline-primary btn-sm" type="button">Baca Selengkapnya</button></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $pengurus["gambar"];?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $pengurus["judul"];?></h4>
                                    <p class="card-text">PMI Depok melakukan pelantikan pengurus baru untuk periode 2017-2022.</p>
                                </div>
                                <div><a href="pengurus-pmi.php"><button class="btn btn-outline-primary btn-sm" type="button">Baca Selengkapnya</button></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $mukerkot["gambar"];?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $mukerkot["judul"];?></h4>
                                    <p class="card-text">Penyelenggaraan musyawarah kerja kota oleh PMI Depok.</p>
                                </div>
                                <div><a href="mukerkot.php"><button class="btn btn-outline-primary btn-sm" type="button">Baca Selengkapnya</button></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $fungsi["gambar"];?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $fungsi["judul"];?></h4>
                                    <p class="card-text">Menjelaskan bagaimana fungsi dan tugas dari PMI Depok dalam membantu masyarakat.</p>
                                </div>
                                <div><a href="tugas-dan-fungsi.php"><button class="btn btn-outline-primary btn-sm" type="button">Baca Selengkapnya</button></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $visimisi["gambar"];?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $visimisi["judul"];?></h4>
                                    <p class="card-text">Kebijakan mutu, tujuan, visi dan misi dari Palang Merah Indonesia</p>
                                </div>
                                <div><a href="visi-dan-misi.php"><button class="btn btn-outline-primary btn-sm" type="button">Baca Selengkapnya</button></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card"><img class="card-img-top w-100 d-block" src="../edit-artikel/gambar/<?= $gedung["gambar"];?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $gedung["judul"];?></h4>
                                    <p class="card-text">Penyelenggaraan acara peresmian gedung PMI Depok yang berada di jalan Boulevard GDC Depok.</p>
                                </div>
                                <div><a href="gedung.php"><button class="btn btn-outline-primary btn-sm" type="button">Baca Selengkapnya</button></a></div>
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