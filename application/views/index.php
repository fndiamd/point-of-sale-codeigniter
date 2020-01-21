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
            <div class="col-sm-6">
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
  <!-- ./wrapper -->
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="<?= base_url('assets/plugins/morris/morris.min.js') ?>"></script>
  <!-- Sparkline -->
  <script src="<?= base_url('assets/plugins/sparkline/jquery.sparkline.min.js') ?>"></script>
  <!-- jvectormap -->
  <script src="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
  <script src="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url('assets/plugins/knob/jquery.knob.js') ?>"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
  <script src="<?= base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
  <!-- datepicker -->
  <script src="<?= base_url('assets/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?= base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
  <!-- Slimscroll -->
  <script src="<?= base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
  <!-- FastClick -->
  <sChart.bundle.jscript src="<?= base_url('assets/plugins/fastclick/fastclick.js') ?>">
    </script>
    <!-- Data tables -->
    <script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.js') ?>"></script>
    <!-- Select 2 -->
    <script src="<?= base_url('assets/plugins/select2/select2.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>
    <script>
      $(function() {
        $('.select-plugin').select2();
      });
    </script>
    <script src="<?= base_url('assets/dist/js/custom.js') ?>"></script>
</body>

</html>