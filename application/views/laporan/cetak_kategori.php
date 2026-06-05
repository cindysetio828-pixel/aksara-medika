<!DOCTYPE html>
<html>
<head>
<title>Cetak Laporan Kategori</title>

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

table,th,td{
    border:1px solid black;
}

th,td{
    padding:8px;
    text-align:center;
}

</style>

</head>

<body>

<h3>LAPORAN KATEGORI</h3>

<table>

<tr>
    <th>No</th>
    <th>ID Kategori</th>
    <th>Nama Kategori</th>
</tr>

<?php $no=1; foreach($data as $d): ?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $d->id; ?></td>
    <td><?= $d->nama_kategori; ?></td>
</tr>

<?php endforeach; ?>

</table>

<br><br>

<p style="text-align:right;">
Tangerang, <?= date('d-m-Y'); ?><br><br><br>
(Admin)
</p>

<script>
window.print();
</script>

</body>
</html>