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
<!-- datepicker -->
<script src="<?= base_url('assets/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>
<!-- Data tables -->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.js') ?>"></script>
<!-- Select 2 -->
<script src="<?= base_url('assets/plugins/select2/select2.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
    const role_admin = "<?= $this->session->userdata('role_admin') ?>";
</script>
<script src="<?= base_url('assets/dist/js/custom.js') ?>"></script>