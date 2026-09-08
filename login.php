<?php
session_start();
require "config.php";

$error = "";
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, "SELECT id, username, nama FROM users WHERE username=? AND password=? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama'] = $user['nama'];
        header("Location: dashboard.php");
        exit;
    }
    $error = "Username atau password salah.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - FreshWash Motor</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body class="login-body">
<div class="login-card">
    <div class="brand-big">🚿</div>
    <h1>FreshWash Motor</h1>
    <p class="muted">Sistem Informasi Cuci Motor</p>
    <?php if($error): ?><div class="alert danger"><?=e($error)?></div><?php endif; ?>
    <form method="post">
        <label>Username</label>
        <input type="text" name="username" placeholder="Masukkan username" required>
        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan password" required>
        <button class="btn primary full" name="login">Masuk</button>
    </form>
    <small>Demo: admin / admin123</small>
</div>
</body>
</html>