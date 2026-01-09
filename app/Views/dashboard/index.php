<?= view('layout/header', ['title' => 'Dashboard']) ?>

<style>
    .welcome-banner {
        background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%),
                    url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 50px;
        border-radius: 25px;
        margin-bottom: 30px;
        box-shadow: 0 20px 50px rgba(46, 204, 113, 0.4);
        position: relative;
        overflow: hidden;
        animation: slideInDown 0.6s ease-out;
    }

    .welcome-banner::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
        border-radius: 50%;
        animation: float 8s ease-in-out infinite;
    }

    .welcome-banner::after {
        content: '🏔️';
        position: absolute;
        bottom: 20px;
        right: 50px;
        font-size: 120px;
        opacity: 0.2;
        animation: bounce 3s ease-in-out infinite;
    }

    .welcome-banner h1 {
        font-size: 42px;
        font-weight: 800;
        margin-bottom: 15px;
        position: relative;
        z-index: 1;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
    }

    .welcome-banner p {
        font-size: 20px;
        opacity: 0.95;
        position: relative;
        z-index: 1;
        font-weight: 300;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: white;
        border-radius: 25px;
        padding: 35px;
        position: relative;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        border: 3px solid transparent;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, transparent 0%, rgba(255,255,255,0.3) 100%);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .stat-card:hover::before {
        opacity: 1;
    }

    .stat-card:hover {
        transform: translateY(-20px) scale(1.05);
        box-shadow: 0 25px 50px rgba(0,0,0,0.2);
    }

    .stat-card.green {
        background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
        color: white;
    }

    .stat-card.green:hover {
        border-color: #27ae60;
    }

    .stat-card.blue {
        background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        color: white;
    }

    .stat-card.blue:hover {
        border-color: #2980b9;
    }

    .stat-card.orange {
        background: linear-gradient(135deg, #e67e22 0%, #d35400 100%);
        color: white;
    }

    .stat-card.orange:hover {
        border-color: #d35400;
    }

    .stat-card.purple {
        background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);
        color: white;
    }

    .stat-card.purple:hover {
        border-color: #8e44ad;
    }

    .stat-icon {
        font-size: 60px;
        opacity: 0.4;
        position: absolute;
        right: 25px;
        top: 25px;
        transition: all 0.4s;
    }

    .stat-card:hover .stat-icon {
        opacity: 0.6;
        transform: scale(1.3) rotate(15deg);
    }

    .stat-number {
        font-size: 56px;
        font-weight: 900;
        margin-bottom: 10px;
        position: relative;
        z-index: 1;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    .stat-label {
        font-size: 18px;
        opacity: 0.95;
        font-weight: 600;
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .info-cards-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
    }

    .info-card {
        background: white;
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        animation: fadeInUp 0.8s ease-out;
        transition: all 0.4s ease;
        border-top: 5px solid var(--primary-color);
        position: relative;
        overflow: hidden;
    }

    .info-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(180deg, var(--primary-color), var(--accent-color));
        transition: width 0.3s;
    }

    .info-card:hover::before {
        width: 100%;
        opacity: 0.05;
    }

    .info-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(46, 204, 113, 0.2);
    }

    .info-card h5 {
        color: var(--primary-color);
        font-weight: 800;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 22px;
    }

    .info-card h5 i {
        font-size: 28px;
    }

    .info-card ul {
        list-style: none;
        padding: 0;
    }

    .info-card ul li {
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: all 0.3s;
    }

    .info-card ul li:last-child {
        border-bottom: none;
    }

    .info-card ul li:hover {
        padding-left: 10px;
        background: rgba(46, 204, 113, 0.05);
        border-radius: 8px;
    }

    .info-card ul li i {
        color: var(--primary-color);
        font-size: 20px;
        min-width: 25px;
    }

    .info-card ul li a {
        color: inherit;
        text-decoration: none;
        flex: 1;
        transition: color 0.3s;
    }

    .info-card ul li a:hover {
        color: var(--primary-color);
        font-weight: 600;
    }

    /* Nature decorative elements */
    .nature-decoration {
        position: absolute;
        font-size: 100px;
        opacity: 0.08;
        z-index: 0;
        pointer-events: none;
    }

    .decoration-1 {
        top: -20px;
        right: -20px;
        transform: rotate(-15deg);
    }

    .decoration-2 {
        bottom: -30px;
        left: -30px;
        transform: rotate(25deg);
    }

    /* Progress Ring Animation */
    .progress-ring {
        display: inline-block;
        width: 80px;
        height: 80px;
        position: absolute;
        bottom: 20px;
        left: 20px;
        opacity: 0.3;
    }

    .progress-ring circle {
        fill: none;
        stroke: white;
        stroke-width: 8;
        stroke-linecap: round;
        animation: progress 3s ease-out infinite;
    }

    @keyframes progress {
        0% {
            stroke-dasharray: 0 251.2;
        }
        100% {
            stroke-dasharray: 251.2 0;
        }
    }

    @media (max-width: 768px) {
        .welcome-banner h1 {
            font-size: 28px;
        }
        
        .welcome-banner p {
            font-size: 16px;
        }
        
        .stat-number {
            font-size: 40px;
        }

        .welcome-banner::after {
            font-size: 60px;
            bottom: 10px;
            right: 20px;
        }
    }
</style>

<div class="welcome-banner">
    <h1>
        <i class="bi bi-geo-alt-fill"></i>
        Dashboard Wisata Desa Indonesia
    </h1>
    <p>🌿 Kelola dan kembangkan potensi wisata desa untuk Indonesia yang lebih baik! 🇮🇩</p>
    
    <!-- Progress Ring Decoration -->
    <svg class="progress-ring">
        <circle cx="40" cy="40" r="35"></circle>
    </svg>
</div>

<div class="stats-container">
    <div class="stat-card green" onclick="navigateTo('<?= base_url('desa') ?>')">
        <div class="nature-decoration decoration-1">🏞️</div>
        <div class="stat-icon">
            <i class="bi bi-geo-alt-fill"></i>
        </div>
        <div class="stat-number" data-target="<?= $total_desa ?>"><?= $total_desa ?></div>
        <div class="stat-label">
            <i class="bi bi-houses-fill"></i>
            Desa Wisata Terdaftar
        </div>
    </div>

    <div class="stat-card blue" onclick="navigateTo('<?= base_url('paket') ?>')">
        <div class="nature-decoration decoration-1">🎒</div>
        <div class="stat-icon">
            <i class="bi bi-bag-check-fill"></i>
        </div>
        <div class="stat-number" data-target="<?= $total_paket ?>"><?= $total_paket ?></div>
        <div class="stat-label">
            <i class="bi bi-box-seam"></i>
            Paket Wisata Tersedia
        </div>
    </div>

    <div class="stat-card orange" onclick="navigateTo('<?= base_url('event') ?>')">
        <div class="nature-decoration decoration-1">🎉</div>
        <div class="stat-icon">
            <i class="bi bi-calendar-event-fill"></i>
        </div>
        <div class="stat-number" data-target="<?= $total_event ?>"><?= $total_event ?></div>
        <div class="stat-label">
            <i class="bi bi-calendar3"></i>
            Event Wisata Aktif
        </div>
    </div>

    <div class="stat-card purple" onclick="navigateTo('<?= base_url('user') ?>')">
        <div class="nature-decoration decoration-1">👥</div>
        <div class="stat-icon">
            <i class="bi bi-people-fill"></i>
        </div>
        <div class="stat-number" data-target="<?= $total_user ?>"><?= $total_user ?></div>
        <div class="stat-label">
            <i class="bi bi-person-badge"></i>
            Pengelola Sistem
        </div>
    </div>
</div>

<div class="info-cards-container">
    <div class="info-card" style="animation-delay: 0.2s;">
        <div class="nature-decoration decoration-2">🌱</div>
        <h5>
            <i class="bi bi-info-circle-fill"></i>
            Tentang Sistem
        </h5>
        <ul>
            <li>
                <i class="bi bi-check-circle-fill"></i>
                Manajemen Wisata Desa Terpadu
            </li>
            <li>
                <i class="bi bi-check-circle-fill"></i>
                Kelola Destinasi & Paket Wisata
            </li>
            <li>
                <i class="bi bi-check-circle-fill"></i>
                Dashboard Real-time & Responsif
            </li>
            <li>
                <i class="bi bi-check-circle-fill"></i>
                Multi-user Management System
            </li>
            <li>
                <i class="bi bi-check-circle-fill"></i>
                Laporan & Analitik Lengkap
            </li>
        </ul>
    </div>

    <div class="info-card" style="animation-delay: 0.4s;">
        <div class="nature-decoration decoration-2">⚡</div>
        <h5>
            <i class="bi bi-lightning-fill"></i>
            Aksi Cepat
        </h5>
        <ul>
            <li>
                <a href="<?= base_url('desa/create') ?>">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Desa Wisata Baru
                </a>
            </li>
            <li>
                <a href="<?= base_url('paket/create') ?>">
                    <i class="bi bi-plus-circle"></i>
                    Buat Paket Wisata
                </a>
            </li>
            <li>
                <a href="<?= base_url('event/create') ?>">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Event Wisata
                </a>
            </li>
            <li>
                <a href="<?= base_url('user/create') ?>">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Pengelola
                </a>
            </li>
            <li>
                <a href="<?= base_url('dashboard') ?>">
                    <i class="bi bi-graph-up"></i>
                    Lihat Statistik Lengkap
                </a>
            </li>
        </ul>
    </div>

    <div class="info-card" style="animation-delay: 0.6s;">
        <div class="nature-decoration decoration-2">⚙️</div>
        <h5>
            <i class="bi bi-gear-fill"></i>
            Status Sistem
        </h5>
        <ul>
            <li>
                <i class="bi bi-check-circle-fill text-success"></i>
                Database: <strong class="text-success">Connected</strong>
            </li>
            <li>
                <i class="bi bi-check-circle-fill text-success"></i>
                Server: <strong class="text-success">Running</strong>
            </li>
            <li>
                <i class="bi bi-person-circle text-primary"></i>
                User: <strong><?= session('email') ?></strong>
            </li>
            <li>
                <i class="bi bi-shield-check text-warning"></i>
                Role: <strong><?= ucfirst(session('role')) ?></strong>
            </li>
            <li>
                <i class="bi bi-clock text-info"></i>
                Waktu: <strong id="currentTime"></strong>
            </li>
        </ul>
    </div>
</div>

<script>
    // Navigate to URL
    function navigateTo(url) {
        showLoading();
        setTimeout(() => {
            window.location.href = url;
        }, 300);
    }

    // Animate counter
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const statNumbers = entry.target.querySelectorAll('.stat-number');
                statNumbers.forEach(stat => {
                    const target = parseInt(stat.getAttribute('data-target'));
                    animateCounter(stat, target);
                });
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const statsContainer = document.querySelector('.stats-container');
    if (statsContainer) {
        observer.observe(statsContainer);
    }

    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 60;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 25);
    }

    // Click animation for stat cards
    document.querySelectorAll('.stat-card').forEach(card => {
        card.addEventListener('click', function() {
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 200);
        });
    });

    // Current time display
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
        const dateString = now.toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        const timeElement = document.getElementById('currentTime');
        if (timeElement) {
            timeElement.textContent = `${timeString} - ${dateString}`;
        }
    }

    updateTime();
    setInterval(updateTime, 1000);

    // Welcome message
    window.addEventListener('load', function() {
        <?php if (!session()->has('welcomed')): ?>
            Swal.fire({
                icon: 'success',
                title: '🏞️ Selamat Datang!',
                html: '<strong>Selamat datang di Dashboard Wisata Desa Indonesia!</strong><br>Mari bersama memajukan wisata desa kita! 🇮🇩',
                timer: 3000,
                showConfirmButton: false,
                position: 'top-end',
                toast: true,
                background: 'linear-gradient(135deg, #2ecc71 0%, #27ae60 100%)',
                color: 'white'
            });
            <?php session()->set('welcomed', true); ?>
        <?php endif; ?>
    });
</script>

<?= view('layout/footer') ?>