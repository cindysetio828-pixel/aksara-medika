<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success mb-4">
        <i class="fa-solid fa-circle-check me-1"></i>
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger mb-4">
        <i class="fa-solid fa-circle-exclamation me-1"></i>
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<div class="filter-card mb-4">
    <form action="<?= base_url('admin/pasien'); ?>" method="get">
        <div class="row g-3 align-items-end">

            <div class="col-md-9">
                <label class="form-label">Cari Pasien</label>
                <input 
                    type="text" 
                    name="keyword" 
                    class="form-control" 
                    placeholder="Cari berdasarkan nama pasien, no telepon, atau username"
                    value="<?= $keyword_filter; ?>">
            </div>

            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn-filter">
                    <i class="fa-solid fa-magnifying-glass me-1"></i>
                    Cari
                </button>

                <a href="<?= base_url('admin/pasien'); ?>" class="btn-reset">
                    Reset
                </a>
            </div>

        </div>
    </form>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th width="70">No</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Lahir</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Username</th>
                    <th>Last Login</th>
                    <th width="170">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if (empty($pasien)) : ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted">
                            Data pasien tidak ditemukan.
                        </td>
                    </tr>
                <?php else : ?>
                    <?php $no = 1; foreach ($pasien as $p) : ?>
                        <tr>
                            <td><?= $no++; ?></td>

                            <td>
                                <strong><?= $p->nama_pasien; ?></strong>
                            </td>

                            <td>
                                <?= date('d-m-Y', strtotime($p->tanggal_lahir)); ?>
                            </td>

                            <td><?= $p->no_telepon; ?></td>

                            <td><?= $p->alamat; ?></td>

                            <td>
                                <span class="badge-username">
                                    <?= $p->username; ?>
                                </span>
                            </td>

                            <td>
                                <?= $p->last_login ? date('d-m-Y H:i', strtotime($p->last_login)) : '-'; ?>
                            </td>

                            <td>
                                <a href="<?= base_url('admin/pasien/edit/' . $p->id_pasien); ?>" class="btn-edit">
                                    <i class="fa-solid fa-pen-to-square me-1"></i>
                                    Edit
                                </a>

                                <a href="<?= base_url('admin/pasien/hapus/' . $p->id_pasien); ?>" 
                                   class="btn-delete" 
                                   onclick="return confirm('Hapus pasien ini? Semua pendaftaran pasien ini juga akan terhapus.')">
                                    <i class="fa-solid fa-trash me-1"></i>
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>

        </table>
    </div>
</div>