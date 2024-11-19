<?= $this->extend('frondend/template'); ?>

        
<?= $this->Section('content'); ?>
<section>
    <div class="container center" style="margin-top: 20px;">
        <h3 class="text-header"><i class="fa fa-newspaper" aria-hidden="true"></i> <?= $kategoris['nama_kategori']; ?></h3>
        <hr>
        <div style="margin-top: 1.5rem !important; margin-bottom: 2.5rem !important;">
            <div class="row">
                <div class="col-lg-8">
                    <?php foreach ($beritas as $item): ?>
                        <div class="card" style="border: none; border-radius: 0;">
                            <div class="card-body px-0 pt-0">
                                <h5 class="card-title mb-0 berita"><a href="<?= 'isi_berita/' . $item['id_ms_berita'] ?>"><?= $item['judul'] ?></a></h5>
                                <p class="card-text" style="color: #EE002D; font-weight: 700; text-transform: uppercase;"><?= $item['tgl_waktu']; ?></p>
                                <img src="<?= $item['thumbnail'] ?>" class="card-img-top" style="height: 20rem; object-fit: cover;">
                                <p class="card-text mt-2"><?= substr($item['deskripsi'], 0, 250); ?>...
                                    <span style="color: #EE002D; font-weight: bold; text-transform: uppercase; font-family: 'Oswald', sans-serif;">
                                        <a href="<?= 'isi_berita/' . $item['id_ms_berita'] ?>">Selengkapnya</a>
                                    </span>
                                </p>
                            </div>
                        </div>
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
                                <a href="<?= $item['id_ms_kategori_berita'] ?>" class="list-group-item list-group-item-action"><?= $item['nama_kategori']; ?></a>
                                <?php endif; ?>
                            <?php endforeach; ?>                      
                        </div>
                        <?php setlocale(LC_TIME, 'id_ID.utf8'); // Atur locale ke Bahasa Indonesia ?>
                        <?php foreach ($beritas as $berita): ?>
                            <?php if ($berita['aktif'] == 1): ?>
                            <div class="row mt-3">
                                <div class="col-auto mb-2" style="padding-right: 0;">
                                    <a href="<?= 'isi_berita/' . $berita['id_ms_berita'] ?>"><img src="<?= $berita['thumbnail'] ?>" alt="" width="75px" height="75px"></a>
                                </div>
                                <div class="col mb-2">
                                    <a class="berita-kanan" href="<?= 'isi_berita/' . $berita['id_ms_berita'] ?>"><?= $berita['judul']; ?></a><br>
                                    <h6><?php 
                                        echo strftime('%d %B %Y', strtotime($berita['tgl_waktu'])); // Format tanggal: 17 September 2024
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