<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="<?= base_url('admin') ?>" class="btn btn-default">
                    <i class="fa fa-arrow-left"></i>&nbsp; Kembali
                </a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="<?= base_url('admin/settingProcess') ?>">
                            <div class="form-group">
                                <label for="nama">Nama Admin<span class="label-required"> *</span></label>
                                <input type="text" class="form-control" id="nama" required name="nama" value="<?php echo $data->nama ?>">
                            </div>

                            <div class="form-group">
                                <label for="password">Password Admin <span class="label-optional">( Optional )</span></label>
                                <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">
                                <small id="passwordHelp" class="form-text text-muted">Kosongkan apabila tidak ingin mengganti password</small>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Admin<span class="label-required"> *</span></label>
                                <input type="email" class="form-control" id="email" name="email" required value="<?php echo $data->email ?>">
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>