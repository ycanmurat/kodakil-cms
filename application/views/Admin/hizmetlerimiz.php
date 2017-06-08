<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
           	Anasayfa Hizmetlerimiz Bölümüne Madde Ekle
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
               <a href="<?=admin_url()?>" class="m-nav__link">
               <span class="m-nav__link-text">
               Anasayfa
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
               Hizmetlerimiz Başarıyla Güncellendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               Hizmetler Maddesi Güncellenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}?>
         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Hizmetlerimiz')?>" method="POST">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                     <div class="form-group m-form__group">
                        <label>
                        Madde 1 Başlık <span style="font-size:11px;"></span>
                        </label>
                        <input type="text" class="form-control m-input" name="title_1" value="<?=$services->title_1?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        İçerik 1 <span style="font-size:11px;"></span>
                        </label>
                        <input type="text" class="form-control m-input" name="content_1" value="<?=$services->content_1?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Madde 2 Başlık <span style="font-size:11px;"></span>
                        </label>
                        <input type="text" class="form-control m-input" name="title_2" value="<?=$services->title_2?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        İçerik 2 <span style="font-size:11px;"></span>
                        </label>
                        <input type="text" class="form-control m-input" name="content_2" value="<?=$services->content_2?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Madde 3 Başlık <span style="font-size:11px;"></span>
                        </label>
                        <input type="text" class="form-control m-input" name="title_3" value="<?=$services->title_3?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        İçerik 3 <span style="font-size:11px;"></span>
                        </label>
                        <input type="text" class="form-control m-input" name="content_3" value="<?=$services->content_3?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Madde 4 Başlık <span style="font-size:11px;"></span>
                        </label>
                        <input type="text" class="form-control m-input" name="title_4" value="<?=$services->title_4?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        İçerik 4 <span style="font-size:11px;"></span>
                        </label>
                        <input type="text" class="form-control m-input" name="content_4" value="<?=$services->content_4?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Madde 5 Başlık <span style="font-size:11px;"></span>
                        </label>
                        <input type="text" class="form-control m-input" name="title_5" value="<?=$services->title_5?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        İçerik 5 <span style="font-size:11px;"></span>
                        </label>
                        <input type="text" class="form-control m-input" name="content_5" value="<?=$services->content_5?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Madde 6 Başlık <span style="font-size:11px;"></span>
                        </label>
                        <input type="text" class="form-control m-input" name="title_6" value="<?=$services->title_6?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        İçerik 6 <span style="font-size:11px;"></span>
                        </label>
                        <input type="text" class="form-control m-input" name="content_6" value="<?=$services->content_6?>" required="true">
                     </div>
                  </div>
               </div>
               <div class="m-portlet__foot m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions">
                     <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6 text-right">
                           <button type="submit" class="btn btn-primary">
                           Güncelle
                           </button>
                           <button type="reset" onclick="window.location='<?=admin_url()?>'" class="btn btn-secondary">
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