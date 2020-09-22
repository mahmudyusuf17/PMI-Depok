<?php
session_start();

if( !isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
?>

<?php
if(isset($_POST["edit"])){
    header("location: edit-stok.php?editing");
}
?>

<?php
if(isset($_POST["tambah"])){
    header("location: edit-stok.php?tambah#tambah-stok");
}
?>

<?php
require '../config.php';

if(isset($_POST["add"])){

    if( add($_POST) > 0){
        header("location: edit-stok.php?berhasil-ditambah");
    }else{
        echo mysqli_error($koneksi);
    }
}

?>


<?php
include_once "../config.php";
$query = mysqli_query($koneksi, "SELECT * FROM stok ORDER BY id ASC");
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
    <title>Stok Darah - PMI DEPOK</title>
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
                <h2 class="text">Stok Donor Darah</h2>
                <div><strong> Data terakhir diperbarui:</strong> <?php echo $new["tanggal"];?></div>
                <?php 
                    if(isset($_GET["berhasil-ditambah"])) {?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Data <strong>berhasil</strong> ditambah!
                        </div>
                    <?php } ?>

                <?php 
                    if(isset($_GET["gagal-menambahkan"])) {?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Mohon maaf, <strong>gagal</strong> menambahkan!. Field Jenis Darah tidak boleh kosong.
                    </div>
                    <?php } ?>

                <?php 
                    if(isset($_GET["berhasil-diubah"])) {?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Data <strong>berhasil</strong> diperbarui!
                        </div>
                    <?php } ?>

                    <?php 
                    if(isset($_GET["berhasil-dihapus"])) {?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Data <strong>berhasil</strong> dihapus!
                        </div>
                    <?php } ?>

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
                        <?php if(isset($_GET["editing"])) {?>
                        <th scope="col" colspan="2" class="bg-dark"><i class="fa fa-cog"> Edit</i>
                        </th>
                        <?php } ?>
                        </tr>
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
                        <?php if(isset($_GET["editing"])) {?>
                            <td><a type="submit" class="btn btn-primary" name="update" href="ubah.php?id=<?= $data["id"]; ?>"><i class="fa fa-cogs"> Update</i></a></td>
                            <td><a type="submit" class="btn btn-danger" name="delete" href="hapus.php?id=<?= $data["id"]; ?>" onclick="return confirm('Anda yakin akan menghapus data?');">
                            <i class="fa fa-trash"> Delete</i></a></td>
                            <?php } ?>
                        </tr>    
                    </tbody>
                    <?php $no++; } ?>
                        <?php } ?>
                    </table>
                    
                    <table class="table table-bordered table-responsive">
                    <thead>
                        <tr class="bg-dark text-light">
                        <th scope="col" colspan="2">Action
                        <tr>
                            <td><button type="submit" class="btn btn-primary" name="tambah"><i class="fa fa-plus"> Tambah</i></button></td>
                            <td><button type="submit" class="btn btn-danger" name="edit"><i class="fa fa-cog"> Edit</i></button></td>
                        </tr>
                        </th>
                        </tr>
                    </thead>
                    </table>
                    </form>
                    
                    <?php if(isset($_GET["tambah"])) {?>
                    <section class="clean-block clean-form dark" id="tambah-stok">
                    <div class="container"><br><br><br><br><br><br>
                    <h3 class="text">Tambah Data Stok Darah</h3>
                    <div class="left">
                    <form action="" method="post">
                    <div class="form-group">
                        <label for="jenis_darah">Jenis Darah*</label>
                        <select class="custom-select mr-sm-2" type="text" name="jenis_darah">
                            <option></option>
                            <option>Whole Blood (WB)</option>
                            <option>Packed Red Cells (PRC)</option>
                            <option>Thrombocyte Concentrate (TC)</option>
                            <option>Fresh Frozen Plasma (FFP)</option>
                            <option>Cryo-AHF</option>
                        </select>
                    </div>
                    <div class="form-group"><label for="goldar_a">Golongan Darah A</label><input class="form-control item" type="text" name="A" placeholder="masukkan jumlah darah"></div>
                    <div class="form-group"><label for="goldar_b">Golongan Darah B</label><input class="form-control item" type="text" name="B" placeholder="masukkan jumlah darah"></div>
                    <div class="form-group"><label for="goldar_ab">Golongan Darah AB</label><input class="form-control item" type="text" name="AB" placeholder="masukkan jumlah darah"></div>
                    <div class="form-group"><label for="goldar_o">Golongan Darah O</label><input class="form-control item" type="text" name="O" placeholder="masukkan jumlah darah"></div>
                    <p style="font-style: italic; text-align:left" >*wajib diisi</p>
                    <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="add">Tambah</button>
                        <button type="submit" class="btn btn-danger" onclick="javascript:eraseText();">Clear</button>
                    </div>
                    </div>
                </form>
                    </div>
                    </div>
                    </section>
                    <?php } ?>

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