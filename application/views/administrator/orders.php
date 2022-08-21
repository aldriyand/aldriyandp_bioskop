<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Orders</strong> Management</h1>

    <div class="row">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Order List</h5>
                </div>
                <table class="table table-hover table-striped my-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Order</th>
                            <th>Judul Film</th>
                            <th>Nama Bioskop</th>
                            <th>Nomor Kursi</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $key => $i) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $i->kd_order ?></td>
                                <td><?= $i->judul_film ?></td>
                                <td><?= $i->nama_bioskop ?></td>
                                <td><?= $i->nomor_kursi ?></td>
                                <td>Rp. <?= $i->total ?></td>
                                <td>
                                    <?php if ($i->status == 'PENDING') : ?>
                                        <span class="badge bg-warning">Pending</span>
                                    <?php elseif ($i->status == 'PAID') : ?>
                                        <span class="badge bg-primary">Paid</span>
                                    <?php elseif ($i->status == 'VERIFIED') : ?>
                                        <span class="badge bg-success">Verified</span>
                                    <?php endif; ?>
                                </td>
                                <td class="table-action">
                                    <a href="<?= base_url() ?>admin/orders/verify/<?= $i->id ?>" onclick="return confirm('Are you sure want to verify this record?')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                        </svg></a>
                                    <a href="<?= base_url() ?>admin/orders/delete/<?= $i->id ?>" onclick="return confirm('Are you sure want to delete this record?')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>