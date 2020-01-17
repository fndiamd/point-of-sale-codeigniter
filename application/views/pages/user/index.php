<section class="content">
<div class="row">
            <div class="col-12">
            <a href="<?= base_url('user/create')?>" class="btn btn-success "><i class="fa fa-plus"></i> Tambah User</a>
            <br><br>
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
                                    <th>Nama Lengkap</th>
                                    <th>Password</th>
                                    <th>ID Session</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($users->result() as $user) : ?>
                                    <tr>
                                        <td><?= $no++?></td>
                                        <td><?= $user->nama_lengkap ?></td>
                                        <td><?= $user->password ?></td>
                                        <td><?= $user->id_session ?></td>
                                        <td><?= $user->level ?></td>
                                        <td align="center" style="min-width: 150px">
                                            <a href="" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <a href="" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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