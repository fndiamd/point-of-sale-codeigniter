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
            <form method="post" action="<?= base_url('toko/update/'.$data->id_toko) ?>">
              <div class="form-group">
                <label for="user">User <span class="label-required">*</span></label>
                <select name="user" class="form-control select-plugin" id="user" required>
                  <option value="0">Master</option>
                  <?php foreach ($user as $user) : ?>
                    <?php if($user->no_telp == $data->user):?>
                      <option selected value="<?= $user->no_telp ?>"><?= $user->no_telp ?></option>
                    <?php else:?>
                      <option value="<?= $user->no_telp ?>"><?= $user->no_telp ?></option>
                    <?php endif;?>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="nama_toko">Nama Toko <span class="label-required">*</span></label>
                <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Nama toko" value="<?= $data->nama_toko?>" required>
              </div>

              <div class="form-group">
                <label for="alamat">Alamat <span class="label-optional"> ( Optional )</span></label>
                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" placeholder="Alamat lengkap"><?= $data->alamat?></textarea>
              </div>

              <div class="form-group">
                <label for="email">Email <span class="label-optional"> ( Optional )</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="user@email.com" value="<?= $data->email?>">
              </div>

              <div class="form-group">
                <label for="nohp">Nomor HP <span class="label-optional"> ( Optional )</span></label>
                <input type="tel" pattern="\+?([ -]?\d+)+|\(\d+\)([ -]\d+)" class="form-control" id="nohp" name="nohp" value="<?= $data->nohp?>">
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>