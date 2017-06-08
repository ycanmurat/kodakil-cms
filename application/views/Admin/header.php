<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Kodakil - Cms
		</title>
		<meta name="description" content="General widget examples">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
		<!--begin::Base Styles -->
		<link href="<?=base_url('theme/')?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('theme/')?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('theme/')?>assets/css/custom.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url('theme/')?>assets/app/media/img/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('theme/')?>assets/app/media/img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('theme/')?>assets/app/media/img/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('theme/')?>assets/app/media/img/favicon/favicon-16x16.png">
		<link rel="manifest" href="<?=base_url('theme/')?>assets/app/media/img/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?=base_url('theme/')?>assets/app/media/img/favicon/ms-icon-144x144.png">
	</head>
	<!-- end::Head -->
	<!-- end::Body -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->
			<header class="m-grid__item m-header"  data-minimize-mobile="hide" data-minimize-offset="200" data-minimize-mobile-offset="200" data-minimize="minimize" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-dark ">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="<?=site_url('Admin')?>" class="m-brand__logo-wrapper">
										<img width="200" src="<?=site_url('assets/Front/images/logofinal.png')?>" alt="Otosesli" title="Otosesli">
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- BEGIN: Left Aside Minimize Toggle -->
									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
										<span></span>
									</a>
									<!-- END -->
									<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
									<!-- BEGIN: Responsive Header Menu Toggler -->
									<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
									<!-- BEGIN: Topbar Toggler -->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>
						<!-- END: Brand -->
						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<!-- BEGIN: Horizontal Menu -->
							<!-- END: Horizontal Menu -->
							<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										<li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light" data-dropdown-toggle="click" data-dropdown-persistent="true" id="m_quicksearch" data-search-type="dropdown">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon">
													<i class="flaticon-search-1"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
												<div class="m-dropdown__inner ">
													<div class="m-dropdown__header">
														<form  class="m-list-search__form">
															<div class="m-list-search__form-wrapper">
																<span class="m-list-search__form-input-wrapper">
																	<input id="m_quicksearch_input" autocomplete="off" type="text" name="q" class="m-list-search__form-input" value="" placeholder="Menü Başlığı Arayın">
																</span>
																<span class="m-list-search__form-icon-close" id="m_quicksearch_close">
																	<i class="la la-remove"></i>
																</span>
															</div>
														</form>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-max-height="300" data-mobile-max-height="200">
															<div class="m-dropdown__content"></div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"  data-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
												<span class="m-nav__link-icon">
													<i class="flaticon-cogwheel"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(<?=base_url('theme/')?>assets/app/media/img/misc/quick_actions_bg.jpg); background-size: cover;">
														<span class="m-dropdown__header-title">
															Ayarlar
														</span>
														<span class="m-dropdown__header-subtitle">
															Hızlı Adımlar
														</span>
													</div>
													<div class="m-dropdown__body m-dropdown__body--paddingless">
														<div class="m-dropdown__content">
															<div class="m-scrollable" data-scrollable="false" data-max-height="380" data-mobile-max-height="200">
																<div class="m-nav-grid m-nav-grid--skin-light">
																	<div class="m-nav-grid__row">
																		<!--<a href="<?=admin_url('Meta')?>" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-graphic-1"></i>
																			<span class="m-nav-grid__text">
																				Site Meta Tagları
																			</span>
																		</a>-->
																		<a href="<?=admin_url('Logout')?>" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-logout"></i>
																			<span class="m-nav-grid__text">
																				Sistemden Çıkış Yap
																			</span>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										
									</ul>
								</div>
							</div>
							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>
			<!-- END: Header -->
			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside dataz -->
					<div 
		id="m_ver_menu" 
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
		data-menu-vertical="true"
		 data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
		>
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow">
							<li class="m-menu__item " aria-haspopup="true" >
								<a href="<?=admin_url()?>" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-line-graph"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Anasayfa
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Slider'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-tabs"></i>
									<span class="m-menu__link-text">
										Slider Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='SliderList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Slider')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Sliderları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='SliderAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Slider/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Slider Ekle
												</span>
											</a>
										</li>
										<!--<li class="m-menu__item <?=($subMenu=='mobileSliderList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Slider/mobileSlider')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Mobil Sliderları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='mobileSliderAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Slider/mobileSliderAdd')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Mobil Slider Ekle
												</span>
											</a>
										</li>-->
									</ul>
								</div>
							</li>
							<!--<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Blog'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-visible"></i>
									<span class="m-menu__link-text">
										Haber Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='BlogList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Blog')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Haberleri Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='BlogAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Blog/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Haber Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Menu'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-tabs"></i>
									<span class="m-menu__link-text">
										Hizmetler Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='MenuList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Menu')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Hizmetleri Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='MenuAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Menu/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Hizmet Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='News'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-notes"></i>
									<span class="m-menu__link-text">
										Sayfa Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='NewsList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/News')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Sayfaları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='NewsAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/News/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Sayfa Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						-->
							<!--<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Statics'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-file"></i>
									<span class="m-menu__link-text">
										Sabit Sayfa Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='StaticsList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Statics')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Sabit Sayfaları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='StaticsAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Statics/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Sabit Sayfa Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>-->
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Corporate'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-file"></i>
									<span class="m-menu__link-text">
										Kurumsal
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='CorporateUpdate'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Corporate')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Hakkımızda Düzenle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<!--
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Faq'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-file-1"></i>
									<span class="m-menu__link-text">
										S.S.S Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='FaqAdd'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Faq/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Sıkça Sorulanlara Soru Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='FaqList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Faq')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Sıkça Sorulan Soruları Listele
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						-->
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Language'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="<?=site_url('Admin/Language/statics/1')?>" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-speech-bubble-1"></i>
									<span class="m-menu__link-text">
										Statik Alan Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<!--
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='LanguageList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Language')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Dil Listele
												</span>
											</a>
										</li>
										<!--
										<li class="m-menu__item <?=($subMenu=='LanguageAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Language/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Dil Ekle
												</span>
											</a>
										</li>
									
									</ul>
								</div>
							-->
							</li>
							<!--<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Categorys'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-map"></i>
									<span class="m-menu__link-text">
										Kategori Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='CategorysList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Categorys')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategorileri Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='CategorysAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Categorys/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategori Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>-->
							<!--<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Products'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-4"></i>
									<span class="m-menu__link-text">
										Ürün Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='ProductsList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Products')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Ürünleri Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='ProductsAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Products/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Ürün Ekle
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='NewsProductAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Products/NewsProductAdd')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Yeni Ürün Seç
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>-->
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Galery'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-visible"></i>
									<span class="m-menu__link-text">
										Galeri Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='CategoryGaleryAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Galery/categoryAdd')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Galeri Kategorisi Ekle
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='CategoryGaleryList'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Galery/category')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Galeri Kategorisi Düzenle
												</span>
											</a>
										</li>
									</ul>
								</div>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='GaleryList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Galery')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Fotoğraf Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='GaleryAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Galery/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Fotoğraf Ekle
												</span>
											</a>
										</li>
										<!--<li class="m-menu__item <?=($subMenu=='Category'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Video/Category')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Video Kategori Ekle
												</span>
											</a>
										</li>-->
									</ul>
								</div>
							</li>
							<!--
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Comment'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-visible"></i>
									<span class="m-menu__link-text">
										Yorum Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='CommentList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Comment')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Yorumları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='CommentAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Comment/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Yorum Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Instructor'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-visible"></i>
									<span class="m-menu__link-text">
										Eğitmen Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='InstructorList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Instructor')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Eğitmenleri Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='InstructorAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Instructor/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Eğitmen Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>-->
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Blog'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-visible"></i>
									<span class="m-menu__link-text">
										Haber Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='BlogList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Blog')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Haberleri Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='BlogAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Blog/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Haber Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Team'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-visible"></i>
									<span class="m-menu__link-text">
										Takım Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='teamList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Team')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Ekibi Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='teamAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Team/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Üye Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Contact'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-visible"></i>
									<span class="m-menu__link-text">
										iletişim Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='contactList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Contact')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Sayfaları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='contactAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Contact/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Sayfa Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<!--
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Program'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-visible"></i>
									<span class="m-menu__link-text">
										Program Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='ProgramList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Program')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Programları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='ProgramAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Program/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Program Ekle
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='ProgrammenuAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Program/menulist')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Program Menü Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>-->

							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Trademark'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-visible"></i>
									<span class="m-menu__link-text">
										Markalar
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='TradeList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Trademark')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Markaları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='Tradeadd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Trademark/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Marka Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>


							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Catalog'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-visible"></i>
									<span class="m-menu__link-text">
										Kataloglar
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='CatalogList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Catalog')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Katalogları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='Catalogadd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Catalog/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Katalog Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<!--
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Referances'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-chat"></i>
									<span class="m-menu__link-text">
										Referans Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='ReferancesList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Referances')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Referansları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='ReferancesAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Referances/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Referans Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>-->
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Certificate'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-chat"></i>
									<span class="m-menu__link-text">
										Hizmet Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='CertificateList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Certificate')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Hizmetleri Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='CertificateAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Certificate/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Hizmet Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Form'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-notes"></i>
									<span class="m-menu__link-text">
										Form Listesi Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='formPositionAdd'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Form/formPositionAdd')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pozisyon Ekle
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='positionList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Form/positionList')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pozisyonlar
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='contactForm'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Form/contactForm')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													İletişim Talepleri
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='human_resources'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Form/human_resources')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													İnsan Kaynakları
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='dealershipForm'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Form/dealershipForm')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Bayi Başvuruları
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
					<!-- END: Aside Menu -->
				</div>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">