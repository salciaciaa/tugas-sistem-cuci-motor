<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= e($title ?? "FreshWash Motor") ?></title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="layout">
<aside class="sidebar">
    <div class="logo">🚿 <span>FreshWash</span></div>
    <div class="subtitle">MOTOR WASH SYSTEM</div>
    <nav>
        <a class="<?= $current=='dashboard.php'?'active':'' ?>" href="dashboard.php">🏠 Dashboard</a>
        <a class="<?= in_array($current,['pelanggan.php','tambah_pelanggan.php','edit_pelanggan.php'])?'active':'' ?>" href="pelanggan.php">👥 Pelanggan</a>
        <a class="<?= in_array($current,['layanan.php','tambah_layanan.php','edit_layanan.php'])?'active':'' ?>" href="layanan.php">🧽 Layanan</a>
        <a class="<?= in_array($current,['transaksi.php','tambah_transaksi.php'])?'active':'' ?>" href="transaksi.php">🧾 Transaksi</a>
        <a href="laporan.php">📊 Laporan</a>
    </nav>
    <div class="side-bottom">
        <div class="user-mini">👤 <?=e($_SESSION['nama'])?></div>
        <a href="logout.php" class="logout">↪ Keluar</a>
    </div>
</aside>
<main class="main">
<header class="topbar">
    <div>
        <h2><?=e($title ?? "Dashboard")?></h2>
        <span class="muted">Kelola usaha cuci motor dengan mudah</span>
    </div>
    <div class="date"><?=date('d M Y')?></div>
</header>
<div class="content">
