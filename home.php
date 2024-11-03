<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediksi Nominasi Game Awards 2024</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="icon" href="assets/img/logo.png" type="png">
</head>
<body>
    <?php
        //Start of Code
        include 'assets/script/connection.php';
    ?>
    <header class="head">
        <img src="assets/img/logo.png" alt="logo" class="logo">
        <ul class="nav-bar">
            <li><input type="text" placeholder="Search"></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="popular.php">Popular</a></li>
            <li>
                <button id="darkmode" onclick="darkmode()">
                    <img src="assets/img/darkmode.png">
                </button>
            </li>
        </ul>
    </header>
    <main>
        <article class="news">
            <h1>Prediksi Nominasi Game Awards 2024</h1>
            <?php 
            //Menampilkan card berita terbaru
            $cardNo = 1;
            $data = mysqli_query($connection, "SELECT * FROM daftar_berita");
            while ($d = mysqli_fetch_array($data)){
                ?>
                    <div class="card">
                        <div>
                            <img src="<?php echo $d['image_path'];?>">
                        </div>
                        <div>
                            <h2><?php echo nl2br($d["judul_berita"]);?></h2>
                            <p><?php echo nl2br($d["deskripsi_berita"]);?></p>
                        </div>
                    </div>
            <?php
            }
            // End of the Code
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
    <script type="text/javascript" src="assets/script/script.js" ></script>
</body>
</html>
