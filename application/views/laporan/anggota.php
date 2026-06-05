<div class="container-fluid">

<h3>LAPORAN ANGGOTA</h3>

<br>

<a href="<?= site_url('anggota/cetak_anggota'); ?>"
target="_blank"
class="btn btn-success btn-sm">

Cetak PDF

</a>

<table class="table table-bordered mt-3">

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

</div>