<nav class="pasien-navbar">
    <div class="container d-flex justify-content-between align-items-center">

        <a href="<?= base_url('pasien/dashboard'); ?>" class="brand-pasien">
            <img src="<?= base_url('assets/img/aksara-medika-icon.png'); ?>" alt="Logo">
            <div>
                <strong>Aksara Medika</strong>
                <span>Dashboard Pasien</span>
            </div>
        </a>

        <div class="nav-menu">
            <a href="<?= base_url('pasien/dashboard'); ?>" class="<?= isset($active) && $active == 'dashboard' ? 'active' : ''; ?>">
                <i class="fa-solid fa-house me-1"></i>
                Dashboard
            </a>

            <a href="<?= base_url('pasien/daftar-berobat'); ?>" class="<?= isset($active) && $active == 'daftar' ? 'active' : ''; ?>">
                <i class="fa-solid fa-notes-medical me-1"></i>
                Daftar Berobat
            </a>

            <a href="<?= base_url('pasien/status-pendaftaran'); ?>" class="<?= isset($active) && $active == 'status' ? 'active' : ''; ?>">
                <i class="fa-solid fa-clipboard-check me-1"></i>
                Status
            </a>

            <a href="<?= base_url('pasien/logout'); ?>" class="btn-logout-pasien">
                <i class="fa-solid fa-right-from-bracket me-1"></i>
                Logout
            </a>
        </div>

    </div>
</nav>

<div class="pasien-content">
    <div class="container"
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

<?php if ($this->session->flashdata('warning')) : ?>
    <div class="alert alert-warning mb-4">
        <i class="fa-solid fa-triangle-exclamation me-1"></i>
        <?= $this->session->flashdata('warning'); ?>
    </div>
<?php endif; ?>