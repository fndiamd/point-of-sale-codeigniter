<section class="content">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="<?= base_url('merchant/store') ?>">
                    <div class="form-group">
                      <label for="nama_toko">Nama Toko</label>
                      <input type="text" class="form-control" id="nama_toko" name="nama_toko">
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
                      <label for="nohp">Nomor HP</label>
                      <input type="text" class="form-control" id="nohp" name="nohp">
                    </div>

                    <div class="form-group">
                      <label for="user">User </label>
                      <input type="text" class="form-control" id="user" name="user">
                    </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                    </div>
                </div>
            </div>
        </div>
</section>