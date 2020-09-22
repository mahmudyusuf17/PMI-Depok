<?php
session_start();

if( !isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}

?>

<?php
include "../config.php";
$query = mysqli_query($koneksi, "SELECT * FROM pendonor ORDER BY nama DESC");
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
</head>>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top clean-navbar" style="background-color: #dc3545;">
    <div class="container"><a class="navbar-brand logo" href="home.php"><img src="../assets/img/logo/logo.png" class="img-logo"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="home.php"><i class="fa fa-home"> Home</i></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus-square"> 
                            Tentang PMI</i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../edit-artikel/artikel-sejarah.php">Sejarah PMI</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../edit-artikel/artikel-visimisi.php">Visi dan Misi</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../edit-artikel/artikel-tujuan.php">Tujuan Strategis</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../edit-artikel/artikel-struktur.php">Struktur Organisasi</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-newspaper">
                        Aktivitas</i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="jadwal-donor.php">Kegiatan Donor Darah</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pendonor.php">Daftar Para Pendonor</a>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="edit-stok.php"><i class="fa fa-medkit"> Stok Darah</i></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"> Log out</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page blog-post">
        <section class="clean-block clean-post dark" style="background-image:url(&quot;../assets/img/wallpaper/bg-motif.jpg&quot;)">
            <div class="container">
            <div class="block-content">
                <div class="block-heading">
                <h2 class="text">Daftar Pendonor Darah</h2>
                    <div class="post-body">
                    <form action="" method="post">
                    <table class="table table-sm table-bordered table-responsive">
                    <thead>
                        <tr class="bg-danger text-light">
                        <th scope="col">No</th>
                        <th scope="col">Nama Pendonor</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tempat/tgl Lahir</th>
                        <th scope="col">Email</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Golongan Darah</th>
                        <th scope="col">Riwayat Penyakit</th>
                        
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
                        <td><?php echo $data["nama"];?></td>
                        <td><?php echo $data["jenis_kelamin"];?></td>
                        <td><?php echo $data["ttgl_lahir"];?></td>
                        <td><?php echo $data["email"];?></td>
                        <td><?php echo $data["no_hp"];?></td>
                        <td><?php echo $data["alamat"];?></td>
                        <td><?php echo $data["gol_darah"];?></td>
                        <td><?php echo $data["riwayat_penyakit"];?></td>
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