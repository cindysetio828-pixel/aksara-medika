<div class="container-fluid">
    <h2 class="h3 mb-4 text-gray-800">Edit Anggota</h2>

    <div class="card shadow">
        <div class="card-body">

            <form method="post" action="<?= site_url('anggota/update/'.$anggota->Nomor_anggota); ?>">

                <div class="form-group">
                    <label>Nomor Anggota</label>
                    <input type="text" name="Nomor_anggota" 
                           class="form-control" 
                           value="<?= $anggota->Nomor_anggota; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="Nama" 
                           class="form-control" 
                           value="<?= $anggota->Nama; ?>" required>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="Alamat" class="form-control"><?= $anggota->Alamat; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="Telepon" 
                           class="form-control" 
                           value="<?= $anggota->Telepon; ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="Email" 
                           class="form-control" 
                           value="<?= $anggota->Email; ?>">
                </div>

                <div class="form-group">
                    <label>Tanggal Daftar</label>
                    <input type="date" name="Tanggal_daftar" 
                           class="form-control" 
                           value="<?= $anggota->Tanggal_daftar; ?>">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="aktif" <?= $anggota->status == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
                        <option value="tidak aktif" <?= $anggota->status == 'tidak aktif' ? 'selected' : ''; ?>>Tidak Aktif</option>
                    </select>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="<?= site_url('anggota'); ?>" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>