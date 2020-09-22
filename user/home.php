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
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=8");
$jenis = mysqli_fetch_array($query);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=7");
$tips = mysqli_fetch_array($query);
?>

<?php
include_once '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id=9");
$karakteristik = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - PMI DEPOK</title>
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
    <main class="page landing-page">
        <section class="clean-block clean-hero" style="background-image:url(&quot;../assets/img/wallpaper/kantor.jpg&quot;);color:rgb(0, 0, 0, 0.7)">
            <div class="text">
                <h2 ><strong>Selamat Datang di Website <br> PMI DEPOK.</strong></h2>
                <p>Situs resmi PMI Depok bagian Unit Transfusi Darah (UTD) yang memberikan infomasi seputar donor darah.</p>
                <a href="tugas-dan-fungsi.php#tugas"><input class="btn btn-outline-light btn-lg" type="button" value="Selengkapnya"></a></div>
        </section>
        <section class="clean-block clean-services dark" id="artikel">
                <div class="container">
                    <div class="block-heading"><br><br>
                        <h2 class="text-info"><strong>Artikel PMI Depok</strong></h2>
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
                    </div>
                        <a href="artikel.php"><button type="submit" class="btn btn-primary btn-lg float-right" name="lanjutan">
                            <i class="fa fa-eye"> Lihat artikel lainnya >>></i></button></a>
                </div>
                
        </section>
        <section class="clean-block clean-info light" id="info">
            <div class="container">
                <div class="block-heading"><br>
                    <h2 class="text-info"><strong>Daftar Menjadi Pendonor</strong></h2>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6"><img class="img-thumbnail" src="../assets/img/kegiatan/donor-darah.png" width="450px"></div>
                    <div class="col-md-6">
                        <h3>Yuk gabung jadi pendonor!!!</h3>
                        <div class="getting-started-info">
                        <p>Saatnya peduli, saatnya berbagi.<br> Apapun golongan darahmu, mereka membutuhkan.<br> Setetes darah kita, berarti untuk mereka.<br>
                        1 kantong darah bisa selamatkan 3 nyawa.<br> Baca artikel: <a href="manfaat-donor.php" class="text-danger"><i><strong>Manfaat Donor Darah</strong></i></a></p>
                        </div><a href="daftar.php"><button class="btn btn-primary btn-lg" type="button">Daftar Sekarang</button></a></div>
                </div>
            </div>
        </section>
        <section class="clean-block features dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info"><strong>Jenis Golongan Darah</strong></h2>
                    <p>Apa jenis golongan darahmu?</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5 feature-box"><i class="icon-star icon"></i>
                        <h4><a href="karakteristik-goldar.php#goldar">Golongan Darah A</a></h4>
                        <p>Memiliki antigen A pada sel-sel darah merah, memiliki antibodi anti-B dalam plasma.</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-star icon"></i>
                        <h4><a href="karakteristik-goldar.php#goldar">Golongan Darah B</a></h4>
                        <p>Memiliki antigen B pada sel-sel darah merah, memiliki antibodi anti-A dalam plasma.</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-star icon"></i>
                        <h4><a href="karakteristik-goldar.php#goldar">Golongan Darah AB</a></h4>
                        <p>Memiliki antigen A dan B, tetapi tidak memiliki antibodi.</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-star icon"></i>
                        <h4><a href="karakteristik-goldar.php#goldar">Golongan Darah O</a></h4>
                        <p>Tidak memiliki antigen, tetapi keduanya memiliki antibodi anti-A dan anti-B dalam plasma.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Pelayanan</h3>
                        <ul>
                            <li><a href="stok-darah.php">Stok Darah</a></li>
                            <li><a href="kegiatan.php">Jadwal Donor</a></li>
                            <li><a href="daftar.php">Daftar Pendonor</a></li>
                            <li><a href="hubungi-kami.php">Hubungi Kami</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Tentang</h3>
                        <ul>
                            <li><a href="sejarah.php">Sejarah</a></li>
                            <li><a href="visi-dan-misi.php">Visi dan Misi</a></li>
                            <li><a href="tujuan-strategis.php">Tujuan Strategis</a></li>
                            <li><a href="struktur-organisasi.php">Struktur Organisasi</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>PMI Depok</h3>
                        <p>PMI Depok merupakan bagian Unit Transfusi Darah (UTD) dari Palang Merah Indonesia yang bertugas dalam menangani donor darah. 
                            Berlokasi di Jl. Boulevard GDC Kota Kembang
                            Kel. Kalimulya Kec. Cilodong – Kota Depok 16413
                            Telp. 021-87927211</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">PMI Depok © 2019</p>
            </div>
        </footer>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>

