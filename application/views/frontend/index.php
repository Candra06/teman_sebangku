<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="<?= base_url() ?>/asset/front_end/img/LogoKop.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title><?= $title; ?></title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="<?= base_url() ?>/asset/front_end/css/linearicons.css">
			<link rel="stylesheet" href="<?= base_url() ?>/asset/front_end/css/font-awesome.min.css">
			<link rel="stylesheet" href="<?= base_url() ?>/asset/front_end/css/bootstrap.css">
			<link rel="stylesheet" href="<?= base_url() ?>/asset/front_end/css/magnific-popup.css">
			<link rel="stylesheet" href="<?= base_url() ?>/asset/front_end/css/nice-select.css">					
			<link rel="stylesheet" href="<?= base_url() ?>/asset/front_end/css/animate.min.css">
			<link rel="stylesheet" href="<?= base_url() ?>/asset/front_end/css/owl.carousel.css">
			<link rel="stylesheet" href="<?= base_url() ?>/asset/front_end/css/main.css">
		</head>
		<body>

			  
            <?php 
                include str_replace("system", "application/views/frontend/", BASEPATH)."layout/header.php";
            ?>
			  

            <?php 
                include str_replace("system", "application/views/frontend/", BASEPATH)."layout/content.php";
            ?>
			
			

			<!-- start footer Area -->		
			<?php 
                include str_replace("system", "application/views/frontend/", BASEPATH)."layout/footer.php";
            ?>
			<!-- End footer Area -->	

			<script src="<?= base_url() ?>/asset/front_end/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="<?= base_url() ?>/asset/front_end/https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="<?= base_url() ?>/asset/front_end/js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="<?= base_url() ?>/asset/front_end/js/easing.min.js"></script>			
			<script src="<?= base_url() ?>/asset/front_end/js/hoverIntent.js"></script>
			<script src="<?= base_url() ?>/asset/front_end/js/superfish.min.js"></script>	
			<script src="<?= base_url() ?>/asset/front_end/js/jquery.ajaxchimp.min.js"></script>
			<script src="<?= base_url() ?>/asset/front_end/js/jquery.magnific-popup.min.js"></script>	
			<script src="<?= base_url() ?>/asset/front_end/js/owl.carousel.min.js"></script>			
			<script src="<?= base_url() ?>/asset/front_end/js/jquery.sticky.js"></script>
			<script src="<?= base_url() ?>/asset/front_end/js/jquery.nice-select.min.js"></script>			
			<script src="<?= base_url() ?>/asset/front_end/js/parallax.min.js"></script>	
			<script src="<?= base_url() ?>/asset/front_end/js/waypoints.min.js"></script>
			<script src="<?= base_url() ?>/asset/front_end/js/jquery.counterup.min.js"></script>					
			<script src="<?= base_url() ?>/asset/front_end/js/mail-script.js"></script>	
			<script src="<?= base_url() ?>/asset/front_end/js/main.js"></script>	
		</body>
	</html>



