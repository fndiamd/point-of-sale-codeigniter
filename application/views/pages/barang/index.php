<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="<?= base_url('barang/create')?>" class="btn btn-success">
                    <i class="fa fa-plus"></i>&nbsp; Tambah Barang
                </a>
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
                                foreach ($barangs as $barang) : ?>
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