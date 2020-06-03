<?php

require_once "config.php";
$pdo->exec('SET NAMES utf8');
$sth = $pdo->prepare("SELECT * FROM Commandes");
$sth->execute();
$resultOrders = $sth->fetchAll(\PDO::FETCH_ASSOC);

$fOrderId = "id_commande";
$fOrderClient = "client";
$fOrderEtat = "etat";
$fOrderMontant = "montant";
$fOrderDate = "date_creation";
/*
$date = date_create('2020-05-28 11:34:35');
echo date_format($date, 'd.m.Y H:i');
*/
foreach ($resultOrders as $data) {
  switch ($data[$fOrderEtat]) {
    case 4:
      print_r('<div class="row justify-content-between Order border-left border-right border-bottom p-1" style="font-size: 14px;background-color: #eeeeee;" id="o'.$data[$fOrderId].'">');
      break;
    default:
      print_r('<div class="row justify-content-between Order border-left border-right border-bottom p-1" style="font-size: 14px;" id="o'.$data[$fOrderId].'">');
      break;
  }

  $dateTmp = date_create($data[$fOrderDate]);
  $tmpDateFormat = date_format($dateTmp, 'd.m.Y - H:i');

  print_r('<div class="col-2 d-xl-flex align-items-xl-center"><span>'.$data[$fOrderId].'</span></div>
    <div class="col-2 d-xl-flex align-items-xl-center"><span>'.$data[$fOrderClient].'<br></span></div>
    <div class="col-4 d-xl-flex align-items-xl-center"><span>'.$tmpDateFormat.'</span></div>
    <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center"><span>'.$data[$fOrderMontant].'</span></div>');

  switch ($data[$fOrderEtat]) {
    //Pas encore payé
    case 1:
      print_r('<div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center" style="font-size: 16px;"><i class="fas fa-coins" style="color: #a2a2a2;"></i></div></div>');
      break;
    //Commande payée
    case 2:
      print_r('<div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center" style="font-size: 16px;"><i class="fas fa-coins" style="color: #52dc3c;"></i></div></div>');
      break;
    //En traitement
    case 3:
      print_r('<div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center" style="font-size: 16px;"><i class="fas fa-sync" style="color: rgb(249,180,0);"></i></div></div>');
      break;
    //Commande envoyée
    case 5:
      print_r('<div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center" style="font-size: 16px;"><i class="fa fa-plane" style="color: #00a3ff;"></i></div></div>');
      break;
    //Commante terminée
    case 4:
      print_r('<div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center" style="font-size: 16px;"><i class="fa fa-check" style="color: #52dc3c;"></i></div></div>');
      break;
  }
}
?>
