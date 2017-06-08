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
               <a href="<?=admin_url('')?>" class="m-nav__link">
               <span class="m-nav__link-text">
               Anasayfa
               </span>
               </a>
            </li>
         </ul>
      </div>
      <div>
         <div>
            <button type="button" class="btn m-btn--air btn-warning" onclick="window.location = '<?=admin_url('Program/add')?>'">Ekle</button>
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
                           <th>Program Adı</th>
                           <th>Fiyat</th>
                           <th>Şehir</th>
                           <th>Durum</th>
                           <th>İşlemler</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($programs as $key => $val) { 
                           if ($val->status == 0) {
                              $st = 1;
                           }else{
                              $st = 0;
                           } ?>
                           <tr>
                              <td><?=$val->Id?></td>
                              <td><?=$val->name?></td>
                              <td><?=($val->price == 0 ? 'Ücretsiz':$val->price )?></td>
                              <td><?=$val->city?></td>
                              <td>
                                 <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                    <label>
                                       <input type="checkbox" <?=$val->status==1?'checked="checked"':''?> onclick="window.location='<?=admin_url('Program/editStatus/'.$val->Id.'/'.$st)?>'">
                                       <span></span>
                                    </label>
                                 </span>
                              </td>
                              <td>
                                 <div class="dropdown d-inline">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    İşlem Seçin
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                       <a class="dropdown-item" href="<?=admin_url('Program/edit/'.$val->Id)?>">Düzenle</a>
                                       <a class="dropdown-item" href="<?=admin_url('Program/instructor/'.$val->Id)?>">Eğitmenler</a>
                                       <a class="dropdown-item" href="<?=admin_url('Program/curriculumAdd/'.$val->Id)?>">Müfredatlar</a>
                                       <a class="dropdown-item" href="<?=admin_url('Program/preRegistration/'.$val->Id)?>">Ön Kayıtlar</a>
                                       <a class="dropdown-item" onclick="deleteConfirm('<?=admin_url('Program/deleteProgram/'.$val->Id)?>')">Sil</a>
                                    </div>
                                 </div>
                              </td>
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