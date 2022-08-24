<!-- ======= Events Section ======= -->
<section id="events" class="events" style="margin-top: 6%">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Featured</h2>
            <p>Latest Movies</p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                <?php foreach ($latest as $v) : ?>
                    <div class="swiper-slide">
                        <div class="row event-item">
                            <div class="col-lg-4">
                                <img src="<?php echo base_url(); ?>uploads/movies/<?= $v->image_path ?>" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-8 pt-4 pt-lg-0 content">
                                <h3><?= $v->judul_film ?></h3>
                                <div class="price">
                                    <p><span><?= $v->rating ?>+</span></p>
                                </div>
                                <p class="fst-italic">
                                    <?= $v->synopsys ?>
                                </p>
                                <a href="<?php echo base_url(); ?>movie/<?= $v->id ?>" class="btn btn-success mt-3" style="border-radius: 50px;">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- End Events Section -->

<section id="chefs" class="chefs">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Movies</h2>
            <p>Now Playing</p>
        </div>

        <div class="row">
            <?php foreach ($playing as $v) : ?>
                <a class="col-lg-4 col-md-6 mb-5" href="<?php echo base_url(); ?>movie/<?= $v->id ?>">
                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                        <img src="<?php echo base_url(); ?>uploads/movies/<?= $v->image_path ?>" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <span><?= $v->synopsys ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h4><?= $v->judul_film ?></h4>
                    </div>
                </a>
            <?php endforeach; ?>

        </div>

    </div>
</section>