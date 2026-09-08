<?php
$title="Tambah Layanan"; require "config.php";
if(isset($_POST['simpan'])){
$stmt=mysqli_prepare($conn,"INSERT INTO layanan(nama_layanan,harga,keterangan) VALUES(?,?,?)");
mysqli_stmt_bind_param($stmt,"sis",$_POST['nama_layanan'],$_POST['harga'],$_POST['keterangan']);
mysqli_stmt_execute($stmt); header("Location: layanan.php"); exit;
}
require "includes/header.php"; ?>
<div class="form-card"><form method="post">
<label>Nama Layanan</label><input name="nama_layanan" placeholder="Contoh: Cuci Motor Premium" required>
<label>Harga</label><input type="number" name="harga" min="0" required>
<label>Keterangan</label><textarea name="keterangan" placeholder="Keterangan layanan"></textarea>
<button class="btn primary" name="simpan">Simpan</button> <a class="btn" href="layanan.php">Batal</a>
</form></div>
<?php require "includes/footer.php"; ?>