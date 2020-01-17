<section class="content">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="<?= base_url('supplier/update/'.$data->id_supplier) ?>">
                    <div class="form-group">
                      <label for="nama_supplier">Nama Supplier</label>
                      <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?php echo $data->nama_supplier ?>">
                    </div>

                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data->alamat ?>">
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $data->email ?>">
                    </div>

                    <div class="form-group">
                      <label for="telpon">Telepon</label>
                      <input type="text" class="form-control" id="telpon" name="telpon" value="<?php echo $data->telpon ?>">
                    </div>

                    <div class="form-group">
                      <label for="profinsi">Provinsi</label>
                      <input type="text" class="form-control" id="profinsi" name="profinsi" value="<?php echo $data->profinsi ?>">
                    </div>

                    <div class="form-group">
                      <label for="kota">Kota</label>
                      <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $data->kota ?>">
                    </div>

                    <div class="form-group">
                      <label for="user">User</label>
                      <input type="text" class="form-control" id="user" name="user" value="<?php echo $data->user ?>">
                    </div>

                    <div class="form-group">
                      <label for="hutang">Hutang</label>
                      <input type="text" class="form-control" id="hutang" name="hutang" value="<?php echo $data->hutang ?>">
                    </div>

                    <div class="form-group">
                      <label for="gbr">Gambar</label>
                      <input type="text" class="form-control" id="gbr" name="gbr" value="<?php echo $data->gbr ?>">
                    </div>

                    <div class="form-group">
                      <label for="aktiv">Active</label>
                      <input type="text" class="form-control" id="aktiv" name="aktiv" value="<?php echo $data->aktiv ?>">
                    </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                    </div>
                </div>
            </div>
        </div>
</section>