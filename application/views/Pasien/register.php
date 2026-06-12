<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Pasien | Aksara Medika</title>
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
            --brown-soft: #D8B58C;
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
                radial-gradient(circle at top left, rgba(111, 211, 209, 0.42), transparent 34%),
                radial-gradient(circle at bottom right, rgba(139, 94, 60, 0.24), transparent 35%),
                linear-gradient(135deg, #F4FFFC, #EEF8FF 55%, #FAF4EC);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 28px;
        }

        .register-card {
            width: 100%;
            max-width: 900px;
            background: rgba(255, 253, 249, 0.98);
            border-radius: 32px;
            padding: 38px;
            box-shadow: 0 24px 60px rgba(37, 75, 90, 0.14);
            border: 1px solid rgba(139, 94, 60, 0.10);
            position: relative;
            overflow: hidden;
        }

        .register-card::before {
            content: "";
            position: absolute;
            width: 190px;
            height: 190px;
            right: -70px;
            top: -70px;
            border-radius: 50%;
            background: rgba(47, 174, 155, 0.12);
        }

        .register-card::after {
            content: "A";
            position: absolute;
            right: 38px;
            bottom: -80px;
            font-size: 230px;
            font-family: Georgia, serif;
            font-weight: 800;
            color: rgba(139, 94, 60, 0.06);
            z-index: 0;
        }

        .register-content {
            position: relative;
            z-index: 1;
        }

        .logo-box {
            text-align: center;
            margin-bottom: 26px;
        }

        .logo-img {
            width: 280px;
            max-width: 100%;
            background: transparent;
            padding: 0;
            border-radius: 0;
            box-shadow: none;
            margin-bottom: 18px;
            filter: drop-shadow(0 8px 14px rgba(37, 75, 90, 0.10));
        }

        .logo-box h3 {
            font-weight: 900;
            color: var(--dark);
            margin-bottom: 6px;
        }

        .logo-box p {
            color: var(--muted);
            margin: 0;
            font-size: 15px;
        }

        .step-wrapper {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 28px;
        }

        .step-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 17px;
            border-radius: 30px;
            font-weight: 800;
            font-size: 14px;
            background: #EEF8FF;
            color: var(--muted);
            border: 1px solid rgba(47, 174, 155, 0.12);
            transition: 0.2s;
        }

        .step-item.active {
            background: linear-gradient(135deg, #DDF4EE, #F4E4D3);
            color: var(--brown-dark);
            border-color: rgba(139, 94, 60, 0.18);
            box-shadow: 0 8px 18px rgba(139, 94, 60, 0.08);
        }

        .step-item i {
            color: var(--tosca);
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        .form-label {
            font-weight: 750;
            color: var(--brown);
            font-size: 14px;
        }

        .form-control {
            border-radius: 15px;
            border: 1px solid #DFEAED;
            padding: 13px 14px;
            background: #F8FBFF;
            color: var(--dark);
        }

        .form-control:focus {
            border-color: var(--tosca);
            box-shadow: 0 0 0 0.2rem rgba(47, 174, 155, 0.14);
            background: white;
        }

        textarea.form-control {
            resize: none;
        }

        .btn-next,
        .btn-register {
            background: linear-gradient(135deg, var(--tosca), var(--blue));
            color: white;
            border: none;
            border-radius: 16px;
            padding: 13px;
            font-weight: 850;
            box-shadow: 0 12px 24px rgba(47, 174, 155, 0.22);
        }

        .btn-next:hover,
        .btn-register:hover {
            color: white;
            opacity: 0.95;
            transform: translateY(-1px);
        }

        .btn-back,
        .btn-prev {
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

        .btn-back:hover,
        .btn-prev:hover {
            background: var(--brown);
            color: white;
        }

        .alert {
            border: none;
            border-radius: 15px;
            font-size: 14px;
        }

        .alert-danger {
            background: #FFF0EC;
            color: #9B3E2F;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: var(--muted);
            font-size: 14px;
        }

        .login-link a {
            color: var(--brown);
            font-weight: 850;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            body {
                padding: 18px;
            }

            .register-card {
                padding: 28px;
                border-radius: 26px;
            }

            .step-wrapper {
                flex-direction: column;
            }

            .step-item {
                justify-content: center;
            }

            .logo-img {
                width: 225px;
            }
        }
    </style>
</head>

<body>

<div class="register-card">
    <div class="register-content">

        <div class="logo-box">
            <img src="<?= base_url('assets/img/aksara-medika-logo-transparan.png'); ?>" alt="Logo Aksara Medika" class="logo-img">
            <h3>Registrasi Pasien</h3>
            <p>Buat akun pasien untuk melakukan pendaftaran berobat online.</p>
        </div>

        <div class="step-wrapper">
            <div class="step-item active" id="stepLabel1">
                <i class="fa-solid fa-user-injured"></i>
                Data Diri
            </div>

            <div class="step-item" id="stepLabel2">
                <i class="fa-solid fa-lock"></i>
                Akun Login
            </div>
        </div>

        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger mb-4">
                <i class="fa-solid fa-circle-exclamation me-1"></i>
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('pasien/simpan-register'); ?>" method="post" autocomplete="off" id="formRegister">

            <!-- STEP 1: DATA DIRI -->
            <div class="form-step active" id="step1">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Nama Pasien</label>
                        <input type="text" name="nama_pasien" class="form-control step1-input" placeholder="Masukkan nama lengkap" autocomplete="off" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control step1-input" autocomplete="off" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="text" name="no_telepon" class="form-control step1-input" placeholder="Contoh: 08123456789" autocomplete="off" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control step1-input" rows="1" placeholder="Masukkan alamat lengkap" autocomplete="off" required></textarea>
                    </div>

                </div>

                <div class="row g-3 mt-4">
                    <div class="col-md-6">
                        <a href="<?= base_url(); ?>" class="btn-back">
                            <i class="fa-solid fa-arrow-left me-1"></i>
                            Kembali ke Beranda
                        </a>
                    </div>

                    <div class="col-md-6">
                        <button type="button" class="btn btn-next w-100" onclick="nextStep()">
                            Lanjut
                            <i class="fa-solid fa-arrow-right ms-1"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- STEP 2: AKUN LOGIN -->
            <div class="form-step" id="step2">
                <div class="row g-3">

                    <div class="col-md-12">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Buat username login" autocomplete="new-password" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Buat password" autocomplete="new-password" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="konfirmasi_password" class="form-control" placeholder="Ulangi password" autocomplete="new-password" required>
                    </div>

                </div>

                <div class="row g-3 mt-4">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-prev w-100" onclick="prevStep()">
                            <i class="fa-solid fa-arrow-left me-1"></i>
                            Kembali
                        </button>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-register w-100">
                            <i class="fa-solid fa-user-plus me-1"></i>
                            Daftar Sekarang
                        </button>
                    </div>
                </div>
            </div>

        </form>

        <div class="login-link">
            Sudah punya akun?
            <a href="<?= base_url('pasien/login'); ?>">Login Pasien</a>
        </div>

    </div>
</div>

<script>
    function nextStep() {
        let inputs = document.querySelectorAll('.step1-input');

        for (let i = 0; i < inputs.length; i++) {
            if (!inputs[i].checkValidity()) {
                inputs[i].reportValidity();
                return;
            }
        }

        document.getElementById('step1').classList.remove('active');
        document.getElementById('step2').classList.add('active');

        document.getElementById('stepLabel1').classList.remove('active');
        document.getElementById('stepLabel2').classList.add('active');
    }

    function prevStep() {
        document.getElementById('step2').classList.remove('active');
        document.getElementById('step1').classList.add('active');

        document.getElementById('stepLabel2').classList.remove('active');
        document.getElementById('stepLabel1').classList.add('active');
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>