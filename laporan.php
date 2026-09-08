<?php
$title="Laporan Pendapatan"; require "config.php"; require "includes/header.php";
$q=mysqli_query($conn,"SELECT t.*,p.nama,p.no_polisi,l.nama_layanan FROM transaksi t JOIN pelanggan p ON p.id=t.pelanggan_id JOIN layanan l ON l.id=t.layanan_id WHERE t.status='Selesai' ORDER BY t.tanggal DESC");
$total=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COALESCE(SUM(total),0) total FROM transaksi WHERE status='Selesai'"))['total'];
?>
<div class="report-head"><div><h3>Laporan Transaksi Selesai</h3><p class="muted">Total pendapatan: <b>Rp <?=number_format($total,0,',','.')?></b></p></div><button onclick="window.print()" class="btn">🖨 Cetak</button></div>
<div class="card"><div class="table-wrap"><table><tr><th>Tanggal</th><th>Pelanggan</th><th>No. Polisi</th><th>Layanan</th><th>Total</th></tr>
<?php while($r=mysqli_fetch_assoc($q)): ?><tr><td><?=e($r['tanggal'])?></td><td><?=e($r['nama'])?></td><td><?=e($r['no_polisi'])?></td><td><?=e($r['nama_layanan'])?></td><td>Rp <?=number_format($r['total'],0,',','.')?></td></tr><?php endwhile; ?>
</table></div></div>
<?php require "includes/footer.php"; ?>