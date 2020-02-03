<section class="content">
    <div class="container-fluid">
        <?php if ($this->session->userdata('role_admin') != 0) : ?>
            <div class="row">
                <div class="col-12">

                    <a href="<?= base_url('toko/create') ?>" class="btn btn-success ">
                        <i class="fa fa-plus"></i>&nbsp; Tambah Toko
                    </a>
                </div>
            </div>
            <br>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover dataTable" id="data-tables" role="grid">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Nama Toko</th>
                                    <th>E-mail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-3 text-bold">Nama Toko</div>
                                            <div class="col-9" id="nama_toko"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 text-bold">E-mail</div>
                                            <div class="col-9" id="email"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 text-bold">Nomor HP</div>
                                            <div class="col-9" id="no_hp"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 text-bold">User</div>
                                            <div class="col-9" id="user"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 text-bold">Alamat</div>
                                            <div class="col-9" id="alamat"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>