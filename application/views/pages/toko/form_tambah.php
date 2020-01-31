<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a href="<?= base_url('toko') ?>" class="btn btn-default">
          <i class="fa fa-arrow-left"></i>&nbsp; Kembali
        </a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form method="post" action="<?= base_url('toko/store') ?>" enctype="multipart/form-data">
              <h3>User</h3>
              <span class="label-optional">Mohon isikan identitas user pemilik toko</span>
              <span class="label-required"> * </span>
              <hr>
              <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap<span class="label-required"> *</span></label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required placeholder="Nama Lengkap User" autofocus>
              </div>

              <div class="row">
                <div class="col">
                  <label for="email">Email <span class="label-optional">( Optional )</span></label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email User">
                </div>
                <div class="col">
                  <label for="password">Password<span class="label-required"> *</span></label>
                  <input type="password" class="form-control" id="password" name="password" required placeholder="Password User">
                </div>
              </div>
              <br>

              <div class="form-group">
                <label for="kota">Kota <span class="label-optional">( Optional )</span></label>
                <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota User">
              </div>

              <div class="form-group">
                <label for="alamat_user">Alamat <span class="label-optional">( Optional )</span></label>
                <textarea class="form-control" id="alamat_user" name="alamat_user" cols="30" rows="5" placeholder="Alamat User"></textarea>
              </div>

              <div class="form-group">
                <label for="telp_user">Telepon<span class="label-required"> *</span></label>
                <input type="tel" pattern="\+?([ -]?\d+)+|\(\d+\)([ -]\d+)" class="form-control" id="telp_user" name="telp_user" required placeholder="Format: +628XXXXXX / 08XXXXXX">
              </div>
              <div class="form-group">
                <label for="gambar">Gambar <span class="label-optional">( Optional )</span></label>
                <input type="file" name="gambar" id="gambar" class="form-control">
              </div>

              <br>
              <h3>Toko</h3>
              <span class="label-optional">Mohon isikan identitas toko anda</span>
              <span class="label-required"> * </span>
              <hr>

              <div class="form-group">
                <label for="nama_toko">Nama Toko <span class="label-required">*</span></label>
                <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Nama toko" required>
              </div>

              <div class="form-group">
                <label for="alamat_toko">Alamat Toko <span class="label-optional">( Optional )</span></label>
                <textarea name="alamat_toko" id="alamat_toko" cols="30" rows="5" class="form-control" placeholder="Alamat toko" aria-describedby="alamatHelp"></textarea>
                <small id="alamatHelp" class="form-text text-muted">Biarkan kosong bila sama dengan alamat user.</small>
              </div>

              <div class="form-group">
                <label for="telp_toko">Nomor HP <span class="label-optional">( Optional )</span></label>
                <input type="tel" pattern="\+?([ -]?\d+)+|\(\d+\)([ -]\d+)" class="form-control" id="telp_toko" name="telp_toko" placeholder="Format: +628XXXXXX / 08XXXXXX" aria-describedby="telponHelp">
                <small id="telponHelp" class="form-text text-muted">Biarkan kosong bila sama dengan nomor telpon user.</small>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>