<div class="dashboard-hero">
    <div class="row align-items-center g-4">

        <div class="col-lg-7">
            <div class="hero-badge">
                <i class="fa-solid fa-hospital me-2"></i>
                Layanan Pasien Online
            </div>

            <h1 class="hero-title">
                Halo, <?= $this->session->userdata('nama_pasien'); ?> 
            </h1>

            <p class="hero-text">
                Selamat datang di Dashboard Pasien <strong>Aksara Medika</strong>.
                Kini pendaftaran berobat jadi lebih mudah, cepat, dan praktis.
                Kamu bisa mendaftar online, memilih dokter, melihat jadwal kunjungan,
                dan memantau status pendaftaran langsung dari dashboard ini.
            </p>

            <div class="hero-buttons">
                <a href="<?= base_url('pasien/daftar-berobat'); ?>" class="btn-main">
                    <i class="fa-solid fa-notes-medical me-1"></i>
                    Daftar Berobat
                </a>

                <a href="<?= base_url('pasien/status-pendaftaran'); ?>" class="btn-soft-brown">
                    <i class="fa-solid fa-clipboard-check me-1"></i>
                    Lihat Status
                </a>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="hero-image-card">
                <img src="<?= base_url('assets/img/rumah-sakit.png'); ?>" alt="Rumah Sakit Aksara Medika">
            </div>
        </div>

    </div>
</div>

<div class="row g-4 mt-1">

    <div class="col-md-6 col-lg-3">
        <a href="<?= base_url('pasien/daftar-berobat'); ?>" class="feature-card">
            <div class="feature-icon bg-tosca-soft">
                <i class="fa-solid fa-file-medical"></i>
            </div>
            <h5>Pendaftaran Online</h5>
            <p>Daftar berobat tanpa harus datang langsung ke rumah sakit.</p>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="<?= base_url('pasien/status-pendaftaran'); ?>" class="feature-card">
            <div class="feature-icon bg-blue-soft">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <h5>Cek Status</h5>
            <p>Pantau apakah pendaftaran kamu masih diproses, disetujui, atau ditolak.</p>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="feature-card non-link-card">
            <div class="feature-icon bg-brown-soft">
                <i class="fa-solid fa-user-doctor"></i>
            </div>
            <h5>Dokter Spesialis</h5>
            <p>Tersedia layanan dokter umum dan dokter spesialis sesuai kebutuhan pasien.</p>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="feature-card non-link-card">
            <div class="feature-icon bg-green-soft2">
                <i class="fa-solid fa-calendar-check"></i>
            </div>
            <h5>Jadwal Fleksibel</h5>
            <p>Pilih tanggal dan jam kunjungan yang sesuai dengan kebutuhanmu.</p>
        </div>
    </div>

</div>

<div class="row g-4 mt-1">

    <div class="col-lg-8">
        <div class="info-section-card">
            <div class="section-head">
                <h4><i class="fa-solid fa-circle-info me-2"></i>Informasi Rumah Sakit</h4>
                <p>Beberapa informasi penting untuk pasien Aksara Medika.</p>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mini-info-card">
                        <h6><i class="fa-solid fa-clock me-2"></i>Jam Operasional</h6>
                        <ul class="info-list">
                            <li>Senin - Jumat: 08.00 - 20.00 WIB</li>
                            <li>Sabtu: 08.00 - 16.00 WIB</li>
                            <li>Minggu: Layanan terbatas</li>
                            <li>IGD: 24 Jam</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mini-info-card">
                        <h6><i class="fa-solid fa-stethoscope me-2"></i>Layanan Unggulan</h6>
                        <ul class="info-list">
                            <li>Pemeriksaan Umum</li>
                            <li>Poli Anak</li>
                            <li>Poli Penyakit Dalam</li>
                            <li>Konsultasi Kesehatan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="announcement-card">
            <div class="section-head">
                <h4><i class="fa-solid fa-bullhorn me-2"></i>Info Pasien</h4>
                <p>Pengumuman dan informasi terbaru.</p>
            </div>

            <div class="announcement-item">
                <h6>Pendaftaran Online Lebih Mudah</h6>
                <p>Pasien dapat melakukan pendaftaran berobat secara online melalui dashboard pasien.</p>
            </div>

            <div class="announcement-item">
                <h6>Datang Tepat Waktu</h6>
                <p>Mohon hadir minimal 15 menit sebelum jadwal kunjungan yang dipilih.</p>
            </div>

            <div class="announcement-item">
                <h6>Bawa Identitas Diri</h6>
                <p>Pastikan membawa identitas saat datang untuk proses verifikasi data pasien.</p>
            </div>
        </div>
    </div>

</div>

<div class="row g-4 mt-1">

    <div class="col-lg-12">
        <div class="step-card">
            <div class="section-head">
                <h4><i class="fa-solid fa-list-check me-2"></i>Alur Pendaftaran Pasien</h4>
                <p>Ikuti langkah berikut agar proses pendaftaran berjalan lancar.</p>
            </div>

            <div class="row g-3">
                <div class="col-md-3">
                    <div class="step-item">
                        <div class="step-number">1</div>
                        <h6>Isi Form</h6>
                        <p>Pilih dokter, tanggal kunjungan, jam, dan isi keluhan pasien.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="step-item">
                        <div class="step-number">2</div>
                        <h6>Kirim Pendaftaran</h6>
                        <p>Data pendaftaran akan masuk ke sistem admin rumah sakit.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="step-item">
                        <div class="step-number">3</div>
                        <h6>Tunggu Verifikasi</h6>
                        <p>Admin akan memproses pendaftaran pasien sesuai jadwal dan dokter.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="step-item">
                        <div class="step-number">4</div>
                        <h6>Cek Status</h6>
                        <p>Pasien dapat melihat hasil status pendaftaran pada menu status.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>