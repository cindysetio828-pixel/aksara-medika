<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aksara Medika | Pendaftaran Pasien Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon.ico'); ?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets/img/aksara-medika-icon.png'); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --tosca: #2FAE9B;
            --aqua: #6FD3D1;
            --blue: #4A90E2;
            --brown: #8B5E3C;
            --brown-dark: #654225;
            --cream: #FAF4EC;
            --cream-card: #FFFDF9;
            --dark: #254B5A;
            --muted: #748791;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(111, 211, 209, 0.36), transparent 32%),
                radial-gradient(circle at bottom right, rgba(139, 94, 60, 0.20), transparent 36%),
                linear-gradient(135deg, #EFFFFB, #EEF8FF 52%, #FAF4EC);
            color: var(--dark);
        }

        .navbar {
            padding: 24px 0 12px;
        }

        .brand-custom {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-custom img {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            object-fit: cover;
            background: var(--cream-card);
            padding: 5px;
            box-shadow: 0 10px 24px rgba(37, 75, 90, 0.13);
            border: 1px solid rgba(139, 94, 60, 0.16);
        }

        .brand-name {
            line-height: 1.05;
        }

        .brand-name strong {
            display: block;
            color: var(--dark);
            font-size: 23px;
            font-weight: 850;
        }

        .brand-name span {
            color: var(--brown);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .4px;
        }

        .hero {
            padding: 24px 0 35px;
        }

        .hero-card {
            background: rgba(255, 253, 249, 0.96);
            border-radius: 36px;
            padding: 50px;
            box-shadow: 0 28px 65px rgba(37, 75, 90, 0.13);
            border: 1px solid rgba(255, 255, 255, 0.88);
            position: relative;
            overflow: hidden;
        }

        .hero-card::before {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            right: -95px;
            top: -100px;
            background: rgba(47, 174, 155, 0.12);
        }

        .hero-card::after {
            content: "A";
            position: absolute;
            right: 42px;
            bottom: -75px;
            font-size: 240px;
            font-family: Georgia, serif;
            font-weight: 800;
            color: rgba(139, 94, 60, 0.07);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .badge-custom {
            background: linear-gradient(135deg, #DDF4EE, #F3E3D2);
            color: var(--brown-dark);
            padding: 12px 18px;
            border-radius: 34px;
            font-weight: 850;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 22px;
            border: 1px solid rgba(139, 94, 60, 0.14);
        }

        .badge-custom i {
            color: var(--tosca);
        }

        h1 {
            color: var(--dark);
            font-weight: 900;
            font-size: 46px;
            line-height: 1.22;
            margin-bottom: 20px;
            max-width: 760px;
        }

        .brown-word {
            color: var(--brown);
            font-family: Georgia, serif;
        }

        .hero-text {
            color: var(--muted);
            font-size: 18px;
            line-height: 1.8;
            max-width: 720px;
            margin-bottom: 28px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .btn-main {
            background: linear-gradient(135deg, var(--tosca), var(--blue));
            color: white;
            border: none;
            border-radius: 18px;
            padding: 14px 24px;
            font-weight: 850;
            box-shadow: 0 14px 26px rgba(47, 174, 155, 0.22);
            text-decoration: none;
            display: inline-block;
        }

        .btn-main:hover {
            color: white;
            opacity: .95;
            transform: translateY(-1px);
        }

        .btn-login-pasien {
            background: #FFF8F0;
            border: 2px solid var(--brown);
            color: var(--brown);
            border-radius: 18px;
            padding: 12px 24px;
            font-weight: 850;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 10px 20px rgba(139, 94, 60, 0.10);
        }

        .btn-login-pasien:hover {
            background: var(--brown);
            color: white;
            transform: translateY(-1px);
        }

        .right-visual {
            background: linear-gradient(135deg, rgba(47, 174, 155, 0.12), rgba(139, 94, 60, 0.12));
            border-radius: 30px;
            padding: 18px;
            height: 100%;
            border: 1px solid rgba(139, 94, 60, 0.12);
            box-shadow: 0 16px 35px rgba(37, 75, 90, 0.08);
        }

        .right-visual img {
            width: 100%;
            height: 100%;
            min-height: 360px;
            border-radius: 24px;
            object-fit: cover;
            display: block;
            box-shadow: 0 18px 40px rgba(37, 75, 90, 0.14);
        }

        .feature-box {
            margin-top: 38px;
        }

        .feature-item {
            background: #FFFFFF;
            border-radius: 22px;
            padding: 22px;
            height: 100%;
            border: 1px solid rgba(139, 94, 60, 0.13);
            box-shadow: 0 10px 24px rgba(37, 75, 90, 0.06);
            position: relative;
            overflow: hidden;
        }

        .feature-item::after {
            content: "";
            position: absolute;
            right: -28px;
            top: -28px;
            width: 85px;
            height: 85px;
            border-radius: 50%;
            background: rgba(216, 181, 140, 0.20);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #DDF4EE, #EEF8FF);
            color: var(--tosca);
            font-size: 22px;
            margin-bottom: 14px;
            border: 1px solid rgba(47, 174, 155, 0.12);
            position: relative;
            z-index: 2;
        }

        .feature-item h6 {
            color: var(--brown-dark);
            font-weight: 850;
            margin-bottom: 7px;
            position: relative;
            z-index: 2;
        }

        .feature-item p {
            color: var(--muted);
            margin: 0;
            font-size: 14px;
            line-height: 1.6;
            position: relative;
            z-index: 2;
        }

        .section-card {
            background: rgba(255, 253, 249, 0.96);
            border-radius: 30px;
            padding: 34px;
            box-shadow: 0 18px 42px rgba(37, 75, 90, 0.10);
            border: 1px solid rgba(255,255,255,.88);
            margin-bottom: 28px;
        }

        .section-title {
            margin-bottom: 20px;
        }

        .section-title h3 {
            font-weight: 900;
            color: var(--dark);
            margin-bottom: 6px;
        }

        .section-title p {
            color: var(--muted);
            margin: 0;
        }

        .info-card {
            background: white;
            border-radius: 22px;
            padding: 22px;
            border: 1px solid rgba(139,94,60,.12);
            height: 100%;
            box-shadow: 0 10px 24px rgba(37,75,90,.06);
        }

        .info-card h5 {
            font-weight: 850;
            color: var(--brown-dark);
            margin-bottom: 10px;
        }

        .info-card p, .info-card li {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .info-card ul {
            padding-left: 18px;
            margin-bottom: 0;
        }

        .step-card {
            background: white;
            border-radius: 22px;
            padding: 22px;
            text-align: center;
            border: 1px solid rgba(139,94,60,.12);
            height: 100%;
            box-shadow: 0 10px 24px rgba(37,75,90,.06);
        }

        .step-number {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--tosca), var(--blue));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            margin: 0 auto 14px;
            font-size: 18px;
        }

        .step-card h6 {
            font-weight: 850;
            color: var(--brown-dark);
            margin-bottom: 8px;
        }

        .step-card p {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .footer-note {
            text-align: center;
            color: var(--muted);
            font-size: 14px;
            padding-bottom: 30px;
        }

        @media (max-width: 992px) {
            .right-visual {
                margin-top: 28px;
            }

            .right-visual img {
                min-height: 280px;
            }
        }

        @media (max-width: 768px) {
            .hero-card,
            .section-card {
                padding: 28px;
            }

            h1 {
                font-size: 34px;
            }

            .hero-text {
                font-size: 16px;
            }

            .btn-main,
            .btn-login-pasien {
                width: 100%;
                text-align: center;
            }

            .brand-name strong {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="brand-custom" href="<?= base_url(); ?>">
            <img src="<?= base_url('assets/img/aksara-medika-icon.png'); ?>" alt="Aksara Medika">
            <div class="brand-name">
                <strong>Aksara Medika</strong>
                <span>Hospital Registration System</span>
            </div>
        </a>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <div class="hero-card">
            <div class="hero-content">
                <div class="row align-items-center g-4">
                    <div class="col-lg-7">
                        <span class="badge-custom">
                            <i class="fa-solid fa-file-medical"></i>
                            Pendaftaran Pasien Online
                        </span>

                        <h1>
                            Daftar berobat lebih mudah bersama
                            <span class="brown-word">Aksara</span> Medika.
                        </h1>

                        <p class="hero-text">
                            Aksara Medika membantu pasien melakukan pendaftaran berobat secara online,
                            memilih dokter spesialis, melihat jadwal kunjungan, serta memantau status
                            pendaftaran dengan lebih praktis, cepat, dan terarah.
                        </p>

                        <div class="hero-actions">
                            <a href="<?= base_url('pasien/register'); ?>" class="btn-main">
                                <i class="fa-solid fa-user-plus me-1"></i>
                                Daftar Pasien
                            </a>

                            <a href="<?= base_url('pasien/login'); ?>" class="btn-login-pasien">
                                <i class="fa-solid fa-right-to-bracket me-1"></i>
                                Login Pasien
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="right-visual">
                            <img src="<?= base_url('assets/img/rumah-sakit.png'); ?>" alt="Rumah Sakit Aksara Medika">
                        </div>
                    </div>
                </div>

                <div class="row g-3 feature-box">
                    <div class="col-md-4">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fa-solid fa-file-medical"></i>
                            </div>
                            <h6>Form Online</h6>
                            <p>Pasien dapat mengisi data pendaftaran secara digital tanpa antre lama.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fa-solid fa-user-doctor"></i>
                            </div>
                            <h6>Pilih Dokter</h6>
                            <p>Pilih dokter spesialis sesuai kebutuhan pemeriksaan dan layanan medis.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fa-solid fa-clipboard-check"></i>
                            </div>
                            <h6>Cek Status</h6>
                            <p>Status pendaftaran dapat dipantau langsung melalui akun pasien.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">

        <div class="section-card">
            <div class="section-title">
                <h3>Informasi Rumah Sakit</h3>
                <p>Layanan utama yang tersedia di Aksara Medika.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="info-card">
                        <h5><i class="fa-solid fa-stethoscope me-2"></i>Layanan Kesehatan</h5>
                        <p>
                            Tersedia pelayanan pemeriksaan umum, poli anak, poli penyakit dalam,
                            serta konsultasi kesehatan sesuai kebutuhan pasien.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-card">
                        <h5><i class="fa-solid fa-clock me-2"></i>Jam Operasional</h5>
                        <ul>
                            <li>Senin - Jumat: 08.00 - 20.00 WIB</li>
                            <li>Sabtu: 08.00 - 16.00 WIB</li>
                            <li>Minggu: Layanan terbatas</li>
                            <li>IGD: 24 Jam</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-card">
                        <h5><i class="fa-solid fa-circle-info me-2"></i>Informasi Pasien</h5>
                        <p>
                            Pasien disarankan datang minimal 15 menit sebelum jadwal kunjungan
                            dan membawa identitas diri untuk proses verifikasi data.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-card">
            <div class="section-title">
                <h3>Alur Pendaftaran Online</h3>
                <p>Langkah sederhana untuk melakukan pendaftaran berobat.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-3">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <h6>Buat Akun</h6>
                        <p>Pasien melakukan registrasi akun terlebih dahulu.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <h6>Isi Form</h6>
                        <p>Lengkapi data pendaftaran dan pilih dokter serta jadwal kunjungan.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <h6>Verifikasi Admin</h6>
                        <p>Admin akan memproses data pendaftaran pasien yang masuk.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="step-card">
                        <div class="step-number">4</div>
                        <h6>Cek Status</h6>
                        <p>Lihat hasil status pendaftaran melalui akun pasien.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>