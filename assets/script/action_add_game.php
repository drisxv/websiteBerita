<?php
include 'connection.php';

$judul_game = $_POST['judul_game'];
$deskripsi_game = $_POST['deskripsi_game'];
$game_path = $_POST['game_image'];
$watching_time = $_POST['watching_time_game'];
$id_genre = $_POST['id_genre'];
mysqli_query($connection, "INSERT INTO daftar_game VALUES('', '$game_path','$judul_game', '$deskripsi_game', '$watching_time', '$id_genre')");

header('location:../../list_news.php')
?>