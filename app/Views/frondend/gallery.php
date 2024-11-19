    <?= $this->extend('frondend/template'); ?>


    <?= $this->Section('content'); ?>
    <section>
        <div class="container center" style="margin-top: 20px;">
            <h3 class="text-header"><i class="fa fa-image" aria-hidden="true"></i> album gallery</h3>
            <hr>
            <div class="row font-roboto">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card mb-3" style="border: none; border-radius: 0;">
                        <div class="card-body image-responsive2">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 mb-4 wow fadeInUp" data-wow-duration="1.4s">
                                                <?php foreach ($album as $item): ?>
                                                    <?php if ($item['aktif'] == 1): ?>
                                                        <div class="card mb-4">
                                                            <a class="link-primary" href="<?= 'isi_gallery/' . $item['id_ms_album'] ?>">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-auto" style="padding-right: 0; color: #F9D876;">
                                                                            <i class="fa fa-folder" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col" style="color:black;">
                                                                            <?= $item['nama_album']; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?= $this->endSection(''); ?>