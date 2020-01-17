<section class="content">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="<?= base_url('pelanggan/store') ?>">
                    <div class="form-group">
                      <label for="nama_pelanggan">Nama Pelanggan</label>
                      <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan">
                    </div>

                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email">
                    </div>

                    <div class="form-group">
                      <label for="telpon">Telepon</label>
                      <input type="text" class="form-control" id="telpon" name="telpon">
                    </div>

                    <div class="form-group">
                      <label for="status">Status</label>
                      <input type="text" class="form-control" id="status" name="status">
                    </div>

                    <div class="form-group">
                      <label for="user">User</label>
                      <input type="text" class="form-control" id="user" name="user">
                    </div>

                    <div class="form-group">
                      <label for="hutang">Hutang</label>
                      <input type="text" class="form-control" id="hutang" name="hutang">
                    </div>

                    <div class="form-group">
                      <label for="gbr">Gambar</label>
                      <input type="text" class="form-control" id="gbr" name="gbr">
                    </div>

                    <div class="form-group">
                      <label for="aktiv">Active</label>
                      <input type="text" class="form-control" id="aktiv" name="aktiv">
                    </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                    </div>
                </div>
            </div>
        </div>
</section>