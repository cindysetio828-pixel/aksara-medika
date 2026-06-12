<?php
$query = http_build_query([
    'tgl_awal' => $tgl_awal,
    'tgl_akhir' => $tgl_akhir
]);
?>

<div class="report-filter-card mb-4">
    <form action="<?= base_url('admin/laporan'); ?>" method="get">
        <div class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">Tanggal Awal</label>
                <input type="date" name="tgl_awal" class="form-control" value="<?= $tgl_awal; ?>">
            </div>

            <div class="col-md-4">
                <label class="form-label">Tanggal Akhir</label>
                <input type="date" name="tgl_akhir" class="form-control" value="<?= $tgl_akhir; ?>">
            </div>

            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn-filter">
                    <i class="fa-solid fa-filter me-1"></i>
                    Filter
                </button>

                <a href="<?= base_url('admin/laporan'); ?>" class="btn-reset">
                    Reset
                </a>
            </div>
        </div>
    </form>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="report-stat-card">
            <h6>Total Pendaftaran</h6>
            <h2><?= $total_pendaftaran; ?></h2>
            <small>Semua data pendaftaran</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="report-stat-card">
            <h6>Dalam Proses</h6>
            <h2><?= $total_proses; ?></h2>
            <small>Menunggu konfirmasi</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="report-stat-card">
            <h6>Disetujui</h6>
            <h2><?= $total_disetujui; ?></h2>
            <small>Pendaftaran diterima</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="report-stat-card">
            <h6>Ditolak</h6>
            <h2><?= $total_ditolak; ?></h2>
            <small>Pendaftaran ditolak</small>
        </div>
    </div>
</div>

<div class="table-card">

    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <div>
            <h5 class="mb-1 fw-bold">Data Laporan Pendaftaran</h5>
            <small class="text-muted">Data dapat diekspor ke CSV atau dicetak menjadi PDF.</small>
        </div>

        <div class="d-flex gap-2">
            <a href="<?= base_url('admin/laporan/csv') . '?' . $query; ?>" class="btn-export-csv">
                <i class="fa-solid fa-file-csv me-1"></i>
                Export CSV
            </a>

            <a href="<?= base_url('admin/laporan/pdf') . '?' . $query; ?>" target="_blank" class="btn-export-pdf">
                <i class="fa-solid fa-file-pdf me-1"></i>
                Export PDF
            </a>
        </div>
    </div>

    <?php if (empty($laporan)) : ?>

        <div class="empty-box">
            <i class="fa-solid fa-folder-open"></i>
            <h5>Data Laporan Kosong</h5>
            <p class="mb-0">Belum ada data pendaftaran pada periode ini.</p>
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
                        <th>Tanggal Kunjungan</th>
                        <th>Jam</th>
                        <th>Status</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; foreach ($laporan as $l) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <strong><?= $l->nama_pasien; ?></strong>
                            </td>
                            <td><?= $l->no_telepon; ?></td>
                            <td><?= $l->nama_dokter; ?></td>
                            <td><?= $l->spesialis; ?></td>
                            <td><?= $l->keluhan; ?></td>
                            <td><?= date('d-m-Y', strtotime($l->tanggal_kunjungan)); ?></td>
                            <td><?= date('H:i', strtotime($l->jam_kunjungan)); ?></td>
                            <td>
                                <?php if ($l->status == 'Dalam Proses') : ?>
                                    <span class="badge-status status-proses">Dalam Proses</span>
                                <?php elseif ($l->status == 'Disetujui') : ?>
                                    <span class="badge-status status-disetujui">Disetujui</span>
                                <?php else : ?>
                                    <span class="badge-status status-ditolak">Ditolak</span>
                                <?php endif; ?>
                            </td>
                            <td><?= date('d-m-Y H:i', strtotime($l->tanggal_daftar)); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    <?php endif; ?>

</div>