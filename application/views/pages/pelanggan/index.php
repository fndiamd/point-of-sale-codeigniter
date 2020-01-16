<section class="content">
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
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($pelanggans->result() as $pelanggan) : ?>
                                    <tr>
                                        <td><?= $no++?></td>
                                        <td><?= $pelanggan->nama_pelanggan ?></td>
                                        <td><?= $pelanggan->alamat ?></td>
                                        <td><?= $pelanggan->email ?></td>
                                        <td><?= $pelanggan->telpon ?></td>
                                        <td><?= $pelanggan->status ?></td>
                                        <td><?= $pelanggan->gbr ?></td>
                                        <td align="center" style="min-width: 150px">
                                            <a href="" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <a href="" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
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