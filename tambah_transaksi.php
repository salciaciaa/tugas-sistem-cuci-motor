<?php
$title="Transaksi Baru"; require "config.php";
$pelanggan=mysqli_query($conn,"SELECT * FROM pelanggan ORDER BY nama");
$layanan=mysqli_query($conn,"SELECT * FROM layanan ORDER BY nama_layanan");
if(isset($_POST['simpan'])){
$pel=(int)$_POST['pelanggan_id']; $lay=(int)$_POST['layanan_id'];
$harga=mysqli_fetch_assoc(mysqli_query($conn,"SELECT harga FROM layanan WHERE id=$lay"))['harga'];
$stmt=mysqli_prepare($conn,"INSERT INTO transaksi(pelanggan_id,layanan_id,tanggal,total,status) VALUES(?,?,?,?,?)");
mysqli_stmt_bind_param($stmt,"iisis",$pel,$lay,$_POST['tanggal'],$harga,$_POST['status']);
mysqli_stmt_execute($stmt); header("Location: transaksi.php");exit;
}
require "includes/header.php"; ?>
<div class="form-card"><form method="post">
<label>Pelanggan</label><select name="pelanggan_id" required><option value="">-- Pilih Pelanggan --</option><?php while($p=mysqli_fetch_assoc($pelanggan)): ?><option value="<?=$p['id']?>"><?=e($p['nama'])?> - <?=e($p['no_polisi'])?></option><?php endwhile; ?></select>
<label>Layanan</label><select name="layanan_id" required><?php while($l=mysqli_fetch_assoc($layanan)): ?><option value="<?=$l['id']?>"><?=e($l['nama_layanan'])?> - Rp <?=number_format($l['harga'],0,',','.')?></option><?php endwhile; ?></select>
<label>Tanggal</label><input type="date" name="tanggal" value="<?=date('Y-m-d')?>" required>
<label>Status</label><select name="status"><option>Menunggu</option><option>Selesai</option></select>
<button class="btn primary" name="simpan">Simpan Transaksi</button> <a class="btn" href="transaksi.php">Batal</a>
</form></div><?php require "includes/footer.php"; ?>