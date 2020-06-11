<?php
require_once "config.php";
include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelListCustomerSQL.php';

$fclientID = "id_client";
$fclientMail = "mail";
$fclientAdmin = "admin";
$fclientEnabled = "active";

foreach ($resultCustomers as $data) {
  switch ($data[$fclientAdmin]) {
    case '1':
      $isAdmin = "true";
      break;
      case '0':
        $isAdmin = "false";
        break;
  }
  if ($data[$fclientEnabled] == "true") {
    print_r('<div class="row justify-content-between Account border-left border-right border-bottom p-1" style="font-size: 14px;" id="c'.$data[$fclientID].'">
              <div class="col-2 d-xl-flex align-items-xl-center"><span>'.$data[$fclientID].'</span></div>
              <div class="col-6 d-xl-flex align-items-xl-center"><span>'.$data[$fclientMail].'<br></span></div>
              <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center"><span>'.$isAdmin.'</span></div>
              <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center" style="font-size: 16px;"><i class="fa fa-check" style="color: #52dc3c;"></i></div>
            </div>');
  } else {
    print_r('<div class="row justify-content-between Account border-left border-right border-bottom p-1" style="background-color: #eeeeee;font-size: 14px;" id="c'.$data[$fclientID].'">
              <div class="col-2 d-xl-flex align-items-xl-center"><span>'.$data[$fclientID].'</span></div>
              <div class="col-6 d-xl-flex align-items-xl-center"><span>'.$data[$fclientMail].'</span></div>
              <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center"><span>'.$isAdmin.'</span></div>
              <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center" style="font-size: 16px;"><i class="fas fa-times" style="color: #e71d1d;"></i></div>
            </div>');
  }
}
?>
