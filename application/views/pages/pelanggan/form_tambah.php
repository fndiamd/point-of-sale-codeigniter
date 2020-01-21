<section class="content">
<div class="container-fluid">
<div class="row">
      <div class="col-12">
        <a href="<?= base_url('pelanggan') ?>" class="btn btn-default">
          <i class="fa fa-arrow-left"></i>&nbsp; Kembali
        </a>
      </div>
</div>
<br>
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="<?= base_url('pelanggan/store') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="user">User <span class="label-required"> *</span></label>
                        <select name="user" class="form-control select-plugin" id="user" required>
                          <option disabled selected>--- Pilih User ---</option>
                          <option value="0">Master</option>
                          <?php foreach ($user as $user) : ?>
                            <option value="<?= $user->no_telp ?>"><?= $user->no_telp ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="nama_pelanggan">Nama Pelanggan<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required placeholder="Nama Pelanggan">
                    </div>

                    <div class="form-group">
                      <label for="alamat">Alamat<span class="label-required"> *</span></label>
                      <textarea type="text" class="form-control" id="alamat" name="alamat" cols="30" rows="5" required placeholder="Alamat Pelanggan"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="email">Email<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="email" name="email" required placeholder="Email Pelanggan">
                    </div>

                    <div class="form-group">
                      <label for="telpon">Telepon<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="telpon" name="telpon" required placeholder="Telepon Pelanggan">
                    </div>

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="status">Status<span class="label-required"> *</span></label>
                          <input type="text" class="form-control" id="status" name="status" required placeholder="Status Pelanggan">
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label for="aktiv">Active<span class="label-required"> *</span></label>
                          <input type="text" class="form-control" id="aktiv" name="aktiv" required placeholder="Active Pelanggan">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <label for="hutang">Hutang<span class="label-required"> *</span></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                          </div>
                          <input type="number" class="form-control" id="hutang" name="hutang" required min="0" placeholder="Hutang Pelanggan">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="gambar">Gambar<span class="label-required"> *</span></label>
                      <input type="file" name="gambar" id="gambar" class="form-control" required>
                    </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                    </div>
                </div>
            </div>
      </div>
</div>
</section>