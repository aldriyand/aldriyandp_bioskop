<section id="movie-detail" class="movie-detail" style="margin-top: 8%; margin-bottom: 6%;">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="card bg-dark p-3">
                <div class="text-center">
                    <h3>Yeay!</h3>
                    <p>Silakan melakukan pembayaran ke nomor VA berikut:</p>
                    <h4><?= $order->kd_order ?></h4>
                    <br>
                    <form action="<?php echo base_url(); ?>update-status/<?= $order->id ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $order->id ?>">
                        <input class="btn btn-success" type="submit" name="submit" value="Saya sudah bayar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>