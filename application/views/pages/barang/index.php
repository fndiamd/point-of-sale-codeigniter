<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-4">
                <a href="<?= base_url('barang/create') ?>" class="btn btn-success">
                    <i class="fa fa-plus"></i>&nbsp; Tambah Barang
                </a>
            </div>
            <div class="col-5">
                <form class="form-inline" action="barang/import" method="post" enctype="multipart/form-data">
                    <input type="file" class="form-control mb-2 mr-sm-2" name="excelbarang" required>
                    <button type="submit" class="btn btn-info mb-2">
                        <i class="fa fa-file-import"></i>&nbsp; Import Data
                    </button>
                </form>
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
                                    <tr id="barang-<?= $barang->id_barang ?>">
                                        <td><?= $no++ ?></td>
                                        <td><?= $barang->kodebarang ?></td>
                                        <td><?= $barang->nama_kategori ?></td>
                                        <td><?= $barang->nama_barang ?></td>
                                        <td><?= $barang->hargabeli ?></td>
                                        <td><?= $barang->hargajual ?></td>
                                        <td><?= $barang->stok ?></td>
                                        <td align="center" style="min-width: 150px">
                                            <a href="<?= base_url('barang/view/' . $barang->id_barang) ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <a href="<?= base_url('barang/edit/' . $barang->id_barang) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <button class="delete-button btn btn-danger" row-data="barang-<?= $barang->id_barang ?>" data-url="<?= base_url('barang/delete/' . $barang->id_barang) ?>">
                                                <i class="fa fa-trash"></i>
                                            </button>
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