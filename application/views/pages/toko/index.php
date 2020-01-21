<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="<?= base_url('toko/create') ?>" class="btn btn-success ">
                    <i class="fa fa-plus"></i>&nbsp; Tambah Toko
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
                                    <th>User</th>
                                    <th>Nama Merchant</th>
                                    <th>E-mail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($merchants as $merchant) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $merchant->user ?></td>
                                        <td><?= $merchant->nama_toko ?></td>
                                        <td><?= $merchant->email ?></td>
                                        <td align="center" style="min-width: 150px">
                                            <a href="<?= base_url('toko/view/' . $merchant->id_toko) ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <a href="<?= base_url('toko/edit/' . $merchant->id_toko) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('toko/delete/' . $merchant->id_toko) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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