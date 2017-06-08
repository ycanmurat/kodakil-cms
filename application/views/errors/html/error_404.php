<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$CI =& get_instance();
if( ! isset($CI))
{
    $CI = new CI_Controller();
}
$CI->load->helper('url');
?><!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="icon" href="<?=site_url('assets/Front/')?>images/favicon.png" type="image/x-icon" />
	<title>CO Akedemi</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<!-- owl-carousel -->
	<link rel="stylesheet" type="text/css" href="<?=site_url('assets/Front/')?>assets/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?=site_url('assets/Front/')?>assets/owl-carousel/owl.theme.default.css">
	<script src="<?=site_url('assets/Front/')?>assets/owl-carousel/owl.carousel.min.js"></script>


	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?=site_url('assets/Front/')?>assets/bootstrap/bootstrap.min.css">
	<script src="<?=site_url('assets/Front/')?>assets/bootstrap/bootstrap.min.js"></script>

	<!-- FontAwesome -->
	<link rel="stylesheet" href="<?=site_url('assets/Front/')?>assets/font-awesome/css/font-awesome.min.css">


	<!-- Lightbox -->
	<script src="<?=site_url('assets/Front/')?>assets/lightbox2/js/lightbox.js"></script>
	<link rel="stylesheet" href="<?=site_url('assets/Front/')?>assets/lightbox2/css/lightbox.css">


	<!-- Fix -->
	<link rel="stylesheet" href="<?=site_url('assets/Front/')?>css/reset.css">
	<link rel="stylesheet" href="<?=site_url('assets/Front/')?>css/main.css">
	<script src="<?=site_url('assets/Front/')?>js/main.js"></script>
</head>
<body>
	
	<header>
			<div class="TopBar">
				<div class="container">
					<div class="row">
						<div class="col-auto">
							<div class="Item"><i class="icon fa fa-phone" aria-hidden="true"></i> 0 (212) 899 04 20</div>
							<div class="Item"><i class="icon fa fa-envelope" aria-hidden="true"></i> info@coakademi.com</div>
						</div>
						<div class="col">
							<div class="Social">
								<a href="#" class="Link"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<a href="#" class="Link"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								<a href="#" class="Link"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
								<a href="#" class="Link"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="Header">
				<div class="container">

					<nav class="navbar navbar-inverse">
						<div class="navbar-header">
							<a class="navbar-brand" href="<?=site_url()?>"><img src="<?=site_url('assets/Front/')?>images/co-akademi-logo.png" alt="Logo"></a>
						</div>
						
						<div class="Hamburger">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</div>
						
						<div class="NavList navbar-nav navbar-right">
							<ul class="List">
								<li class="Item"><a href="<?=site_url()?>" class="Link Active">Anasayfa</a></li>
								<li class="Item Dropdown">
									<a href="javascript:void(0);" class="Link">Biz Kimiz ?</a>
									<div class="Dropdown-Small">
										<div class="row">
											<div class="col-12">
												<div class="d-menu">
													<div class="List">
														<a href="<?=site_url('Hakkimizda')?>" class="link">Hakkımızda</a>
														<a href="<?=site_url('Egitmenler')?>" class="link">Eğitmenler</a>
														<a href="<?=site_url('Referanslar')?>" class="link">Referanslar</a>
														<a href="<?=site_url('Sertifikalar')?>" class="link">Sertifikalar</a>
														<a href="<?=site_url('Galeri')?>" class="link">Foto Galeri</a>
														<a href="<?=site_url('Videolar')?>" class="link">Video Galeri</a>
														<a href="<?=site_url('SSS')?>" class="link">S.S.S</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="Item"><a href="<?=site_url('Programlar')?>" class="Link">Programlar</a></li>
								<li class="Item Dropdown">
									<a href="javascript:void(0);" class="Link">Hizmetlerimiz</a>
									<div class="Dropdown-Area">
										<div class="row">
											<div class="col-lg-2 col-12">
												<div class="d-menu">
													<div class="T">Kurumsal</div>
													<div class="List">
														<?if($menu!=0){foreach ($menu as $key => $val) {if($val->title=='Bireysel-Hizmetler'){?>
															<a href="<?=site_url('Hizmetler/'.$val->title.'/'.$val->menu_slug)?>" class="link"><?=$val->menu?></a>
														<?}}}else{echo "Şuanda Yüklü Bir Hizmet Bulunmuyor";}?>
														<a href="<?=site_url('Hizmetler')?>" class="link all">Tüm Hizmetler <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
													</div>
												</div>
											</div>
											<div class="col-lg-2 col-12">
												<div class="d-menu">
													<div class="T">Bireysel</div>
													<div class="List">
														<?if($menu!=0){foreach ($menu as $key => $val) {if($val->title=='Kurumsal-Hizmetler'){?>
															<a href="<?=site_url('Hizmetler/'.$val->title.'/'.$val->menu_slug)?>" class="link"><?=$val->menu?></a>
														<?}}}else{echo "Şuanda Yüklü Bir Hizmet Bulunmuyor";}?>
														<a href="<?=site_url('Hizmetler')?>" class="link all">Tüm Hizmetler <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-12">
												<div class="d-menu">
													<div class="T">Vizgo - E-Öğrenme</div>
													<div class="List">
														<?if($menu!=0){foreach ($menu as $key => $val) {if($val->title=='Vizgo-E-Ogrenme'){?>
															<a href="<?=site_url('Hizmetler/'.$val->title.'/'.$val->menu_slug)?>" class="link"><?=$val->menu?></a>
														<?}}}else{echo "Şuanda Yüklü Bir Hizmet Bulunmuyor";}?>
														<a href="<?=site_url('Hizmetler')?>" class="link all">Tüm Hizmetler <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
													</div>
												</div>
											</div>
											<div class="col-md-5 d-none d-md-none d-lg-block">
												<img src="<?=site_url('assets/Front/')?>images/dropdown-img.jpg" alt="Logo">
											</div>
										</div>
									</div>
								</li>
								<li class="Item"><a href="<?=site_url('Blog')?>" class="Link">Blog</a></li>
								<li class="Item"><a href="<?=site_url('Iletisim')?>" class="Link">İletişim</a></li>
								<li class="Item"><a href="#" class="Link Catalog">E-Katalog</a></li>
							</ul>
						</div>
					</nav>

				</div>
			</div>
		
	</header>
	<section class="page-404">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="Txt">
						<p>Gerçekten üzgünüz ama istediğin sayfa eksik.<br> aradığın sayfa başka bir yerde veya kaldırıldı.</p>

						<div class="img-box">
							<div class="ops">OOPPSS..</div>
							<div class="t">Aradığınız Sayfa Bulunamadı.</div>
						</div>

						<a href="<?=site_url()?>" class="Btn Red">Anasayfa'ya Dön</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-6">
					<a href="#" class="footer-logo"><img src="<?=site_url('assets/Front/')?>images/footer-logo.png" alt="Logo"></a>
				</div>
				<div class="col-6">
					<div class="footer-social">
						<a href="#" class="link"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="#" class="link"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<a href="#" class="link"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>

			<div class="FooterNav">
				<div class="row">
					<div class="col-lg-3 col-sm-4 col-6">
						<div class="nav-item">
							<div class="T">Kurumsal</div>

							<ul class="List">
								<li class="item"><a href="#" class="link">Biz Kimiz ?</a></li>
								<li class="item"><a href="#" class="link">Hizmetlerimiz</a></li>
								<li class="item"><a href="#" class="link">Eğitim Takvimi</a></li>
								<li class="item"><a href="#" class="link">Kurumsal Hizmetler</a></li>
								<li class="item"><a href="#" class="link">Blog</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-sm-4 d-none d-sm-block">
						<div class="nav-item">
							<div class="T">Hizmetlerimiz</div>

							<ul class="List">
								<li class="item"><a href="#" class="link">Eğitim / Seminer</a></li>
								<li class="item"><a href="#" class="link">Danışmanlık</a></li>
								<li class="item"><a href="#" class="link">CEO Olmak</a></li>
								<li class="item"><a href="#" class="link">Yönetme Eğitimi</a></li>
								<li class="item"><a href="#" class="link">Gelişim Kursları</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-sm-4 col-6">
						<div class="nav-item">
							<div class="T">Yardım</div>

							<ul class="List">
								<li class="item"><a href="#" class="link">S.S.S.</a></li>
								<li class="item"><a href="#" class="link">İletişim</a></li>
								<li class="item"><a href="#" class="link">Gizlilik Politikası</a></li>
								<li class="item"><a href="#" class="link">Kullanım Koşulları</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-sm-12">
						<div class="nav-item">
							<div class="T">Bize Ulaşın</div>

							<div class="Info">
								<p><i class="fa fa-map-marker Icon" aria-hidden="true"></i> Mutlukent Mahallesi, Angora Bulvarıi 2010 Sokak, No: 68 Beysukent / Çankaya / Ankara</p>
								<p><i class="fa fa-phone Icon" aria-hidden="true"></i> 0 212 555 89 90 - 0555 000 00 00</p>
								<p><i class="fa fa-envelope Icon" aria-hidden="true"></i>info@coakademi.com</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="Newsletter">
				<div class="row">
					<div class="col-md-5">
						<div class="T">Bültenimize Kayıt Olun</div>
					</div>
					<div class="col-md-7">
						<form action="#" method="post" id="bulletinForm">
							<input type="text" placeholder="Email Adresiniz" id="bulletinEmail">
							<button type="submit" class="Btn Red">Hemen Katılın</button>
							<div id="errorBulletin" style="color:white"></div>
						</form>
					</div>
				</div>
			</div>

			<div class="copyright">
				2018 - CÖ Akademi. Her Hakkı Saklıdır.
			</div>
		</div>
	</footer>
	<div class="overlay"></div>
</body>
</html>
<script type="text/javascript">
	var baseUrl = "http://coacademi.kodakil.com/Home/bulletin";
	$("#bulletinForm").submit(function (event) {
		var bulletinEmail = $("#bulletinEmail").val();
		if (bulletinEmail=="") {
			$("#errorBulletin").text('Lütfen E-mail Adresinizi Girin');
			event.preventDefault();
		}else{
			$.ajax(baseUrl,{
				type:"POST",
				url:baseUrl,
				data:{bulletinEmail:bulletinEmail},
				success: function(data) {
            		if (data == 1) {
						alert('E-Bültenimize Kayıt Olduğunuz İçin Teşekkürler.');
						event.preventDefault();
            		}else{
            			alert('Vermiş Olduğunuz Bilgiler Bizde Kayıtlı Yada Eksik Bir Şeyler Var.');
						event.preventDefault();
            		}
        		}
			});
		}
	});
</script>