<?= view('layout/header', ['title' => 'Edit Desa']) ?>

<h2 class="mb-4">Edit Desa Wisata</h2>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('desa/update/' . $desa['id']) ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama Desa</label>
                        <input type="text" name="name" class="form-control" value="<?= $desa['name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" name="location" class="form-control" value="<?= $desa['location'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4" required><?= $desa['description'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" name="photo" class="form-control" accept="image/*">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('desa') ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>