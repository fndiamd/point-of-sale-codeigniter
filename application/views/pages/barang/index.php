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
                    <div class="card-body">
                        <form method="post" action="<?= base_url('barang/store') ?>">
                            <div class="row">
                                <div class="col">
                                    <label for="nama_barang">Nama barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                                </div>
                                <div class="col">
                                    <label for="kodebarang">Kode Barang</label>
                                    <input type="text" class="form-control" id="kodebarang" name="kodebarang" placeholder="Kode Barang">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
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
                                <?php $no = 1;
                                foreach ($barangs->result() as $barang) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $barang->kodebarang ?></td>
                                        <td><?= $barang->nama_kategori ?></td>
                                        <td><?= $barang->nama_barang ?></td>
                                        <td><?= $barang->hargabeli ?></td>
                                        <td><?= $barang->hargajual ?></td>
                                        <td><?= $barang->stok ?></td>
                                        <td align="center" style="min-width: 150px">
                                            <a href="<?= base_url('barang/view/'.$barang->id_barang)?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <a href="<?= base_url('barang/edit/'.$barang->id_barang)?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('barang/delete/'.$barang->id_barang)?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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