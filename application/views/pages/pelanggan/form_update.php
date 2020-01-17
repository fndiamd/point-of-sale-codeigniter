<section class="content">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="<?= base_url('pelanggan/update/'.$data->id_pelanggan) ?>">
                    <div class="form-group">
                      <label for="nama_pelanggan">Nama Pelanggan</label>
                      <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $data->nama_pelanggan ?>">
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
                      <label for="status">Status</label>
                      <input type="text" class="form-control" id="status" name="status" value="<?php echo $data->status ?>">
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