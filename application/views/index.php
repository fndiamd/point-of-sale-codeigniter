<?php
  if (!$this->session->userdata('id_admin')) {
    $this->session->set_flashdata('error', 'Anda harus sign-in terlebih dahulu!');
    redirect(base_url());
  }
?>

<?php $this->load->view('partials/head') ?>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php $this->load->view('partials/nav-top') ?>
    <!-- Main Sidebar Container -->
    <?php $this->load->view('partials/nav-side') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="m-0 text-dark"><?= $title ?></h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="container">
        <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?= $this->session->flashdata('success'); ?>
          </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?= $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>
      </div>
      <?php $this->load->view('pages/' . $page) ?>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.0-alpha
      </div>
    </footer>
  </div>
  <?php $this->load->view('partials/foot-script')?>
</body>
</html>