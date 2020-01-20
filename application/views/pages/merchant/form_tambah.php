<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a href="<?= base_url('merchant') ?>" class="btn btn-default">
          <i class="fa fa-arrow-left"></i>&nbsp; Kembali
        </a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form method="post" action="<?= base_url('merchant/store') ?>">
              <div class="form-group">
                <label for="user">User <span class="label-required">*</span></label>
                <select name="user" class="form-control select-plugin" id="user" required>
                  <option disabled selected>--- Pilih User ---</option>
                  <option value="0">Master</option>
                  <?php foreach ($user as $user) : ?>
                    <option value="<?= $user->no_telp ?>"><?= $user->no_telp ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="nama_toko">Nama Toko <span class="label-required">*</span></label>
                <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Nama toko" required>
              </div>

              <div class="form-group">
                <label for="alamat">Alamat <span class="label-required">*</span></label>
                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" required placeholder="Alamat lengkap"></textarea>
              </div>

              <div class="form-group">
                <label for="email">Email <span class="label-required">*</span></label>
                <input type="text" class="form-control" id="email" name="email" placeholder="user@email.com" required>
              </div>

              <div class="form-group">
                <label for="nohp">Nomor HP <span class="label-required">*</span></label>
                <input type="text" class="form-control" id="nohp" name="nohp" placeholder="08123456789" required>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>