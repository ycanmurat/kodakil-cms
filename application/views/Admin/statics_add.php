<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Sabit Sayfa Ekle
         </h3>
         <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
            <li class="m-nav__item m-nav__item--home">
               <a href="<?=admin_url()?>" class="m-nav__link m-nav__link--icon">
               <i class="m-nav__link-icon la la-home"></i>
               </a>
            </li>
            <li class="m-nav__separator">
               -
            </li>
            <li class="m-nav__item">
               <a href="<?=admin_url('Statics')?>" class="m-nav__link">
               <span class="m-nav__link-text">
               Sabit Sayfalar
               </span>
               </a>
            </li>
         </ul>
      </div>
      
   </div>
</div>
<div class="m-content">
   <div class="row">
      <div class="col-lg-12">
         <?if($this->session->flashdata('onay')==1){?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarılı
            </strong>
               Sabit Sayfa Başarıyla Eklendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               Sabit Sayfa Eklenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}?>
         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Statics/add')?>" method="POST">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                     <div class="form-group m-form__group">
                        <label>
                        Sayfa Etiketi <span style="font-size:11px;">/ Web Sitesinde Görünmez</span>
                        </label>
                        <input type="text" class="form-control m-input" name="statics_title" placeholder="Sayfa Etiketi" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Kısa Açıklama <span style="font-size:11px;">/ Web Sitesinde Görünmez</span>
                        </label>
                        <textarea class="form-control m-input" id="exampleTextarea" rows="3" name="description"></textarea>
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Anahtar Kelimeler <span style="font-size:11px;">/ Web Sitesinde Görünmez</span>
                        </label>
                        <textarea class="form-control m-input" id="exampleTextarea" rows="3" name="keywords"></textarea>
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Sayfa Adı
                        </label>
                        <input type="text" class="form-control m-input" name="statics_name" placeholder="Sayfa Adı" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Sayfa Linki
                        </label>
                        <input type="text" class="form-control m-input" name="statics_link" placeholder="Sayfa Linki" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Dil
                        </label>
                        <select class="form-control m-input" id="exampleSelect1" name="lang_id">
                           <?if($languages_list==0){?><option>Aktif Yada Ekli Bir Dil Yok</option><?}
                              foreach ($languages_list as $key => $lang){?>
                                 <option value="<?=$lang->Id?>">
                                    <?=$lang->lang_name?>
                                 </option>
                              <?}?>
                        </select>
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Sayfa İçeriği
                        </label>
                        <textarea name="statics_content" class="ckeditor" rows="10">Sayfa İçeriği</textarea>
                     </div>
                  </div>
               </div>
               <div class="m-portlet__foot m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions">
                     <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6 text-right">
                           <button type="submit" class="btn btn-primary">
                           Ekle
                           </button>
                           <button type="reset" onclick="window.location='<?=admin_url('Statics')?>'" class="btn btn-secondary">
                           İptal
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>