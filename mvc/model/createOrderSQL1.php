<?php
$sql = "INSERT INTO Commandes (id_commande, client, etat, montant, date_creation) VALUES (NULL, :idCustomer, '1', :orderPrice, CURRENT_TIMESTAMP)";
$stmt = $pdo->prepare($sql);
// Bind variables to the prepared statement as parameters
$stmt->bindParam(":idCustomer", $_SESSION["idClient"], PDO::PARAM_STR);
$stmt->bindParam(":orderPrice", $totalPrice, PDO::PARAM_STR);
$stmt->execute();
?>
