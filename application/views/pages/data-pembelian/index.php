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
                        <form action="">
                            <div class="row">
                                <div class="col">
                                    <label for="merchant">Merchant</label>
                                    <select name="toko" class="form-control select-plugin" id="merchant">
                                        <option disabled selected>Semua</option>
                                        <?php foreach ($merchant as $merchant) : ?>
                                            <option value="<?= $merchant->id_toko ?>"><?= $merchant->nama_toko ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="mulai">Tanggal Mulai</label>
                                    <input type="text" class="form-control datepicker" name="tanggal" id="mulai" data-date-format="yyyy-mm-dd" placeholder="<?= date("yy-m-d") ?>">
                                </div>
                                <div class="col">
                                    <label for="mulai">Tanggal Akhir</label>
                                    <input type="text" class="form-control datepicker" name="tanggal" id="akhir" data-date-format="yyyy-mm-dd" placeholder="<?= date("yy-m-d") ?>">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success pull-right">
                                <i class="fa fa-plus"></i>&nbsp; Report
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
                                    <th>Invoice</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                    <th>Lihat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($dataPembelian as $data) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td style="max-width: 150px"><?= $data->nama_toko ?></td>
                                        <td><?= $data->nama_supplier ?></td>
                                        <td align="center">
                                            <?= $data->no_invoice ?>
                                        </td>
                                        <td>Rp<?= number_format($data->totalorder, 0, ",", ".") ?>,-</td>
                                        <td><?= date_format(date_create($data->tanggal), "d M Y") ?></td>
                                        <td align="center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?= $data->no_invoice ?>">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="<?= $data->no_invoice ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Data Pembelian - <?= $data->no_invoice ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-5 text-bold">Nama Toko</div>
                                                        <div class="col-7"><?= $data->nama_toko ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5 text-bold">Nama Suplier</div>
                                                        <div class="col-7"><?= $data->nama_supplier ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5 text-bold">No. Invoice</div>
                                                        <div class="col-7"><?= $data->no_invoice ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5 text-bold">Tanggal Transaksi</div>
                                                        <div class="col-7"><?= $data->tanggal ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5 text-bold">Pembayaran</div>
                                                        <div class="col-7"><?= $data->pembayaran ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5 text-bold">Keterangan</div>
                                                        <div class="col-7"><?= $data->keterangan ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5 text-bold">Total Order</div>
                                                        <div class="col-7">Rp<?= number_format($data->totalorder, 0, ',', '.') ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5 text-bold">Total Bayar</div>
                                                        <div class="col-7">Rp<?= number_format($data->totalbayar, 0, ',', '.') ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5 text-bold">Kembalian</div>
                                                        <div class="col-7">Rp<?= number_format($data->kembalian, 0, ',', '.') ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5 text-bold">Status Transaksi</div>
                                                        <div class="col-7"><?= $data->status ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5 text-bold">Tanggal Jatuh Tempo</div>
                                                        <div class="col-7"><?= $data->jatuh_tempo ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5 text-bold">Operator</div>
                                                        <div class="col-7"><?= $data->operator ?></div>
                                                    </div>
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