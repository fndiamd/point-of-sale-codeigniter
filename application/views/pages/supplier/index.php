<section class="content">
<div class ="container-fluid">
<div class="row">
    <div class="col-12">
        <a href="<?= base_url('supplier/create')?>" class="btn btn-success">
            <i class="fa fa-plus"></i>&nbsp; Tambah Supplier
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
                                    <th>Nama Supplier</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($suppliers->result() as $supplier) : ?>
                                    <tr>
                                        <td><?= $no++?></td>
                                        <td><?= $supplier->nama_supplier ?></td>
                                        <td><?= $supplier->email ?></td>
                                        <td><?= $supplier->telpon ?></td>
                                        <td><?= $supplier->profinsi ?></td>
                                        <td><?= $supplier->kota ?></td>
                                        <td align="center" style="min-width: 150px">
                                            <a href="<?= base_url('supplier/view/'.$supplier->id_supplier)?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <a href="<?= base_url('supplier/edit/'.$supplier->id_supplier)?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('supplier/delete/'.$supplier->id_supplier)?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
</div>
