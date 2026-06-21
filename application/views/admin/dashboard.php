<div class="row g-4">

    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-user-injured"></i>
            </div>
            <h5>Total Pasien</h5>
            <h2><?= $total_pasien; ?></h2>
            <small>Pasien yang sudah terdaftar</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-user-doctor"></i>
            </div>
            <h5>Total Dokter</h5>
            <h2><?= $total_dokter; ?></h2>
            <small>Dokter spesialis tersedia</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-clipboard-list"></i>
            </div>
            <h5>Total Pendaftaran</h5>
            <h2><?= $total_pendaftaran; ?></h2>
            <small>Seluruh data pendaftaran</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-clock"></i>
            </div>
            <h5>Dalam Proses</h5>
            <h2><?= $total_proses; ?></h2>
            <small>Menunggu konfirmasi admin</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <h5>Disetujui</h5>
            <h2><?= $total_disetujui; ?></h2>
            <small>Pendaftaran diterima</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-circle-xmark"></i>
            </div>
            <h5>Ditolak</h5>
            <h2><?= $total_ditolak; ?></h2>
            <small>Pendaftaran tidak diterima</small>
        </div>
    </div>

</div>


<div class="welcome-box mt-4">
    <h4>Sistem Pendaftaran Pasien Online</h4>
    <p>
        Aksara Medika membantu admin rumah sakit memantau pendaftaran pasien,
        mengelola data pasien, menentukan status pendaftaran, dan melihat laporan secara lebih terstruktur.
    </p>
</div>


<div class="row g-4 mt-2">

    <!-- TABEL PENDAFTARAN TERBARU -->
    <div class="col-lg-8">
        <div class="dashboard-panel">
            <div class="panel-head">
                <h4>Pendaftaran Terbaru</h4>
                <p>5 data pendaftaran pasien terbaru.</p>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle dashboard-table mb-0">
                    <thead>
                        <tr>
                            <th>Pasien</th>
                            <th>Dokter</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($pendaftaran_terbaru)) : ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada data pendaftaran.</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($pendaftaran_terbaru as $p) : ?>
                                <tr>
                                    <td><?= $p->nama_pasien; ?></td>
                                    <td><?= $p->nama_dokter; ?></td>
                                    <td>
                                        <?php if ($p->status == 'Dalam Proses') : ?>
                                            <span class="badge-status status-proses">Dalam Proses</span>
                                        <?php elseif ($p->status == 'Disetujui') : ?>
                                            <span class="badge-status status-disetujui">Disetujui</span>
                                        <?php else : ?>
                                            <span class="badge-status status-ditolak">Ditolak</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- CHART STATUS -->
    <div class="col-lg-4">
        <div class="dashboard-panel">
            <div class="panel-head">
                <h4>Statistik Status</h4>
                <p>Perbandingan status pendaftaran pasien.</p>
            </div>

            <canvas id="statusChart" height="240"></canvas>
        </div>
    </div>

</div>


<h5 class="section-title mt-4">Akses Cepat</h5>

<div class="row g-4">

    <div class="col-md-4">
        <a href="<?= base_url('admin/pasien'); ?>" class="quick-card">
            <h6>
                <i class="fa-solid fa-user-injured"></i>
                Data Pasien
            </h6>
            <p>Kelola data pasien yang sudah terdaftar dalam sistem.</p>
        </a>
    </div>

    <div class="col-md-4">
        <a href="<?= base_url('admin/pendaftaran'); ?>" class="quick-card">
            <h6>
                <i class="fa-solid fa-clipboard-check"></i>
                Verifikasi Pendaftaran
            </h6>
            <p>Setujui atau tolak data pendaftaran pasien online.</p>
        </a>
    </div>

    <div class="col-md-4">
        <a href="<?= base_url('admin/laporan'); ?>" class="quick-card">
            <h6>
                <i class="fa-solid fa-file-export"></i>
                Laporan
            </h6>
            <p>Lihat jumlah pasien diterima, ditolak, dan total pendaftaran.</p>
        </a>
    </div>

</div>


<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('statusChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Dalam Proses', 'Disetujui', 'Ditolak'],
            datasets: [{
                label: 'Jumlah Pendaftaran',
                data: [
                    <?= $total_proses; ?>,
                    <?= $total_disetujui; ?>,
                    <?= $total_ditolak; ?>
                ],
                backgroundColor: [
                    '#F2C14E',
                    '#2FAE9B',
                    '#D96C75'
                ],
                borderRadius: 12,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    },
                    grid: {
                        color: 'rgba(0,0,0,0.06)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>