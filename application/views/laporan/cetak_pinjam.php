<!DOCTYPE html>
<html>

<head>
<title>Cetak Laporan Peminjaman</title>

<style>
body{
    font-family:Arial;
}

h3{
    text-align:center;
}

table{
    width:100%;
    border-collapse:collapse;
}

table, th, td{
    border:1px solid black;
}

th, td{
    padding:8px;
    text-align:center;
}

@media print{
    button{
        display:none;
    }
}
</style>

</head>

<body>

<h3>LAPORAN PEMINJAMAN</h3>

<?php if(!empty($bulan)): ?>
<p>Bulan: <?= $bulan; ?></p>
<?php endif; ?>

<table>

<tr>
    <th>No</th>
    <th>Kode</th>
    <th>Nama</th>
    <th>Tanggal</th>
    <th>Status</th>
</tr>

<?php $no=1; foreach($data as $d): ?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $d->kode_peminjaman; ?></td>
    <td><?= $d->Nama; ?></td>
    <td><?= $d->tanggal_pinjam; ?></td>
    <td><?= $d->status; ?></td>
</tr>

<?php endforeach; ?>

</table>

<br><br>

<p style="text-align:right;">
Tangerang, <?= date('d-m-Y'); ?>
<br><br><br>
(Admin)
</p>

<script>
window.print();
</script>

</body>
</html>