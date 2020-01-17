<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                        <h3 class="card-title">Buat Merchant Baru</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <div class="card-body">
                        <form method="post" action="<?= base_url('merchant/store') ?>">
                            <div class="row">
                                <div class="col">
                                    <label for="nama_merchant">Nama Toko</label>
                                    <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Nama Toko">
                                </div>
                                <div class="col">
                                    <label for="jenis_kategori">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="email">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="nama_merchant">Nomor HP</label>
                                    <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Nomor HP">
                                </div>
                                <div class="col">
                                    <label for="jenis_kategori">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </form>
                </div>
                    </div>
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
                                    <th>User</th>
                                    <th>Nama Merchant</th>
                                    <th>E-mail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($merchants->result() as $merchant):?>
                                    <tr>
                                        <td><?= $no++?></td>
                                        <td><?= $merchant->user?></td>
                                        <td><?= $merchant->nama_toko?></td>
                                        <td><?= $merchant->email?></td>
                                        <td align="center" style="min-width: 150px">
                                            <a href="" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <a href="" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>