<?= $this->extend('Admin/template') ?>

<?= $this->section('title') ?>
Link
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
        </ol>
    </div>
    <div class="card">
        <div class="table-responsive">
            <div class="flex-box pb-1">
                <div class="col-12 mb-1 p-0">
                    <div class="col-12 mb-1 p-0">
                        <a href="<?= base_url('administrator/link/tambah') ?>" method="post" class="btn btn-sm btn-primary"><i class="bx bx-plus-medical"></i> Tambah</a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Link</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;foreach ($link as $item) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['nama_link']; ?></td>
                            <td><?= $item['isi_link']; ?></td>
                            <td class="col-1" style="text-align: center;">
                                <a href="<?= base_url('administrator/link/status/') . $item['id_ms_link'] ?>" class="btn btn-info"><?= ($item['aktif'] == '1') ? 'aktif' : 'non aktif' ?></a>
            
                            </td>
                            <td class="col-3" style="display: flexbox; text-align: center;">
                                <a href="<?= base_url('administrator/link/edit/') . $item['id_ms_link'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Update"><i class="bx bx-edit"></i></a>
                                <a href="<?= base_url('administrator/link/hapus/') . $item['id_ms_link'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" id="hapus-<?= $item['id_ms_link'] ?>"><i class="bx bx-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>