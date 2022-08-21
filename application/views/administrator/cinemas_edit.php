<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Edit Cinema - <?= $cinema->nama_bioskop ?></h1>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form enctype="multipart/form-data" action="<?= base_url() ?>admin/cinemas/update" method="post">
                        <input type="hidden" name="id" value="<?= $cinema->id ?>">
                        <div class="mb-3">
                            <label for="kd_bioskop" class="form-label">Kode Bioskop</label>
                            <input type="text" maxlength="3" class="form-control" name="kd_bioskop" id="kd_bioskop" placeholder="Kode Bioskop" value="<?= $cinema->kd_bioskop ?>" disabled required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_bioskop" class="form-label">Nama Bioskop</label>
                            <input type="text" maxlength="100" class="form-control" name="nama_bioskop" id="nama_bioskop" placeholder="nama_bioskop" value="<?= $cinema->nama_bioskop ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_bioskop" class="form-label">Alamat Bioskop</label>
                            <input type="text" max="200" class="form-control" name="alamat_bioskop" id="alamat_bioskop" placeholder="alamat_bioskop" value="<?= $cinema->alamat_bioskop ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="kota" class="form-label">Kota</label>
                            <input type="text" max="100" class="form-control" name="kota" id="kota" placeholder="kota" value="<?= $cinema->kota ?>" required>
                        </div>
                        <div class="mb-3">
                            <!-- <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label> -->
                            <label for="produksi" class="form-label">Aktif?</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" <?= $cinema->is_active == 'Y' ? 'checked' : '' ?>>
                            </div>
                        </div>
                        <input class="btn btn-success" type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>