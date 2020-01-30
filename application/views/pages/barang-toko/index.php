<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-4">
                <a href="<?= base_url('barang-toko/create') ?>" class="btn btn-success">
                    <i class="fa fa-plus"></i>&nbsp; Tambah Barang
                </a>
            </div>
            <div class="col-8">
                <form action="barang-toko/import" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-5">
                            <select name="user" class="form-control select-plugin" required id="inline-select2">
                                <option value="" disabled selected>--- Pilih Toko ---</option>
                                <?php foreach ($merchant as $merchant) : ?>
                                    <option value="<?= $merchant->user ?>"><?= $merchant->nama_toko ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="file" class="form-control" name="excelbarang" id="import-excel" required>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-info mb-2">
                                <i class="fa fa-file-import"></i>&nbsp; Import Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover dataTable" style="min-width:100wh" id="data-tables" role="grid">
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

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>