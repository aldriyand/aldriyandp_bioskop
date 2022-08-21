<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Edit Schedule - <?= $schedule->kd_tayang ?></h1>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form enctype="multipart/form-data" action="<?= base_url() ?>admin/schedules/update" method="post">
                        <div class="mb-3">
                            <label for="id_film" class="form-label">Judul Film</label>
                            <select name="id_film" id="id_film" class="form-select" required>
                                <option value="">- Choose movie -</option>
                                <?php foreach ($movies as $v) : ?>
                                    <option value="<?= $v->id ?>" <?= $v->id == $schedule->id_film ? 'selected' : '' ?>><?= $v->judul_film ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_bioskop" class="form-label">Nama Bioskop</label>
                            <select name="id_bioskop" id="id_bioskop" class="form-select" required>
                                <option value="">- Choose movie -</option>
                                <?php foreach ($cinemas as $v) : ?>
                                    <option value="<?= $v->id ?>" <?= $v->id == $schedule->id_bioskop ? 'selected' : '' ?>><?= $v->nama_bioskop ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_tayang" class="form-label">Waktu Tayang</label>
                            <input type="datetime-local" class="form-control" name="tgl_tayang" id="tgl_tayang" value="<?= $schedule->tgl_tayang ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_kursi" class="form-label">Jumlah Kursi</label>
                            <input type="number" max="500" class="form-control" name="jumlah_kursi" id="jumlah_kursi" placeholder="Jumlah Kursi" value="<?= $schedule->jumlah_kursi ?>" required>
                        </div>
                        <div class="mb-3">
                            <!-- <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label> -->
                            <label for="produksi" class="form-label">Aktif?</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" <?= $schedule->is_active == 'Y' ? 'checked' : '' ?>>
                            </div>
                        </div>
                        <input class="btn btn-success" type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>