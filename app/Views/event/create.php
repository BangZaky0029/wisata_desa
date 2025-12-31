<?= view('layout/header', ['title' => 'Tambah Paket']) ?>

<h2 class="mb-4">Tambah Paket Wisata</h2>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('paket/store') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Desa Wisata</label>
                        <select name="desa_id" class="form-control" required>
                            <option value="">-- Pilih Desa --</option>
                            <?php foreach ($desa as $d): ?>
                            <option value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Paket</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('paket') ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>