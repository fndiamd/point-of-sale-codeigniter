<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a href="<?= base_url('admin') ?>" class="btn btn-default">
          <i class="fa fa-arrow-left"></i>&nbsp; Kembali
        </a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form method="post" action="<?= base_url('admin/store/') ?>">
              <div class="form-group">
                <label for="nama">Nama Admin<span class="label-required"> *</span></label>
                <input type="text" class="form-control" id="nama" required name="nama">
              </div>

              <div class="form-group">
                <label for="password">Password Admin<span class="label-required"> *</span></label>
                <input type="password" class="form-control" id="password" required name="password">
              </div>

              <div class="form-group">
                <label for="email">Email Admin<span class="label-required"> *</span></label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>

              <div class="form-group">
                <label for="role">Role<span class="label-required"> *</span></label>
                <select name="role" required id="role" class="form-control">
                  <option selected value="0">Guest</option>
                  <option value="1">Admin</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>