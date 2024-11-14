<?php
session_start();
include 'assets/script/connection.php';

if (!isset($_SESSION['reset_user'])) {
    header("Location: forgot_password.php");
    exit;
}

$error = false;
$success = false;

if (isset($_POST['change_password'])) {
    $new_password = $_POST['new_password'];
    $new_password_confirm = $_POST['new_password_confirm'];

    if ($new_password === $new_password_confirm) {
        $username = $_SESSION['reset_user'];
        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

        $query = "UPDATE login SET password = '$new_password_hashed' WHERE username = '$username'";
        if (mysqli_query($connection, $query)) {
            $success = true;
            unset($_SESSION['reset_user']);
        } else {
            echo "<script>alert('Gagal mengganti password.');</script>";
        }
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <h2>Ganti Password Baru</h2>
    <?php if ($error): ?>
        <p style="color: red;">Konfirmasi password tidak sesuai.</p>
    <?php endif; ?>
    <?php if ($success): ?>
        <p style="color: green;">Password berhasil diganti. <a href="login.php">Login</a></p>
    <?php else: ?>
        <form action="" method="post">
            <label for="new_password">Password Baru:</label>
            <input type="password" name="new_password" id="new_password" required>
            <br>
            <label for="new_password_confirm">Konfirmasi Password Baru:</label>
            <input type="password" name="new_password_confirm" id="new_password_confirm" required>
            <br>
            <button type="submit" name="change_password">Ganti Password</button>
        </form>
    <?php endif; ?>
</body>
</html>
