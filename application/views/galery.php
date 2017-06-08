<section class="about galery">
	<div class="companyBanner" style="background-image: url('<?=site_url('assets/Front/images/slide01.jpg')?>');">
		<h1><?=$Lang->resimGalerisi?></h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12 m-auto">
				<div class="companyMenu">
					<a class="" href="<?=site_url('kurumsal')?>"><?=$Lang->hakkimizda?></a>
					<a class="" href="<?=site_url('kurumsal/vizyon-ve-misyon')?>"><?=$Lang->vizyonVeMisyon?></a>
					<a class="active" href="<?=site_url('kurumsal/galeri')?>"><?=$Lang->galeri?></a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="allData-tab" data-toggle="pill" href="#allData" role="tab" aria-controls="allData" aria-selected="true"><i class="fas fa-th-large"></i> <?=$Lang->tumunuGor?></a>
					<?foreach ($contents as $key => $titleInfo) {?>
						<a class="nav-link" id="<?=$titleInfo->slug?>-tab" data-toggle="pill" href="#<?=$titleInfo->slug?>" role="tab" aria-controls="<?=$titleInfo->slug?>" aria-selected="false"><?=$titleInfo->category_title?></a>
					<?}?>
				</div>
			</div>
			<div class="col-md-9">
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="allData" role="tabpanel" aria-labelledby="allData-tab">
						<div class="row">
							<?foreach ($contents as $key => $titleInfo) {foreach ($titleInfo->contents as $key => $contentInfo) {?>
								<div class="col-md-6">
									<a href="<?=site_url($contentInfo->image_url)?>" data-lightbox="<?=$contentInfo->image_title?>">
										<img class="img-fluid m-auto" src="<?=site_url($contentInfo->image_url)?>">
										<span><?=$contentInfo->image_title?></span>
									</a>
								</div>
							<?}}?>
						</div>
					</div>
					<?foreach ($contents as $key => $titleInfo) {?>
						<div class="tab-pane fade" id="<?=$titleInfo->slug?>" role="tabpanel" aria-labelledby="<?=$titleInfo->slug?>-tab">
							<div class="row">
								<?foreach ($titleInfo->contents as $key => $contentInfo) {?>
									<div class="col-md-6">
										<a href="<?=site_url($contentInfo->image_url)?>" data-lightbox="<?=$contentInfo->image_title?>">
											<img class="img-fluid m-auto" src="<?=site_url($contentInfo->image_url)?>">
											<span><?=$contentInfo->image_title?></span>
										</a>
									</div>
								<?}?>
							</div>
						</div>
					<?}?>
				</div>
			</div>
		</div>
	</div>
</section>

