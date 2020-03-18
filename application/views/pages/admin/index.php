<section class="content">
    <div class="container-fluid">
        <?php if ($this->session->userdata('role_admin') != 0) : ?>
            <div class="row justify-content-between">
                <div class="col-4">
                    <a href="<?= base_url('admin/create') ?>" class="btn btn-success">
                        <i class="fa fa-plus"></i>&nbsp; Tambah Admin
                    </a>
                </div>
            </div>
            <br>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover dataTable" style="min-width:100wh" id="data-tables" role="grid">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>APP ID</th>
                                    <?php if ($this->session->userdata('role_admin') != 0) : ?>
                                        <th>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>