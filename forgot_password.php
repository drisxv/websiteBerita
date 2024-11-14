<?php
include 'assets/script/connection.php';

$error = false;
$success = false;

if (isset($_POST['reset_password'])) {
    $username = $_POST['username'];
    $result = mysqli_query($connection, "SELECT * FROM login WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        session_start();
        $_SESSION['reset_user'] = $username;
        header("Location: reset_password.php");
        exit;
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password</title>
</head>
<body>
    <h2>Lupa Password</h2>
    <?php if ($error): ?>
        <p style="color: red;">Username tidak ditemukan.</p>
    <?php endif; ?>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <button type="submit" name="reset_password">Cari Akun</button>
    </form>
</body>
</html>
