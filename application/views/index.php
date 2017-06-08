<section class="Slider">
	<!-- Web --> 
	<div class="owl-carousel owl-theme owl-slider web d-md-block d-none">
		
		<?foreach ($sliders as $key => $sliderInfo) { ?>
			<div class="item" style="background-image: url('<?=site_url($sliderInfo->picture_info)?>');">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="SliderText">
								<h4><?=$sliderInfo->title?></h4>
								<h5><?=$sliderInfo->content?></h5>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?}?>
		</div>
		<div class="owl-carousel owl-theme owl-slider mobile d-md-none d-block">
			<!-- Mobil -->
			<?foreach ($mobileSlider as $key => $sliderInfo) { ?>
				<div class="item" style="background-image: url('<?=site_url($sliderInfo->picture_info)?>');">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="SliderText">
									<h4><?=$sliderInfo->title?></h4>
									<h5><?=$sliderInfo->content?></h5>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?}?>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="Card">
							<div class="imgArea">
								<img class="img-fluid" src="<?=site_url('../assets/Front/images/service-block3.png')?>" >
							</div>
							<div class="textArea">
								<h5><?=$Lang->SliderKutu1Baslik?></h5>
								<p><?=$Lang->SliderKutu1Icerik?></p>
							</div>
						</div>
					</div>
					<div class="col-md-6 d-md-block d-none">
						<div class="Card">
							<div class="imgArea">
								<img class="img-fluid" src="<?=site_url('../assets/Front/images/service-block1.png')?>" >
							</div>
							<div class="textArea">
								<h5><?=$Lang->SliderKutu2Baslik?></h5>
								<p><?=$Lang->SliderKutu2Icerik?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="Services">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h4 class="mainTitle">
							<i class="fas fa-tools"></i> <?=$Lang->hizmetlerimiz?>
						</h4>
					</div>
					<?foreach ($services as $key => $serviceInfo) {?>
						<div class="col-lg-3 col-md-6">
							<a href="<?=site_url($serviceInfo->link)?>" class="Card mb-4">
								<div class="head">
									<img src="<?=site_url($serviceInfo->picture)?>">
									<h6><?=$serviceInfo->title?></h6>
								</div>
								<div class="learnMore"><?=$Lang->dahafazlaogren?></div>
							</a>
						</div>
						<?}?>
					</div>
				</div>
			</section>

			<section class="blognews">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h4 class="mainTitle">
								<i class="far fa-newspaper"></i> <?=$Lang->bloghaberler?>
							</h4>
						</div>
						<?foreach ($blogContent as $key => $blogInfo) {?>
							<div class="col-md-4">
								<div class="Card">
									<div class="imgArea" style="background-image: url('<?=site_url($blogInfo->content_photo)?>');">

										<div class="comment">
											<?
											$parts = explode(" ", $blogInfo->added_time);
											$timeParts = explode(":",$parts[1]);
											echo $timeParts[0].':'.$timeParts[1];
											?>
										</div>
										<div class="newsDate"><span>
											<?
											$parts = explode(" ", $blogInfo->added_time);
											echo $parts[0];
											?>
										</span></div>
									</div>
									<div class="infoArea">
										<h4><?=$blogInfo->title?></h4>
										<?=$blogInfo->content?>
										<a href="<?=site_url($blogInfo->link)?>"><?=$Lang->dahafazlaoku?></a>
									</div>
								</div>
							</div>
							<?}?>
						</div>
					</div>
				</section>


				<div class="ReferancesArea">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<h4 class="mainTitle">
									<i class="fas fa-marker"></i> <?=$Lang->markalarimiz?>
								</h4>
							</div>
							<?foreach ($trademarks as $key => $tradeMarkInfo) {?>
								<div class="col-md-3 col-sm-4 col-6"><img class="img-fluid m-auto" src="<?=site_url($tradeMarkInfo->image)?>"></div>
								<?}?>

							</div>
						</div>
					</div>

					<section class="photoGalery">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<h4 class="mainTitle">
										<i class="far fa-images"></i> <?=$Lang->resimgalerimiz?>
										<div id="navHere"></div>
									</h4>
								</div>
								<div class="col-12">
									<div class="owl-carousel owl-theme owl-homeGalery">
										<?foreach ($imagesGallery as $key => $value) {?>
											<div class="item">
												<a href="<?=site_url($value->image_url)?>" data-lightbox="<?=$value->image_title?>">
													<img class="img-fluid m-auto" src="<?=site_url($value->image_url)?>">
													<span><?=$value->image_title?></span>
												</a>
											</div>
											<?}?>
										</div>
									</div>
								</div>
							</div>
						</section>

						<section class="Teams">
							<div class="container">
								<div class="row">
									<div class="col-12">
										<h4 class="mainTitle">
											<i class="fas fa-user-tie"></i> <?=$Lang->takimuyelerimiz?>
											<div id="navHereToo"></div>
										</h4>
									</div>
									<div class="col-12">
										<div class="owl-carousel owl-theme owl-team">
											<?foreach ($teams as $key => $teamInfo) {?>
												<div class="item">
													<div class="row">
														<div class="col-sm-6"><img class="img-fluid" src="<?=site_url($teamInfo->image)?>"></div>
														<div class="col-sm-6">
															<div class="personel">
																<h5><?=$teamInfo->title?></h5>
																<p><?=$teamInfo->position?></p>
															</div>
															<div class="info">
																<?=$teamInfo->content?>
															</div>
														</div>
													</div>
												</div>
												<?}?>
											</div>
										</div>
									</div>
								</div>
							</section>

							<div class="indexMap">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2121.23292892801!2d36.41477412584576!3d41.24625068231072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4087df7dc2c6397f%3A0x9eba220c9c3a7b54!2sOto+Sesli+Yedek+Par%C3%A7a+Servis+Bak%C4%B1m+Hizmetleri+Sanayi+ve+Ticaret+LTD.+%C5%9ET%C4%B0!5e0!3m2!1str!2str!4v1554806967337!5m2!1str!2str" width="600" height="450" frameborder="0" style="border:0;width: 100%;height: 350px;" allowfullscreen></iframe>
							</div>
