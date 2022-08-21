<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Add Movie</h1>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form enctype="multipart/form-data" action="<?= base_url() ?>admin/movies/create" method="post">
                        <div class="mb-3">
                            <label for="judul-film" class="form-label">Judul Film</label>
                            <input type="text" maxlength="200" class="form-control" name="judul_film" id="judul_film" placeholder="Judul Film" required>
                        </div>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>&nbsp;<small>(Pisahkan dengan tanda koma jika lebih dari 1)</small>
                            <input type="text" maxlength="200" class="form-control" name="genre" id="genre" placeholder="Genre" required>
                        </div>
                        <div class="mb-3">
                            <label for="durasi" class="form-label">Durasi</label>&nbsp;<small>(dalam menit)</small>
                            <input type="number" max="1000" class="form-control" name="durasi" id="durasi" placeholder="Durasi" required>
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <input type="number" max="1000" class="form-control" name="rating" id="rating" placeholder="Rating" required>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_launch" class="form-label">Tanggal Tayang</label>
                            <input type="date" class="form-control" name="tgl_launch" id="tgl_launch" placeholder="Tanggal Tayang" required>
                        </div>
                        <div class="mb-3">
                            <label for="sinopsis" class="form-label">Sinopsis</label>
                            <textarea class="form-control" name="synopsys" id="synopsys" rows="3" placeholder="Sinopsis"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Poster</label>
                            <input type="file" class="form-control" name="image" id="image" placeholder="Poster" accept=".jpg,.png">
                        </div>
                        <div class="mb-3">
                            <label for="produser" class="form-label">Produser</label>
                            <input type="text" maxlength="100" class="form-control" name="produser" id="produser" placeholder="Produser" required>
                        </div>
                        <div class="mb-3">
                            <label for="sutradara" class="form-label">Sutradara</label>
                            <input type="text" maxlength="100" class="form-control" name="sutradara" id="sutradara" placeholder="Sutradara" required>
                        </div>
                        <div class="mb-3">
                            <label for="produksi" class="form-label">Produksi</label>
                            <input type="text" maxlength="100" class="form-control" name="produksi" id="produksi" placeholder="Produksi" required>
                        </div>
                        <div class="mb-3">
                            <label for="cast" class="form-label">Cast</label>&nbsp;<small>(Pisahkan dengan tanda koma jika lebih dari 1)</small>
                            <input type="text" maxlength="200" class="form-control" name="cast" id="cast" placeholder="Cast" required>
                        </div>
                        <div class="mb-3">
                            <!-- <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label> -->
                            <label for="produksi" class="form-label">Sedang tayang?</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_playing" id="is_playing">
                            </div>
                        </div>
                        <input class="btn btn-success" type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>