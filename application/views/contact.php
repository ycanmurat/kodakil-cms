<section class="about contact">
	<div class="companyBanner" style="background-image: url('<?=site_url('assets/Front/images/slide01.jpg')?>');">
		<h1><?=$Lang->iletisim?></h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12 m-auto">
				<div class="companyMenu">
					<?foreach ($titles as $key => $titleInfo) {?>
						<a <?=($titleInfo->title_slug == $lower_title)?'class="active"':''?> href="<?=site_url('iletisim/'.$titleInfo->title_slug)?>"><?=$titleInfo->title?></a>
					<?}?>
				</div>
			</div>
			<div class="col-lg-8 mt-3">
				<h4 class="mainTitle">
					<i class="fas fa-map-marked-alt"></i> <?=$Lang->neredeyiz?>
				</h4>
				<iframe src="<?=(!empty($page->maps)?$page->maps:'Lütfen Geliştiricinize Başvurun')?>" frameborder="0" style="border:0;height: 350px;width: 100%;" allowfullscreen></iframe>
				<h4 class="mainTitle mt-5">
					<i class="fas fa-paper-plane"></i> <?=$Lang->bizeYazin?>
				</h4>
				<form class="contactForm" method="post" action="#">
					<div class="form-row">
						<div class="col-lg-6">
							<div class="form-item">
								<label class="sr-only" for="isimi"><?=$Lang->CFormadiniz?></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text" id="iconName"><i class="far fa-user"></i></div>
									</div>
									<input type="text" id="name" name="name" placeholder="<?=$Lang->CFormadiniz?>">
								</div>
							</div>
							<div class="form-item">
								<label class="sr-only" for="eposta"><?=$Lang->CFormePostaAdresi?></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text" id="iconEmail"><i class="far fa-envelope"></i></div>
									</div>
									<input type="text" id="email" name="email" placeholder="<?=$Lang->CFormePostaAdresi?>">
								</div>
							</div>
							<div class="form-item">
								<label class="sr-only" for="telephone"><?=$Lang->CFormTelefon?></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text" id="iconPhone"><i class="fas fa-phone"></i></div>
									</div>
									<input type="tel" id="phone" name="phone" placeholder="<?=$Lang->CFormTelefon?>">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<textarea placeholder="Mesajınız" name="message" id="message"></textarea>
							<button type="button" id="sendContact"><?=$Lang->gonder?></button>
						</div>
						<div class="col-lg-12" id="info" style="background-color:green;width:100%;margin:5px;padding:10px;color: white;display: none"></div>
					</div>
				</form>
			</div>
			<div class="col-lg-4 mt-3">
				<div class="contactCard">
					<h6><?=$Lang->iletisimBilgileri?></h6>
					<div class="item">
						<span><i class="fas fa-phone"></i></span>
						<span><?=(!empty($page->phone)?$page->phone:'Lütfen Geliştiricinize Başvurun')?></span>
					</div>
					<div class="item">
						<span><i class="fas fa-home"></i></span>
						<span><?=(!empty($page->address)?$page->address:'Lütfen Geliştiricinize Başvurun')?></span>
					</div>
					<div class="item">
						<span><i class="fas fa-globe-europe"></i></span>
						<span><a href="mailto:<?=(!empty($page->email)?$page->email:'Lütfen Geliştiricinize Başvurun')?>"><?=(!empty($page->email)?$page->email:'Lütfen Geliştiricinize Başvurun')?></a></span>
					</div>
					<div class="cardFooter">
						<a href="tel://<?=(!empty($page->phone)?$page->phone:'Lütfen Geliştiricinize Başvurun')?>"><span><i class="fas fa-phone"></i><?=$Lang->hemenUlasin?></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>