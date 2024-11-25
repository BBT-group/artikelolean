<?= $this->extend('Admin\template') ?>

<?= $this->section('title') ?>
Tambah
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="card" style="border: none;">
        <ol class="breadcrumb">
            <li style="margin-right: 10px;"><a class="crumb" href="<?php echo base_url('administrator/beranda') ?>"><i class="bx bx-home nav_icon"></i></a></li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba">Artikel</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> List Artikel</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Edit Artikel</li>
        </ol>
    </div>
    <div class="card">
        <form action="<?= base_url('administrator/artikel/update') ?>" method="post">
            <?= csrf_field() ?>
            <input type="text" name="id_ms_artikel" required value="<?= $artikel['id_ms_artikel']; ?>" hidden>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $artikel['judul']; ?>">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori:</label>
                <select id="kategori" name="kategori" class="form-select">
                    <?php if ($kategori): ?>
                        <?php foreach ($kategori as $item): ?>
                            <option value="<?= $item['id_ms_kategori_artikel']; ?>"><?= $item['nama_kategori']; ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No kategori found</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Waktu:</label>
                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" value="<?= $artikel['tanggal']; ?>">
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi:</label>
                <textarea type="text" class="form-control" id="isi" name="isi"><?= $artikel['isi']; ?></textarea>
            </div>
            <button type="submit">Submit</button>
            <button type="button" onclick="goBack()">Kembali</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>