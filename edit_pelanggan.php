<?php
$title="Edit Pelanggan"; require "config.php";
$id=(int)$_GET['id']; $data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pelanggan WHERE id=$id"));
if(!$data){header("Location: pelanggan.php");exit;}
if(isset($_POST['simpan'])){
$stmt=mysqli_prepare($conn,"UPDATE pelanggan SET nama=?,no_hp=?,no_polisi=?,jenis_motor=?,alamat=? WHERE id=?");
mysqli_stmt_bind_param($stmt,"sssssi",$_POST['nama'],$_POST['no_hp'],$_POST['no_polisi'],$_POST['jenis_motor'],$_POST['alamat'],$id);
mysqli_stmt_execute($stmt); header("Location: pelanggan.php"); exit;
}
require "includes/header.php"; ?>
<div class="form-card"><form method="post"><div class="grid2">
<div><label>Nama Pelanggan</label><input name="nama" value="<?=e($data['nama'])?>" required></div>
<div><label>No. HP</label><input name="no_hp" value="<?=e($data['no_hp'])?>" required></div>
<div><label>No. Polisi</label><input name="no_polisi" value="<?=e($data['no_polisi'])?>" required></div>
<div><label>Jenis Motor</label><select name="jenis_motor"><option><?=e($data['jenis_motor'])?></option><option>Motor Matic</option><option>Motor Bebek</option><option>Motor Sport</option><option>Motor Trail</option></select></div>
<div class="full-field"><label>Alamat</label><textarea name="alamat"><?=e($data['alamat'])?></textarea></div>
</div><button class="btn primary" name="simpan">Update</button> <a class="btn" href="pelanggan.php">Batal</a></form></div>
<?php require "includes/footer.php"; ?>