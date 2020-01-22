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
                    <form method="post" action="<?= base_url('user/store') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="nama_lengkap">Nama Lengkap<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required placeholder="Nama Lengkap User">
                    </div>

                    <div class="form-group">
                      <label for="password">Password<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="password" name="password" required placeholder="Password User">
                    </div>

                    <div class="form-group">
                      <label for="kota">kota <span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="kota" name="kota" required placeholder="Kota User">
                    </div>

                    <div class="form-group">
                      <label for="master">Master<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="master" name="master" required placeholder="Master">
                    </div>

                    <div class="form-group">
                      <label for="alamat">Alamat<span class="label-required"> *</span></label>
                      <textarea type="text" class="form-control" id="alamat" name="alamat" cols="30" rows="5" required placeholder="Alamat User"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="email">Email<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="email" name="email" required placeholder="Email User">
                    </div>

                    <div class="form-group">
                      <label for="no_telp">Telepon<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="no_telp" name="no_telp" required placeholder="Telepon User">
                    </div>

                    <div class="form-group">
                      <label for="level">Level<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="level" name="level" required placeholder="Level User">
                    </div>

                    <div class="form-group">
                      <label for="blokir">Blokir<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="blokir" name="blokir" required placeholder="Blokir User">
                    </div>

                    <div class="form-group">
                      <label for="id_session">ID Session<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="id_session" name="id_session" required placeholder="ID Session User">
                    </div>

                    <div class="form-group">
                      <label for="gambar">Gambar<span class="label-required"> *</span></label>
                      <input type="file" name="gambar" id="gambar" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label for="paket">Paket<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="paket" name="paket" required placeholder="Paket User">
                    </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>