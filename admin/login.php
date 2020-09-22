<?php
session_start();

if( isset($_SESSION["login"])){
    header("location: home.php");
    exit;
}

    require '../config.php';

    if (isset($_POST["submit_login"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");

        // cek username
        if ( mysqli_num_rows($result) ===1 ){

             // cek password
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"]) ) {
                
                // set session
                $_SESSION["login"] = true;

                header("location: home.php");
                exit;
            }
           
        }
        $error = true;
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PMI DEPOK</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/all.min.css">
</head>

<body>
    <main class="page login-page">
        <section class="clean-block clean-form dark" style="background-image:url(&quot;../assets/img/wallpaper/bg-regis.jpg&quot;)">
            <div class="container">
            <div class="background" style="background-image:url(&quot;/../assets/img/wallpaper/login.jpg&quot;);"></div>
                <div class="block-heading">
                    <img class="img-icon" src="../assets/img/logo/icon-login.png" alt="icon login">
                    <h2 class="text-info"><strong>Admin Login</strong></h2>
                </div>
                
                <form method="post">
                    <?php 
                    if(isset($_GET["daftar-berhasil"])) {?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Selamat Anda telah <strong>berhasil</strong> terdaftar!
                        </div>
                    <?php } ?>
                    <div class="form-group "><label for="username">Username</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                    </div>
                    <input class="form-control item" type="text" name="username" placeholder="Username"></div>
                    <br>
                    <div class="form-group"><label for="password">Password</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-lock"></i></div>
                    </div>
                    <input class="form-control" type="password" name="password" placeholder="Password"></div>
                    <br>
                    <?php
                    if(isset($error)) {
                    ?>
                    <p style="color: red; font-style: italic">username / password salah</p>
                    <?php }?>
                    <input button class="btn btn-danger btn-block" type="submit" value="Log In" name="submit_login">
                    <br>
                    <p style="font-style:italic">Belum punya akun? Silakan <a href="registrasi.php">Daftar</a></p>
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
