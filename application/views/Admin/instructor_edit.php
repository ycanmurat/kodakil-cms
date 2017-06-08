<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<?if(empty($instructorsInfo)){redirect(admin_url('Instructor'));}?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            "<?=$instructorsInfo->name_surname?>" İsimli Eğitmeni Güncelliyorsunuz
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
               <a href="<?=admin_url('Instructor')?>" class="m-nav__link">
               <span class="m-nav__link-text">
               Eğitmenler
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
               Eğitmen Başarıyla Güncellendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               Eğitmen Güncellenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}?>
         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Instructor/updateInstructor/'.$instructorsInfo->id)?>" method="POST">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                     <div class="form-group m-form__group">
                        <label>
                        İsim Soyisim
                        </label>
                        <input type="text" class="form-control m-input" name="name_surname" value="<?=$instructorsInfo->name_surname?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Ünvan
                        </label>
                        <input type="text" class="form-control m-input" name="title" value="<?=$instructorsInfo->title?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Kısa Biyografi
                        </label>
                        <textarea class="form-control m-input" rows="3" name="bio"><?=$instructorsInfo->bio?></textarea>
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Telefon
                        </label>
                        <input type="text" class="form-control m-input" name="phone" value="<?=$instructorsInfo->phone?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        E-Posta
                        </label>
                        <input type="text" class="form-control m-input" name="email" value="<?=$instructorsInfo->email?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Facebook Adresi, Sadece Kırmızı Alanı Yazın, Örnek: facebook.com/<font color="red">kullanıcı_adı</font>)
                        </label>
                        <input type="text" class="form-control m-input" name="facebook" value="<?=$instructorsInfo->facebook?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Twitter Adresi, Sadece Kırmızı Alanı Yazın, örnek : twitter.com/<font color="red">kullanıcı_adı</font>)
                        </label>
                        <input type="text" class="form-control m-input" name="twitter" value="<?=$instructorsInfo->twitter?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label style="text-align:left;">
                        <font size="2px">Google+ Adresi, kullanıcı adınız yoksa kırmızı alanı yazın, Örnek : https://plus.google.com/u/0/<font color="red">101010101010101</font> veya kullanıcı adınız varsa yine sadece kırmızı alanı yazın, Örnek : https://plus.google.com/u/0/+<font color="red">kullanıcı_adı</font></font>
                        </label>
                        <input type="text" class="form-control m-input" name="google" value="<?=$instructorsInfo->google?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Linkedin Adresi (Sadece "in/"'dan sonrasını yazın örnek : linkedin.com/in/<font color="red">kullanıcı_adı</font>)
                        </label>
                        <input type="text" class="form-control m-input" name="linkedin" value="<?=$instructorsInfo->linkedin?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label for="exampleSelect1">
                          Güncel Profil Resmi
                        </label>
                        <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show">
                           <div class="row">
                              <div class="col-lg-3 col-md-4 col-sm-6 mb-3 text-center images" id="img_1">
                                 <div>
                                    <center>
                                       <a href="<?=site_url($instructorsInfo->picture)?>" target="_blank">
                                         <img src="<?=site_url($instructorsInfo->picture)?>" class="w-100 mb-2 img-responsive" style="width:50%;">
                                       </a>
                                    </center>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Profil Resmi
                        </label>
                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Instructor/ImageUpload')?>" id="m-dropzone-one">
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
                           <button type="reset" onclick="window.location='<?=admin_url('Instructor')?>'" class="btn btn-secondary">
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