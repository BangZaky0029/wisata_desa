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
            --primary-gradient: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            --primary-color: #27ae60;
            --secondary-color: #2ecc71;
            --accent-color: #f39c12;
            --sidebar-width: 280px;
            --nature-green: #27ae60;
            --sky-blue: #3498db;
            --sunset-orange: #e67e22;
            --mountain-gray: #95a5a6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            position: relative;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%232ecc71" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') 
                no-repeat bottom center;
            background-size: cover;
            z-index: -1;
            opacity: 0.6;
            animation: wave 15s ease-in-out infinite;
        }

        @keyframes wave {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        /* Mountain Background Effect */
        .mountain-bg {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 300px;
            background: 
                linear-gradient(to top, rgba(46, 204, 113, 0.2) 0%, transparent 100%),
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%2327ae60" fill-opacity="0.3" d="M0,192L60,197.3C120,203,240,213,360,202.7C480,192,600,160,720,154.7C840,149,960,171,1080,186.7C1200,203,1320,213,1380,218.7L1440,224L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>') 
                no-repeat bottom center;
            background-size: cover;
            z-index: -1;
            pointer-events: none;
        }

        /* Enhanced Navbar */
        .navbar {
            background: linear-gradient(135deg, rgba(46, 204, 113, 0.95) 0%, rgba(39, 174, 96, 0.95) 100%);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(39, 174, 96, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
            animation: slideDown 0.5s ease-out;
            border-bottom: 3px solid var(--accent-color);
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
            font-size: 26px;
            transition: all 0.3s;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand .brand-icon {
            font-size: 32px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            text-shadow: 3px 3px 6px rgba(0,0,0,0.3);
        }

        .user-info {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 15px;
            border-radius: 25px;
            margin-right: 15px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Enhanced Sidebar */
        .sidebar {
            background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
            min-height: calc(100vh - 56px);
            padding: 30px 0;
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
            position: sticky;
            top: 56px;
            animation: slideRight 0.5s ease-out;
            border-right: 3px solid var(--primary-color);
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

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M20,80 Q50,60 80,80 L80,100 L20,100 Z" fill="%232ecc71" opacity="0.05"/></svg>') repeat-y right;
            opacity: 0.3;
            pointer-events: none;
        }

        .sidebar a {
            color: #2c3e50;
            padding: 15px 25px;
            display: flex;
            align-items: center;
            text-decoration: none;
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
            margin: 5px 10px;
            border-radius: 0 15px 15px 0;
            position: relative;
            overflow: hidden;
            font-weight: 500;
        }

        .sidebar a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, rgba(46, 204, 113, 0.2) 0%, transparent 100%);
            transition: width 0.3s ease;
            z-index: -1;
        }

        .sidebar a:hover::before {
            width: 100%;
        }

        .sidebar a:hover {
            background: linear-gradient(90deg, rgba(46, 204, 113, 0.1) 0%, transparent 100%);
            border-left-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateX(8px);
            box-shadow: 0 3px 10px rgba(46, 204, 113, 0.2);
        }

        .sidebar a.active {
            background: linear-gradient(90deg, rgba(46, 204, 113, 0.15) 0%, transparent 100%);
            border-left-color: var(--primary-color);
            color: var(--primary-color);
            font-weight: 700;
            box-shadow: 0 3px 10px rgba(46, 204, 113, 0.2);
        }

        .sidebar a i {
            margin-right: 15px;
            font-size: 22px;
            width: 30px;
            text-align: center;
            transition: transform 0.3s;
        }

        .sidebar a:hover i {
            transform: scale(1.2) rotate(5deg);
        }

        /* Decorative Elements */
        .sidebar-decoration {
            text-align: center;
            padding: 20px;
            margin-bottom: 20px;
            border-bottom: 2px dashed rgba(46, 204, 113, 0.3);
        }

        .sidebar-decoration i {
            font-size: 48px;
            color: var(--primary-color);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        /* Content Area */
        .content-wrapper {
            padding: 30px;
            animation: fadeIn 0.6s ease-out;
            min-height: calc(100vh - 56px);
            background: transparent;
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

        /* Enhanced Card Styles */
        .card {
            border: none;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            margin-bottom: 25px;
            border-radius: 20px;
            transition: all 0.4s ease;
            animation: cardAppear 0.5s ease-out;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 2px solid transparent;
            overflow: hidden;
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }

        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(46, 204, 113, 0.25);
            border-color: var(--primary-color);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border: none;
            border-radius: 20px 20px 0 0 !important;
            padding: 20px 25px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header i {
            font-size: 24px;
        }

        /* Nature-inspired Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(46, 204, 113, 0.3);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(46, 204, 113, 0.4);
        }

        /* Nature Icons */
        .nature-icon {
            display: inline-block;
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Floating Nature Elements */
        .floating-leaf {
            position: fixed;
            font-size: 30px;
            opacity: 0.3;
            animation: float 15s ease-in-out infinite;
            pointer-events: none;
            z-index: -1;
        }

        .floating-leaf:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-leaf:nth-child(2) {
            top: 60%;
            right: 15%;
            animation-delay: 3s;
        }

        .floating-leaf:nth-child(3) {
            bottom: 30%;
            left: 80%;
            animation-delay: 6s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            25% {
                transform: translateY(-20px) rotate(5deg);
            }
            50% {
                transform: translateY(-10px) rotate(-5deg);
            }
            75% {
                transform: translateY(-30px) rotate(3deg);
            }
        }

        /* Loading Overlay */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(46, 204, 113, 0.9) 0%, rgba(39, 174, 96, 0.9) 100%);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            backdrop-filter: blur(5px);
        }

        .loading-spinner {
            width: 70px;
            height: 70px;
            border: 6px solid rgba(255, 255, 255, 0.3);
            border-top: 6px solid #ffffff;
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

            .navbar-brand {
                font-size: 20px;
            }

            .user-info {
                font-size: 12px;
                padding: 6px 10px;
            }
        }

        /* Alert Styles with Nature Theme */
        .alert {
            border-radius: 15px;
            border: none;
            animation: slideInDown 0.5s ease-out;
            border-left: 5px solid;
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            border-left-color: var(--primary-color);
        }

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            border-left-color: #dc3545;
        }

        /* Tooltip Nature Theme */
        .tooltip-inner {
            background: var(--primary-color);
            border-radius: 10px;
        }

        /* Sun/Moon Icon for Day/Night */
        .weather-icon {
            position: fixed;
            top: 100px;
            right: 30px;
            font-size: 50px;
            color: var(--accent-color);
            animation: glow 3s ease-in-out infinite;
            z-index: 1;
        }

        @keyframes glow {
            0%, 100% {
                text-shadow: 0 0 10px rgba(243, 156, 18, 0.5);
            }
            50% {
                text-shadow: 0 0 20px rgba(243, 156, 18, 0.8);
            }
        }
    </style>
</head>
<body>
    <!-- Mountain Background -->
    <div class="mountain-bg"></div>

    <!-- Floating Nature Elements -->
    <div class="floating-leaf">🍃</div>
    <div class="floating-leaf">🌿</div>
    <div class="floating-leaf">🌱</div>

    <!-- Weather/Sun Icon -->
    <div class="weather-icon">☀️</div>

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
    </div>

    <!-- Enhanced Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <span class="navbar-brand">
                <span class="brand-icon nature-icon">🏞️</span>
                Wisata Desa Indonesia
            </span>
            <div class="ms-auto d-flex align-items-center">
                <div class="user-info text-white">
                    <i class="bi bi-person-circle"></i> 
                    <?= session('email') ?>
                </div>
                <a href="<?= base_url('auth/logout') ?>" class="btn btn-sm btn-light" onclick="return confirmLogout(event)">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Enhanced Sidebar -->
            <div class="col-md-2 px-0">
                <div class="sidebar">
                    <div class="sidebar-decoration">
                        <i class="bi bi-tree-fill"></i>
                        <p class="mt-2 mb-0 text-muted small">Kelola Wisata</p>
                    </div>
                    
                    <a href="<?= base_url('dashboard') ?>" class="<?= uri_string() == 'dashboard' ? 'active' : '' ?>">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                    <a href="<?= base_url('desa') ?>" class="<?= strpos(uri_string(), 'desa') !== false ? 'active' : '' ?>">
                        <i class="bi bi-houses-fill"></i> Desa Wisata
                    </a>
                    <a href="<?= base_url('paket') ?>" class="<?= strpos(uri_string(), 'paket') !== false ? 'active' : '' ?>">
                        <i class="bi bi-bag-check-fill"></i> Paket Wisata
                    </a>
                    <a href="<?= base_url('event') ?>" class="<?= strpos(uri_string(), 'event') !== false ? 'active' : '' ?>">
                        <i class="bi bi-calendar-event-fill"></i> Event Wisata
                    </a>
                    <a href="<?= base_url('user') ?>" class="<?= strpos(uri_string(), 'user') !== false ? 'active' : '' ?>">
                        <i class="bi bi-people-fill"></i> Manajemen User
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