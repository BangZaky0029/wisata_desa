<?= view('layout/header', ['title' => 'Tambah Event']) ?>

<h2 class="mb-4">➕ Tambah Event Wisata</h2>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Form Event Baru</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('event/store') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label">🎉 Nama Event</label>
                        <input type="text" name="name" class="form-control" value="<?= old('name') ?>" required>
                        <?php if (isset($errors['name'])): ?>
                            <small class="text-danger"><?= $errors['name'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">📅 Tanggal</label>
                        <input type="date" name="date" class="form-control" value="<?= old('date') ?>" required>
                        <?php if (isset($errors['date'])): ?>
                            <small class="text-danger"><?= $errors['date'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">📝 Deskripsi</label>
                        <textarea name="description" class="form-control" rows="5" required><?= old('description') ?></textarea>
                        <?php if (isset($errors['description'])): ?>
                            <small class="text-danger"><?= $errors['description'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="submit" class="btn btn-primary">💾 Simpan</button>
                        <a href="<?= base_url('event') ?>" class="btn btn-secondary">❌ Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>