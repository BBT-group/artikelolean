<?= $this->extend('Admin/template') ?>

<?= $this->section('title') ?>
Link
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="card" style="border: none;">
        <ol class="breadcrumb">
            <li style="margin-right: 10px;"><a class="crumb" href="<?php echo base_url('/beranda') ?>"><i class="bx bx-home nav_icon"></i></a></li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba">Setting</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> User Manager</li>
        </ol>
    </div>
    <div class="card">
        <div class="table-responsive">
            <div class="flex-box pb-1">
                <div class="col-12 mb-1 p-0">
                    <div class="col-12 mb-1 p-0">
                        <a href="<?= base_url('administrator/usermanager/tambah') ?>" method="post" class="btn btn-sm btn-primary"><i class="bx bx-plus-medical"></i> Tambah</a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Name</th>
                        <th>Active</th>
                        <th>Last Login</th>
                        <th>Online</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $item) : ?>
                        <tr>
                            <td><?= $item['id_ms_user_manager'] ?></td>
                            <td><?= $item['username'] ?></td>
                            <td><?= $item['role'] ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['aktif'] ? 'Yes' : 'No' ?></td>
                            <td><?= $item['last_login'] ?></td>
                            <td><?= $item['online'] ? 'Online' : 'Offline' ?></td>
                            <td style="text-align: center;">
                                <a href="<?= base_url('administrator/usermanager/update/') . $item['id_ms_user_manager'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Update"><i class="bx bx-edit"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>