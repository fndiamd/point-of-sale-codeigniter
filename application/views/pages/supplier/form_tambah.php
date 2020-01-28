<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a href="<?= base_url('supplier') ?>" class="btn btn-default">
          <i class="fa fa-arrow-left"></i>&nbsp; Kembali
        </a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form method="post" action="<?= base_url('supplier/store') ?>" enctype="multipart/form-data">

              <div class="form-group">
                <label for="user">User <span class="label-required"> *</span></label>
                <select name="user" class="form-control select-plugin" id="user" required>
                  <option value="" selected>--- Pilih User ---</option>
                  <option value="0">Master</option>
                  <?php foreach ($user as $user) : ?>
                    <option value="<?= $user->no_telp ?>"><?= $user->no_telp ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="nama_supplier">Nama Supplier<span class="label-required"> *</span></label>
                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required placeholder="Nama Supplier">
              </div>

              <div class="form-group">
                <label for="alamat">Alamat<span class="label-required"> *</span></label>
                <textarea type="text" class="form-control" id="alamat" name="alamat" cols="30" rows="5" required placeholder="Alamat Supplier"></textarea>
              </div>

              <div class="form-group">
                <label for="email">Email<span class="label-optional"> ( Optional )</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Supplier">
              </div>

              <div class="form-group">
                <label for="telpon">Telepon<span class="label-required"> *</span></label>
                <input type="tel" pattern="\+?([ -]?\d+)+|\(\d+\)([ -]\d+)" class="form-control" id="telpon" name="telpon" required placeholder="Format: +628XXXXXX / 08XXXXXX">
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="profinsi">Provinsi<span class="label-required"> *</span></label>
                    <input type="text" pattern="[a-zA-Z\s]+" class="form-control" id="profinsi" required name="profinsi" placeholder="Provinsi Supplier">
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label for="kota">Kota<span class="label-required"> *</span></label>
                    <input type="text" pattern="[a-zA-Z\s]+" class="form-control" id="kota" required name="kota" placeholder="Kota Supplier">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <label for="hutang">Hutang<span class="label-optional"> ( Optional )</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    </div>
                    <input type="number" class="form-control" id="hutang" name="hutang" min="0" placeholder="Hutang Supplier">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="gambar">Gambar<span class="label-optional">( Optional )</span></label>
                <input type="file" name="gambar" id="gambar" class="form-control">
              </div>

              <div class="form-group">
                <label for="aktiv">Active<span class="label-optional"> ( Optional )</span></label>
                <input type="text" class="form-control" id="aktiv" name="aktiv" placeholder="Active Pelanggan">
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>