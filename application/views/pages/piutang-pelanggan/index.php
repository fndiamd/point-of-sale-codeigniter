<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Report Laporan Piutang Pelanggan</h4>
                        <div class="card-tools">
                            <button button class="btn btn-tool" type="button" data-toggle="collapse" data-target="#data-card" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="data-card">
                        <form action="<?= base_url('history/piutang-pelanggan/report')?>" method="post">
                            <div class="row">
                                <div class="col">
                                    <label for="merchant">Merchant</label>
                                    <select name="id_toko" class="form-control select-plugin" id="merchant">
                                        <option disabled selected>Semua</option>
                                        <?php foreach ($merchant as $merchant) : ?>
                                            <option value="<?= $merchant->id_toko ?>"><?= $merchant->nama_toko ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="awal">Tanggal Mulai</label>
                                    <input type="text" class="form-control datepicker" name="tanggal_awal" id="awal" data-date-format="yyyy-mm-dd" value="<?= $bulan_lalu ?>">
                                </div>
                                <div class="col">
                                    <label for="akhir">Tanggal Akhir</label>
                                    <input type="text" class="form-control datepicker" name="tanggal_akhir" id="akhir" data-date-format="yyyy-mm-dd" value="<?= date("yy-m-d") ?>">
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
                                    <th>Pelanggan</th>
                                    <th>Invoice</th>
                                    <th>Nominal</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($piutangPelanggan as $data) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td style="max-width: 150px"><?= $data->nama_toko ?></td>
                                        <td><?= $data->nama_pelanggan ?></td>
                                        <td align="center">
                                            <?= $data->no_invoice ?>
                                        </td>
                                        <td>Rp<?= number_format($data->nominal, 0, ",", ".") ?>,-</td>
                                        <td><?= date_format(date_create($data->tanggal), "d M Y") ?></td>
                                        <td align="center">
                                            <?= $data->status?>
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