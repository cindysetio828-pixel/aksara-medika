<div class="container-fluid">

<h3>LAPORAN KATEGORI</h3>

<br>

<a href="<?= site_url('kategori/cetak_kategori'); ?>"
target="_blank"
class="btn btn-success btn-sm">

Cetak PDF

</a>

<table class="table table-bordered mt-3">

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

</div>