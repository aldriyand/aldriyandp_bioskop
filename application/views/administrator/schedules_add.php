<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Add Schedule</h1>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form enctype="multipart/form-data" action="<?= base_url() ?>admin/schedules/create" method="post">
                        <div class="mb-3">
                            <label for="id_film" class="form-label">Judul Film</label>
                            <select name="id_film" id="id_film" class="form-select" required>
                                <option value="">- Choose movie -</option>
                                <?php foreach ($movies as $v) : ?>
                                    <option value="<?= $v->id ?>"><?= $v->judul_film ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_bioskop" class="form-label">Nama Bioskop</label>
                            <select name="id_bioskop" id="id_bioskop" class="form-select" required>
                                <option value="">- Choose movie -</option>
                                <?php foreach ($cinemas as $v) : ?>
                                    <option value="<?= $v->id ?>"><?= $v->nama_bioskop ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_tayang" class="form-label">Waktu Tayang</label>
                            <input type="datetime-local" class="form-control" name="tgl_tayang" id="tgl_tayang" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_kursi" class="form-label">Jumlah Kursi</label>
                            <input type="number" max="500" class="form-control" name="jumlah_kursi" id="jumlah_kursi" placeholder="Jumlah Kursi" required>
                        </div>
                        <input class="btn btn-success" type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>