<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Wisata Desa' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --sidebar-width: 260px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* Navbar Styles */
        .navbar {
            background: var(--primary-gradient);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 24px;
            transition: transform 0.3s;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        /* Sidebar Styles */
        .sidebar {
            background: white;
            min-height: calc(100vh - 56px);
            padding: 30px 0;
            box-shadow: 4px 0 10px rgba(0,0,0,0.05);
            position: sticky;
            top: 56px;
            animation: slideRight 0.5s ease-out;
        }

        @keyframes slideRight {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .sidebar a {
            color: #333;
            padding: 15px 25px;
            display: flex;
            align-items: center;
            text-decoration: none;
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
            margin: 5px 0;
            position: relative;
            overflow: hidden;
        }

        .sidebar a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.1) 0%, transparent 100%);
            transition: width 0.3s ease;
        }

        .sidebar a:hover::before {
            width: 100%;
        }

        .sidebar a:hover {
            background-color: #f8f9fa;
            border-left-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateX(5px);
        }

        .sidebar a.active {
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.15) 0%, transparent 100%);
            border-left-color: var(--primary-color);
            color: var(--primary-color);
            font-weight: 600;
        }

        .sidebar a i {
            margin-right: 12px;
            font-size: 20px;
            width: 25px;
            text-align: center;
        }

        /* Content Area */
        .content-wrapper {
            padding: 30px;
            animation: fadeIn 0.6s ease-out;
            min-height: calc(100vh - 56px);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Card Styles */
        .card {
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            margin-bottom: 25px;
            border-radius: 15px;
            transition: all 0.3s ease;
            animation: cardAppear 0.5s ease-out;
        }

        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        .card-header {
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 15px 15px 0 0 !important;
            padding: 18px 25px;
            font-weight: 600;
        }

        /* Button Styles */
        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            padding: 10px 25px;
            border-radius: 10px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(102, 126, 234, 0.3);
        }

        /* Stat Cards */
        .stat-card {
            border-radius: 15px;
            padding: 25px;
            color: white;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(45deg);
            transition: all 0.5s ease;
        }

        .stat-card:hover::before {
            top: -100%;
            right: -100%;
        }

        .stat-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
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
            font-size: 42px;
            font-weight: bold;
            margin-bottom: 10px;
            animation: countUp 1s ease-out;
        }

        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Alert Styles */
        .alert {
            border-radius: 12px;
            border: none;
            animation: slideInDown 0.5s ease-out;
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Table Styles */
        .table {
            animation: fadeIn 0.8s ease-out;
        }

        .table thead {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
            transform: scale(1.01);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        /* Button Group Animation */
        .btn-group .btn {
            transition: all 0.3s ease;
        }

        .btn-group .btn:hover {
            transform: scale(1.1);
            z-index: 10;
        }

        /* Loading Overlay */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 6px solid #ffffff;
            border-top: 6px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
            
            .content-wrapper {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <span class="navbar-brand">🌄 Wisata Desa Dashboard</span>
            <div class="ms-auto d-flex align-items-center">
                <span class="text-white me-3">
                    <i class="bi bi-person-circle"></i> 
                    <?= session('email') ?>
                </span>
                <a href="<?= base_url('auth/logout') ?>" class="btn btn-sm btn-light" onclick="return confirmLogout(event)">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 px-0">
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

            <!-- Main Content -->
            <div class="col-md-10">
                <div class="content-wrapper">
                    <!-- Flash Messages -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show animate__animated animate__bounceIn" role="alert">
                            <i class="bi bi-check-circle-fill"></i>
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show animate__animated animate__shakeX" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>