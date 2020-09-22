<?php
session_start();

if( !isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
?>


<?php
require '../config.php';
$id = $_GET["id"];

$row = mysqli_query($koneksi, "SELECT * FROM stok WHERE id = $id");
$stok = mysqli_fetch_array($row);

if(isset($_POST["update"])){

    if( update($_POST) > 0){
        header("location: edit-stok.php?berhasil-diubah");
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
        <section class="clean-block clean-form dark" style="background-image:url(&quot;../assets/img/wallpaper/bg-motif.jpg&quot;)">
            <div class="container">
                <div class="block-heading">
                <img class="img-icon" src="../assets/img/logo/icon-edit.png" alt="icon edit">
                <h2 class="text-danger"><strong>Ubah Stok Darah</strong></h2>
                    <div class="left">
                    <form action="" method="post">
                    <div><input type="hidden" name="id" value="<?php echo $stok ["id"]; ?>"></div>
                    <div class="form-group">
                        <label for="jenis_darah">Jenis Darah</label>
                        <input class="form-control item" type="text" name="jenis_darah" value="<?php echo $stok ["jenis_darah"]; ?>" readonly></div>
                    <div class="form-group"><label for="goldar_a">Golongan Darah A</label><input class="form-control item" type="text" name="A" value="<?php echo $stok ["A"]; ?>"></div>
                    <div class="form-group"><label for="goldar_b">Golongan Darah B</label><input class="form-control item" type="text" name="B" value="<?php echo $stok ["B"]; ?>"></div>
                    <div class="form-group"><label for="goldar_ab">Golongan Darah AB</label><input class="form-control item" type="text" name="AB" value="<?php echo $stok ["AB"]; ?>"></div>
                    <div class="form-group"><label for="goldar_o">Golongan Darah O</label><input class="form-control item" type="text" name="O" value="<?php echo $stok ["O"]; ?>"></div>
                    
                    <br>
                    <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                        <a type="submit" class="btn btn-danger" name="cancel" href="edit-stok.php?editing">Cancel</a>
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