<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Add Cinema</h1>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php echo $this->session->flashdata('message'); ?>
                    <form enctype="multipart/form-data" action="<?= base_url() ?>admin/cinemas/create" method="post">
                        <div class="mb-3">
                            <label for="kd_bioskop" class="form-label">Kode Bioskop</label>
                            <input type="text" maxlength="3" class="form-control" name="kd_bioskop" id="kd_bioskop" placeholder="Kode Bioskop" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_bioskop" class="form-label">Nama Bioskop</label>
                            <input type="text" maxlength="100" class="form-control" name="nama_bioskop" id="nama_bioskop" placeholder="Nama Bioskop" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_bioskop" class="form-label">Alamat Bioskop</label>
                            <input type="text" max="200" class="form-control" name="alamat_bioskop" id="alamat_bioskop" placeholder="Alamat Bioskop" required>
                        </div>
                        <div class="mb-3">
                            <label for="kota" class="form-label">Kota</label>
                            <input type="text" max="100" class="form-control" name="kota" id="kota" placeholder="kota" required>
                        </div>
                        <input class="btn btn-success" type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>