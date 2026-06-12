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

<div class="welcome-box">
    <h4>Sistem Pendaftaran Pasien Online</h4>
    <p>
        Aksara Medika membantu admin rumah sakit memantau pendaftaran pasien,
        mengelola data pasien, menentukan status pendaftaran, dan melihat laporan secara lebih terstruktur.
    </p>
</div>

<h5 class="section-title">Akses Cepat</h5>

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