<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
           Eğitmen ekle
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
         <div class="m-portlet">
            <div class="m-portlet__body">
               <div class="m-form__section m-form__section--first">
                  <form action="#" method="POST">
                     <div class="form-group m-form__group">
                        <label>
                           Eğitmen
                        </label>
                        <select name="instructor_id" class="form-control m-input">
                           <?php foreach ($instructor as $key => $val) { ?>
                              <option value="<?=$val->id?>"><?=$val->name_surname?></option>
                           <?php } ?>
                        </select>
                     </div>
                     <div class="row">
                        <div class="col-lg-12 text-right">
                              <button type="submit" class="btn btn-primary">
                              Ekle
                              </button>
                              <button type="reset" onclick="window.location='<?=admin_url('Program/menulist')?>'" class="btn btn-secondary">
                              İptal
                              </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>