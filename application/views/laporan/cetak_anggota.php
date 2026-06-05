<!DOCTYPE html>
<html>
<head>
<title>Cetak Laporan Anggota</title>

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

<h3>LAPORAN ANGGOTA</h3>

<table>

<tr>
    <th>No</th>
    <th>No Anggota</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>No HP</th>
    <th>Email</th>
    <th>Tanggal Daftar</th>
    <th>Status</th>
</tr>

<?php $no=1; foreach($data as $d): ?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $d->Nomor_anggota; ?></td>
    <td><?= $d->Nama; ?></td>
    <td><?= $d->Alamat; ?></td>
    <td><?= $d->Telepon; ?></td>
    <td><?= $d->Email; ?></td>
    <td><?= $d->Tanggal_daftar; ?></td>
    <td><?= $d->status; ?></td>
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