<?php
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (trim($_POST["idItem"])) {
    $idItem = $_POST["idItem"];
  }

$sth = $pdo->prepare('SELECT * FROM Commandes WHERE id_commande LIKE :id');
$sth->bindParam(':id', $idItem, PDO::PARAM_STR);
$sth->execute();
$resultOrders1 = $sth->fetchAll(\PDO::FETCH_ASSOC);

$sth = $pdo->prepare('SELECT * FROM Contenu_commandes INNER JOIN Articles ON article = Articles.id_article WHERE commande LIKE :id');
$sth->bindParam(':id', $idItem, PDO::PARAM_STR);
$sth->execute();
$resultOrders2 = $sth->fetchAll(\PDO::FETCH_ASSOC);

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

  $dateTmp = date_create($data[$orderDate]);
  $tmpDateFormat = date_format($dateTmp, 'd.m.Y - H:i');

  $orderArray = array('id' => $id, 'customer' => $customer, 'date' => $tmpDateFormat, 'price' => $price, 'state' => $state, 'content' => $allContent);
  echo json_encode($orderArray);
}


?>
