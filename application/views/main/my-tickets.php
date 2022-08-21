<section id="movie-detail" class="movie-detail" style="margin-top: 8%; margin-bottom: 6% ">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark">
                    <table class="table table-striped text-white">
                        <tr>
                            <th class="text-white">Kode Tiket</th>
                            <th class="text-white">Status</th>
                        </tr>
                        <?php foreach ($order as $v) : ?>
                            <tr>
                                <td class="text-white"><?= $v->kd_order ?></td>
                                <td>
                                    <?php if ($v->status == 'PENDING') : ?>
                                        <span class="badge bg-warning">Pending</span>
                                    <?php elseif ($v->status == 'PAID') : ?>
                                        <span class="badge bg-primary">Paid</span>
                                    <?php elseif ($v->status == 'VERIFIED') : ?>
                                        <span class="badge bg-success">Verified</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>