<?= view('layout/header', ['title' => 'Dashboard']) ?>

<style>
    .welcome-banner {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 40px;
        border-radius: 20px;
        margin-bottom: 30px;
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
        animation: slideInDown 0.6s ease-out;
    }

    .welcome-banner::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    .welcome-banner h1 {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 10px;
        position: relative;
        z-index: 1;
    }

    .welcome-banner p {
        font-size: 18px;
        opacity: 0.9;
        position: relative;
        z-index: 1;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        position: relative;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, transparent 0%, rgba(255,255,255,0.2) 100%);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .stat-card:hover::before {
        opacity: 1;
    }

    .stat-card:hover {
        transform: translateY(-15px) scale(1.03);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .stat-card.blue {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .stat-card.green {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        color: white;
    }

    .stat-card.orange {
        background: linear-gradient(135deg, #fc4a1a 0%, #f7b733 100%);
        color: white;
    }

    .stat-card.pink {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }

    .stat-icon {
        font-size: 48px;
        opacity: 0.3;
        position: absolute;
        right: 20px;
        top: 20px;
        transition: all 0.3s;
    }

    .stat-card:hover .stat-icon {
        opacity: 0.5;
        transform: scale(1.2) rotate(10deg);
    }

    .stat-number {
        font-size: 48px;
        font-weight: 800;
        margin-bottom: 5px;
        position: relative;
        z-index: 1;
    }

    .stat-label {
        font-size: 16px;
        opacity: 0.9;
        font-weight: 500;
        position: relative;
        z-index: 1;
    }

    .info-cards-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }

    .info-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        animation: fadeInUp 0.8s ease-out;
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    }

    .info-card h5 {
        color: #667eea;
        font-weight: 700;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-card ul {
        list-style: none;
        padding: 0;
    }

    .info-card ul li {
        padding: 10px 0;
        border-bottom: 1px solid #f0f0f0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-card ul li:last-child {
        border-bottom: none;
    }

    .info-card ul li i {
        color: #667eea;
        font-size: 18px;
    }

    @media (max-width: 768px) {
        .welcome-banner h1 {
            font-size: 24px;
        }
        
        .welcome-banner p {
            font-size: 14px;
        }
        
        .stat-number {
            font-size: 32px;
        }
    }
</style>

<div class="welcome-banner">
    <h1>
        <i class="bi bi-speedometer2"></i>
        Dashboard Wisata Desa
    </h1>
    <p>Selamat datang di sistem manajemen wisata desa!</p>
</div>

<div class="stats-container">
    <div class="stat-card blue" onclick="navigateTo('<?= base_url('desa') ?>')">
        <div class="stat-icon">
            <i class="bi bi-geo-alt-fill"></i>
        </div>
        <div class="stat-number" data-target="<?= $total_desa ?>"><?= $total_desa ?></div>
        <div class="stat-label">Desa Wisata</div>
    </div>

    <div class="stat-card green" onclick="navigateTo('<?= base_url('paket') ?>')">
        <div class="stat-icon">
            <i class="bi bi-bag-fill"></i>
        </div>
        <div class="stat-number" data-target="<?= $total_paket ?>"><?= $total_paket ?></div>
        <div class="stat-label">Paket Wisata</div>
    </div>

    <div class="stat-card orange" onclick="navigateTo('<?= base_url('event') ?>')">
        <div class="stat-icon">
            <i class="bi bi-calendar-event-fill"></i>
        </div>
        <div class="stat-number" data-target="<?= $total_event ?>"><?= $total_event ?></div>
        <div class="stat-label">Event Wisata</div>
    </div>

    <div class="stat-card pink" onclick="navigateTo('<?= base_url('user') ?>')">
        <div class="stat-icon">
            <i class="bi bi-people-fill"></i>
        </div>
        <div class="stat-number" data-target="<?= $total_user ?>"><?= $total_user ?></div>
        <div class="stat-label">User/Admin</div>
    </div>
</div>

<div class="info-cards-container">
    <div class="info-card" style="animation-delay: 0.2s;">
        <h5>
            <i class="bi bi-info-circle-fill"></i>
            Tentang Aplikasi
        </h5>
        <ul>
            <li>
                <i class="bi bi-check-circle-fill"></i>
                Sistem Manajemen Wisata Desa Terpadu
            </li>
            <li>
                <i class="bi bi-check-circle-fill"></i>
                Kelola Desa, Paket, dan Event Wisata
            </li>
            <li>
                <i class="bi bi-check-circle-fill"></i>
                Dashboard Interaktif dan Responsif
            </li>
            <li>
                <i class="bi bi-check-circle-fill"></i>
                Manajemen User Multi-Role
            </li>
        </ul>
    </div>

    <div class="info-card" style="animation-delay: 0.4s;">
        <h5>
            <i class="bi bi-lightning-fill"></i>
            Menu Cepat
        </h5>
        <ul>
            <li>
                <a href="<?= base_url('desa/create') ?>" style="text-decoration: none; color: inherit;">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Desa Wisata Baru
                </a>
            </li>
            <li>
                <a href="<?= base_url('paket/create') ?>" style="text-decoration: none; color: inherit;">
                    <i class="bi bi-plus-circle"></i>
                    Buat Paket Wisata
                </a>
            </li>
            <li>
                <a href="<?= base_url('event/create') ?>" style="text-decoration: none; color: inherit;">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Event Baru
                </a>
            </li>
            <li>
                <a href="<?= base_url('user/create') ?>" style="text-decoration: none; color: inherit;">
                    <i class="bi bi-plus-circle"></i>
                    Tambah User/Admin
                </a>
            </li>
        </ul>
    </div>

    <div class="info-card" style="animation-delay: 0.6s;">
        <h5>
            <i class="bi bi-gear-fill"></i>
            Status Sistem
        </h5>
        <ul>
            <li>
                <i class="bi bi-check-circle-fill text-success"></i>
                Database: Connected
            </li>
            <li>
                <i class="bi bi-check-circle-fill text-success"></i>
                Server: Running
            </li>
            <li>
                <i class="bi bi-check-circle-fill text-success"></i>
                Login: <?= session('email') ?>
            </li>
            <li>
                <i class="bi bi-check-circle-fill text-success"></i>
                Role: <?= ucfirst(session('role')) ?>
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

    // Animate counter on scroll
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
        const increment = target / 50;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 30);
    }

    // Add click animation to stat cards
    document.querySelectorAll('.stat-card').forEach(card => {
        card.addEventListener('click', function() {
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 200);
        });
    });

    // Animate info cards on hover
    document.querySelectorAll('.info-card li a').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.paddingLeft = '10px';
            this.style.transition = 'padding-left 0.3s';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.paddingLeft = '0';
        });
    });

    // Show welcome message
    window.addEventListener('load', function() {
        <?php if (!session()->has('welcomed')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Selamat Datang!',
                text: 'Selamat datang di Dashboard Wisata Desa',
                timer: 2000,
                showConfirmButton: false,
                position: 'top-end',
                toast: true
            });
            <?php session()->set('welcomed', true); ?>
        <?php endif; ?>
    });
</script>

<?= view('layout/footer') ?>