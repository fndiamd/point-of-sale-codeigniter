<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Report <?= $title ?></h4>
                        <div class="card-tools">
                            <button button class="btn btn-tool" type="button" data-toggle="collapse" data-target="#data-card" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body collapse show" id="data-card">
                        <form action="<?= base_url('pembelian/detail-pembelian/report') ?>" method="post">
                            <div class="row">
                                <div class="col">
                                    <label for="merchant">Merchant</label>
                                    <select name="id_toko" class="form-control select-plugin" id="merchant">
                                        <option value="" selected>Semua</option>
                                        <?php foreach ($merchant as $merchant) : ?>
                                            <option value="<?= $merchant->id_toko ?>"><?= $merchant->nama_toko ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="awal">Tanggal Mulai</label>
                                    <input type="text" class="form-control datepicker" name="tanggal_awal" id="awal" data-date-format="yyyy-mm-dd" value="<?= $bulan_lalu ?>" required>
                                </div>
                                <div class="col">
                                    <label for="akhir">Tanggal Akhir</label>
                                    <input type="text" class="form-control datepicker" name="tanggal_akhir" id="akhir" data-date-format="yyyy-mm-dd" value="<?= date("yy-m-d") ?>" required>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success pull-right">
                                <i class="fa fa-file-excel"></i>&nbsp; Report
                            </button>
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
                                    <th>Toko</th>
                                    <th>Supplier</th>
                                    <th>Barang</th>
                                    <th>Invoice</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-5 text-bold">Nama Toko</div>
                                            <div class="col-7" id="nama_toko"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 text-bold">Nama Supplier</div>
                                            <div class="col-7" id="nama_supplier"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 text-bold">Nama Barang</div>
                                            <div class="col-7" id="nama_barang"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 text-bold">No. Invoice</div>
                                            <div class="col-7" id="no_invoice"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 text-bold">Jumlah</div>
                                            <div class="col-7" id="jumlah_barang"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 text-bold">Harga</div>
                                            <div class="col-7" id="harga_barang"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 text-bold">Total Harga</div>
                                            <div class="col-7" id="total_harga"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 text-bold">Tanggal Transaksi</div>
                                            <div class="col-7" id="tanggal_transaksi"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 text-bold">Catatan</div>
                                            <div class="col-7" id="catatan"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 text-bold">Status Transaksi</div>
                                            <div class="col-7" id="status_transaksi"></div>
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