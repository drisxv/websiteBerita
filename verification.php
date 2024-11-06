<?php
require 'assets/script/connection.php';

$username = 'admin123';
$password = password_hash('12345', PASSWORD_DEFAULT);

$query = "INSERT INTO useradmin (username, password) VALUES ('$username', '$password')";
mysqli_query($connection, $query) or die(mysqli_error($koneksi));

echo "gagal";
?>