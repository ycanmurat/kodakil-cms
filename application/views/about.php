<section class="about">
	<div class="companyBanner" style="background-image: url('<?=site_url('assets/Front/images/slide01.jpg')?>');">
		<h1><?=$Lang->hakkimizda?></h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12 m-auto">
				<div class="companyMenu">
					<a class="active" href="<?=site_url('kurumsal')?>"><?=$Lang->hakkimizda?></a>
					<a class="" href="<?=site_url('kurumsal/vizyon-ve-misyon')?>"><?=$Lang->vizyonVeMisyon?></a>
					<a class="" href="<?=site_url('kurumsal/galeri')?>"><?=$Lang->galeri?></a>
				</div>
			</div>
			<div class="col-12">
				<h4 class="mainTitle">
					<i class="fas fa-info"></i> <?=$Lang->hakkimizda?>
				</h4>
			</div>
			<div class="col-12">
				<div class="row">
					<div class="col-12">
						<img class="img-fluid d-md-inline d-block" src="<?=$hakkimizda->picture?>">
						<h2><?=$hakkimizda->title?></h2>
						<?=$hakkimizda->title_content?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
