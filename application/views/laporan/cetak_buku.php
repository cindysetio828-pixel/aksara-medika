<!DOCTYPE html>
<html>
<head>
<title>Cetak Laporan Buku</title>

<style>

body{
    font-family: Arial;
}

h3{
    text-align: center;
}

table{
    width:100%;
    border-collapse: collapse;
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

<h3>LAPORAN BUKU</h3>

<?php if(!empty($nama_kategori)): ?>
<p>Kategori : <?= $nama_kategori; ?></p>
<?php endif; ?>

<table>

<tr>
    <th>No</th>
    <th>Judul Buku</th>
    <th>Penulis</th>
    <th>Kategori</th>
    <th>Stok</th>
</tr>

<?php $no=1; foreach($data as $d): ?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $d->judul; ?></td>
    <td><?= $d->penulis; ?></td>
    <td><?= $d->nama_kategori; ?></td>
    <td><?= $d->stok; ?></td>
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