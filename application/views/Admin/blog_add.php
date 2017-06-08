<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
           	Haber Ekleyin
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
               <a href="<?=admin_url('')?>" class="m-nav__link">
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
               Haber Başarıyla Eklendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               Haber Eklenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}?>
         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Blog/add')?>" method="POST">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group">
                       <label>
                       Haber Başlığı
                       </label>
                       <input type="text" class="form-control m-input" name="title" placeholder="Haber Başlığı" required="true">
                    </div>
                    <div class="form-group m-form__group">
                       <label>
                       Haber Linki
                       </label>
                       <input type="text" class="form-control m-input" name="link" placeholder="Haber Linki" required="true">
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                        Haber İçeriği
                        </label>
                        <textarea name="content" class="ckeditor" rows="10" required="true">Haber İçeriği</textarea>
                    </div>
                    <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        İçerik Fotoğrafı
                        </label>
                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" multiple action="<?=admin_url('Blog/contentImageUpload')?>" id="m-dropzone-one">
                           <div class="m-dropzone__msg dz-message needsclick">
                              <h3 class="m-dropzone__msg-title">
                                 Fotoğraf Yükle
                              </h3>
                              <span class="m-dropzone__msg-desc">
                              <i class="fa fa-picture-o"></i>
                              </span>
                           </div>
                        </div>
                    </div>
                    <br>
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
                           		<button type="reset" onclick="window.location='<?=admin_url('Blog')?>'" class="btn btn-secondary">
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