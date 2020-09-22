<?php
require '../config.php';
$id = $_GET['id'];

if (hapus($id)> 0){
    header("location: edit-stok.php?berhasil-dihapus");
}else{
    header("location: edit-stok.php?gagal-dihapus");
}

?>