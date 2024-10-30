<?php
include 'connection.php';

$judul_berita = $_POST['judul_berita'];
$deskripsi_berita = $_POST['deskripsi_berita'];
$image_path = $_POST['image_path'];
$watching_time = $_POST['watching_time'];
mysqli_query($connection, "INSERT INTO daftar_berita VALUES('', '$image_path','$judul_berita', '$deskripsi_berita', '$watching_time')");

header('location:../../home.php')
?>