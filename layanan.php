<?php
$title="Data Layanan"; require "config.php"; require "includes/header.php";
$q=mysqli_query($conn,"SELECT * FROM layanan ORDER BY harga");
?>
<div class="page-actions"><a class="btn primary" href="tambah_layanan.php">+ Tambah Layanan</a></div>
<div class="service-grid">
<?php while($r=mysqli_fetch_assoc($q)): ?>
<div class="service-card"><div class="service-icon">🫧</div><h3><?=e($r['nama_layanan'])?></h3><p><?=e($r['keterangan'])?></p><strong>Rp <?=number_format($r['harga'],0,',','.')?></strong>
<div><a class="btn small" href="edit_layanan.php?id=<?=$r['id']?>">Edit</a> <a class="btn small danger" href="hapus_layanan.php?id=<?=$r['id']?>" onclick="return confirm('Hapus layanan?')">Hapus</a></div></div>
<?php endwhile; ?>
</div>
<?php require "includes/footer.php"; ?>