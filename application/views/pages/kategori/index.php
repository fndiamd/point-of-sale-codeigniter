<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Buat Kategori Baru</h3>
                        <div class="card-tools">
                            <button button class="btn btn-tool" type="button" data-toggle="collapse" data-target="#data-card" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="data-card">
                        <form method="post" action="<?= base_url('kategori/store') ?>">
                            <div class="row">
                                <div class="col">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori">
                                </div>
                                <div class="col">
                                    <label for="jenis_kategori">Jenis Kategori</label>
                                    <input type="text" class="form-control" id="jenis_kategori" name="jenis_kategori" placeholder="Jenis Kategori (Optional)">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover dataTable" id="data-tables" role="grid">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori</th>
                                    <th>Jenis Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kategories->result() as $kategori) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kategori->nama_kategori ?></td>
                                        <td><?= $kategori->jenis_kategori ?></td>
                                        <td align="center">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#kategori-<?= $kategori->id_kategori ?>">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <a class="btn btn-danger" href="<?= base_url('kategori/delete/'.$kategori->id_kategori) ?>">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="kategori-<?= $kategori->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?= $kategori->nama_kategori ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?= base_url('kategori/update/'.$kategori->id_kategori) ?>">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="nama_kategori">Nama Kategori</label>
                                                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" value="<?= $kategori->nama_kategori ?>">
                                                            </div>
                                                            <div class="col">
                                                                <label for="jenis_kategori">Jenis Kategori</label>
                                                                <input type="text" class="form-control" id="jenis_kategori" name="jenis_kategori" placeholder="Jenis Kategori (Optional)" value="<?= $kategori->jenis_kategori ?>">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>