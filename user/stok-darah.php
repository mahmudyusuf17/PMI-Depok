<?php
include "../config.php";
$query = mysqli_query($koneksi, "SELECT * FROM stok ORDER BY jenis_darah ASC");
?>

<?php
include_once '../config.php';
$tgl = mysqli_query($koneksi, "SELECT * FROM stok ORDER BY tanggal DESC limit 1");
$new = mysqli_fetch_array($tgl);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pendonor - PMI DEPOK</title>
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
    <main class="page blog-post">
        <section class="clean-block clean-post dark" style="background-image:url(&quot;../assets/img/wallpaper/bg-motif.jpg&quot;)">
            <div class="container">
            <div class="block-content">
                <div class="block-heading">
                <h2 class="text">Stok Donor Darah</h2>
                <div><strong> Data terakhir diperbarui:</strong> <?php echo $new["tanggal"];?></div>
                    <div class="post-body">
                    <form action="" method="post">
                    <table class="table table-bordered table-responsive">
                    <thead>
                        <tr class="bg-danger text-light">
                        <th scope="col">No</th>
                        <th scope="col">Jenis Darah</th>
                        <th scope="col">Golongan Darah (A)</th>
                        <th scope="col">Golongan Darah (B)</th>
                        <th scope="col">Golongan Darah (AB)</th>
                        <th scope="col">Golongan Darah (O)</th>
                        </tr>
                        <?php if(mysqli_num_rows($query)>0){ ?>
                        <?php
                            $no = 1;
                            while($data = mysqli_fetch_array($query)){
                        ?>
                    </thead>
                    <tbody>
                        <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data["jenis_darah"];?></td>
                        <td><?php echo $data["A"];?></td>
                        <td><?php echo $data["B"];?></td>
                        <td><?php echo $data["AB"];?></td>
                        <td><?php echo $data["O"];?></td>
                        </tr>    
                    </tbody>
                    <?php $no++; } ?>
                        <?php } ?>
                    </table>
                    </form>
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