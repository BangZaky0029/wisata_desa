<?= view('layout/header', ['title' => 'Manajemen User']) ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>👥 Manajemen User / Admin</h2>
    <a href="<?= base_url('user/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus"></i> Tambah User
    </a>
</div>

<div class="card">
    <div class="card-body">
        <?php if (empty($users)): ?>
            <div class="alert alert-info">
                📭 Belum ada user yang terdaftar
            </div>
        <?php else: ?>
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($users as $user): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><strong><?= esc($user['name']) ?></strong></td>
                        <td><?= esc($user['email']) ?></td>
                        <td>
                            <?php if ($user['role'] === 'admin'): ?>
                                <span class="badge bg-danger">Admin</span>
                            <?php else: ?>
                                <span class="badge bg-info">User</span>
                            <?php endif; ?>
                        </td>
                        <td><?= date('d M Y', strtotime($user['created_at'])) ?></td>
                        <td>
                            <a href="<?= base_url('user/edit/' . $user['id']) ?>" class="btn btn-sm btn-warning">✏️ Edit</a>
                            <?php if ($user['id'] != session('user_id')): ?>
                                <a href="<?= base_url('user/delete/' . $user['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus user ini?')">🗑️ Hapus</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?= view('layout/footer') ?>
