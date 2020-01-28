<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a href="<?= base_url('user') ?>" class="btn btn-default">
          <i class="fa fa-arrow-left"></i>&nbsp; Kembali
        </a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form method="post" action="<?= base_url('user/update/' . $data->no_telp) ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap<span class="label-required"> *</span></label>
                <input type="text" class="form-control" id="nama_lengkap" required name="nama_lengkap" value="<?php echo $data->nama_lengkap ?>">
              </div>

              <div class="form-group">
                <label for="password">Password<span class="label-required"> *</span></label>
                <input type="text" class="form-control" id="password" required name="password" value="<?php echo $data->password ?>">
              </div>

              <div class="form-group">
                <label for="kota">Kota<span class="label-optional">( Optional )</span></label>
                <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $data->kota ?>">
              </div>

              <div class="form-group">
                <label for="master">Master<span class="label-required"> *</span></label>
                <input type="text" class="form-control" id="master" required name="master" value="<?php echo $data->master ?>">
              </div>

              <div class="form-group">
                <label for="alamat">Alamat<span class="label-optional">( Optional )</span></label>
                <textarea type="text" class="form-control" id="alamat" cols="30" rows="5" name="alamat"><?php echo $data->alamat ?></textarea>
              </div>

              <div class="form-group">
                <label for="email">Email<span class="label-optional">( Optional )</span></label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $data->email ?>">
              </div>

              <div class="form-group">
                <label for="telp_user">Telepon<span class="label-required"> *</span></label>
                <input type="tel" pattern="\+?([ -]?\d+)+|\(\d+\)([ -]\d+)" required class="form-control" id="telp_user" name="telp_user" placeholder="Format +628XXXXX / 08XXXXXX" required value="<?=$data->no_telp?>">
              </div>

              <div class="form-group">
                <label for="level">Level<span class="label-optional"></span></label>
                <input type="text" class="form-control" id="level" name="level" value="<?php echo $data->level ?>">
              </div>

              <div class="form-group">
                <label for="blokir">Blokir<span class="label-optional"></span></label>
                <input type="text" class="form-control" id="blokir" name="blokir" value="<?php echo $data->blokir ?>">
              </div>

              <div class="form-group">
                <label for="id_session">ID Session<span class="label-optional"></span></label>
                <input type="text" class="form-control" id="id_session" name="id_session" value="<?php echo $data->id_session ?>">
              </div>

              <div class="form-group">
                <label for="gambar">Gambar <span class="label-optional">( Optional )</span></label>
                <input type="file" name="gambar" id="gambar" class="form-control" aria-describedby="gambarHelp">
                <small id="gambarHelp" class="form-text text-muted">Biarkan kosong bila tidak ingin merubah gambar User.</small>
              </div>

              <div class="form-group">
                <label for="paket">Paket</label>
                <input type="text" class="form-control" id="paket" name="paket" value="<?php echo $data->paket ?>">
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>