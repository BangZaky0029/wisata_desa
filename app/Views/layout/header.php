<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Wisata Desa' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .sidebar {
            background: white;
            min-height: 100vh;
            padding: 20px 0;
            box-shadow: 2px 0 4px rgba(0,0,0,0.1);
        }
        .sidebar a {
            color: #333;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            border-left: 4px solid transparent;
            transition: all 0.3s;
        }
        .sidebar a:hover {
            background-color: #f8f9fa;
            border-left-color: #667eea;
            color: #667eea;
        }
        .sidebar a.active {
            background-color: #f0f4ff;
            border-left-color: #667eea;
            color: #667eea;
            font-weight: bold;
        }
        .content-wrapper {
            padding: 30px;
        }
        .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
        }
        .btn-primary {
            background: #667eea;
            border: none;
        }
        .btn-primary:hover {
            background: #764ba2;
        }
        .stat-card {
            border-radius: 10px;
            padding: 20px;
            color: white;
            margin-bottom: 20px;
        }
        .stat-card.blue {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .stat-card.green {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
        }
        .stat-card.orange {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }
        .stat-card.pink {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }
        .stat-number {
            font-size: 32px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <span class="navbar-brand">🌄 Wisata Desa Dashboard</span>
            <div class="ms-auto">
                <span class="text-white me-3"><?= session('user_name') ?></span>
                <a href="<?= base_url('auth/logout') ?>" class="btn btn-sm btn-light">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar">
                    <a href="<?= base_url('dashboard') ?>" class="<?= uri_string() == 'dashboard' ? 'active' : '' ?>">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                    <a href="<?= base_url('desa') ?>" class="<?= strpos(uri_string(), 'desa') !== false ? 'active' : '' ?>">
                        <i class="bi bi-houses"></i> Desa Wisata
                    </a>
                    <a href="<?= base_url('paket') ?>" class="<?= strpos(uri_string(), 'paket') !== false ? 'active' : '' ?>">
                        <i class="bi bi-bag"></i> Paket Wisata
                    </a>
                    <a href="<?= base_url('event') ?>" class="<?= strpos(uri_string(), 'event') !== false ? 'active' : '' ?>">
                        <i class="bi bi-calendar-event"></i> Event Wisata
                    </a>
                    <a href="<?= base_url('user') ?>" class="<?= strpos(uri_string(), 'user') !== false ? 'active' : '' ?>">
                        <i class="bi bi-people"></i> Manajemen User
                    </a>
                </div>
            </div>

            <div class="col-md-10">
                <div class="content-wrapper">
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>