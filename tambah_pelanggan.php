<?php
$title="Tambah Pelanggan"; require "config.php";
if(isset($_POST['simpan'])){
    $stmt=mysqli_prepare($conn,"INSERT INTO pelanggan(nama,no_hp,no_polisi,jenis_motor,alamat) VALUES(?,?,?,?,?)");
    mysqli_stmt_bind_param($stmt,"sssss",$_POST['nama'],$_POST['no_hp'],$_POST['no_polisi'],$_POST['jenis_motor'],$_POST['alamat']);
    if(mysqli_stmt_execute($stmt)){header("Location: pelanggan.php");exit;}
    $error="No. polisi mungkin sudah digunakan.";
}
require "includes/header.php";
?>
<div class="form-card">
<?php if(isset($error)): ?><div class="alert danger"><?=e($error)?></div><?php endif; ?>
<form method="post">
<div class="grid2">
<div><label>Nama Pelanggan</label><input name="nama" required></div>
<div><label>No. HP</label><input name="no_hp" required></div>
<div><label>No. Polisi</label><input name="no_polisi" placeholder="Contoh: B 1234 XYZ" required></div>
<div><label>Jenis Motor</label><select name="jenis_motor" required><option value="">-- Pilih --</option><option>Motor Matic</option><option>Motor Bebek</option><option>Motor Sport</option><option>Motor Trail</option></select></div>
<div class="full-field"><label>Alamat</label><textarea name="alamat"></textarea></div>
</div>
<button class="btn primary" name="simpan">Simpan</button> <a class="btn" href="pelanggan.php">Batal</a>
</form></div>
<?php require "includes/footer.php"; ?>