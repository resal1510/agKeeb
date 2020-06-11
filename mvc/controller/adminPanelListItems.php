<?php
require_once "config.php";
include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelListItemSQL.php';

$fItemsId = "id_article";
$fItemscategorie = "categorie";
$fItemsName = "nom_article";
$fItemsDesc = "description";
$fItemsPrice = "prix_unitaire";
$fItemsStock = "stock";
$fItemsEnabled = "enabled";

foreach ($resultItems as $data) {
  if ($data[$fItemsEnabled] == "true") {
    print_r('<div class="row justify-content-between Item border-left border-right border-bottom p-1" style="font-size: 14px;" id="i'.$data[$fItemsId].'">
              <div class="col-2 d-xl-flex align-items-xl-center"><span>'.$data[$fItemsId].'</span></div>
              <div class="col-4 d-xl-flex align-items-xl-center"><span>'.$data[$fItemsName].'<br></span></div>
              <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center"><span>'.$data[$fItemsPrice].'</span></div>
              <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center"><span>'.$data[$fItemsStock].'</span></div>
              <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center" style="font-size: 16px;"><i class="fa fa-check" style="color: #52dc3c;"></i></div>
             </div>');
  } else {
    print_r('<div class="row justify-content-between Item border-left border-right border-bottom p-1" style="background-color: #eeeeee;font-size: 14px;" id="i'.$data[$fItemsId].'">
              <div class="col-2 d-xl-flex align-items-xl-center"><span>'.$data[$fItemsId].'</span></div>
              <div class="col-4 d-xl-flex align-items-xl-center"><span>'.$data[$fItemsName].'<br></span></div>
              <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center"><span>'.$data[$fItemsPrice].'</span></div>
              <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center"><span>'.$data[$fItemsStock].'</span></div>
              <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center" style="font-size: 16px;"><i class="fas fa-times" style="color: #e71d1d;"></i></div>
             </div>');
  }

}
?>
