<?php
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (trim($_POST["idItem"])) {
    $idItem = $_POST["idItem"];
  }
include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelFillOrdersSQL1.php';
include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelFillOrdersSQL2.php';

  $orderId = "id_commande";
  $orderCustomer = "client";
  $orderDate = "date_creation";
  $orderPrice = "montant";
  $orderState = "etat";
  $orderQuantite = "quantite";
  $orderName = "nom_article";

  foreach ($resultOrders1 as $key) {
    $id  = $key[$orderId];
    $customer = $key[$orderCustomer];
    $date = $key[$orderDate];
    $price = $key[$orderPrice];
    $state = $key[$orderState];
  }

  $allContent = " ";
  foreach ($resultOrders2 as $key) {
      $allContent .= '<div class="row mb0-1">
          <div class="col-2"><span>'.$key[$orderQuantite].'x</span></div>
          <div class="col"><span>'.$key[$orderName].'</span></div>
        </div>';
  }

  $dateTmp = date_create($date);
  $tmpDateFormat = date_format($dateTmp, 'd.m.Y - H:i');

  $orderArray = array('id' => $id, 'customer' => $customer, 'date' => $tmpDateFormat, 'price' => $price, 'state' => $state, 'content' => $allContent);
  echo json_encode($orderArray);
}


?>
