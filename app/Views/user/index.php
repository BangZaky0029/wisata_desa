<?= view('layout/header', ['title' => 'Paket Wisata']) ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Paket Wisata</h2>
    <a href="<?= base_url('paket/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus"></i> Tambah Paket
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nama Paket</th>
                    <th>Desa</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paket as $p): ?>
                <tr>
                    <td><?= $p['name'] ?></td>
                    <td><?= $p['desa_name'] ?></td>
                    <td>Rp <?= number_format($p['price'], 0, ',', '.') ?></td>
                    <td>
                        <a href="<?= base_url('paket/edit/' . $p['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('paket/delete/' . $p['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= view('layout/footer') ?>