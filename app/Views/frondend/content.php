    <?= $this->extend('frondend/template'); ?>

    
    <?= $this->Section('content'); ?>
    <section>
        <div class="container center" style="margin-top: 20px;">
            <h3 class="text-header" ><i class="fa fa-folder-open" aria-hidden="true"></i> 
                <?php if (!empty($menu1)): ?>
                    <?php foreach ($menu1 as $item): ?>
                        <?= $item['nama_menu']; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </h3>
            <hr>
            <div class="row font-roboto">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card mb-3" style="border: none; border-radius: 0;">
                        <div class="card-body image-responsive2">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?php if (!empty($content)): ?>
                                    <?php foreach ($content as $item): ?>
                                        <?= $item['isi_content']; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?= $this->endSection(''); ?>
