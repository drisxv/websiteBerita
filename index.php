<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediksi Nominasi Game Awards 2024</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="icon" href="assets/img/logo.png" type="png">
    <script src="assets/script/script.js"></script>
</head>
<body>
    <?php
        include 'assets/script/connection.php';
    ?>
    <header class="head">
        <img src="assets/img/logo.png" alt="logo" class="logo">
        <ul class="nav-bar">
            <li><input type="text" placeholder="Search"></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="popular.php">Popular</a></li>
            <li>
                <button id="theme-switch" onclick="darkmodeBTN()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
                </but>
            </li>
        </ul>
    </header>
    <main>
        <article class="news">
            <h1>Prediksi Nominasi Game Awards 2024</h1>
            <?php 
            $cardNo = 1;
            $data = mysqli_query($connection, query: "SELECT * FROM daftar_berita");
            while ($d = mysqli_fetch_array($data)){
                ?>
                    <a href="news.php?id_berita=<?php echo $d['id_berita']; ?>" class="card">
                            <div>
                                <img src="<?php echo $d['image_path'];?>">
                            </div>
                            <div>
                                <h2><?php echo nl2br($d["judul_berita"]);?></h2>
                                <p><?php echo nl2br($d["deskripsi_berita"]);?></p>
                            </div>
                    </a>
            <?php
            }
            ?>
        </article>
        <aside>
            <div class="card">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque necessitatibus officia iusto debitis, vero dicta ducimus ut maiores saepe dolor a accusamus obcaecati tempore blanditiis quasi consectetur aliquam delectus nihil!</p>
            </div>
    </aside>
    </main>
    
    <footer>
        <p>Copyrigth © DRISXV 2024</p>
        <div class="team">
            <h5>Our Team</h5>
            <ul>
                <lI>Ahmad Fandio Fakhrudin</lI>
                <lI>Fahmi Idris Alimuddin</lI>
            </ul>
        </div>
    </footer>
</body>
</html>