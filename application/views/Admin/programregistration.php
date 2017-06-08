<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Ön Başvurular
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
               <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="position: static; zoom: 1;">
                  <table class="table m-table m-table--head-bg-primary table-responsive">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>İsim</th>
                           <th>E-Posta</th>
                           <th>GSM</th>
                           <th>Cinsiyet</th>
                           <th>IP Adresi</th>
                           <th>Kayıt Tarigi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 0; foreach ($list as $key => $val){ $i++; ?>
                           <tr>
                              <td><?=$i?></td>
                              <td><?=$val->name?></td>
                              <td><?=$val->email?></td>
                              <td><?=$val->gsm?></td>
                              <td><?=($val->sex == 0 ? 'Seçilmemiş':($val->sex == 1?'Kadın':'Erkek'))?></td>
                              <td><?=$val->ip?></td>
                              <td><?=$val->added_time?></td>
                           </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>