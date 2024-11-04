<?php
session_start();
$error = false;

if ( isset($_COOKIE['login']) && isset($_COOKIE['key'])){
    $key = $_COOKIE['key'];

    $result = mysqli_query($koneksi, "SELECT username FROM login WHERE username = $key");
    $row = mysqli_fetch_assoc($result);

    if( $key === $row['username']) {
        $_SESSION['login'] = true;
    }
}


if( isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}



require 'koneksi.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $result = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST['remember'])){
                // cookie
                setcookie('login', 'true', time() + 60);
                setcookie('key', $row['username'], time() + 60);
                //setcookie('login', 'true', time() + 20);

            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;



    /*
// untuk bagian atmin saja
    <?php
        session_start();

        if( !isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

require 'koneksi.php';


?>


    */
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php if ($error): ?>
    <p style="color: red;">salah</p>
<?php endif; ?>


    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="remember">Remember Me:</label>
        <input type="checkbox" name="remember" id="remember">
        <br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
