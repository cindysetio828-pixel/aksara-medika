<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?> | Aksara Medika</title>

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon.ico'); ?>">

    <style>
        body {
            font-family: Arial, sans-serif;
            color: #222;
            margin: 30px;
        }

        .kop {
            display: flex;
            align-items: center;
            gap: 16px;
            border-bottom: 3px solid #2FAE9B;
            padding-bottom: 16px;
            margin-bottom: 20px;
        }

        .kop img {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        .kop h2 {
            margin: 0;
            color: #254B5A;
        }

        .kop p {
            margin: 4px 0 0;
            color: #555;
        }

        .periode {
            margin-bottom: 16px;
            font-size: 14px;
        }

        .stat-box {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 18px;
        }

        .stat {
            border: 1px solid #ddd;
            padding: 12px;
            border-radius: 8px;
        }

        .stat h4 {
            margin: 0 0 6px;
            font-size: 13px;
            color: #8B5E3C;
        }

        .stat h2 {
            margin: 0;
            color: #254B5A;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th {
            background: #2FAE9B;
            color: white;
            padding: 8px;
            border: 1px solid #ddd;
        }

        td {
            padding: 7px;
            border: 1px solid #ddd;
            vertical-align: top;
        }

        .btn-print {
            background: #2FAE9B;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 16px;
        }

        .ttd {
            margin-top: 40px;
            width: 260px;
            float: right;
            text-align: center;
            font-size: 14px;
        }

        .space {
            height: 70px;
        }

        @media print {
            .btn-print {
                display: none;
            }

            body {
                margin: 12px;
            }
        }
    </style>
</head>
<body>

<button onclick="window.print()" class="btn-print">
    Cetak / Simpan PDF
</button>

<div class="kop">
    <img src="<?= base_url('assets/img/aksara-medika-icon.png'); ?>" alt="Logo">

    <div>
        <h2>Aksara Medika</h2>
        <p>Sistem Pendaftaran Pasien Online</p>
        <p>Laporan Pendaftaran Pasien</p>
    </div>
</div>

<div class="periode">
    <strong>Periode:</strong>
    <?php if (!empty($tgl_awal) || !empty($tgl_akhir)) : ?>
        <?= !empty($tgl_awal) ? date('d-m-Y', strtotime($tgl_awal)) : 'Awal'; ?>
        sampai
        <?= !empty($tgl_akhir) ? date('d-m-Y', strtotime($tgl_akhir)) : 'Akhir'; ?>
    <?php else : ?>
        Semua Data
    <?php endif; ?>
</div>

<div class="stat-box">
    <div class="stat">
        <h4>Total Pendaftaran</h4>
        <h2><?= $total_pendaftaran; ?></h2>
    </div>

    <div class="stat">
        <h4>Dalam Proses</h4>
        <h2><?= $total_proses; ?></h2>
    </div>

    <div class="stat">
        <h4>Disetujui</h4>
        <h2><?= $total_disetujui; ?></h2>
    </div>

    <div class="stat">
        <h4>Ditolak</h4>
        <h2><?= $total_ditolak; ?></h2>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Pasien</th>
            <th>No Telepon</th>
            <th>Dokter</th>
            <th>Spesialis</th>
            <th>Keluhan</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Status</th>
            <th>Tanggal Daftar</th>
        </tr>
    </thead>

    <tbody>
        <?php if (empty($laporan)) : ?>
            <tr>
                <td colspan="10" style="text-align:center;">Data laporan kosong.</td>
            </tr>
        <?php else : ?>
            <?php $no = 1; foreach ($laporan as $l) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $l->nama_pasien; ?></td>
                    <td><?= $l->no_telepon; ?></td>
                    <td><?= $l->nama_dokter; ?></td>
                    <td><?= $l->spesialis; ?></td>
                    <td><?= $l->keluhan; ?></td>
                    <td><?= date('d-m-Y', strtotime($l->tanggal_kunjungan)); ?></td>
                    <td><?= date('H:i', strtotime($l->jam_kunjungan)); ?></td>
                    <td><?= $l->status; ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($l->tanggal_daftar)); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<div class="ttd">
    <p>Tangerang, <?= date('d-m-Y'); ?></p>
    <p>Admin</p>
    <div class="space"></div>
    <p>________________________</p>
</div>

</body>
</html>