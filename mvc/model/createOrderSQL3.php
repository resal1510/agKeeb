<?php
$sql = "INSERT INTO L_Commandes_Adresses (id_commande_adresses, commande, adresse_livraison, adresse_facturation) VALUES (NULL, :order, :shipAddr, :payAddr)";
$stmt = $pdo->prepare($sql);
// Bind variables to the prepared statement as parameters
$stmt->bindParam(":order", $idCreatedOrder, PDO::PARAM_STR);
$stmt->bindParam(":shipAddr", $shipAddress, PDO::PARAM_STR);
$stmt->bindParam(":payAddr", $payAddress, PDO::PARAM_STR);
?>
