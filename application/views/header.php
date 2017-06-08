<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Tüm cihazlara uyumlu -->
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<!-- owl-carousel -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>

	<!-- Lightbox -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.css">

	<!--                          Fonts                         -->
	<link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">


	<!-- KODAKIL -->
	<link rel="stylesheet" href="https://kodakil.com/assets/Front/images/kodakil_footer/kodakil_logo.css">
	<!--                    CSS                          -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css">
	<link rel="stylesheet" type="text/css" href="<?=site_url('assets/Front/css/reset.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=site_url('assets/Front/css/style.css')?>">

	<!--                  Font Awesome                    -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="shortcut icon"  href="<?=site_url('assets/Front/images/favico.png')?>"/>
	<title><?=$Lang->title?></title>
	<!-- <?=$Lang->description?> -->
</head>
<body>
	<header>
		<section class="topHeader">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="topInfo">
							<div class="item">
								<i class="fas fa-phone"></i> <?=$Lang->gsm?> 
							</div>
							<div class="item">
								<a href="mailto:info@otosesli.com"><i class="far fa-envelope"></i> <?=$Lang->mail?></a>
							</div>
						</div>
						<div class="LangSelect">
							<a href="#"><img class="img-fluid" src="<?=site_url('assets/Front/images/eng.png')?>"></a> 
							<a href="#"><img class="img-fluid" src="<?=site_url('assets/Front/images/tr.png')?>"></a> 
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="Header">
						<div class="Logo">
							<a href="<?=site_url()?>">
								<img src="<?=site_url('assets/Front/images/logofinal.png')?>" class="img-fluid">
							</a>
						</div>
						<div class="Menu">
							<div class="hamburger" id="hamburger-11">
								<span class="line"></span>
								<span class="line"></span>
								<span class="line"></span>
							</div>
							<ul class="MenuList">
								<li><a href="<?=site_url()?>"><?=$Lang->anasayfa?></a></li>
								<li><a href="<?=site_url('kurumsal')?>"><?=$Lang->kurumsal?></a></li>
								<li><a href="<?=site_url('katalog')?>"><?=$Lang->katalog?></a></li>
								<li><a href="<?=site_url('iletisim')?>"><?=$Lang->iletisim?></a></li>
								<li><a href="<?=site_url('insan-kaynaklari')?>"><?=$Lang->insankaynaklari?></a></li>
								<li><a target="_blank" href="https://b2b.otosesli.com"><?=$Lang->bayigiris?></a></li>
								<li><a href="<?=site_url('bayilik-basvurusu')?>"><?=$Lang->bayilikbasvurusu?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</header>
