<div class="content-wrapper">
    <div class="container-fluid">

        <h2 class="mb-4">Tambah Anggota</h2>

        <div class="card">
            <div class="card-body">

                <form method="post" action="<?= site_url('anggota/simpan'); ?>">

<div class="form-group">
    <label>Nomor Anggota</label>
    <input type="text" name="Nomor_anggota" class="form-control" required>
</div>

<div class="form-group">
    <label>Nama</label>
    <input type="text" name="Nama" class="form-control" required>
</div>

<div class="form-group">
    <label>Alamat</label>
    <textarea name="Alamat" class="form-control"></textarea>
</div>

<div class="form-group">
    <label>Telepon</label>
    <input type="text" name="Telepon" class="form-control">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="Email" class="form-control">
</div>

<div class="form-group">
    <label>Tanggal Daftar</label>
    <input type="date" name="Tanggal_daftar" class="form-control" required>
</div>

<!-- OPTIONAL: kalau mau status dipilih -->
<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="aktif">Aktif</option>
        <option value="tidak aktif">Tidak Aktif</option>
    </select>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="<?= site_url('anggota');?>" class="btn btn-secondary">Kembali</a>

</form>