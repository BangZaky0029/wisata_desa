<?= view('layout/header', ['title' => 'Dashboard']) ?>

<h2 class="mb-4">Dashboard</h2>

<div class="row">
    <div class="col-md-3">
        <div class="stat-card blue">
            <div class="stat-number"><?= $total_desa ?></div>
            <div>Desa Wisata</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card green">
            <div class="stat-number"><?= $total_paket ?></div>
            <div>Paket Wisata</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card orange">
            <div class="stat-number"><?= $total_event ?></div>
            <div>Event Wisata</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card pink">
            <div class="stat-number"><?= $total_user ?></div>
            <div>User/Admin</div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5>Informasi Aplikasi</h5>
    </div>
    <div class="card-body">
        <p><strong>Selamat datang di Wisata Desa Dashboard!</strong></p>
        <p>Aplikasi ini dirancang untuk mengelola data desa wisata, paket wisata, event, dan user/admin dengan mudah.</p>
        <p>Silakan gunakan menu di sebelah kiri untuk mengelola data Anda.</p>
    </div>
</div>

<?= view('layout/footer') ?>