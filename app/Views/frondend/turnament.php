    <?= $this->extend('frondend/template'); ?>

        
    <?= $this->Section('content'); ?>
    <section>
        <div class="container center" style="margin-top: 20px;">
            <h3 class="text-header"><i class="fa fa-trophy" aria-hidden="true"></i> Turnament</h3>
            <hr>
            <div class="row font-roboto">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card mb-3" style="border: none; border-radius: 0;">
                        <div class="card-body image-responsive2">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card-body">
                                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Pelaksanaan</th>
                                                            <th>Tournament</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($tournament):  ?>
                                                            <?php foreach ($tournament as $item): ?>
                                                                <tr>
                                                                    <td class="col-1"></td>
                                                                    <td class="col-4">
                                                                    <?php 
                                                                        $tgl_awal = date('d', strtotime($item['tgl_awal']));
                                                                        $tgl_akhir = date('d F Y', strtotime($item['tgl_akhir']));
                                                                        $bulan_awal = date('F', strtotime($item['tgl_awal']));
                                                                        $bulan_akhir = date('F', strtotime($item['tgl_akhir']));

                                                                        if ($bulan_awal == $bulan_akhir) {
                                                                            echo $tgl_awal . ' - ' . $tgl_akhir;
                                                                        } else {
                                                                            echo date('d F Y', strtotime($item['tgl_awal'])) . ' - ' . $tgl_akhir;
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="col-7" style="text-align: center;">
                                                                        <h5 class="text-header mb-0"><?= $item['judul']; ?></h5>
                                                                        <p class="mb-0">Venue : <?= $item['venue']; ?></p>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
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