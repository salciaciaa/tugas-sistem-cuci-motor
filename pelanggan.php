<?php
$title="Data Pelanggan"; require "config.php"; require "includes/header.php";
$q = mysqli_query($conn,"SELECT * FROM pelanggan ORDER BY id DESC");
?>
<div class="page-actions"><a class="btn primary" href="tambah_pelanggan.php">+ Tambah Pelanggan</a></div>
<div class="card"><div class="table-wrap"><table>
<tr><th>No</th><th>Nama</th><th>No. HP</th><th>No. Polisi</th><th>Jenis Motor</th><th>Alamat</th><th>Aksi</th></tr>
<?php $no=1; while($r=mysqli_fetch_assoc($q)): ?>
<tr>
<td><?=$no++?></td><td><?=e($r['nama'])?></td><td><?=e($r['no_hp'])?></td><td><b><?=e($r['no_polisi'])?></b></td>
<td><?=e($r['jenis_motor'])?></td><td><?=e($r['alamat'])?></td>
<td class="actions"><a class="btn small" href="edit_pelanggan.php?id=<?=$r['id']?>">Edit</a>
<a class="btn small danger" href="hapus_pelanggan.php?id=<?=$r['id']?>" onclick="return confirm('Hapus pelanggan ini?')">Hapus</a></td>
</tr>
<?php endwhile; ?>
</table></div></div>
<?php require "includes/footer.php"; ?>