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
                    <input type="file" class="form-control mb-2 mr-sm-2" name="excelbarang" id="import-excel" required>
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
                        <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-4 text-bold">Nama Barang</div>
                                            <div class="col-8" id="nama_barang"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold">Kategori Barang</div>
                                            <div class="col-8" id="kategori_barang"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold">Kode Barang</div>
                                            <div class="col-8" id="kode_barang"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold">Harga Beli</div>
                                            <div class="col-8" id="harga_beli"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold">Harga Jual</div>
                                            <div class="col-8" id="harga_jual"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold">Stok Tersedia</div>
                                            <div class="col-8" id="stok"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold">Minimal Stok</div>
                                            <div class="col-8" id="min_stok"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold">Diskon</div>
                                            <div class="col-8" id="diskon"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold">Deskripsi Barang</div>
                                            <div class="col-8" id="deskripsi"></div>
                                        </div>                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>