<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<div class="m-subheader ">
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            Bayi Başvuruları
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
                           <th>Firma Adı</th>
                           <th>E-Posta</th>
                           <th>Telefon</th>
                           <th>Diğer Tüm Bilgiler</th>
                           <th style="text-align:right;">İşlem</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?if($forms==0){?><tr><td><font color="red">Şuanda Herhangi Bir Kayıt Yok</font></td></tr><?}else{
                        foreach ($forms as $key => $info){?>
                        <tr>
                           <td><?=$info->id?></td>
                           <td><?=$info->firma_adi?></td>
                           <td><?=$info->eposta?></td>
                           <td><?=$info->telefon?></td>
                           <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_modal_<?=$info->id?>">
                                 Tüm Bilgiler
                              </button>
                           </td>
                           <div class="modal fade" id="m_modal_<?=$info->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">
                                          Bilgiler
                                       </h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">
                                             &times;
                                          </span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       Firma Bilgileri
                                       <hr>
                                       <p><b>Firma Adı : </b><?=$info->firma_adi?></p>
                                       <p><b>Yetkili Adı / Ünvanı : </b><?=$info->yetkili_adi?></p>
                                       <p><b>Firma Ortakları : </b><?=(!empty($info->ortaklar)?$info->ortaklar:'Ortak Yok')?></p>
                                       <p><b>Adres : </b><?=$info->adres?></p>
                                       <p><b>İl : </b><?=$info->CityName?></p>
                                       <p><b>İlçe : </b><?=$info->CountyName?></p>
                                       <p><b>Telefon No : </b><?=$info->telefon?></p>
                                       <p><b>Faks : </b><?=$info->faks?></p>
                                       <p><b>E-Posta : </b><?=$info->eposta?></p>
                                       <p><b>kurulus_yili : </b><?=$info->kurulus_yili?></p>
                                       <hr>
                                       Fatura Bilgileri
                                       <hr>
                                       <p><b>Vergi Dairesi : </b><?=$info->vergi_dairesi?></p>
                                       <p><b>Vergi Numarası : </b><?=$info->vergi_numarasi?></p>
                                       <p><b>TC Kimlik No : </b><?=$info->tc?></p>
                                       <p><b>Unvan : </b><?=$info->unvan?></p> 
                                       <hr>
                                       Banka Bilgileri
                                       <hr>
                                       <p><b>Banka Adı : </b><?=$info->banka_adi?></p> 
                                       <p><b>İban Numarası : </b><?=$info->iban?></p> 
                                       <p><b>Banka Adı : </b><?=(!empty($info->banka_adi_iki)?$info->banka_adi_iki:'2. Banka Adı Yok')?></p> 
                                       <p><b>İban Numarası : </b><?=(!empty($info->iban_iki)?$info->iban_iki:'2. İban Numarası Yok')?></p>
                                       <hr> 
                                       Referans Bilgileri
                                       <hr>
                                       <p><b>1. Referans : </b><?=$info->referans_bir?></p> 
                                       <p><b>2. Referans : </b><?=$info->referans_iki?></p> 
                                       <p><b>3. Referans : </b><?=$info->referans_uc?></p> 
                                       <p><b>Eklemek İstedikleriniz : </b><?=(!empty($info->mesaj)?$info->mesaj:'Eklenen Bir No Yok')?></p> 
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                          Geri Çık
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <td style="text-align:right;">
                              <div class="dropdown d-inline">
                                 <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 İşlem Seçin
                                 </button>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" onclick="deleteConfirm('<?=admin_url('Form/deleteDealerShip/'.$info->id)?>')">Sil</a>
                                 </div>
                           </td>
                        </tr>
                        <?}}?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>