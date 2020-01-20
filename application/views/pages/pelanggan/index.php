<section class="content">
    <div class="container-fluid">
    <div class="row">
            <div class="col-12">
                <a href="<?= base_url('pelanggan/create')?>" class="btn btn-success">
                    <i class="fa fa-plus"></i>&nbsp; Tambah Pelanggan
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
                                    <th>Nama Pelanggan</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($pelanggans->result() as $pelanggan) : ?>
                                    <tr>
                                        <td><?= $no++?></td>
                                        <td><?= $pelanggan->nama_pelanggan ?></td>
                                        <td><?= $pelanggan->email ?></td>
                                        <td><?= $pelanggan->telpon ?></td>
                                        <td><?= $pelanggan->status ?></td>
                                        <td align="center" style="min-width: 150px">
                                            <a href="<?= base_url('pelanggan/view/'.$pelanggan->id_pelanggan)?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <a href="<?= base_url('pelanggan/edit/'.$pelanggan->id_pelanggan)?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('pelanggan/delete/'.$pelanggan->id_pelanggan)?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
    </div>
</section>