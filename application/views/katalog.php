<section class="about katalog">
	<div class="companyBanner" style="background-image: url('<?=site_url('assets/Front/images/slide01.jpg')?>');">
		<h1><?=$Lang->kataloglarimiz?></h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?foreach ($catalog as $key => $catInfo) {?>
					<a target="_blank" href="<?=site_url($catInfo->pdf)?>" class="katalogCard" download>
						<img class="img-fluid d-sm-inline d-block" src="<?=site_url($catInfo->image)?>">
						<h2><?=$catInfo->title?></h2>
						<p><?=$catInfo->content?></p>
					</a>
				<?}?>
			</div>

		</div>
	</div>
</section>

