<section class="about ik">
	<div class="companyBanner" style="background-image: url('<?=site_url('assets/Front/images/slide01.jpg')?>');">
		<h1>Bayilik Başvuru</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12 mt-3">
				<h4 class="mainTitle">
					<i class="fas fa-store-alt"></i> Bayilik Başvuru Formu
				</h4>
			</div>
			<div class="col-12">
				<form class="ikForm" method="post" action="<?=site_url('Dealership_application')?>">
					<div class="row">
						<div class="col-12">
							<div class="pageTitle">Firma Bilgileri</div>
						</div>
						<div class="col-sm-6">
							<label>Firma Adı</label>
							<input type="text" placeholder="Firma Adınız" name="firma_adi" value="<?=set_value('firma_adi')?>">
							<?=form_error('firma_adi', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-sm-6">
							<label>Yetkili Adı / Ünvanı</label>
							<input type="text" placeholder="Yetkili veya Ünvanı" name="yetkili_adi" value="<?=set_value('yetkili_adi')?>">
							<?=form_error('yetkili_adi', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-sm-6">
							<label>Firma Ortakları</label>
							<input type="text" placeholder="Ortaklar" name="ortaklar" value="<?=set_value('ortaklar')?>">
							<?=form_error('ortaklar', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-sm-6">
							<label>Adres</label>
							<input type="text" placeholder="Adresiniz" name="adres" value="<?=set_value('adres')?>">
							<?=form_error('adres', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-6">
							<label>İl</label>
							<select name="il" id="il">
								<option value="">Seçiniz</option>
								<?foreach ($cities as $key => $cityInfo) {?>
									<option value="<?=$cityInfo->CityID?>" <?=(!empty(set_value('il')) && set_value('il') == $cityInfo->CityID)?'selected':''?>><?=$cityInfo->CityName?></option>
								<?}?>
							</select>
							<?=form_error('il', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-6">
							<label>İlçe</label>
							<select name="ilce" id="ilce">
								<option value="">Seçiniz</option>
							</select>
							<?=form_error('ilce', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-sm-6">
							<label>Telefon No</label>
							<input type="tel" placeholder="Telefon" name="telefon" value="<?=set_value('telefon')?>">
							<?=form_error('telefon', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-sm-6">
							<label>Faks No</label>
							<input type="tel" placeholder="Faks" name="faks" value="<?=set_value('faks')?>">
							<?=form_error('faks', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-sm-6">
							<label>E-Posta Adresi</label>
							<input type="email" placeholder="E-Posta" name="eposta" value="<?=set_value('eposta')?>">
							<?=form_error('eposta', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-sm-6">
							<label>Kuruluş Yılı</label>
							<input type="date" name="kurulus_yili" value="<?=set_value('kurulus_yili')?>">
							<?=form_error('kurulus_yili', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>

						<div class="col-12">
							<div class="pageTitle">Fatura Bilgileri</div>
						</div>
						<div class="col-sm-6">
							<label>Vergi Dairesi</label>
							<input type="text" placeholder="Vergi dairesi" name="vergi_dairesi" value="<?=set_value('vergi_dairesi')?>">
							<?=form_error('vergi_dairesi', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-sm-6">
							<label>Vergi Numarası</label>
							<input type="number" placeholder="Vergi No" name="vergi_numarasi" value="<?=set_value('vergi_numarasi')?>">
							<?=form_error('vergi_numarasi', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-sm-6">
							<label>TC Kimlik No</label>
							<input type="number" placeholder="TC No" name="tc" value="<?=set_value('tc')?>"> 
							<?=form_error('tc', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-sm-6">
							<label>Unvan</label>
							<input type="text" placeholder="Firma Ünvanınız" name="unvan" value="<?=set_value('unvan')?>">
							<?=form_error('unvan', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-12">
							<div class="pageTitle">Banka Bilgileri</div>
						</div>
						<div class="col-sm-6">
							<label>Banka Adı</label>
							<input type="text" placeholder="Banka" name="banka_adi" value="<?=set_value('banka_adi')?>">
							<?=form_error('banka_adi', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-sm-6">
							<label>İban Numarası</label>
							<input type="text" placeholder="örn:TR 1000 00.." name="iban" value="<?=set_value('iban')?>">
							<?=form_error('iban', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-sm-6">
							<label>Banka Adı</label>
							<input type="text" placeholder="Banka ismi" name="banka_adi_iki" value="<?=set_value('banka_adi_iki')?>">
							<?=form_error('banka_adi_iki', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-sm-6">
							<label>İban Numarası</label>
							<input type="text" placeholder="örn:TR 1000 00.." name="iban_iki" value="<?=set_value('iban_iki')?>">
							<?=form_error('iban_iki', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-12">
							<div class="pageTitle">Referans Bilgileri</div>
						</div>

						<div class="col-sm-12">
							<label>1. Referans</label>
							<input type="text" placeholder="Ad Soyad, Ünvan, Telefon" name="referans_bir" value="<?=set_value('referans_bir')?>">
							<?=form_error('referans_bir', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-sm-12">
							<label>2. Referans</label>
							<input type="text" placeholder="Ad Soyad, Ünvan, Telefon" name="referans_iki" value="<?=set_value('referans_iki')?>">
							<?=form_error('referans_iki', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
							<div class="col-sm-12">
							<label>3. Referans</label>
							<input type="text" placeholder="Ad Soyad, Ünvan, Telefon" name="referans_uc" value="<?=set_value('referans_uc')?>">
							<?=form_error('referans_uc', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>

						<div class="col-12">
							<label>Eklemek İstedikleriniz</label>
							<textarea height="100" <?=(!empty(set_value('mesaj'))?'':'placeholder="Eklemek İstedikleriniz"')?> name="mesaj"><?=(!empty(set_value('mesaj'))?set_value('mesaj'):'')?></textarea>
							<?=form_error('mesaj', '<div class="alert alert-danger" role="alert">', '</div>');?>
						</div>
						<div class="col-12 text-center">
							<input type="submit" value="Formu Gönder" class="submit">
							<?if($this->session->flashdata('success')==1){?>
								<div class="alert alert-success" role="alert">
									Bilgileriniz Bize Ulaştı En Kısa Sürede Size Ulaşacağız.
								</div>
							<?}elseif($this->session->flashdata('danger')==2){?>
								<div class="alert alert-danger" role="alert">
									Şuanda Hizmet Sağlayamıyoruz, Lütfen Daha Sonra Tekrar Deneyin.
								</div>
							<?}?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">

$( document ).ready(function() {

	$('#il').change(function(){
    	var CityID = $('#il').val();
    	if (CityID !== '') {
    		$.ajax({
		        method: 'post',
		        dataType: 'json',
		        url: '/Ajax/getCountiesByCities/' + CityID,
		        success: function(result){
		            if (result.status) {
		            	$('#ilce').html('');
		            	var html = '';
		            	$.each( result.array, function( key, value ) {
							html += '<option value='+ value.CountyID +'>' + value.CountyName + '</option>';
						});
						$('#ilce').append(html);
		            } else {
		            	$('#ilce').html('');
		            	$('#ilce').append('<option value="">Lütfen Seçin</option>');
		            }
		    	}, error: function() {
		    		console.log('<?=md5(date('Y-m-d H:i:s'))?>');
		    	}
    		});
    	} else {
    		$('#ilce').html('');
		    $('#ilce').append('<option value="">Lütfen Seçin</option>');
    	}
	});

	var CityID = $('#il').val();
	if (CityID !== '') {
		$.ajax({
	        method: 'post',
	        dataType: 'json',
	        url: '/Ajax/getCountiesByCities/' + CityID,
	        success: function(result){
	            if (result.status) {
	            	$('#ilce').html('');
	            	var html = '';
	            	$.each( result.array, function( key, value ) {
						html += '<option value='+ value.CountyID +'>' + value.CountyName + '</option>';
					});
					$('#ilce').append(html);
	            } else {
	            	$('#ilce').html('');
	            	$('#ilce').append('<option value="">Lütfen Seçin</option>');
	            }
	    	}, error: function() {
	    		console.log('<?=md5(date('Y-m-d H:i:s'))?>');
	    	}
		});
	} else {
		$('#ilce').html('');
	    $('#ilce').append('<option value="">Lütfen Seçin</option>');
	}
});
</script>