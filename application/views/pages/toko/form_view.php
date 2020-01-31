<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a href="<?= base_url('toko')?>" class="btn btn-default">
          <i class="fa fa-arrow-left"></i>&nbsp; Kembali
        </a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form method="post" action="<?= base_url('toko/') ?>">
              <div class="form-group">
                <label for="nama_toko">Nama Toko</label>
                <input type="text" readonly class="form-control" id="nama_toko" name="nama_toko" value="<?= $data->nama_toko ?>">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" readonly class="form-control" id="email" name="email" value="<?= $data->email ?>">
              </div>

              <div class="form-group">
                <label for="nohp">Nomor HP</label>
                <input type="text" readonly class="form-control" id="nohp" name="nohp" value="<?= $data->nohp ?>">
              </div>

              <div class="form-group">
                <label for="user">User </label>
                <input type="text" readonly class="form-control" id="user" name="user" value="<?= $data->user ?>">
              </div>

              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" readonly><?= $data->alamat?></textarea>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>