<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
           Program Menüler
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
      <div>
         <div>
            <a class="btn m-btn--air btn-warning" href="<?=admin_url('Program/dayDetailAdd/'.$dayId.'/'.$programId)?>">Ekle</a>
         </div>
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
                           <th>Süre</th>
                           <th>Sıra</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($dayDetail as $key => $val) { ?>
                           <tr>
                              <td><?=$val->Id?></td>
                              <td><?=$val->name?></td>
                              <td><?=$val->time?></td>
                              <td><?=$val->sort?></td>
                              <td><a href="<?=admin_url('Program/dayDetailDelete/'.$val->Id.'/'.$dayId.'/'.$programId)?>" class="btn btn-danger">Sil</a></td>
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