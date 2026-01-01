<?= view('layout/header', ['title' => 'Manajemen User']) ?>

<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 30px;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        animation: slideInDown 0.5s ease-out;
    }

    .page-header h2 {
        margin: 0;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .user-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        margin-bottom: 15px;
        border: none;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .user-card:hover {
        transform: translateX(5px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
    }

    .user-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        font-weight: bold;
    }

    .badge-role {
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 12px;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-action {
        padding: 8px 15px;
        border-radius: 8px;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .empty-state {
        text-align: center;
        padding: 80px 20px;
        animation: fadeIn 0.8s ease-out;
    }

    .empty-state i {
        font-size: 80px;
        color: #ddd;
        margin-bottom: 20px;
    }
</style>

<div class="page-header animate__animated animate__fadeInDown">
    <div class="d-flex justify-content-between align-items-center">
        <h2>
            <i class="bi bi-people-fill"></i>
            Manajemen User / Admin
        </h2>
        <a href="<?= base_url('user/create') ?>" class="btn btn-light btn-lg">
            <i class="bi bi-plus-circle"></i> Tambah User
        </a>
    </div>
</div>

<div class="card animate__animated animate__fadeInUp">
    <div class="card-body p-0">
        <?php if (empty($users)): ?>
            <div class="empty-state">
                <i class="bi bi-inbox"></i>
                <h4>Belum Ada User</h4>
                <p class="text-muted">Klik tombol "Tambah User" untuk menambahkan user baru</p>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 80px;">Avatar</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th style="width: 120px;">Role</th>
                            <th style="width: 150px;">Dibuat</th>
                            <th style="width: 200px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $index => $user): ?>
                        <tr style="animation: fadeInUp 0.5s ease-out <?= ($index * 0.1) ?>s both;">
                            <td>
                                <div class="user-avatar">
                                    <?= strtoupper(substr($user['name'], 0, 1)) ?>
                                </div>
                            </td>
                            <td>
                                <strong><?= esc($user['name']) ?></strong>
                            </td>
                            <td>
                                <i class="bi bi-envelope"></i> <?= esc($user['email']) ?>
                            </td>
                            <td>
                                <?php if ($user['role'] === 'admin'): ?>
                                    <span class="badge badge-role bg-danger">
                                        <i class="bi bi-shield-check"></i> Admin
                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-role bg-info">
                                        <i class="bi bi-person"></i> User
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <small class="text-muted">
                                    <i class="bi bi-calendar"></i>
                                    <?= date('d M Y', strtotime($user['created_at'])) ?>
                                </small>
                            </td>
                            <td>
                                <div class="action-buttons justify-content-center">
                                    <a href="<?= base_url('user/edit/' . $user['id']) ?>" 
                                       class="btn btn-warning btn-sm btn-action"
                                       title="Edit User">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <?php if ($user['id'] != session('user_id')): ?>
                                        <a href="<?= base_url('user/delete/' . $user['id']) ?>" 
                                           class="btn btn-danger btn-sm btn-action"
                                           onclick="return confirmDelete(event, '<?= esc($user['name']) ?>')"
                                           title="Hapus User">
                                            <i class="bi bi-trash"></i> Hapus
                                        </a>
                                    <?php else: ?>
                                        <button class="btn btn-secondary btn-sm btn-action" 
                                                disabled 
                                                title="Tidak dapat menghapus akun sendiri">
                                            <i class="bi bi-lock"></i> Terkunci
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= view('layout/footer') ?>