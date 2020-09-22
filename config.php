<?php
    global $koneksi;

    $nameserver = "localhost";
    $username   = "root";
    $password   = "";
    $namadb     = "pmi_depok";

    $koneksi = mysqli_connect($nameserver,$username,$password,$namadb);

    if(!$koneksi){
        die("Koneksi Gagal".mysqli_connect_error());
    }


    // registrasi.php
    function registrasi($data){
        global $koneksi;
        $no_pegawai = ($data["no_pegawai"]);
        $nama = ($data["nama"]);
        $username = strtolower(stripcslashes($data["username"]));
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

        // cek username sudah ada atau belum
        $result = mysqli_query($koneksi, "SELECT username FROM admin WHERE username = '$username'");

        if( mysqli_fetch_assoc($result)){
            echo "<script>
                alert('username sudah ada!');
            </script>";
            return false;
        }

        // cek nomor anggota sudah digunakan atau belum
        $result = mysqli_query($koneksi, "SELECT no_pegawai FROM admin WHERE no_pegawai = '$no_pegawai'");

        if( mysqli_fetch_assoc($result)){
            echo "<script>
                alert('nomor anggota sudah digunakan!');
            </script>";
            return false;
        }
        
        //cek konfirmasi password
        if($password !== $password2){
            echo "<script>
                alert('konfirmasi password tidak sesuai!');
            </script>";
            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan user baru ke database
        if(empty($no_pegawai && $nama && $username && $password &&$password2)){
            header("location:registrasi.php?failed");
        }else{
        mysqli_query($koneksi, "INSERT INTO admin VALUES('$no_pegawai', '$nama', '$username', '$password')");
        return mysqli_affected_rows($koneksi);
        }
        
    }

    // daftar.php
    function daftar($data){
        global $koneksi;
        $nama = ($data["nama_depan"].' '.$data["nama_belakang"]);
        $jenis_kelamin = ($data["jenis_kelamin"]);
        $ttgl_lahir = ($data["tempat_lahir"].', '.$data["tgl_lahir"]);
        $email = ($data["email"]);
        $no_hp = ($data["no_hp"]);
        $alamat = ($data["alamat"].' '.$data["kota"].' '.$data["provinsi"]);
        $gol_darah = ($data["gol_darah"]);
        $riwayat_penyakit = ($data["riwayat_penyakit"]);


        // tambahkan data baru ke database
        if(empty($nama && $jenis_kelamin && $ttgl_lahir && $no_hp && $alamat && $gol_darah)){
            header("location: daftar.php?daftar-gagal");
        }else{
        mysqli_query($koneksi, "INSERT INTO pendonor VALUES('$nama', '$jenis_kelamin', '$ttgl_lahir', '$email', '$no_hp', '$alamat', '$gol_darah', '$riwayat_penyakit')");
        return mysqli_affected_rows($koneksi);
        }
        
    }



    // Hubungi-kami.php
    function kirim($data){
        global $koneksi;
        $nama = ($data["nama"]);
        $subject = ($data["subject"]);
        $email = ($data["email"]);
        $pesan = ($data["pesan"]);

        if(empty($email && $pesan)){
            header("location: hubungi-kami.php?pesan-gagal");
        }else{
            mysqli_query($koneksi, "INSERT INTO kontak VALUES('$nama', '$subject', '$email', '$pesan')");
            return mysqli_affected_rows($koneksi);
        }

    }
    
    // Menambahkan data di edit-stok.php
    function add($data){
        global $koneksi;
        $jenis_darah = ($data["jenis_darah"]);
        $goldar_a = ($data["A"]);
        $goldar_b = ($data["B"]);
        $goldar_ab = ($data["AB"]);
        $goldar_o = ($data["O"]);

        // format tanggal
        if(function_exists('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
        $tanggal =  date("Y-m-d H:i:s");

        // cek jenis darah sudah atau belum
        $result = mysqli_query($koneksi, "SELECT jenis_darah FROM stok WHERE jenis_darah = '$jenis_darah'");

        if( mysqli_fetch_assoc($result)){
            echo "<script>
                alert('Jenis Darah sudah ada!');
            </script>";
            return false;
        }

        // tambahkan data baru ke database
        if(empty($jenis_darah)){
            header("location: edit-stok.php?gagal-menambahkan");
        }else{
        mysqli_query($koneksi, "INSERT INTO stok VALUES('', '$jenis_darah', '$goldar_a', '$goldar_b', '$goldar_ab', '$goldar_o', '$tanggal')");
        return mysqli_affected_rows($koneksi);
        }
        
    }

   // Mengubah data di edit-stok.php
   function update($data){
    global $koneksi;
    $id = ($data["id"]);
    $jenis_darah = ($data["jenis_darah"]);
    $goldar_a = ($data["A"]);
    $goldar_b = ($data["B"]);
    $goldar_ab = ($data["AB"]);
    $goldar_o = ($data["O"]);
    

    // ubah data  ke database
    $query = "UPDATE stok SET jenis_darah = '$jenis_darah', A = '$goldar_a', B = '$goldar_b', AB = '$goldar_ab', O = '$goldar_o' WHERE id='$id'";
    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);

    }
    
    // hapus data stok darah
    function hapus($id){
        global $koneksi;
        mysqli_query($koneksi, "DELETE FROM stok WHERE id= $id");
        return mysqli_affected_rows($koneksi);
    }

    // Menambahkan data artikel ke database
    function simpan($data){
        global $koneksi;
        $judul = ($data["judul"]);
        $isi = ($data["isi"]);
        $nama_penulis = ($data["nama_penulis"]);
        
        // gambar
        $gambar = upload();
        if( !$gambar ){
            return false;
        }

        $query = "INSERT INTO artikel VALUES('', '$nama_penulis', '$judul', '$isi', '$gambar', '')";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    
    }

    // hapus data artikel
    function delete($id){
        global $koneksi;
        mysqli_query($koneksi, "DELETE FROM artikel WHERE id= $id");
        return mysqli_affected_rows($koneksi);
    }

        function upload(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tempName = $_FILES['gambar']['tmp_name'];

        // cek apakah tidak ada gambar yang diupload
        if($error === 4){
            echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
            return false;

        }

        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo "<script>
                alert('yang anda upload bukan gambar!');
            </script>";
            return false;
        }

        // cek jika ukuran gambar terlalu besar
        if( $ukuranFile > 5000000){
            echo "<script>
                alert('ukuran gambar terlalu besar!);
            </script>";
            return false;
        }


        // lolos pengecekan
        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .=  '.';
        $namaFileBaru .= $ekstensiGambar;


        move_uploaded_file($tempName, './gambar/'. $namaFileBaru);
        return $namaFileBaru;

        }


    // Mengubah data artikel ke database
    function artikel($data){
        global $koneksi;
        $id = ($data["id"]);
        $nama_penulis = ($data["nama_penulis"]);
        $judul = ($data["judul"]);
        $isi = ($data["isi"]);
        $gambarLama = ($data["gambarLama"]);
        
        //cek apakah user pilih gambar baru
        if( $_FILES['gambar']['error'] === 4){
            $gambar = $gambarLama;
        }else{
            $gambar = upload();
        }
        // ubah data  ke database
        if(empty($nama_penulis && $judul && $isi)){
            echo "<script>
                    alert('Gagal mengubah, field PENULIS, JUDUL atau ISI tidak boleh kosong!');
            </script>";
        }else{
        $query = "UPDATE artikel SET 
                    nama_penulis = '$nama_penulis',
                    judul = '$judul', 
                    isi = '$isi', 
                    gambar = '$gambar' 
                    WHERE id='$id'";

        mysqli_query($koneksi,$query);
        return mysqli_affected_rows($koneksi);
        }

    }

    




?>