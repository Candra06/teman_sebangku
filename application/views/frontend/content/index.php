<!-- start banner Area -->
			<section class="banner-area" id="home">	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-7">
							<h6 class="text-white text-uppercase">Kopi Teman Sebangku</h6>
							<h1>
								#RASAINI<br>
								UNTUKMU		
							</h1>
							<a href="#" class="primary-btn text-uppercase">Download App</a>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start video-sec Area -->
			<section class="video-sec-area pb-100 pt-40" id="about">
				<div class="container">
					<div class="row justify-content-start align-items-center">
						<div class="col-lg-6 video-right justify-content-center align-items-center d-flex">
							<div class="overlay overlay-bg"></div>
							<a class="play-btn" href="https://www.youtube.com/watch?v=ARA0AxrnHdM"><img class="img-fluid" src="img/play-icon.png" alt=""></a>
						</div>						
						<div class="col-lg-6 video-left">
							<h6>Kedai Kopi</h6>
							<h1>TEMAN SEBANGKU KOPI<br></h1>
							<p><span>#RasaIniUntukmu</span></p>
							<p>
							Semeja belum tentu sama, bagaimana kalau sebangku? Sobat bukanlah tentang siapa yang kamu kenal paling lama. Tetapi tentang teman sebangkumu yang selalu berkata “aku ada di sini untukmu”.
							</p>
							<!-- <img class="img-fluid" src="img/signature.png" alt=""> -->
						</div>
					</div>
				</div>	
			</section>
			<!-- End video-sec Area -->

			
			
			<!-- Start menu Area -->
			<!-- <section class="menu-area section-gap" id="coffee">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Menu</h1>
								<p>Kami memiliki berbagai macam varian menu.</p>
							</div>
						</div>
					</div>
					
					<div class="row">
						<?php foreach ($menu as $mn){?>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4><?= $mn['menu'];?></h4>
									<p class="price float-right">
										<?= $mn['harga'];?>
									</p>
								</div>
								<p>
									<?= $mn['deskripsi'];?>
								</p>								
							</div>
						</div>
						<?php }?>															
					</div>
				</div>	
			</section> -->
			<!-- End menu Area -->

			<!-- Start blog Area -->
			<section class="blog-area section-gap" id="promo">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Promo</h1>
								<p>Kami selalu mengadakan promo tertentu secara berkala.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<?php foreach($promo as $pr){?>
						<div class="col-lg-4 col-md-6 single-blog">
							<img class="img-fluid" src="<?= base_url() ?><?= $pr['foto']?>" alt="">
							<ul class="post-tags">
								<li></li>
							</ul>
							<a href=""><h4><?= $pr['judul_promo']?></h4></a>
							
							<p class="post-date">
								31st January, 2018
							</p>
						</div>
						<?php }?>
						
											
					</div>
				</div>	
			</section>
			<!-- End blog Area -->
			
			<!-- Start gallery Area -->
			<section class="gallery-area section-gap" id="galery">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Outlet Kami</h1>
								<p>Teman Sebangku Kopi memiliki beberapa outlet yang berada di kota Malang, Jawa Timur.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<?php foreach ($outlet as $ot) {?>
						<div class="col-lg-4">
							<a href="<?= base_url() ?><?= $ot['foto']?>" class="img-pop-home">
								<img class="img-fluid" src="<?= base_url() ?><?= $ot['foto']?>" alt="">
							</a>	
								
						</div>
						<?php }?>
					</div>
				</div>	
			</section>
			<!-- End gallery Area -->
			
			
			
			<!-- Start blog Area -->
			<section class="blog-area section-gap" id="blog">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Blog</h1>
								<p>Artikel dan blog.</p>
							</div>
						</div>
					</div>						
					<div class="row">
					<?php foreach ($blog as $bg){?>
						<div class="col-lg-6 col-md-6 single-blog">
							<img class="img-fluid" src="<?= base_url() ?><?= $bg['foto']?>" alt="">
							<ul class="post-tags">
								<li><a href="#">Travel</a></li>
								<li><a href="#">Life Style</a></li>
							</ul>
							<a href="<?= base_url() ?>"><h4><?= $bg['judul']?> </h4></a>
							<p>
								
							</p>
							<p class="post-date">
								<?= $bg['tgl_upload'];?>
							</p>
						</div>
					<?php }?>					
					</div>
					
				</div>	
				
			</section>
			<!-- End blog Area -->

			<!-- Start review Area -->
			<section class="review-area section-gap" id="review">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Testimonials</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-6 col-md-6 single-review">
							<img src="<?= base_url() ?>/asset/front_end/<?= base_url() ?>/asset/front_end/<?= base_url() ?>/asset/front_end/img/r1.png" alt="">
							<div class="title d-flex flex-row">
								<h4>lorem ipusm</h4>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>								
								</div>
							</div>
							<p>
								Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
							</p>
						</div>	
						<div class="col-lg-6 col-md-6 single-review">
							<img src="<?= base_url() ?>/asset/front_end/<?= base_url() ?>/asset/front_end/img/r2.png" alt="">
							<div class="title d-flex flex-row">
								<h4>lorem ipusm</h4>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>								
								</div>
							</div>
							<p>
								
							</p>
						</div>	
					</div>
					<div class="row counter-row">
						<div class="col-lg-4 col-md-6 single-counter">
							<h1 class="counter">2536</h1>
							<p>Menu Tersedia</p>
						</div>
						<div class="col-lg-4 col-md-6 single-counter">
							<h1 class="counter">7562</h1>
							<p>Outlet</p>
						</div>
						<div class="col-lg-4 col-md-6 single-counter">
							<h1 class="counter">2013</h1>
							<p>Blog</p>
						</div>																		
					</div>
				</div>	
			</section>
			<!-- End review Area -->