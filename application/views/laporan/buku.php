<div class="container-fluid">

<h3>LAPORAN BUKU</h3>

<form method="get">

<select name="kategori" class="form-control w-25">

<option value="">---Semua Kategori---</option>

<?php foreach($kategori as $k): ?>

<option value="<?= $k->id; ?>"
<?= ($pilih==$k->id)?'selected':'';?>>

<?= $k->nama_kategori; ?>

</option>

<?php endforeach; ?>

</select>

<br>

<button type="submit"
class="btn btn-primary btn-sm">
Filter
</button>

<a href="<?= site_url('laporan/buku');?>"
class="btn btn-secondary btn-sm">
Reset
</a>

</form>

<br>

<a href="<?= site_url('buku/cetak_buku'); ?>"
target="_blank"
class="btn btn-success btn-sm">
Cetak PDF
</a>

<table class="table table-bordered mt-3">

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

</div>