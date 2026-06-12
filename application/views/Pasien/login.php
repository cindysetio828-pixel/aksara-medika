<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Pasien | Aksara Medika</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon.ico'); ?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets/img/aksara-medika-icon.png'); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --tosca: #2FAE9B;
            --blue: #4A90E2;
            --brown: #8B5E3C;
            --cream: #FAF4EC;
            --dark: #254B5A;
            --muted: #748791;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(111, 211, 209, 0.42), transparent 35%),
                radial-gradient(circle at bottom right, rgba(139, 94, 60, 0.22), transparent 34%),
                linear-gradient(135deg, #F4FFFC, #EEF8FF 55%, #FAF4EC);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            background: rgba(255, 253, 249, 0.98);
            border-radius: 30px;
            padding: 36px;
            box-shadow: 0 24px 60px rgba(37, 75, 90, 0.14);
            border: 1px solid rgba(139, 94, 60, 0.10);
            position: relative;
            overflow: hidden;
        }

        .login-card::after {
            content: "A";
            position: absolute;
            right: 28px;
            bottom: -55px;
            font-size: 175px;
            font-family: Georgia, serif;
            font-weight: 800;
            color: rgba(139, 94, 60, 0.06);
            z-index: 0;
        }

        .login-content {
            position: relative;
            z-index: 1;
        }

        .logo-box {
            text-align: center;
            margin-bottom: 22px;
        }

        .logo-img {
            width: 260px;
            max-width: 100%;
            background: transparent;
            padding: 0;
            border-radius: 0;
            box-shadow: none;
            margin-bottom: 18px;
            filter: drop-shadow(0 8px 14px rgba(37, 75, 90, 0.10));
        }

        .login-title {
            text-align: center;
            color: var(--dark);
            font-weight: 900;
            margin-bottom: 6px;
        }

        .login-subtitle {
            text-align: center;
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 26px;
        }

        .form-label {
            color: var(--brown);
            font-weight: 800;
            font-size: 14px;
        }

        .input-group-text {
            width: 52px;
            justify-content: center;
            background: #ffffff;
            border: 1px solid #DFEAED;
            border-radius: 15px 0 0 15px;
            color: var(--tosca);
        }

        .form-control {
            border: 1px solid #DFEAED;
            border-radius: 0 15px 15px 0;
            padding: 13px 14px;
            background: #F8FBFF;
        }

        .form-control:focus {
            border-color: var(--tosca);
            box-shadow: 0 0 0 0.2rem rgba(47, 174, 155, 0.14);
            background: #ffffff;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--tosca), var(--blue));
            color: white;
            border: none;
            border-radius: 16px;
            padding: 13px;
            font-weight: 850;
            box-shadow: 0 12px 24px rgba(47, 174, 155, 0.22);
        }

        .btn-login:hover {
            color: white;
            opacity: 0.95;
            transform: translateY(-1px);
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

        .alert {
            border: none;
            border-radius: 15px;
            font-size: 14px;
        }

        .alert-danger {
            background: #FFF0EC;
            color: #9B3E2F;
        }

        .alert-success {
            background: #E8F8F3;
            color: #237966;
        }

        .register-link {
            text-align: center;
            color: var(--muted);
            margin-top: 20px;
            font-size: 14px;
        }

        .register-link a {
            color: var(--brown);
            text-decoration: none;
            font-weight: 850;
        }
    </style>
</head>

<body>

<div class="login-card">
    <div class="login-content">

        <div class="logo-box">
            <img src="<?= base_url('assets/img/aksara-medika-logo-transparan.png'); ?>" alt="Logo Aksara Medika" class="logo-img">
        </div>

        <h3 class="login-title">Login Pasien</h3>
        <p class="login-subtitle">Masuk untuk melihat status pendaftaran berobat.</p>

        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger mb-3">
                <i class="fa-solid fa-circle-exclamation me-1"></i>
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success mb-3">
                <i class="fa-solid fa-circle-check me-1"></i>
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('pasien/login/proses'); ?>" method="post" autocomplete="off">

            <div class="mb-3">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username pasien" autocomplete="new-password" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" autocomplete="new-password" required>
                </div>
            </div>

            <button type="submit" class="btn btn-login w-100 mb-3">
                <i class="fa-solid fa-right-to-bracket me-1"></i>
                Login Pasien
            </button>

            <a href="<?= base_url(); ?>" class="btn-back">
                <i class="fa-solid fa-arrow-left me-1"></i>
                Kembali ke Beranda
            </a>

        </form>

        <div class="register-link">
            Belum punya akun?
            <a href="<?= base_url('pasien/register'); ?>">Daftar Pasien</a>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>