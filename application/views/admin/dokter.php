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
    <form action="<?= base_url('admin/dokter'); ?>" method="get">
        <div class="row g-3 align-items-end">
            <div class="col-md-5">
                <label class="form-label">Cari Dokter / Spesialis</label>
                <input 
                    type="text" 
                    name="keyword" 
                    class="form-control" 
                    placeholder="Contoh: Hana atau Anak"
                    value="<?= $keyword_filter; ?>">
            </div>

            <div class="col-md-4">
                <label class="form-label">Filter Spesialis</label>
                <select name="spesialis" class="form-control">
                    <option value="">Semua Spesialis</option>

                    <?php foreach ($list_spesialis as $s) : ?>
                        <option value="<?= $s->spesialis; ?>" <?= $spesialis_filter == $s->spesialis ? 'selected' : ''; ?>>
                            <?= $s->spesialis; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn-filter">
                    <i class="fa-solid fa-magnifying-glass me-1"></i>
                    Cari
                </button>

                <a href="<?= base_url('admin/dokter'); ?>" class="btn-reset">
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
                    <th>Nama Dokter</th>
                    <th>Spesialis</th>
                    <th width="170">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if (empty($dokter)) : ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Data dokter tidak ditemukan.
                        </td>
                    </tr>
                <?php else : ?>
                    <?php $no = 1; foreach ($dokter as $d) : ?>
                        <tr>
                            <td><?= $no++; ?></td>

                            <td>
                                <strong><?= $d->nama_dokter; ?></strong>
                            </td>

                            <td>
                                <span class="badge-spesialis">
                                    <?= $d->spesialis; ?>
                                </span>
                            </td>

                            <td>
                                <a href="<?= base_url('admin/dokter/edit/' . $d->id_dokter); ?>" class="btn-edit">
                                    <i class="fa-solid fa-pen-to-square me-1"></i>
                                    Edit
                                </a>

                                <a href="<?= base_url('admin/dokter/hapus/' . $d->id_dokter); ?>" 
                                   class="btn-delete" 
                                   onclick="return confirm('Hapus dokter ini?')">
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