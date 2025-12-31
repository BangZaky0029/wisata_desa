<?= view('layout/header', ['title' => 'Tambah Desa']) ?>

<h2 class="mb-4">Tambah Desa Wisata</h2>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('desa/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama Desa</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" name="photo" class="form-control" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('desa') ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>