<?= $this->extend('Admin\template') ?>

<?= $this->section('title') ?>
Edit
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="card" style="border: none;">
        <ol class="breadcrumb">
            <li style="margin-right: 10px;"><a class="crumb" href="<?php echo base_url('administrator/beranda') ?>"><i class="bx bx-home nav_icon"></i></a></li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba">Artikel</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Kategori Artikel</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Edit</li>
        </ol>
    </div>
    <div class="card">
        <form action="<?= base_url('administrator/artikel/kategori/update') ?>" method="post">
            <?= csrf_field() ?>
            <input type="text" name="id_ms_kategori_artikel" hidden value="<?= $kategori['id_ms_kategori_artikel'] ?>">
            <label for="kategori">Kategori:</label>
            <input class="form-control" name="kategori" id="kategori" value="<?= $kategori['nama_kategori']; ?>"><br>

            <button type="submit">Submit</button>
            <button type="button" onclick="goBack()">Kembali</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>