<div class="sidebar">
    <div class="brand">
        <img src="<?= base_url('assets/img/aksara-medika-icon.png'); ?>" class="brand-logo" alt="Logo">
        <div class="brand-text">
            <h4>Aksara Medika</h4>
            <small>Admin Panel</small>
        </div>
    </div>

    <a href="<?= base_url('dashboard'); ?>" class="<?= $active == 'dashboard' ? 'active' : ''; ?>">
        <i class="fa-solid fa-chart-line"></i> Dashboard
    </a>

    <a href="<?= base_url('admin/pasien'); ?>" class="<?= $active == 'pasien' ? 'active' : ''; ?>">
        <i class="fa-solid fa-user-injured"></i> Data Pasien
    </a>

    <a href="<?= base_url('admin/dokter'); ?>" class="<?= $active == 'dokter' ? 'active' : ''; ?>">
        <i class="fa-solid fa-user-doctor"></i> Data Dokter
    </a>

    <a href="<?= base_url('admin/pendaftaran'); ?>" class="<?= $active == 'pendaftaran' ? 'active' : ''; ?>">
        <i class="fa-solid fa-clipboard-list"></i> Pendaftaran
    </a>

    <a href="<?= base_url('admin/jadwal'); ?>" class="<?= $active == 'jadwal' ? 'active' : ''; ?>">
        <i class="fa-solid fa-calendar-days"></i> Jadwal Pasien
    </a>

    <a href="<?= base_url('admin/laporan'); ?>" class="<?= $active == 'laporan' ? 'active' : ''; ?>">
        <i class="fa-solid fa-file-lines"></i> Laporan
    </a>

    <a href="<?= base_url('logout'); ?>" class="logout-link">
        <i class="fa-solid fa-right-from-bracket"></i> Logout
    </a>
</div>