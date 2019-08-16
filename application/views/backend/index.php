<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>

    
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/app/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/app/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/app/vendors/css/vendor.bundle.addons.css">
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/app/vendors/iconfonts/font-awesome/css/font-awesome.css">
    <!-- Data Table --> 
    <script type="text/javascript" src="<?= base_url() ?>asset/app/DataTables/media/js/jquery.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset/app/DataTables/media/js/jquery.dataTables.js"></script>
    <!-- <link rel="stylesheet" href="<?= base_url() ?>asset/app/css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>asset/app/DataTables/media/css/jquery.dataTables.css"> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>asset/app/DataTables/media/css/dataTables.bootstrap.css"> -->
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/app/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url() ?>asset/app/images/favicon.png" />
    <script src="https://cdn.ckeditor.com/4.12.1/standard-all/ckeditor.js"></script>

  </head>
  <body>
    <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
      <?php
      include str_replace("system", "application/views/backend/", BASEPATH)."/layout/head.php"; 
      ?>
    
    <!-- partial -->


    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php
      include str_replace("system", "application/views/backend/", BASEPATH)."/layout/sidebar.php"; 
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
           <?php
            include str_replace("system", "application/views/backend/", BASEPATH)."/layout/content.php"; 
            ?> 
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= base_url() ?>asset/app/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url() ?>asset/app/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?= base_url() ?>asset/app/js/off-canvas.js"></script>
  <script src="<?= base_url() ?>asset/app/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url() ?>asset/app/js/dashboard.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>
  <!-- End custom js for this page-->
</body>

</html>
