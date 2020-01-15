<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                        <h3 class="card-title">Buat Barang Baru</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                        <form method="post" action="<?= base_url('barang/store') ?>">
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover dataTable" id="data-tables" role="grid">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Barang</th>
                                    <th>Kategori</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($barangs->result() as $barang) : ?>
                                    <tr>
                                        <td><?= $no++?></td>
                                        <td><?= $barang->kodebarang ?></td>
                                        <td><?= $barang->id_kategori ?></td>
                                        <td><?= $barang->nama_barang ?></td>
                                        <td><?= $barang->hargabeli ?></td>
                                        <td><?= $barang->hargajual ?></td>
                                        <td><?= $barang->stok ?></td>
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