<?= $this->extend('frondend/template'); ?>


    <?= $this->Section('content'); ?>
    <style>
        /* Base style for the carousel */
        .carousel {
            width: 100%;
            height: 70vh;
            /* 70% of the viewport height */
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Example carousel content */
        .carousel img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Media query for larger screens */
        @media (min-width: 768px) {
            .carousel {
                height: 500px;
                /* Fixed height for desktops or tablets */
            }
        }
    </style>

    <section>
        <div class="container center">
            
            <div style="margin-top: 2.5rem !important; margin-bottom: 2.5rem !important;">
                <div class="row">
                    <div class="col-lg-8">
                        <?php foreach ($artikels as $artikel): ?>
                            <?php if ($artikel['aktif'] == 1): ?>
                                <div class="card" style="border: none; border-radius: 0;">
                                    <div class="card-body px-0 pt-0">
                                        <div class="card-body px-0 pt-0">
                                            <h5 class="card-title mb-0 artikel"><a href="<?= 'isi_artikel/' . $artikel['id_ms_artikel'] ?>"><?= $artikel['judul'] ?></a></h5>
                                            <p class="card-text" style="color: #EE002D; font-weight: 700; text-transform: uppercase;"><?= $artikel['tanggal']; ?></p>

                                            <img src="<?= $artikel['thumbnail']; ?>" class="card-img-top" style="height: 20rem; object-fit: cover;">

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="col-lg-4">
                        <div class="card" style="border: none; border-radius: 0;">
                            <div style="position: relative; z-index: 1; margin-bottom: 10px; border-bottom: 1px solid #d0d5d8;">
                                <h6 style="font-size: 16px; margin-bottom: 0; line-height: 45px; height: 45px; min-width: 140px; padding: 0 30px; background-color: #ee002d; color: #fff; font-weight: 700; display: inline-block; text-align: center;">Kategori Berita</h6>
                            </div>
                            <div class="list-group mb-4">
                                <?php foreach ($kategori as $item): ?>
                                    <?php if ($item['aktif'] == 1): ?>
                                        <a href="<?= base_url('kategoriartikel/') . $item['id_ms_kategori_artikel'] ?>" class="list-group-item list-group-item-action"><?= $item['nama_kategori']; ?></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <?php setlocale(LC_TIME, 'id_ID.utf8'); // Atur locale ke Bahasa Indonesia 
                            ?>

                            <?php foreach ($artikels as $artikel): ?>
                                <?php if ($item['aktif'] == 1): ?>
                                    <div class="row mt-3">
                                        <div class="col-auto mb-2" style="padding-right: 0;">
                                            <a href="<?= 'isi_artikel/' . $artikel['id_ms_artikel'] ?>"><img src="<?= $artikel['thumbnail'] ?>" alt="" width="75px" height="75px"></a>
                                        </div>
                                        <div class="col mb-2">
                                            <a class="berita-kanan" href="<?= 'isi_artikel/' . $artikel['id_ms_artikel'] ?>"><?= $artikel['judul']; ?></a><br>
                                            <h6><?php
                                                echo strftime('%d %B %Y', strtotime($artikel['tanggal']));
                                                ?></h6>
                                        </div>
                                    </div>
                                    <hr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?= $this->endSection(''); ?>