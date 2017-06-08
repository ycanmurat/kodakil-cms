<section class="about">
	<div class="companyBanner" style="background-image: url('<?=site_url('assets/Front/images/slide01.jpg')?>');">
		<h1><?=$Lang->vizyonVeMisyonumuz?></h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12 m-auto">
				<div class="companyMenu">
					<a class="" href="<?=site_url('kurumsal')?>"><?=$Lang->hakkimizda?></a>
					<a class="active" href="<?=site_url('kurumsal/vizyon-ve-misyon')?>"><?=$Lang->vizyonVeMisyon?></a>
					<a class="" href="<?=site_url('kurumsal/galeri')?>"><?=$Lang->galeri?></a>
				</div>
			</div>
			<div class="col-12">
				<h4 class="mainTitle">
					<i class="fas fa-chart-line"></i> <?=$Lang->vizyon?>
				</h4>
			</div>
			<div class="col-12">
				<div class="row">
					<div class="col-12">
						<img class="img-fluid d-md-inline d-block" src="<?=site_url($hakkimizda->secont_picture)?>">
						<h2><?=$hakkimizda->title_two?></h2>
						<?=$hakkimizda->title_two_content?>
					</div>
				</div>
			</div>
			<div class="col-12 mt-4">
				<h4 class="mainTitle">
					<i class="fas fa-hand-point-right"></i> <?=$Lang->misyon?>
				</h4>
			</div>
			<div class="col-12">
				<div class="row">
					<div class="col-12">
						<img class="img-fluid d-md-inline d-block" src="<?=site_url($hakkimizda->third_picture)?>">
						<h2><?=$hakkimizda->title_three?></h2>
						<?=$hakkimizda->title_three_content?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
