<?php
$sql = "UPDATE Commandes SET etat = :state WHERE Commandes.id_commande = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $orderID, PDO::PARAM_STR);
$stmt->bindParam(":state", $orderState, PDO::PARAM_STR);
$stmt->execute();
?>
