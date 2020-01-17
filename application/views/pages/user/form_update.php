<section class="content">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="<?= base_url('user/update/'.$data->no_telp) ?>">
                    <div class="form-group">
                      <label for="nama_lengkap">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $data->nama_lengkap ?>">
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="text" class="form-control" id="password" name="password" value="<?php echo $data->password ?>">
                    </div>

                    <div class="form-group">
                      <label for="kota">kota</label>
                      <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $data->kota ?>">
                    </div>

                    <div class="form-group">
                      <label for="master">Master</label>
                      <input type="text" class="form-control" id="master" name="master" value="<?php echo $data->master ?>">
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
                      <label for="no_telp">Telepon</label>
                      <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $data->no_telp ?>">
                    </div>

                    <div class="form-group">
                      <label for="level">Level</label>
                      <input type="text" class="form-control" id="level" name="level" value="<?php echo $data->level ?>">
                    </div>

                    <div class="form-group">
                      <label for="blokir">Blokir</label>
                      <input type="text" class="form-control" id="blokir" name="blokir" value="<?php echo $data->blokir ?>">
                    </div>

                    <div class="form-group">
                      <label for="id_session">ID Session</label>
                      <input type="text" class="form-control" id="id_session" name="id_session" value="<?php echo $data->id_session ?>">
                    </div>

                    <div class="form-group">
                      <label for="gbr">Gambar</label>
                      <input type="text" class="form-control" id="gbr" name="gbr" value="<?php echo $data->gbr ?>">
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
</section>