    <?= $this->extend('frondend/template'); ?>

    <?= $this->Section('content'); ?>
    <section>
        <div class="container center" style="margin-top: 20px;">
            <h3 class="text-header"><i class="fa fa-images" aria-hidden="true"></i> <?= $album['nama_album']; ?></h3>
            <hr>
            <div class="row font-roboto">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="card mb-3 col-md-12 col-sm-12 col-xs-12" style="border: none; border-radius: 0;">
                        <div class="card-body image-responsive2">
                            <div class="row">
                                <?php $media = array_merge($foto, $video); foreach($media as $item): ?>
                                    <div class="col-4 col-md-4 col-sm-6 col-xs-4">
                                        <?php if (isset($item['foto'])): ?>
                                            <!-- Menampilkan Foto -->
                                            <a href="<?= base_url('/uploads/album/foto/' ) . $item['foto'] ?>" class="fancybox" rel="ligthbox" data-fancybox="images-galeri" data-caption="foto">
                                                <div class="galeri-img-item">
                                                    <img src="<?= base_url('/uploads/album/foto/' ) . $item['foto'] ?>" class="zoom img-fluid" alt="Foto">
                                                </div>
                                            </a>
                                        <?php elseif (isset($item['video'])): ?>
                                            <!-- Menampilkan Video -->
                                            <a href="<?= base_url('/uploads/album/video/' ) . $item['video'] ?>" class="fancybox" rel="ligthbox" data-fancybox="images-galeri" data-caption="video">
                                                <div class="galeri-img-item">
                                                    <video controls width="100%">
                                                        <source src="<?= base_url('/uploads/album/video/' ) . $item['video'] ?>" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="border: none; border-radius: 0;">
                        <div style="position: relative; z-index: 1; margin-bottom: 10px; border-bottom: 1px solid #d0d5d8;">
                                <h6 style="font-size: 16px; margin-bottom: 0; line-height: 45px; height: 45px; min-width: 140px; padding: 0 30px; background-color: #ee002d; color: #fff; font-weight: 700; display: inline-block; text-align: center;">Kategori Gambar</h6>
                        </div>
                        <div class="card-body">
                            <div class="list-group mb-1">                        
                                <?php foreach ($albums as $item): ?>
                                <a class="list-group-item list-group-item-action" href="<?= $item['id_ms_album']?>"><?= $item['nama_album']; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?= $this->endSection(''); ?>