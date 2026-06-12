<div class="status-card">

    <div class="status-header">
        <img src="<?= base_url('assets/img/aksara-medika-logo-transparan.png'); ?>" alt="Aksara Medika" class="status-logo">

        <h3>Status Pendaftaran</h3>
        <p>Lihat perkembangan pendaftaran berobat kamu di Aksara Medika.</p>
    </div>

    <div class="status-action-box">
        <a href="<?= base_url('pasien/dashboard'); ?>" class="btn-back-status">
            <i class="fa-solid fa-arrow-left me-1"></i>
            Dashboard
        </a>

        <a href="<?= base_url('pasien/daftar-berobat'); ?>" class="btn-daftar-status">
            <i class="fa-solid fa-plus me-1"></i>
            Daftar Berobat Lagi
        </a>
    </div>

    <?php if (empty($pendaftaran)) : ?>

        <div class="empty-box">
            <div class="empty-icon">
                <i class="fa-solid fa-folder-open"></i>
            </div>

            <h5>Belum Ada Pendaftaran</h5>
            <p>Kamu belum mengirim pendaftaran berobat.</p>

            <a href="<?= base_url('pasien/daftar-berobat'); ?>" class="btn-daftar-status mt-2">
                <i class="fa-solid fa-notes-medical me-1"></i>
                Daftar Sekarang
            </a>
        </div>

    <?php else : ?>

        <div class="status-table-card">
            <div class="table-responsive">
                <table class="table table-hover align-middle status-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Dokter</th>
                            <th>Spesialis</th>
                            <th>Keluhan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; foreach ($pendaftaran as $p) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>

                                <td>
                                    <strong><?= $p->nama_dokter; ?></strong>
                                </td>

                                <td>
                                    <span class="specialist-badge">
                                        <?= $p->spesialis; ?>
                                    </span>
                                </td>

                                <td class="keluhan-text">
                                    <?= $p->keluhan; ?>
                                </td>

                                <td>
                                    <?= date('d-m-Y', strtotime($p->tanggal_kunjungan)); ?>
                                </td>

                                <td>
                                    <?= date('H:i', strtotime($p->jam_kunjungan)); ?> WIB
                                </td>

                                <td>
                                    <?php if ($p->status == 'Dalam Proses') : ?>
                                        <span class="badge-status status-proses">
                                            <i class="fa-solid fa-clock me-1"></i>
                                            Dalam Proses
                                        </span>
                                    <?php elseif ($p->status == 'Disetujui') : ?>
                                        <span class="badge-status status-disetujui">
                                            <i class="fa-solid fa-circle-check me-1"></i>
                                            Disetujui
                                        </span>
                                    <?php else : ?>
                                        <span class="badge-status status-ditolak">
                                            <i class="fa-solid fa-circle-xmark me-1"></i>
                                            Ditolak
                                        </span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <?= date('d-m-Y H:i', strtotime($p->tanggal_daftar)); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php endif; ?>

</div>