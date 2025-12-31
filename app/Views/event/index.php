<?= view('layout/header', ['title' => 'Event Wisata']) ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>🎉 Event Wisata</h2>
    <a href="<?= base_url('event/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus"></i> Tambah Event
    </a>
</div>

<div class="card">
    <div class="card-body">
        <?php if (empty($event)): ?>
            <div class="alert alert-info">
                📭 Belum ada event yang terdaftar
            </div>
        <?php else: ?>
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Event</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($event as $ev): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><strong><?= esc($ev['name']) ?></strong></td>
                        <td><?= date('d M Y', strtotime($ev['date'])) ?></td>
                        <td><?= substr($ev['description'], 0, 50) ?>...</td>
                        <td>
                            <a href="<?= base_url('event/edit/' . $ev['id']) ?>" class="btn btn-sm btn-warning">✏️ Edit</a>
                            <a href="<?= base_url('event/delete/' . $ev['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus event ini?')">🗑️ Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?= view('layout/footer') ?>