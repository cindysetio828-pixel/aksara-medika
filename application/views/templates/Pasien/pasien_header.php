<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?> | Aksara Medika</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon.ico'); ?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets/img/aksara-medika-icon.png'); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        /* =========================================================
           1. WARNA UTAMA SISTEM
        ========================================================= */
        :root {
            --tosca: #2FAE9B;
            --aqua: #6FD3D1;
            --blue: #4A90E2;
            --brown: #8B5E3C;
            --brown-dark: #654225;
            --cream: #FAF4EC;
            --dark: #254B5A;
            --muted: #748791;
            --green-soft: #DDF4EE;
        }

        /* =========================================================
           2. BODY / BACKGROUND GLOBAL PASIEN
        ========================================================= */
        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            color: var(--dark);
            background:
                radial-gradient(circle at top right, rgba(111,211,209,.18), transparent 35%),
                radial-gradient(circle at bottom left, rgba(139,94,60,.16), transparent 35%),
                linear-gradient(135deg, #d9f0eb 0%, #edf8ff 55%, #f8efe6 100%);
        }

        /* =========================================================
           3. NAVBAR PASIEN
           Dipakai di: templates/pasien/pasien_navbar.php
        ========================================================= */
        .pasien-navbar {
            background: rgba(255,253,251,.96);
            box-shadow: 0 8px 24px rgba(37,75,90,.08);
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 99;
            border-bottom: 1px solid rgba(139,94,60,.10);
        }

        .brand-pasien {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--dark);
        }

        .brand-pasien img {
            width: 48px;
            height: 48px;
            border-radius: 15px;
            object-fit: cover;
            background: white;
            padding: 5px;
            box-shadow: 0 7px 16px rgba(37,75,90,.10);
        }

        .brand-pasien strong {
            display: block;
            font-size: 19px;
            font-weight: 900;
            line-height: 1.1;
        }

        .brand-pasien span {
            font-size: 12px;
            color: var(--muted);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-menu a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 800;
            padding: 10px 16px;
            border-radius: 16px;
            font-size: 14px;
            transition: .2s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            background: linear-gradient(135deg, var(--tosca), var(--blue));
            color: white;
            box-shadow: 0 10px 20px rgba(74,144,226,.18);
        }

        .btn-logout-pasien {
            background: #f8ece7 !important;
            color: #a14f38 !important;
            border: 1px solid rgba(161,79,56,.14);
        }

        .btn-logout-pasien:hover {
            background: #a16a3f !important;
            color: white !important;
        }

        /* =========================================================
           4. WRAPPER CONTENT PASIEN
           Dipakai otomatis setelah navbar
        ========================================================= */
        .pasien-content {
            padding: 34px 0;
        }

        /* =========================================================
           5. ALERT / FLASHDATA
           Dipakai di: pasien_navbar.php
           Jadi di view halaman jangan bikin alert lagi biar nggak double
        ========================================================= */
        .alert {
            border: none;
            border-radius: 15px;
            font-size: 14px;
        }

        .alert-success {
            background: #E8F8F3;
            color: #237966;
        }

        .alert-danger {
            background: #FFF0EC;
            color: #9B3E2F;
        }

        .alert-warning {
            background: #FFF3CD;
            color: #856404;
        }

        /* =========================================================
           6. DASHBOARD PASIEN
           Dipakai di: pasien/dashboard.php
        ========================================================= */
        .dashboard-hero {
            background: rgba(255,253,251,.97);
            border-radius: 34px;
            padding: 36px;
            box-shadow: 0 16px 40px rgba(37,75,90,.10);
            border: 1px solid rgba(139,94,60,.10);
            margin-bottom: 24px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            background: linear-gradient(135deg, #dff2ec, #efe3d4);
            color: #7b4d27;
            padding: 11px 20px;
            border-radius: 999px;
            font-weight: 900;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .hero-title {
            font-size: 42px;
            font-weight: 900;
            color: var(--dark);
            margin-bottom: 14px;
        }

        .hero-text {
            color: #728896;
            font-size: 17px;
            line-height: 1.8;
            margin-bottom: 22px;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .hero-image-card {
            background: linear-gradient(135deg, #dff4ee, #eef8ff, #f8eee3);
            padding: 12px;
            border-radius: 28px;
            box-shadow: 0 10px 24px rgba(37,75,90,.08);
        }

        .hero-image-card img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            border-radius: 22px;
            display: block;
        }

        .feature-card,
        .menu-card {
            background: rgba(255,253,251,.98);
            border-radius: 26px;
            padding: 24px;
            text-decoration: none;
            display: block;
            height: 100%;
            color: var(--dark);
            border: 1px solid rgba(139,94,60,.10);
            box-shadow: 0 10px 24px rgba(37,75,90,.08);
            transition: .2s;
        }

        .feature-card:hover,
        .menu-card:hover {
            transform: translateY(-4px);
            color: var(--dark);
            box-shadow: 0 14px 32px rgba(37,75,90,.10);
        }

        .non-link-card:hover {
            transform: none;
        }

        .feature-icon,
        .info-icon {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            margin-bottom: 14px;
        }

        .bg-tosca-soft {
            background: linear-gradient(135deg, #dcf5ee, #e9fbf9);
            color: var(--tosca);
        }

        .bg-blue-soft {
            background: linear-gradient(135deg, #e7f0ff, #eef8ff);
            color: var(--blue);
        }

        .bg-brown-soft {
            background: linear-gradient(135deg, #f4e5d7, #f8f1e8);
            color: var(--brown);
        }

        .bg-green-soft2 {
            background: linear-gradient(135deg, #dff4ee, #edf7ee);
            color: #379b78;
        }

        .feature-card h5,
        .menu-card h5 {
            font-weight: 900;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .feature-card p,
        .menu-card p {
            color: var(--muted);
            margin: 0;
            font-size: 14px;
            line-height: 1.7;
        }

        .info-section-card,
        .announcement-card,
        .step-card,
        .info-card {
            background: rgba(255,253,251,.98);
            border-radius: 28px;
            padding: 26px;
            box-shadow: 0 10px 28px rgba(37,75,90,.08);
            border: 1px solid rgba(139,94,60,.10);
            height: 100%;
        }

        .section-head h4 {
            font-weight: 900;
            color: var(--dark);
            margin-bottom: 6px;
        }

        .section-head p {
            color: var(--muted);
            margin-bottom: 18px;
        }

        .mini-info-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 20px;
            border: 1px solid rgba(47,174,155,.12);
            height: 100%;
        }

        .mini-info-card h6 {
            font-weight: 900;
            color: var(--brown);
            margin-bottom: 12px;
        }

        .info-list {
            padding-left: 18px;
            margin: 0;
            color: var(--muted);
        }

        .info-list li {
            margin-bottom: 8px;
            line-height: 1.6;
        }

        .announcement-item {
            padding: 14px 0;
            border-bottom: 1px dashed rgba(139,94,60,.16);
        }

        .announcement-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .announcement-item h6 {
            font-weight: 900;
            color: var(--dark);
            margin-bottom: 6px;
        }

        .announcement-item p {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .step-item {
            background: #ffffff;
            border-radius: 22px;
            padding: 22px;
            text-align: center;
            border: 1px solid rgba(74,144,226,.10);
            height: 100%;
        }

        .step-number {
            width: 46px;
            height: 46px;
            margin: 0 auto 14px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--tosca), var(--blue));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 18px;
        }

        .step-item h6 {
            font-weight: 900;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .step-item p {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

/* =========================================================
   FORM PENDAFTARAN BEROBAT MODEL CARD TENGAH
   Dipakai di: pasien/form_pendaftaran.php
========================================================= */

.form-page-center {
    padding: 10px 0 20px;
}

.main-card {
    max-width: 850px;
    width: 100%;
    margin: 0 auto;
    background: rgba(255, 253, 249, 0.98);
    border-radius: 32px;
    padding: 36px;
    box-shadow: 0 24px 60px rgba(37, 75, 90, 0.14);
    border: 1px solid rgba(139, 94, 60, 0.10);
    position: relative;
    overflow: hidden;
}

.main-card::after {
    content: "A";
    position: absolute;
    right: 34px;
    bottom: -75px;
    font-size: 220px;
    font-family: Georgia, serif;
    font-weight: 800;
    color: rgba(139, 94, 60, 0.06);
    z-index: 0;
    pointer-events: none;
}

.content {
    position: relative;
    z-index: 1;
}

.logo-box {
    text-align: center;
    margin-bottom: 26px;
}

.logo-img {
    width: 265px;
    max-width: 100%;
    background: transparent;
    box-shadow: none;
    filter: drop-shadow(0 8px 14px rgba(37, 75, 90, 0.10));
    margin-bottom: 16px;
}

.logo-box h3 {
    font-weight: 900;
    color: var(--dark);
    margin-bottom: 6px;
    font-size: 34px;
}

.logo-box p {
    color: var(--muted);
    margin: 0;
    font-size: 16px;
}

.main-card .form-label {
    font-weight: 800;
    color: var(--brown);
    font-size: 14px;
    margin-bottom: 8px;
}

.main-card .form-control,
.main-card .form-select {
    border-radius: 15px;
    border: 1px solid #DFEAED;
    padding: 13px 14px;
    background: #F8FBFF;
    font-size: 15px;
}

.main-card .form-control:focus,
.main-card .form-select:focus {
    border-color: var(--tosca);
    box-shadow: 0 0 0 0.2rem rgba(47, 174, 155, 0.14);
    background: white;
}

.main-card textarea {
    resize: none;
}

.btn-submit {
    background: linear-gradient(135deg, var(--tosca), var(--blue));
    color: white;
    border: none;
    border-radius: 16px;
    padding: 13px;
    font-weight: 850;
    box-shadow: 0 12px 24px rgba(47, 174, 155, 0.22);
}

.btn-submit:hover {
    color: white;
    opacity: 0.95;
}

.btn-back {
    border: 2px solid var(--brown);
    color: var(--brown);
    border-radius: 16px;
    padding: 11px;
    font-weight: 850;
    text-decoration: none;
    display: block;
    text-align: center;
    background: #FFF8F0;
}

.btn-back:hover {
    background: var(--brown);
    color: white;
}

@media (max-width: 768px) {
    .main-card {
        padding: 26px;
        border-radius: 26px;
    }

    .logo-img {
        width: 220px;
    }

    .logo-box h3 {
        font-size: 26px;
    }
}

/* =========================================================
   8. STATUS PENDAFTARAN / TABEL PASIEN
   Dipakai di: pasien/status_pendaftaran.php
========================================================= */

.status-card {
    max-width: 1180px;
    width: 100%;
    margin: 0 auto;
    background: rgba(255, 253, 249, 0.98);
    border-radius: 34px;
    padding: 34px;
    box-shadow: 0 24px 60px rgba(37, 75, 90, 0.13);
    border: 1px solid rgba(139, 94, 60, 0.10);
    position: relative;
    overflow: hidden;
}

.status-card::after {
    content: "A";
    position: absolute;
    right: 36px;
    bottom: -80px;
    font-size: 230px;
    font-family: Georgia, serif;
    font-weight: 900;
    color: rgba(139, 94, 60, 0.055);
    pointer-events: none;
}

.status-header {
    text-align: center;
    margin-bottom: 26px;
    position: relative;
    z-index: 2;
}

.status-logo {
    width: 250px;
    max-width: 100%;
    filter: drop-shadow(0 8px 14px rgba(37, 75, 90, 0.10));
    margin-bottom: 14px;
}

.status-header h3 {
    font-weight: 900;
    color: var(--dark);
    margin-bottom: 6px;
    font-size: 34px;
}

.status-header p {
    color: var(--muted);
    margin: 0;
    font-size: 16px;
}

.status-action-box {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 14px;
    flex-wrap: wrap;
    margin-bottom: 24px;
    position: relative;
    z-index: 2;
}

.btn-back-status {
    border: 2px solid var(--brown);
    color: var(--brown);
    border-radius: 16px;
    padding: 11px 18px;
    font-weight: 850;
    text-decoration: none;
    display: inline-block;
    text-align: center;
    background: #FFF8F0;
}

.btn-back-status:hover {
    background: var(--brown);
    color: white;
}

.btn-daftar-status {
    background: linear-gradient(135deg, var(--tosca), var(--blue));
    color: white;
    border: none;
    border-radius: 16px;
    padding: 13px 20px;
    font-weight: 850;
    text-decoration: none;
    display: inline-block;
    box-shadow: 0 12px 24px rgba(47, 174, 155, 0.20);
}

.btn-daftar-status:hover {
    color: white;
    opacity: 0.95;
}

.status-table-card {
    background: #ffffff;
    border-radius: 26px;
    padding: 18px;
    box-shadow: 0 12px 30px rgba(37, 75, 90, 0.08);
    border: 1px solid rgba(47, 174, 155, 0.12);
    position: relative;
    z-index: 2;
}

.status-table {
    margin-bottom: 0;
    overflow: hidden;
    border-radius: 18px;
}

.status-table thead {
    background: linear-gradient(135deg, var(--tosca), var(--blue));
    color: white;
}

.status-table thead th {
    border: none;
    padding: 15px 14px;
    font-size: 14px;
    white-space: nowrap;
    text-align: center;
}

.status-table tbody td {
    padding: 15px 14px;
    color: var(--dark);
    font-size: 14px;
    border-color: #E8EFF2;
    vertical-align: middle;
}

.status-table tbody tr:hover {
    background: #F8FCFF;
}

.keluhan-text {
    max-width: 230px;
    line-height: 1.5;
    color: var(--muted) !important;
}

.specialist-badge {
    background: #EEF8FF;
    color: var(--blue);
    border: 1px solid rgba(74, 144, 226, 0.14);
    padding: 7px 10px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 800;
    white-space: nowrap;
}

.badge-status {
    padding: 8px 11px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 800;
    display: inline-block;
    white-space: nowrap;
}

.status-proses {
    background: #FFF3CD;
    color: #856404;
}

.status-disetujui {
    background: #DDF4EE;
    color: #237966;
}

.status-ditolak {
    background: #FFE1DE;
    color: #9B3E2F;
}

.empty-box {
    background: #ffffff;
    border: 1px dashed rgba(47, 174, 155, 0.28);
    border-radius: 26px;
    padding: 38px 24px;
    text-align: center;
    position: relative;
    z-index: 2;
}

.empty-icon {
    width: 76px;
    height: 76px;
    border-radius: 24px;
    background: linear-gradient(135deg, #E8F8F3, #EEF8FF);
    color: var(--tosca);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 34px;
    margin: 0 auto 16px;
}

.empty-box h5 {
    font-weight: 900;
    color: var(--dark);
    margin-bottom: 8px;
}

.empty-box p {
    color: var(--muted);
    margin-bottom: 16px;
}

@media (max-width: 768px) {
    .status-card {
        padding: 26px;
        border-radius: 26px;
    }

    .status-logo {
        width: 220px;
    }

    .status-header h3 {
        font-size: 27px;
    }

    .status-action-box {
        display: block;
    }

    .btn-back-status,
    .btn-daftar-status {
        width: 100%;
        margin-bottom: 10px;
    }

    .status-table-card {
        padding: 12px;
    }
}

        /* =========================================================
           9. FOOTER PASIEN
           Dipakai di: templates/pasien/pasien_footer.php
        ========================================================= */
        .hospital-footer {
            background:
                linear-gradient(135deg, rgba(37, 75, 90, 0.98), rgba(47, 174, 155, 0.95)),
                linear-gradient(45deg, var(--brown), transparent);
            color: white;
            margin-top: 42px;
            padding: 55px 0 0;
            border-radius: 36px 36px 0 0;
            position: relative;
            overflow: hidden;
        }

        .hospital-footer::after {
            content: "A";
            position: absolute;
            right: 55px;
            bottom: -70px;
            font-size: 240px;
            font-family: Georgia, serif;
            font-weight: 900;
            color: rgba(255, 255, 255, 0.06);
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 18px;
            position: relative;
            z-index: 2;
        }

        .footer-brand img {
            width: 62px;
            height: 62px;
            border-radius: 18px;
            object-fit: cover;
            background: #fffdf9;
            padding: 6px;
        }

        .footer-brand h4 {
            margin: 0;
            font-weight: 900;
            color: #ffffff;
        }

        .footer-brand span {
            font-size: 13px;
            color: rgba(255,255,255,.78);
            font-weight: 600;
        }

        .footer-desc {
            color: rgba(255,255,255,.78);
            line-height: 1.8;
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
        }

        .footer-title {
            font-weight: 900;
            margin-bottom: 18px;
            color: #ffffff;
            position: relative;
            z-index: 2;
        }

        .footer-list {
            list-style: none;
            padding: 0;
            margin: 0;
            position: relative;
            z-index: 2;
        }

        .footer-list li {
            margin-bottom: 12px;
            color: rgba(255,255,255,.82);
            line-height: 1.6;
            display: flex;
            gap: 10px;
        }

        .footer-list i {
            color: #D8B58C;
            margin-top: 4px;
            min-width: 18px;
        }

        .emergency-box {
            background: rgba(255, 253, 249, 0.12);
            border: 1px solid rgba(255,255,255,.18);
            border-radius: 22px;
            padding: 18px;
            margin-top: 18px;
            position: relative;
            z-index: 2;
        }

        .emergency-box h6 {
            font-weight: 900;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .emergency-box p {
            margin: 0;
            color: rgba(255,255,255,.82);
            line-height: 1.6;
            font-size: 14px;
        }

        .social-box {
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            z-index: 2;
        }

        .social-link {
            width: 44px;
            height: 44px;
            border-radius: 15px;
            background: rgba(255, 253, 249, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.22);
            color: #ffffff !important;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none !important;
            transition: .2s;
        }

        .social-link i {
            color: #ffffff !important;
            font-size: 20px;
            margin: 0;
        }

        .social-link:hover {
            background: #D8B58C;
            color: #254B5A !important;
            transform: translateY(-2px);
        }

        .social-link:hover i {
            color: #254B5A !important;
        }

        .social-note {
            color: rgba(255,255,255,.78);
            font-size: 14px;
            line-height: 1.7;
            margin-top: 14px;
            margin-bottom: 0;
            position: relative;
            z-index: 2;
        }

        .footer-bottom {
            margin-top: 38px;
            padding: 18px 0;
            border-top: 1px solid rgba(255,255,255,.16);
            color: rgba(255,255,255,.76);
            font-size: 14px;
            position: relative;
            z-index: 2;
        }

        /* =========================================================
           10. RESPONSIVE
        ========================================================= */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 34px;
            }

            .hero-image-card img {
                height: 260px;
            }
        }

        @media (max-width: 768px) {
            .nav-menu {
                margin-top: 14px;
                flex-wrap: wrap;
            }

            .pasien-navbar .container {
                flex-direction: column;
                align-items: flex-start !important;
            }

            .dashboard-hero {
                padding: 24px;
            }

            .hero-title {
                font-size: 28px;
            }

            .hero-text {
                font-size: 15px;
            }

            .main-card {
                padding: 28px;
            }

            .hospital-footer {
                border-radius: 26px 26px 0 0;
                padding-top: 38px;
            }

            .footer-bottom {
                text-align: center;
            }

            .social-box {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>