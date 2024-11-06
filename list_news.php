<?php
session_start();
require 'assets/script/connection.php';
if (isset($_COOKIE['login']) && isset($_COOKIE['key'])) {
    $key = $_COOKIE['key'];
    $result = mysqli_query($connection, "SELECT username FROM useradmin WHERE username = '$key'");
    $row = mysqli_fetch_assoc($result);
    if ($row && $key === $row['username']) {
        $_SESSION['login'] = true;
    }
}
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News List - Admin</title>
    <link rel="stylesheet" href="assets/styles/admin.css">
    <link rel="icon" href="assets/img/logo.png" type="png">
    <script src="assets/script/script.js"></script>
    
</head>
<body>
    <header class="head">
        <img src="assets/img/logo.png" alt="logo" class="logo">
        <ul class="nav-bar">
            <li>Admin</li>
            <li><a href="list_news.php" class="active-button-header">News</a></li>
            <li><a href="list_games.php">Games</a></li>
            <li>
                <a class="button-header" href="assets/script/logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
            </a>
            </li>
            <li>
                <button id="theme-switch" class="button-header" onclick="darkmodeBTN()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
                </button>
            </li>
        </ul>
    </header>
    <h1>DAFTAR BERITA</h1><br>
    <a href="add_games.php">= TAMBAH BARU</a><br><br>
    <div class="form_div">
        <form>
            <table border="1">
                <tr>
                    <th>No.</th>
                    <th>Image Path</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Waching Time</th>
                    <th>Pilihan</th>
                </tr>
                <?php
                include 'assets/script/connection.php';
                $no = 1;
                $data = mysqli_query($connection, "SELECT * FROM daftar_berita");
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['image_path']; ?></td>
                        <td><?php echo $d['judul_berita']; ?></td>
                        <td><?php echo $d['deskripsi_berita']; ?></td>
                        <td><?php echo $d['watching_time']; ?></td>
                        <td>
                            <a href="Update.php?id_berita=<?php echo $d['id_berita']; ?>">Update</a>
                            <a href="Delete.php?id_berita=<?php echo $d['id_berita']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </form>
    </div>
</body>
</html>