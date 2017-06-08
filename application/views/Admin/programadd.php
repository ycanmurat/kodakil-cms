<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
           	Program Ekleyin
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
               Program Başarıyla Eklendi
         </div>
         <?}elseif($this->session->flashdata('hata')==1){?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>
               Başarısız
            </strong>
               Program Eklenemiyor Lütfen Geliştiricinizden Yardım İsteyin
         </div>
         <?}?>
         <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>
         <div class="m-portlet">
            <form class="m-form m-form--fit m-form--label-align-right" action="<?=admin_url('Program/add')?>" method="POST">
               <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group">
                       <label>
                       Program Adı
                       </label>
                       <input type="text" class="form-control m-input" value="<?=set_value('name')?>" name="name" placeholder="Program Adı">
                    </div>
                    <div class="form-group m-form__group">
                       <label>
                       Menü Seçin
                       </label>
                       <select name="menu_id" class="form-control m-input">
                         <?php foreach ($menus as $key => $val) { ?>
                           <option <?=(set_value('menu_id')==$val->Id?'selected':'')?> value="<?=$val->Id?>"><?=$val->name?></option>
                         <?php } ?>
                       </select>
                    </div>
                    <div class="col-12 m--padding-left-30 m--padding-right-30">
                        <label>
                        Banner
                        </label>
                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" name="image[]" multiple action="<?=admin_url('Program/ImageUpload')?>" id="m-dropzone-one">
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
                    <div class="form-group m-form__group">
                       <label>
                       Ana Eğitmen
                       </label>
                       <select name="instructor_id" class="form-control m-input">
                         <?php foreach ($instructor as $key => $val) { ?>
                           <option <?=(set_value('instructor_id')==$val->id?'selected':'')?> value="<?=$val->id?>"><?=$val->name_surname?></option>
                         <?php } ?>
                       </select>
                    </div>
                    <div class="form-group m-form__group">
                       <label>
                       Fiyat
                       </label>
                       <input type="number" value="<?=set_value('price')?>" value="0" class="form-control m-input" name="price" placeholder="Fiyat">
                    </div>
                    <div class="form-group m-form__group">
                       <label>
                       Süre
                       </label>
                       <input type="text" class="form-control m-input" value="<?=set_value('period')?>" name="period" placeholder="Süre">
                    </div>
                    <div class="form-group m-form__group">
                       <label>
                       Başlangıç Tarihi
                       </label>
                       <input type="date" class="form-control m-input" value="<?=set_value('start_date')?>" name="start_date">
                    </div>
                    <div class="form-group m-form__group">
                       <label>
                       Bitiş Tarihi
                       </label>
                       <input type="date" class="form-control m-input" value="<?=set_value('finish_date')?>" name="finish_date">
                    </div>
                    <div class="form-group m-form__group">
                       <label>
                       Başlangıç Zamanı
                       </label>
                       <input type="time" class="form-control m-input" value="<?=set_value('start_time')?>" name="start_time">
                    </div>
                    <div class="form-group m-form__group">
                       <label>
                       Bitiş Zamanı
                       </label>
                       <input type="time" class="form-control m-input" value="<?=set_value('finish_time')?>" name="finish_time">
                    </div>
                    <div class="form-group m-form__group">
                       <label>
                       Adres
                       </label>
                       <input type="text" class="form-control m-input" value="<?=set_value('location')?>" name="location" placeholder="Adres">
                    </div>
                    <div class="form-group m-form__group">
                       <label>
                       Seviye
                       </label>
                       <input type="text" class="form-control m-input" value="<?=set_value('level')?>" name="level" placeholder="Seviye">
                    </div>
                    <div class="form-group m-form__group">
                       <label>
                       Şehir
                       </label>
                       <input type="text" class="form-control m-input" value="<?=set_value('city')?>" name="city" placeholder="Şehir">
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                        Program İçeriği
                        </label>
                        <textarea name="content" class="ckeditor" placeholder="Program İçeriği" rows="10"></textarea>
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
                           		<button type="reset" onclick="window.location='<?=admin_url('Program/add')?>'" class="btn btn-secondary">
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