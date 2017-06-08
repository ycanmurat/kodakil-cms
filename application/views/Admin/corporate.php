<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Hakkımızda Sayfasını Düzenliyorsunuz
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
               Bilgiler Başarıyla Güncellendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               Bilgiler Güncellenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}?>
         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Corporate')?>" method="POST" enctype="multipart/form-data">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group">
                        <label>
                          Hakkımızda Başlık
                        </label>
                        <input name="title" class="form-control" value="<?=$corporateInfo->title?>" />
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                        Hakkımızda İçerik
                        </label>
                        <textarea name="title_content" class="ckeditor" rows="10"><?=$corporateInfo->title_content?></textarea>
                    </div>

                     <div class="form-group m-form__group">
                        <label for="exampleSelect1">
                           Güncel Hakkımızda Fotoğrafı
                        </label>
                           <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show">
                               <div class="row">
                                   <div class="col-lg-3 col-md-4 col-sm-6 mb-3 text-center images" id="img_1">
                                    <div>
                                       <center>
                                          <a href="<?=site_url($corporateInfo->picture)?>" target="_blank">
                                             <img src="<?=site_url($corporateInfo->picture)?>" class="w-100 mb-2 img-responsive" style="width:50%;">
                                          </a>
                                       </center>
                                    </div>
                                   </div>
                                
                               </div>
                           </div>
                      </div>
                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Hakkımızda Fotoğraf
                        </label>
                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Corporate/ImageUpload/1')?>" id="m-dropzone-one">
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

                    <div class="form-group m-form__group">
                        <label>
                          Vizyon Başlık
                        </label>
                        <input name="title_two" class="form-control" value="<?=$corporateInfo->title_two?>" />
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                          Vizyon İçerik
                        </label>
                        <textarea name="title_two_content" class="ckeditor" rows="10"><?=$corporateInfo->title_two_content?></textarea>
                    </div>
                     <div class="form-group m-form__group">
                        <label for="exampleSelect1">
                          Güncel Vizyon Fotoğrafı
                        </label>
                           <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show">
                               <div class="row">
                                   <div class="col-lg-3 col-md-4 col-sm-6 mb-3 text-center images" id="img_1">
                                    <div>
                                       <center>
                                          <a href="<?=site_url($corporateInfo->secont_picture)?>" target="_blank">
                                             <img src="<?=site_url($corporateInfo->secont_picture)?>" class="w-100 mb-2 img-responsive" style="width:50%;">
                                          </a>
                                       </center>
                                    </div>
                                   </div>
                                
                               </div>
                           </div>
                      </div>
                    <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Vizyon Fotoğraf
                        </label>
                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Corporate/ImageUpload/2')?>" id="m-dropzone-one">
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

                    <div class="form-group m-form__group">
                        <label>
                          Misyon Başlık
                        </label>
                        <input name="title_three" class="form-control" value="<?=$corporateInfo->title_three?>" />
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                          Misyon İçerik
                        </label>
                        <textarea name="title_three_content" class="ckeditor" rows="10"><?=$corporateInfo->title_three_content?></textarea>
                    </div>

                    <div class="form-group m-form__group">
                      <label for="exampleSelect1">
                         Güncel Misyon Fotoğrafı
                      </label>
                         <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show">
                             <div class="row">
                                 <div class="col-lg-3 col-md-4 col-sm-6 mb-3 text-center images" id="img_1">
                                  <div>
                                     <center>
                                        <a href="<?=site_url($corporateInfo->third_picture)?>" target="_blank">
                                           <img src="<?=site_url($corporateInfo->third_picture)?>" class="w-100 mb-2 img-responsive" style="width:50%;">
                                        </a>
                                     </center>
                                  </div>
                                 </div>
                              
                             </div>
                         </div>
                    </div>
                    <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Misyon Fotoğraf
                        </label>
                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Corporate/ImageUpload/3')?>" id="m-dropzone-one">
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
                              <button type="reset" onclick="window.location='<?=admin_url('Home')?>'" class="btn btn-secondary">
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