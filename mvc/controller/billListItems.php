<?php
if (!empty($_SESSION["lastOrder"])) {
  $lastOrderID = $_SESSION["lastOrder"];
  $errorLastID = "";
} else {
  $errorLastID = "Vous n'avez aucune commande récente. Merci d'accèder à toutes vos commandes via le menu 'Mes commandes'.";
}

if (empty($errorLastID)) {
  $sth = $pdo->prepare('SELECT *
  FROM Contenu_commandes
  INNER JOIN Articles ON Contenu_commandes.article = Articles.id_article
  WHERE commande LIKE :id');

  $sth->bindParam(':id', $lastOrderID, PDO::PARAM_STR);
  $sth->execute();
  $resultOrder = $sth->fetchAll(\PDO::FETCH_ASSOC);

  $nom = 'nom_article';
  $quantite = 'quantite';
  $prixU = 'prix_unitaire';
  $i = 0;


  foreach ($resultOrder as $key) {
    $totalPrice = $key[$quantite] * $key[$prixU];

    if ($i%2 == 1) {
      echo '<div class="row padding_fontCustom">';
    }
    else {
      echo '<div class="row padding_fontCustom" style="background-color: #f8f8f8;">';
    }

    echo '<div class="col-7"><span>'.$key[$nom].'</span></div>
    <div class="col"><span>x'.$key[$quantite].'</span></div>
    <div class="col d-md-flex justify-content-md-end"><span>CHF&nbsp;</span><span class="itemPriceT">'.$totalPrice.'</span></div>
    </div>';
  $i++;
  }
} else {
  echo $errorLastID;
}



?>
