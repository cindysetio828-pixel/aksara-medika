<div class="filter-card mb-4">
    <form action="<?= base_url('admin/jadwal'); ?>" method="get">
        <div class="row g-3 align-items-end">

            <div class="col-md-3">
                <label class="form-label">Tanggal Kunjungan</label>
                <input type="date" name="tanggal" class="form-control" value="<?= $tanggal_filter; ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label">Dokter</label>
                <select name="id_dokter" class="form-control">
                    <option value="">Semua Dokter</option>

                    <?php foreach ($dokter as $d) : ?>
                        <option value="<?= $d->id_dokter; ?>" <?= $dokter_filter == $d->id_dokter ? 'selected' : ''; ?>>
                            <?= $d->nama_dokter; ?> - <?= $d->spesialis; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Status</label>
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

            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn-filter">
                    <i class="fa-solid fa-filter me-1"></i>
                    Filter
                </button>

                <a href="<?= base_url('admin/jadwal'); ?>" class="btn-reset">
                    Reset
                </a>
            </div>

        </div>
    </form>
</div>

<div class="table-card">

    <?php if (empty($jadwal)) : ?>

        <div class="empty-box">
            <i class="fa-solid fa-calendar-xmark"></i>
            <h5>Jadwal Tidak Ditemukan</h5>
            <p class="mb-0">Tidak ada jadwal pasien sesuai filter yang dipilih.</p>
        </div>

    <?php else : ?>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="70">No</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Jam</th>
                        <th>Nama Pasien</th>
                        <th>No Telepon</th>
                        <th>Dokter</th>
                        <th>Spesialis</th>
                        <th>Keluhan</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; foreach ($jadwal as $j) : ?>
                        <tr>
                            <td><?= $no++; ?></td>

                            <td>
                                <strong><?= date('d-m-Y', strtotime($j->tanggal_kunjungan)); ?></strong>
                            </td>

                            <td><?= date('H:i', strtotime($j->jam_kunjungan)); ?></td>

                            <td>
                                <strong><?= $j->nama_pasien; ?></strong>
                            </td>

                            <td><?= $j->no_telepon; ?></td>

                            <td><?= $j->nama_dokter; ?></td>

                            <td><?= $j->spesialis; ?></td>

                            <td><?= $j->keluhan; ?></td>

                            <td>
                                <?php if ($j->status == 'Dalam Proses') : ?>
                                    <span class="badge-status status-proses">Dalam Proses</span>
                                <?php elseif ($j->status == 'Disetujui') : ?>
                                    <span class="badge-status status-disetujui">Disetujui</span>
                                <?php else : ?>
                                    <span class="badge-status status-ditolak">Ditolak</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    <?php endif; ?>

</div>