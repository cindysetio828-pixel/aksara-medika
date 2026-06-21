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
        :root {
            --tosca: #2FAE9B;
            --blue: #4A90E2;
            --brown: #8B5E3C;
            --dark: #254B5A;
            --muted: #7A8C94;
            --green-soft: #DDF4EE;
        }

        body {
            background:
                radial-gradient(circle at top right, rgba(111, 211, 209, 0.18), transparent 35%),
                linear-gradient(135deg, #F7FFFC, #EEF8FF);
            font-family: 'Segoe UI', sans-serif;
            color: var(--dark);
            min-height: 100vh;
        }

        .sidebar {
            width: 270px;
            height: 100vh;
            position: fixed;
            background:
                linear-gradient(180deg, rgba(47,174,155,.97), rgba(74,144,226,.94)),
                linear-gradient(45deg, var(--brown), transparent);
            color: white;
            padding: 24px 18px;
            overflow-y: auto;
            box-shadow: 8px 0 28px rgba(37, 75, 90, 0.12);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 34px;
            padding: 10px;
        }

        .brand-logo {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            object-fit: cover;
            background: #fffdfb;
            padding: 5px;
            box-shadow: 0 8px 18px rgba(37, 75, 90, 0.16);
        }

        .brand-text h4 {
            font-size: 19px;
            font-weight: 800;
            margin: 0;
        }

        .brand-text small {
            opacity: .86;
            font-size: 12px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 14px;
            margin-bottom: 8px;
            font-weight: 600;
            transition: 0.2s;
        }

        .sidebar a i {
            width: 24px;
            margin-right: 8px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(139,94,60,.30);
            transform: translateX(2px);
        }

        .logout-link {
            margin-top: 24px;
            background: rgba(255,255,255,.16);
        }

        .content {
            margin-left: 270px;
            padding: 30px;
        }

        .topbar {
            background: rgba(255,253,251,.96);
            border-radius: 28px;
            padding: 28px 34px;
            box-shadow: 0 12px 32px rgba(37,75,90,.08);
            margin-bottom: 25px;
            border-left: 8px solid var(--brown);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
        }

        .topbar h3 {
            margin: 0;
            font-weight: 900;
            color: var(--dark);
            font-size: 30px;
        }

        .topbar p {
            margin: 8px 0 0;
            color: var(--muted);
            font-size: 17px;
        }

        .btn-add {
            background: linear-gradient(135deg, var(--tosca), var(--blue));
            color: white;
            border-radius: 18px;
            padding: 15px 24px;
            font-weight: 900;
            text-decoration: none;
            white-space: nowrap;
            box-shadow: 0 10px 22px rgba(47,174,155,.22);
            font-size: 17px;
        }

        .btn-add:hover {
            color: white;
            opacity: .94;
            transform: translateY(-1px);
        }

        .btn-edit {
            background: #FFF8F0;
            color: var(--brown);
            border: 1px solid rgba(139,94,60,.2);
            border-radius: 10px;
            padding: 7px 10px;
            text-decoration: none;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 4px;
        }

        .btn-edit:hover {
            background: var(--brown);
            color: white;
        }

        .btn-delete {
            background: #FFF0EC;
            color: #9B3E2F;
            border: 1px solid rgba(155,62,47,.15);
            border-radius: 10px;
            padding: 7px 10px;
            text-decoration: none;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 4px;
        }

        .btn-delete:hover {
            background: #9B3E2F;
            color: white;
        }

        @media (max-width: 900px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn-add {
                width: 100%;
                text-align: center;
            }
        }

        .table-card,
        .card-custom {
            background: rgba(255,253,251,.98);
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 10px 28px rgba(37,75,90,.08);
            border: 1px solid rgba(139, 94, 60, 0.10);
        }

        .btn-add,
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--tosca), var(--blue));
            color: white;
            border-radius: 14px;
            padding: 11px 16px;
            font-weight: 800;
            text-decoration: none;
            border: none;
        }

        .btn-add:hover,
        .btn-primary-custom:hover {
            color: white;
            opacity: .94;
        }

        .table thead {
            background: linear-gradient(135deg, var(--tosca), var(--blue));
            color: white;
        }

        .table th {
            font-size: 13px;
            padding: 14px;
            white-space: nowrap;
        }

        .table td {
            font-size: 13px;
            padding: 13px;
            vertical-align: middle;
            color: var(--dark);
        }

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

        @media (max-width: 900px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .content {
                margin-left: 0;
                padding: 22px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }
        }
            .stat-card {
                background: rgba(255,253,251,.98);
                border-radius: 24px;
                padding: 24px;
                box-shadow: 0 10px 28px rgba(37,75,90,.08);
                border: 1px solid rgba(139,94,60,.10);
                height: 100%;
                position: relative;
                overflow: hidden;
            }

            .stat-card::after {
                content: "";
                position: absolute;
                width: 90px;
                height: 90px;
                right: -35px;
                top: -35px;
                border-radius: 50%;
                background: rgba(111,211,209,.22);
            }

            .stat-icon {
                width: 56px;
                height: 56px;
                border-radius: 18px;
                background: linear-gradient(135deg, #DDF4EE, #EEF8FF);
                color: var(--tosca);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 26px;
                margin-bottom: 15px;
                border: 1px solid rgba(47,174,155,.14);
            }

            .stat-card h5 {
                color: var(--brown);
                font-size: 15px;
                margin-bottom: 8px;
                font-weight: 800;
            }

            .stat-card h2 {
                font-weight: 900;
                color: var(--dark);
                margin: 0;
            }

            .stat-card small {
                color: var(--muted);
            }

            .welcome-box {
                background:
                    linear-gradient(135deg, rgba(47,174,155,.96), rgba(74,144,226,.92)),
                    linear-gradient(45deg, var(--brown), transparent);
                color: white;
                border-radius: 24px;
                padding: 28px;
                margin-top: 25px;
                position: relative;
                overflow: hidden;
                box-shadow: 0 14px 34px rgba(47,174,155,.22);
            }

            .welcome-box::after {
                content: "A";
                position: absolute;
                right: 28px;
                bottom: -48px;
                font-size: 170px;
                font-family: Georgia, serif;
                font-weight: 800;
                color: rgba(255,255,255,.11);
            }

            .welcome-box h4 {
                font-weight: 900;
                margin-bottom: 8px;
                position: relative;
                z-index: 1;
            }

            .welcome-box p {
                margin: 0;
                position: relative;
                z-index: 1;
                max-width: 760px;
                line-height: 1.7;
            }

            .section-title {
                margin: 28px 0 16px;
                font-weight: 900;
                color: var(--dark);
            }

            .quick-card {
                background: #FFFFFF;
                border-radius: 22px;
                padding: 22px;
                border: 1px solid rgba(47,174,155,.14);
                box-shadow: 0 8px 22px rgba(37,75,90,.06);
                height: 100%;
                display: block;
                text-decoration: none;
                transition: .2s;
            }

            .quick-card:hover {
                transform: translateY(-3px);
            }

            .quick-card i {
                color: var(--brown);
                margin-right: 8px;
            }

            .quick-card h6 {
                font-weight: 900;
                color: var(--dark);
                margin-bottom: 8px;
            }

            .quick-card p {
                margin: 0;
                color: var(--muted);
                font-size: 14px;
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

            .btn-setujui,
            .btn-tolak {
                border-radius: 12px;
                padding: 8px 10px;
                font-size: 12px;
                font-weight: 800;
                text-decoration: none;
                display: inline-block;
                margin-bottom: 4px;
            }

            .btn-setujui {
                background: linear-gradient(135deg, var(--tosca), var(--blue));
                color: white;
            }

            .btn-setujui:hover {
                color: white;
                opacity: 0.92;
            }

            .btn-tolak {
                background: #FFF0EC;
                color: #9B3E2F;
                border: 1px solid rgba(155, 62, 47, 0.16);
            }

            .btn-tolak:hover {
                background: #9B3E2F;
                color: white;
            }

            .empty-box {
                text-align: center;
                padding: 38px;
                background: white;
                border-radius: 22px;
                color: var(--muted);
                border: 1px solid rgba(139, 94, 60, 0.10);
            }

            .empty-box i {
                font-size: 44px;
                color: var(--tosca);
                margin-bottom: 12px;
            }

            .report-filter-card {
                background: rgba(255,253,251,.98);
                border-radius: 24px;
                padding: 24px;
                box-shadow: 0 10px 28px rgba(37,75,90,.08);
                border: 1px solid rgba(139,94,60,.10);
            }

            .report-filter-card .form-label {
                color: var(--brown);
                font-weight: 800;
            }

            .report-filter-card .form-control {
                border-radius: 14px;
                padding: 12px;
            }

            .btn-filter {
                background: linear-gradient(135deg, var(--tosca), var(--blue));
                color: white;
                border: none;
                border-radius: 14px;
                padding: 12px 18px;
                font-weight: 800;
                text-decoration: none;
            }

            .btn-reset {
                background: #FFF8F0;
                color: var(--brown);
                border: 1px solid rgba(139,94,60,.20);
                border-radius: 14px;
                padding: 12px 18px;
                font-weight: 800;
                text-decoration: none;
            }

            .report-stat-card {
                background: rgba(255,253,251,.98);
                border-radius: 22px;
                padding: 22px;
                box-shadow: 0 10px 28px rgba(37,75,90,.08);
                border: 1px solid rgba(139,94,60,.10);
                height: 100%;
            }

            .report-stat-card h6 {
                color: var(--brown);
                font-weight: 900;
                margin-bottom: 8px;
            }

            .report-stat-card h2 {
                color: var(--dark);
                font-weight: 900;
                margin: 0;
            }

            .report-stat-card small {
                color: var(--muted);
            }

            .btn-export-csv,
            .btn-export-pdf {
                border-radius: 14px;
                padding: 10px 14px;
                text-decoration: none;
                font-weight: 800;
                display: inline-block;
            }

            .btn-export-csv {
                background: #E8F8F3;
                color: #237966;
                border: 1px solid rgba(35,121,102,.16);
            }

            .btn-export-pdf {
                background: #FFF0EC;
                color: #9B3E2F;
                border: 1px solid rgba(155,62,47,.16);
            }

            .btn-export-csv:hover {
                background: #237966;
                color: white;
            }

            .btn-export-pdf:hover {
                background: #9B3E2F;
                color: white;
            }

            .filter-card {
                background: rgba(255,253,251,.98);
                border-radius: 24px;
                padding: 24px;
                box-shadow: 0 10px 28px rgba(37,75,90,.08);
                border: 1px solid rgba(139,94,60,.10);
            }

            .filter-card .form-label {
                color: var(--brown);
                font-weight: 800;
            }

            .filter-card .form-control {
                border-radius: 14px;
                padding: 12px;
            }

            .btn-filter {
                background: linear-gradient(135deg, var(--tosca), var(--blue));
                color: white;
                border: none;
                border-radius: 14px;
                padding: 12px 18px;
                font-weight: 800;
                text-decoration: none;
            }

            .btn-filter:hover {
                color: white;
                opacity: .94;
            }

            .btn-reset {
                background: #FFF8F0;
                color: var(--brown);
                border: 1px solid rgba(139,94,60,.20);
                border-radius: 14px;
                padding: 12px 18px;
                font-weight: 800;
                text-decoration: none;
            }

            .btn-reset:hover {
                background: var(--brown);
                color: white;
            }

            .badge-spesialis {
                background: #E8F8F3;
                color: #237966;
                border: 1px solid rgba(35,121,102,.16);
                padding: 8px 12px;
                border-radius: 30px;
                font-size: 12px;
                font-weight: 800;
                display: inline-block;
            }

            .badge-username {
                background: #EEF8FF;
                color: var(--blue);
                border: 1px solid rgba(74,144,226,.18);
                padding: 8px 12px;
                border-radius: 30px;
                font-size: 12px;
                font-weight: 800;
                display: inline-block;
            }
            /* =========================================================
            DASHBOARD PANEL ADMIN
            ========================================================= */
            .dashboard-panel {
                background: rgba(255, 253, 251, 0.98);
                border-radius: 24px;
                padding: 24px;
                box-shadow: 0 12px 30px rgba(37, 75, 90, 0.10);
                border: 1px solid rgba(139, 94, 60, 0.10);
                height: 100%;
            }

            .panel-head {
                margin-bottom: 18px;
            }

            .panel-head h4 {
                margin: 0;
                font-weight: 900;
                color: var(--dark);
                font-size: 24px;
            }

            .panel-head p {
                margin: 6px 0 0;
                color: var(--muted);
                font-size: 14px;
            }

            /* =========================================================
            TABEL DASHBOARD
            ========================================================= */
            .dashboard-table thead th {
                background: linear-gradient(135deg, var(--tosca), var(--blue));
                color: white;
                border: none;
                font-weight: 800;
                text-align: center;
                vertical-align: middle;
            }

            .dashboard-table tbody td {
                vertical-align: middle;
                padding: 14px 12px;
            }

            /* =========================================================
            BADGE STATUS
            ========================================================= */
            .badge-status {
                padding: 8px 14px;
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

    </style>
</head>