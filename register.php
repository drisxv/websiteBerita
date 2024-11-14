<?php
include 'assets/script/connection.php';

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    $result = mysqli_query($connection, "SELECT username FROM login WHERE username = '$username'");
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah terdaftar. Silakan gunakan username lain.');</script>";
    } elseif ($password !== $password_confirm) {
        echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
    } else {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO login (username, password) VALUES ('$username', '$password_hashed')";
        
        if (mysqli_query($connection, $query)) {
            echo "<script>alert('User baru berhasil ditambahkan');</script>";
        } else {
            echo "<script>alert('Gagal menambahkan user: ');</script>" . mysqli_error($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password_confirm">Konfirmasi Password</label>
                <input type="password" name="password_confirm" id="password_confirm" required>
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>
</body>
</html>
