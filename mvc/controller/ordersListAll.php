<?php
//SQL Query
include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/ordersListAllSQL.php";
//Foreach variables
$nom = "nom_article";
$quantity = "quantite";
$prix = "montant";
$idCommande = "id_commande";
$montant = "montant";
$date = "date_creation";
$etat = "nom_etat";
$lastID;


//For each records
foreach ($result as $key) {
  //Check if the order is already displayed (because multiple same order ID w/ different products)
  if ($lastID != $key[$idCommande]) {

    //Display the order e/ apropriate ifnos
    print_r('<div class="p-3 border mb-4">
        <div class="row mb-2">
            <div class="col"><span>Commande&nbsp;<span style="color: #71c3ff;">#'.$key[$idCommande].'</span> - '.$key[$date].'<br></span>
            </div>
            <div class="col d-xl-flex justify-content-xl-end"><span><strong>CHF '.$key[$prix].'</strong></span></div>
        </div>
        <div class="row">
            <div class="col"><span style="font-size: 12px;color: #55d640;">'.$key[$etat].'</span></div>
            <div class="col d-xl-flex justify-content-xl-end"><a class="text-primary justify-content-xl-end" href="'.linkGen($key[$idCommande]).'" style="font-size: 12px;">Détails de la commande<br></a></div>
        </div>
    </div>');
    //Update the lastID variable to know if the order ID is already displayed
    $lastID = $key[$idCommande];
  }
}

function linkGen($id){
  unset($_SESSION['lastOrder']);
  $_SESSION["lastOrder"] = $id;
  $tmpUrl = "OrderID:".$id;
  $data = base64_encode($tmpUrl);
  $url = 'http://sandbox.allanresin.ch/agkeeb/bill.php?order='.$data;
  return $url;
}
?>
