<?php $this->load->view('partials/head')?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- side navigation -->
        <?php $this->load->view('partials/nav-side')?>
        
        <!-- top navigation -->
        <?php $this->load->view('partials/nav-top')?>

        <!-- page content -->
        <?php $this->load->view('pages/'.$page)?>

        <!-- footer content -->
        <?php $this->load->view('partials/footer')?>
      </div>
    </div>
  </body>

<?php $this->load->view('partials/foot')?>