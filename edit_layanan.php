<?php
$title="Edit Layanan"; require "config.php"; $id=(int)$_GET['id'];
$data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM layanan WHERE id=$id"));
if(isset($_POST['simpan'])){
$stmt=mysqli_prepare($conn,"UPDATE layanan SET nama_layanan=?,harga=?,keterangan=? WHERE id=?");
mysqli_stmt_bind_param($stmt,"sisi",$_POST['nama_layanan'],$_POST['harga'],$_POST['keterangan'],$id);
mysqli_stmt_execute($stmt); header("Location: layanan.php");exit;
}
require "includes/header.php"; ?>
<div class="form-card"><form method="post">
<label>Nama Layanan</label><input name="nama_layanan" value="<?=e($data['nama_layanan'])?>" required>
<label>Harga</label><input type="number" name="harga" value="<?=e($data['harga'])?>" required>
<label>Keterangan</label><textarea name="keterangan"><?=e($data['keterangan'])?></textarea>
<button class="btn primary" name="simpan">Update</button> <a class="btn" href="layanan.php">Batal</a>
</form></div><?php require "includes/footer.php"; ?>