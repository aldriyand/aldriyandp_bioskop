<section id="movie-detail" class="movie-detail" style="margin-top: 6%">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                <div class="movie-detail-img">
                    <img src="<?php echo base_url() ?>uploads/movies/<?= $movie->image_path ?>" alt="">
                </div>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                <h3><?= $movie->judul_film ?></h3>
                <span class="badge bg-info"><?= $movie->durasi ?> minutes</span>&nbsp;<span class="badge bg-warning"><?= $movie->rating ?>+</span>
                <table class="table table-sm table-borderless text-white">
                    <tr>
                        <td slot-scope="row">Tayang perdana</td>
                        <td slot-scope="row">:</td>
                        <td slot-scope="row"><?= $movie->tgl_launch ?></td>
                    </tr>
                    <tr>
                        <td slot-scope="row">Jenis Film</td>
                        <td slot-scope="row">:</td>
                        <td slot-scope="row"><?= $movie->genre ?></td>
                    </tr>
                    <tr>
                        <td slot-scope="row">Produser</td>
                        <td slot-scope="row">:</td>
                        <td slot-scope="row"><?= $movie->produser ?></td>
                    </tr>
                    <tr>
                        <td slot-scope="row">Sutradara</td>
                        <td slot-scope="row">:</td>
                        <td slot-scope="row"><?= $movie->sutradara ?></td>
                    </tr>
                    <tr>
                        <td slot-scope="row">Produksi</td>
                        <td slot-scope="row">:</td>
                        <td slot-scope="row"><?= $movie->produksi ?></td>
                    </tr>
                    <tr>
                        <td slot-scope="row">Casts</td>
                        <td slot-scope="row">:</td>
                        <td slot-scope="row"><?= $movie->cast ?></td>
                    </tr>
                </table>
                <p class="fst-italic">
                    <b>Synopsys</b>
                </p>
                <p>
                    <?= $movie->synopsys ?>
                </p>
                <!-- <button class="btn btn-success" style="border-radius: 20px;">
                    Buy Ticket
                </button> -->
            </div>
        </div>
        <div class="row">
            <table class="table table-sm text-white">
                <?php foreach ($cinema as $c) : ?>
                    <tr>
                        <td><?= $c->nama_bioskop ?></td>
                    </tr>
                    <tr>
                        <td>
                            <?php foreach ($schedule as $v) : ?>
                                <?php if ($v->id_bioskop == $c->id) : ?>
                                    <a href="<?php echo base_url() ?>book-ticket/<?= $v->id ?>" class="btn btn-sm btn-warning"><?= date('H:i', strtotime($v->tgl_tayang)) ?></a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</section>