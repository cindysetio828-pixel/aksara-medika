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
    <form action="<?= base_url('admin/pendaftaran'); ?>" method="get">
        <div class="row g-3 align-items-end">
            <div class="col-md-8">
                <label class="form-label">Filter Status Pendaftaran</label>
                <select name="status" class="form-control">
                    <option value="">Semua Status</option>
                    <option value="Dalam Proses" <?= $status_filter == 'Dalam Proses' ? 'selected' : ''; ?>>
                        Dalam Proses
                    </option>
                    <option value="Disetujui" <?= $status_filter == 'Disetujui' ? 'selected' : ''; ?>>
                        Disetujui
                    </option>
                    <option value="Ditolak" <?= $status_filter == 'Ditolak' ? 'selected' : ''; ?>>
                        Ditolak
                    </option>
                </select>
            </div>

            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn-filter">
                    <i class="fa-solid fa-filter me-1"></i>
                    Filter
                </button>

                <a href="<?= base_url('admin/pendaftaran'); ?>" class="btn-reset">
                    Reset
                </a>
            </div>
        </div>
    </form>
</div>

<div class="table-card">

    <?php if (empty($pendaftaran)) : ?>

        <div class="empty-box">
            <i class="fa-solid fa-folder-open"></i>
            <h5>Data Tidak Ditemukan</h5>
            <p class="mb-0">Tidak ada data pendaftaran dengan status tersebut.</p>
        </div>

    <?php else : ?>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pasien</th>
                        <th>No Telepon</th>
                        <th>Dokter</th>
                        <th>Spesialis</th>
                        <th>Keluhan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Status</th>
                        <th>Tanggal Daftar</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; foreach ($pendaftaran as $p) : ?>
                        <tr>
                            <td><?= $no++; ?></td>

                            <td>
                                <strong><?= $p->nama_pasien; ?></strong><br>
                                <small><?= date('d-m-Y', strtotime($p->tanggal_lahir)); ?></small>
                            </td>

                            <td><?= $p->no_telepon; ?></td>
                            <td><?= $p->nama_dokter; ?></td>
                            <td><?= $p->spesialis; ?></td>
                            <td><?= $p->keluhan; ?></td>
                            <td><?= date('d-m-Y', strtotime($p->tanggal_kunjungan)); ?></td>
                            <td><?= date('H:i', strtotime($p->jam_kunjungan)); ?></td>

                            <td>
                                <?php if ($p->status == 'Dalam Proses') : ?>
                                    <span class="badge-status status-proses">Dalam Proses</span>
                                <?php elseif ($p->status == 'Disetujui') : ?>
                                    <span class="badge-status status-disetujui">Disetujui</span>
                                <?php else : ?>
                                    <span class="badge-status status-ditolak">Ditolak</span>
                                <?php endif; ?>
                            </td>

                            <td><?= date('d-m-Y H:i', strtotime($p->tanggal_daftar)); ?></td>

                            <td>
                                <?php if ($p->status == 'Dalam Proses') : ?>

                                    <a href="<?= base_url('admin/pendaftaran/setujui/' . $p->id_pendaftaran); ?>"
                                       class="btn-setujui"
                                       onclick="return confirm('Setujui pendaftaran pasien ini?')">
                                        <i class="fa-solid fa-check me-1"></i>
                                        Setujui
                                    </a>

                                    <a href="<?= base_url('admin/pendaftaran/tolak/' . $p->id_pendaftaran); ?>"
                                       class="btn-tolak"
                                       onclick="return confirm('Tolak pendaftaran pasien ini?')">
                                        <i class="fa-solid fa-xmark me-1"></i>
                                        Tolak
                                    </a>

                                <?php else : ?>

                                    <small class="text-muted">Sudah diproses</small>

                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    <?php endif; ?>

</div>