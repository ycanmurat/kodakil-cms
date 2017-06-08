<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            "<?=$categoryInfo[0]->category_title?>" Kategorisini Düzenliyorsunuz
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
               <a href="<?=admin_url('Categorys')?>" class="m-nav__link">
               <span class="m-nav__link-text">
               Kategoriler
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
               Kategori Başarıyla Güncellendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               Kategori Güncellenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}?>
         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Categorys/editCategory/'.$categoryInfo[0]->category_id)?>" method="POST">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                     <div class="form-group m-form__group">
                        <label>
                        Kategori Etiketi <span style="font-size:11px;">/ Web Sitesinde Görünmez</span>
                        </label>
                        <input type="text" class="form-control m-input" name="category_title" value="<?=$categoryInfo[0]->category_title?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Kısa Açıklama <span style="font-size:11px;">/ Web Sitesinde Görünmez</span>
                        </label>
                        <textarea class="form-control m-input" id="exampleTextarea" rows="3" name="description"><?=$categoryInfo[0]->description?></textarea>
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Anahtar Kelimeler <span style="font-size:11px;">/ Web Sitesinde Görünmez</span>
                        </label>
                        <textarea class="form-control m-input" id="exampleTextarea" rows="3" name="keywords"><?=$categoryInfo[0]->keywords?></textarea>
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Sırası
                        </label>
                        <input type="number" class="form-control m-input" name="sort" value="<?=$categoryInfo[0]->sort?>" required="true">
                     </div>
                     <div class="form-group m-form__group">
                        <label>
                        Menüye Eklensin Mi ?
                        </label>
                        <br>
                        <span class="m-bootstrap-switch m-bootstrap-switch--pill m-bootstrap-switch--air">
                           <input data-switch="true" type="checkbox" data-on-text="Evet" data-off-text="Hayır" data-on-color="primary" <?=$categoryInfo[0]->menu==1?'checked="checked"':''?> name="menu">
                        </span>
                     </div>
                     <div class="form-group m-form__group">
                            <label for="exampleSelect1">
                               Şuanki Kategori Fotoğrafı
                            </label>
                             <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show">
                              <div class="row">
                                 <div class="col-lg-3 col-md-4 col-sm-6 mb-3 text-center images" id="img_1">
                                    <div>
                                       <center>
                                          <a href="<?=site_url($categoryInfo[0]->default_image)?>" target="_blank">
                                             <img src="<?=site_url($categoryInfo[0]->default_image)?>" class="w-100 mb-2 img-responsive" style="width:50%;">
                                          </a>
                                       </center>
                                    </div>
                                 </div>
                              </div>
                             </div>
                          </div>
                        <div class="col-12 m--padding-left-30 m--padding-right-30">
                       <label>
                       Kategori Fotoğrafını Güncelleyin
                       </label>
                       <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="<?=admin_url('Categorys/ImageUpload')?>" id="m-dropzone-one">
                          <div class="m-dropzone__msg dz-message needsclick">
                             <h3 class="m-dropzone__msg-title">
                                Güncellemek İstediğiniz Resmi Sürükleyin veya Tıklayarak Yükleyin
                             </h3>
                             <span class="m-dropzone__msg-desc">
                             <i class="fa fa-picture-o"></i>
                             </span>
                          </div>
                       </div>
                    </div>
                     <?foreach($categoryInfo as $infoLang){?>
                        <div class="form-group m-form__group">
                              <label for="category_heading_<?=$infoLang->Id?>">
                                 "<?=$infoLang->lang_name?>" Dilinde Kategori Adı
                              </label>
                        <?if ($infoLang->lang_id){
                           $langname = "lang";
                           $infoLang->lang_id = $infoLang->lang_id;
                           }else{
                              $langname = "newlang";
                              $infoLang->lang_id = $infoLang->newlang_id;}?>
                              <input type="text" class="form-control m-input" name="<?=$langname?>[<?=$infoLang->lang_id?>]" id="category_heading_<?=$infoLang->lang_id?>" value="<?=$infoLang->name?>" required="true">
                        </div>
                        <div class="form-group m-form__group">
                           <label for="category_heading_<?=$infoLang->Id?>">
                              "<?=$infoLang->lang_name?>" Dilinde Link
                           </label>
                           <input type="text" class="form-control m-input" name="category_slug[<?=$infoLang->lang_id?>]" id="category_slug_<?=$infoLang->Id?>" value="<?=$infoLang->category_slug?>" required="true">
                        </div>
                     <?}?>
                     <input type="hidden" name="img" value="<?=$categoryInfo[0]->default_image?>">
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
                           <button type="reset" onclick="window.location='<?=admin_url('Categorys')?>'" class="btn btn-secondary">
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