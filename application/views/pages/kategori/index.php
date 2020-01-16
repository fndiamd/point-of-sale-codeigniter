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
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kategories->result() as $kategori) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kategori->nama_kategori ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>