<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Perpustakaan</div>
</a>
<hr class="sidebar-divider my-0">

<li class="nav-item active">
    <a class="nav-link" href="<?= site_url('dashboard'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
</a>
</li>

<hr class="sidebar-divider my-0">

<li class="nav-item">
    <a class="nav-link" href="<?= site_url('kategori'); ?>">
        <i class="fas fa-box"></i>
        <span>Kategori</span>
</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= site_url('buku'); ?>">
        <i class="fas fa-book"></i>
        <span>Buku</span>
</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= site_url('anggota'); ?>">
        <i class="fas fa-user"></i>
        <span>Anggota</span>
</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= site_url('peminjaman'); ?>">
        <i class="fas fa-book-reader"></i>
        <span>Peminjaman</span>
</a>
</li>

<li class="nav-item">

    <a class="nav-link collapsed" href="#"
        data-toggle="collapse"
        data-target="#collapseLaporan"
        aria-expanded="true"
        aria-controls="collapseLaporan">

        <i class="fas fa-file-alt"></i>
        <span>Laporan</span>
    </a>

    <div id="collapseLaporan" class="collapse">
        <div class="bg-white py-2 collapse-inner rounded">

            <a class="collapse-item"
                href="<?= site_url('laporan/peminjaman'); ?>">
                Laporan Peminjaman
            </a>

            <a class="collapse-item"
                href="<?= site_url('laporan/buku'); ?>">
                Laporan Buku
            </a>

            <a class="collapse-item"
                href="<?= site_url('laporan/kategori'); ?>">
                Laporan Kategori
            </a>

            <a class="collapse-item"
                href="<?= site_url('laporan/anggota'); ?>">
                Laporan Anggota
            </a>

        </div>
    </div>

</li>

<hr class="sidebar-divider d-none d-md-block">

</ul>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
