<?= view('layout/header', ['title' => 'Desa Wisata']) ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Desa Wisata</h2>
    <a href="<?= base_url('desa/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus"></i> Tambah Desa
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($desa as $d): ?>
                <tr>
                    <td><?= $d['name'] ?></td>
                    <td><?= $d['location'] ?></td>
                    <td><?= substr($d['description'], 0, 50) ?>...</td>
                    <td>
                        <a href="<?= base_url('desa/edit/' . $d['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('desa/delete/' . $d['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= view('layout/footer') ?>