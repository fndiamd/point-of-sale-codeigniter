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
                    <form method="post" action="<?= base_url('user/update/'.$data->no_telp) ?>">
                    <div class="form-group">
                      <label for="nama_lengkap">Nama Lengkap<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" readonly value="<?= $data->nama_lengkap ?>">
                    </div>

                    <div class="form-group">
                      <label for="password">Password<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="password" name="password" readonly value="<?= $data->password ?>">
                    </div>

                    <div class="form-group">
                      <label for="kota">kota<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="kota" name="kota" readonly value="<?= $data->kota ?>">
                    </div>

                    <div class="form-group">
                      <label for="master">Master<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="master" name="master" readonly value="<?= $data->master ?>">
                    </div>

                    <div class="form-group">
                      <label for="alamat">Alamat<span class="label-required"> *</span></label>
                      <textarea type="text" class="form-control" id="alamat" name="alamat" readonly><?= $data->alamat ?></textarea>
                    </div>

                    <div class="form-group">
                      <label for="email">Email<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="email" name="email" readonly value="<?= $data->email ?>">
                    </div>

                    <div class="form-group">
                      <label for="no_telp">Telepon<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="no_telp" name="no_telp" readonly value="<?= $data->no_telp ?>">
                    </div>

                    <div class="form-group">
                      <label for="level">Level<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="level" name="level" readonly value="<?= $data->level ?>">
                    </div>

                    <div class="form-group">
                      <label for="blokir">Blokir<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="blokir" name="blokir" readonly value="<?= $data->blokir ?>">
                    </div>

                    <div class="form-group">
                      <label for="id_session">ID Session<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="id_session" name="id_session" readonly value="<?= $data->id_session ?>">
                    </div>

                    <div class="form-group">
                      <label for="gambar">Gambar<span class="label-required"> *</span></label>
                      <input type="text" name="gambar" id="gambar" class="form-control" readonly value="<?= $data->gbr?>">
                    </div>

                    <div class="form-group">
                      <label for="paket">Paket<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="paket" name="paket" readonly value="<?=$data->paket ?>">
                    </div>
                  </form>
                    </div>
                </div>
            </div>
        </div>
</div>

</section>