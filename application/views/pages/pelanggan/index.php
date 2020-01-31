<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="<?= base_url('pelanggan/create') ?>" class="btn btn-success">
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
                                            <div class="col-4 text-bold"></div>
                                            <div class="col-8" id=""></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold"></div>
                                            <div class="col-8" id=""></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold"></div>
                                            <div class="col-8" id=""></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold"></div>
                                            <div class="col-8" id=""></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold"></div>
                                            <div class="col-8" id=""></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold"></div>
                                            <div class="col-8" id=""></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold"></div>
                                            <div class="col-8" id=""></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold"></div>
                                            <div class="col-8" id=""></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-bold"></div>
                                            <div class="col-8" id=""></div>
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
    </div>
</section>