<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-store-alt"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Toko</span>
                        <span class="info-box-number"><?= number_format($total_merchant, 0, ',', '.') ?></span>
                        <a href="<?= base_url('toko') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-store"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Supplier</span>
                        <span class="info-box-number"><?= number_format($total_supplier, 0, ',', '.') ?></span>
                        <a href="<?= base_url('supplier') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-gifts"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Barang</span>
                        <span class="info-box-number"><?= number_format($total_barang, 0, ',', '.') ?></span>
                        <a href="<?= base_url('barang') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pelanggan</span>
                        <span class="info-box-number"><?= number_format($total_pelanggan, 0, ',', '.') ?></span>
                        <a href="<?= base_url('pelanggan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Harian</h4>
                        <div class="card-tools">
                            <button button class="btn btn-tool" type="button" data-toggle="collapse" data-target="#collapse-grafik" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="collapse show" id="collapse-grafik">
                        <div class="card-body">
                            <canvas id="grafik-harian"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>

<script>
    function formatDate(date) {

        var dd = date.getDate();
        var mm = date.getMonth() + 1;
        var yyyy = date.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        date = dd + '/' + mm + '/' + yyyy
        return date
    }

    function Last7Days() {
        var result = [];
        for (var i = 0; i < 7; i++) {
            var d = new Date();
            d.setDate(d.getDate() - i);
            result.push(formatDate(d))
        }
        result.reverse();
        result.join(',');
        return result;
    }

    var ctxHarian = document.getElementById('grafik-harian');
    // Chart 
    var chartHarian = new Chart(ctxHarian, {
        type: 'line',
        data: {
            labels: Last7Days(),
            datasets: [{
                    label: 'Transaksi Pembelian',
                    data: [12, 19, 3, 5, 2, 3, 12, 21],
                    backgroundColor: 'rgba(103,143,159, 0.8)',
                    borderColor: 'rgba(103,123,149, 2)',
                    borderWidth: 2
                },
                {
                    label: 'Transaksi Penjualan',
                    data: [29, 21, 8, 15, 9, 11, 21, 33],
                    backgroundColor: 'rgba(70,179,200, 0.7)',
                    borderColor: 'rgba(70,179,230, 2)',
                    borderWidth: 2
                },
                {
                    label: 'Barang Masuk',
                    data: [3, 8, 2, 19, 11, 4, 1, 30],
                    backgroundColor: 'rgba(138,198,219,0.8)',
                    borderColor: 'rgba(138,198,209,2)',
                    borderWidth: 2
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>