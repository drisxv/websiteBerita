<?php
include 'assets/script/connection.php';

function query($query){
    global $connection;
    $result = mysqli_query($connection, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function search($keyword) {
    $query = "SELECT * FROM daftar_berita WHERE judul_berita LIKE '%$keyword%'";
    return query($query);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediksi Nominasi Game Awards 2024</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="icon" href="assets/img/logo.png" type="image/png">
</head>
<body>
    <header class="head">
        <img src="assets/img/logo.png" alt="logo" class="logo">
        
        <ul class="nav-bar">
            <!-- Search Form -->
            <form action="" method="post">
                <li><input type="text" name="keyword" autofocus placeholder="Search" autocomplete="off"></li>
                <li><button type="submit" name="search">Search</button></li>
            </form>
            <!-- Search Form -->
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
            $cardNo = 1;
            $data = query("SELECT * FROM daftar_berita");
            if(isset($_POST["search"])) {
                $data = search($_POST["keyword"]);
            }
            if($data) {
                foreach ($data as $d) {
                    ?>
                            <a href="news.php?id_berita=<?php echo $d['id_berita']; ?>"class="card">
                        <div>
                                <img src="<?php echo ($d['image_path']); ?>" alt="News Image">
                        </div>
                        <div>
                            <h2><?php echo ($d["judul_berita"]); ?></h2>
                            <p><?php echo nl2br(($d["deskripsi_berita"])); ?></p>
                        </div>
                        </a>
                    <?php
                    }
                } else {
                echo "<p>Tidak ada pencarian</p>";
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
        <p>Copyright Â© DRISXV 2024</p>
        <div class="team">
            <h5>Our Team</h5>
            <ul>
                <li>Ahmad Fandio Fakhrudin</li>
                <li>Fahmi Idris Alimuddin</li>
            </ul>
        </div>
    </footer>
</body>
</html>


function search($keyword)
{
    $query = "SELECT * FROM daftar_berita LEFT JOIN daftar_game ON daftar_berita.id_berita = daftar_game.id_game WHERE genre LIKE '%$keyword%' 
    UNION SELECT * FROM daftar_berita LEFT JOIN daftar_game ON daftar_berita.id_berita = daftar_game.id_game WHERE judul_berita LIKE '%$keyword%'
    UNION SELECT * FROM daftar_berita LEFT JOIN daftar_game ON daftar_berita.id_berita = daftar_game.id_game WHERE judul_game LIKE '%$keyword%'";
    return query($query);
}

$data = query("SELECT * FROM daftar_berita LEFT JOIN daftar_game ON daftar_berita.id_berita = daftar_game.id_game");
