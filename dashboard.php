<?php
$title = "Dashboard";
require "config.php";
require "includes/header.php";

$pelanggan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) total FROM pelanggan"))['total'];
$transaksi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) total FROM transaksi"))['total'];
$layanan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) total FROM layanan"))['total'];
$pendapatan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COALESCE(SUM(total),0) total FROM transaksi WHERE status='Selesai'"))['total'];
$recent = mysqli_query($conn, "SELECT t.*, p.nama, l.nama_layanan FROM transaksi t JOIN pelanggan p ON p.id=t.pelanggan_id JOIN layanan l ON l.id=t.layanan_id ORDER BY t.id DESC LIMIT 5");
?>
<div class="stats">
    <div class="stat"><div class="icon blue">👥</div><div><span>Total Pelanggan</span><strong><?= $pelanggan ?></strong></div></div>
    <div class="stat"><div class="icon green">🧾</div><div><span>Total Transaksi</span><strong><?= $transaksi ?></strong></div></div>
    <div class="stat"><div class="icon orange">🧽</div><div><span>Total Layanan</span><strong><?= $layanan ?></strong></div></div>
    <div class="stat"><div class="icon purple">💰</div><div><span>Pendapatan</span><strong>Rp <?=number_format($pendapatan,0,',','.')?></strong></div></div>
</div>

<div class="welcome">
    <div><h3>Selamat datang, <?=e($_SESSION['nama'])?>! 👋</h3><p>Siap melayani pelanggan hari ini?</p></div>
    <a class="btn primary" href="tambah_transaksi.php">+ Transaksi Baru</a>
</div>

<div class="card">
    <div class="card-head"><h3>Transaksi Terbaru</h3><a href="transaksi.php">Lihat semua →</a></div>
    <div class="table-wrap"><table>
    <tr><th>Tanggal</th><th>Pelanggan</th><th>Layanan</th><th>Total</th><th>Status</th></tr>
    <?php while($r=mysqli_fetch_assoc($recent)): ?>
    <tr>
        <td><?=e($r['tanggal'])?></td><td><?=e($r['nama'])?></td><td><?=e($r['nama_layanan'])?></td>
        <td>Rp <?=number_format($r['total'],0,',','.')?></td>
        <td><span class="badge <?=$r['status']=='Selesai'?'success':'warning'?>"><?=e($r['status'])?></span></td>
    </tr>
    <?php endwhile; ?>
    </table></div>
</div>
<?php require "includes/footer.php"; ?>