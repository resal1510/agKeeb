<?php
$sql = "INSERT INTO Contenu_commandes (id_contenu_commandes, commande, article, quantite) VALUES (NULL, :lastOrder, :item, :quantity)";
$stmt = $pdo->prepare($sql);
// Bind variables to the prepared statement as parameters
$stmt->bindParam(":lastOrder", $idCreatedOrder, PDO::PARAM_STR);
$stmt->bindParam(":item", $idDbTmp, PDO::PARAM_STR);
$stmt->bindParam(":quantity", $qtyCartTmp, PDO::PARAM_STR);
$stmt->execute();
?>
