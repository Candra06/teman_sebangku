<!DOCTYPE html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?= $title?></title>
      <!-- plugins:css -->
      <link rel="stylesheet" href="<?= base_url(); ?>asset/app/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
      <link rel="stylesheet" href="<?= base_url(); ?>asset/app/vendors/css/vendor.bundle.base.css">
      <link rel="stylesheet" href="<?= base_url(); ?>asset/app/vendors/css/vendor.bundle.addons.css">
      <!-- endinject -->
      <!-- plugin css for this page -->
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet" href="<?= base_url() ?>asset/app/css/style.css">
      <!-- endinject -->
      <link rel="shortcut icon" href="<?= base_url() ?>asset/app/images/favicon.png" />

       <!-- plugins:js -->
      <script src="<?= base_url() ?>asset/app/vendors/js/vendor.bundle.base.js"></script>
      <script src="<?= base_url() ?>asset/app/vendors/js/vendor.bundle.addons.js"></script>
      <!-- endinject -->
      <!-- inject:js -->
      <script src="<?= base_url() ?>asset/app/js/off-canvas.js"></script>
      <script src="<?= base_url() ?>asset/app/js/misc.js"></script>
      <!-- endinject -->
  </head>

  <body>
    <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <?php
            include str_replace("system", "application/views/login/", BASEPATH)."layout/content.php";
        ?>
        </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  </body>
</html>
