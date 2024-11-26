<?= $this->extend('Admin/template') ?>

<?= $this->section('title') ?>
Tambah
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="card" style="border: none;">
        <ol class="breadcrumb">
            <li style="margin-right: 10px;"><a class="crumb" href="<?php echo base_url('administrator/beranda') ?>"><i class="bx bx-home nav_icon"></i></a></li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba">Setting</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Link</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Tambah</li>
        </ol>
    </div>
    <div class="card">
        <form action="<?= base_url('administrator/link/simpan') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="nama_link" class="form-label">Nama Link:</label>
                <input type="text" class="form-control" id="nama_link" name="nama_link">
            </div>
            <div class="mb-3">
                <label for="isi_link" class="form-label">Link:</label>
                <input type="text" class="form-control" id="isi_link" name="isi_link">
            </div>

            <button type="submit">Submit</button>
            <button type="button" onclick="goBack()">Kembali</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>