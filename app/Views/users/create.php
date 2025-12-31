<?= view('layout/header', ['title' => 'Tambah User']) ?>

<h2 class="mb-4">➕ Tambah User Baru</h2>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Form User Baru</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('user/store') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label">👤 Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" value="<?= old('name') ?>" required>
                        <?php if (isset($errors['name'])): ?>
                            <small class="text-danger"><?= $errors['name'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">📧 Email</label>
                        <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
                        <?php if (isset($errors['email'])): ?>
                            <small class="text-danger"><?= $errors['email'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">🔐 Password</label>
                        <input type="password" name="password" class="form-control" required>
                        <?php if (isset($errors['password'])): ?>
                            <small class="text-danger"><?= $errors['password'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">🔐 Konfirmasi Password</label>
                        <input type="password" name="password_confirm" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">👑 Role</label>
                        <select name="role" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="submit" class="btn btn-primary">💾 Simpan</button>
                        <a href="<?= base_url('user') ?>" class="btn btn-secondary">❌ Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>