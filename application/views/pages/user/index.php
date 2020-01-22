<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <a href="<?= base_url('user/create')?>" class="btn btn-success">
            <i class="fa fa-plus"></i>&nbsp; Tambah User
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
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Kota</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($users->result() as $user) : ?>
                                    <tr id="user-<?= $user->no_telp ?>">
                                        <td><?= $no++?></td>
                                        <td><?= $user->nama_lengkap ?></td>
                                        <td><?= $user->email ?></td>
                                        <td><?= $user->kota ?></td>
                                        <td><?= $user->level ?></td>
                                        <td align="center" style="min-width: 150px">
                                            <a href="<?= base_url('user/view/'.$user->no_telp)?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <a href="<?= base_url('user/edit/'.$user->no_telp)?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <button class="delete-button btn btn-danger" row-data="user-<?= $user->no_telp ?>" data-url="<?= base_url('user/delete/' .$user->no_telp) ?>">
                                                <i class="fa fa-trash"></i>
                                            </button>
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