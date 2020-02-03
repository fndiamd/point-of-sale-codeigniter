<section class="content">
    <div class="container-fluid">
        <?php if ($this->session->userdata('role_admin') != 0) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Buat Kategori Baru</h3>
                            <div class="card-tools">
                                <button button class="btn btn-tool" type="button" data-toggle="collapse" data-target="#data-card" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body collapse show" id="data-card">
                            <form method="post" action="<?= base_url('kategori/store') ?>">
                                <div class="row">
                                    <div class="col">
                                        <label for="user">Toko <span class="label-required">*</span></label>
                                        <select name="user" class="form-control select-plugin select2-toko" id="merchant">
                                            <option value="" disabled selected>--- Pilih Toko ---</option>
                                            <option value="0">Master</option>

                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="nama_kategori">Nama Kategori <span class="label-required">*</span></label>
                                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" required>
                                    </div>
                                    <div class="col">
                                        <label for="jenis_kategori">Jenis Kategori <span class="label-optional">( Optional )</span></label>
                                        <input type="text" class="form-control" id="jenis_kategori" name="jenis_kategori" placeholder="Jenis Kategori">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover dataTable" id="data-tables" role="grid">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori</th>
                                    <th>Jenis Kategori</th>
                                    <th>Status</th>
                                    <?php if ($this->session->userdata('role_admin') != 0) : ?>
                                        <th>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="user">User <span class="label-required">*</span></label>
                                                    <input type="text" class="form-control" id="modaluser" required>
                                                </div>
                                                <div class="col">
                                                    <label for="nama_kategori">Nama Kategori<span class="label-required"> *</span></label>
                                                    <input type="text" class="form-control" id="modalnama_kategori" autofocus name="nama_kategori" placeholder="Nama Kategori" required>
                                                </div>
                                                <div class="col">
                                                    <label for="jenis_kategori">Jenis Kategori<span class="label-optional"> ( Optional )</span></label>
                                                    <input type="text" class="form-control" id="modaljenis_kategori" name="jenis_kategori" placeholder="Jenis Kategori (Optional)">
                                                </div>
                                                <input type="hidden" id="modalid_kategori">
                                            </div>
                                            <br>
                                            <button type="button" class="btn btn-primary pull-right btn-submit">Submit</button>
                                        </form>
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