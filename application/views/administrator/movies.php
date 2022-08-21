<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Movies</strong> Management</h1>

    <div class="row">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Movie List</h5>
                    <div>
                        <a href="<?= base_url()?>admin/movies/add" class="btn btn-info"><i class="align-middle" data-feather="plus"></i> New</a>
                    </div>
                </div>
                <table class="table table-hover table-striped my-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Film</th>
                            <th>Judul Film</th>
                            <th>Tanggal Tayang</th>
                            <th>Genre</th>
                            <th>Durasi</th>
                            <th>Rating</th>
                            <th>Produser</th>
                            <th>Sutradara</th>
                            <th>Cast</th>
                            <th>Poster</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($movies as $key => $i) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $i->kd_film ?></td>
                            <td><?= $i->judul_film ?></td>
                            <td><?= $i->tgl_launch ?></td>
                            <td><?= $i->genre ?></td>
                            <td><?= $i->durasi ?></td>
                            <td><?= $i->rating ?></td>
                            <td><?= $i->produser ?></td>
                            <td><?= $i->sutradara ?></td>
                            <td><?= $i->cast ?></td>
                            <td><img class="img-fluid" src="<?= base_url() . 'uploads/movies/' . $i->image_path ?>" alt="Poster" style="max-width: 64px;"></td>
                            <td class="table-action">
                                <a href="<?= base_url() ?>admin/movies/edit/<?= $i->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                <a href="<?= base_url() ?>admin/movies/delete/<?= $i->id ?>" onclick="return confirm('Are you sure want to delete this record?')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>