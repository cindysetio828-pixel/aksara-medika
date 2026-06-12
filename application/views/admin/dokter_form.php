<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?> | Aksara Medika</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon.ico'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --tosca: #2FAE9B;
            --blue: #4A90E2;
            --brown: #8B5E3C;
            --dark: #254B5A;
            --muted: #748791;
        }

        body {
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #F4FFFC, #EEF8FF 55%, #FAF4EC);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 28px;
        }

        .form-card {
            width: 100%;
            max-width: 650px;
            background: rgba(255,253,249,.98);
            border-radius: 30px;
            padding: 36px;
            box-shadow: 0 24px 60px rgba(37,75,90,.14);
        }

        .logo-img {
            width: 240px;
            max-width: 100%;
            display: block;
            margin: 0 auto 18px;
            filter: drop-shadow(0 8px 14px rgba(37,75,90,.10));
        }

        h3 {
            text-align: center;
            color: var(--dark);
            font-weight: 900;
            margin-bottom: 24px;
        }

        .form-label {
            color: var(--brown);
            font-weight: 800;
        }

        .form-control {
            border-radius: 15px;
            padding: 13px;
        }

        .btn-save {
            background: linear-gradient(135deg, var(--tosca), var(--blue));
            color: white;
            border: none;
            border-radius: 15px;
            padding: 13px;
            font-weight: 800;
        }

        .btn-back {
            border: 2px solid var(--brown);
            color: var(--brown);
            border-radius: 15px;
            padding: 11px;
            font-weight: 800;
            text-decoration: none;
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="form-card">
    <img src="<?= base_url('assets/img/aksara-medika-logo-transparan.png'); ?>" class="logo-img" alt="Logo">

    <h3><?= $title; ?></h3>

    <?php if ($mode == 'tambah') : ?>
        <form action="<?= base_url('admin/dokter/simpan'); ?>" method="post">
    <?php else : ?>
        <form action="<?= base_url('admin/dokter/update/' . $dokter->id_dokter); ?>" method="post">
    <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">Nama Dokter</label>
            <input type="text" name="nama_dokter" class="form-control" value="<?= $dokter ? $dokter->nama_dokter : ''; ?>" placeholder="Contoh: dr. Amanda Putri" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Spesialis</label>
            <input type="text" name="spesialis" class="form-control" value="<?= $dokter ? $dokter->spesialis : ''; ?>" placeholder="Contoh: Spesialis Anak" required>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <a href="<?= base_url('admin/dokter'); ?>" class="btn-back">Kembali</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-save w-100">Simpan</button>
            </div>
        </div>

    </form>
</div>

</body>
</html>