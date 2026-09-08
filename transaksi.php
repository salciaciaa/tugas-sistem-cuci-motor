<?php
$title="Transaksi"; require "config.php"; require "includes/header.php";
$q=mysqli_query($conn,"SELECT t.*,p.nama,p.no_polisi,l.nama_layanan FROM transaksi t JOIN pelanggan p ON p.id=t.pelanggan_id JOIN layanan l ON l.id=t.layanan_id ORDER BY t.id DESC");
?>
<div class="page-actions"><a class="btn primary" href="tambah_transaksi.php">+ Transaksi Baru</a></div>
<div class="card"><div class="table-wrap"><table>
<tr><th>No</th><th>Tanggal</th><th>Pelanggan</th><th>No. Polisi</th><th>Layanan</th><th>Total</th><th>Status</th><th>Aksi</th></tr>
<?php $no=1;while($r=mysqli_fetch_assoc($q)): ?>
<tr><td><?=$no++?></td><td><?=e($r['tanggal'])?></td><td><?=e($r['nama'])?></td><td><?=e($r['no_polisi'])?></td><td><?=e($r['nama_layanan'])?></td>
<td>Rp <?=number_format($r['total'],0,',','.')?></td><td><span class="badge <?=$r['status']=='Selesai'?'success':'warning'?>"><?=e($r['status'])?></span></td>
<td><a class="btn small danger" href="hapus_transaksi.php?id=<?=$r['id']?>" onclick="return confirm('Hapus transaksi?')">Hapus</a></td></tr>
<?php endwhile; ?></table></div></div>
<?php require "includes/footer.php"; ?>