<?php
$sql = "UPDATE Articles SET categorie = :cat, nom_article = :name, description = :description, prix_unitaire = :price, stock = :stock, enabled = :state WHERE Articles.id_article = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $itemID, PDO::PARAM_STR);
$stmt->bindParam(":name", $itemNewName, PDO::PARAM_STR);
$stmt->bindParam(":cat", $itemNewCat, PDO::PARAM_STR);
$stmt->bindParam(":description", $itemNewDesc, PDO::PARAM_STR);
$stmt->bindParam(":price", $itemNewPrice, PDO::PARAM_STR);
$stmt->bindParam(":stock", $itemNewStock, PDO::PARAM_STR);
//$stmt->bindParam(":addrDefault", $itemNewImage, PDO::PARAM_STR);
$stmt->bindParam(":state", $itemNewState, PDO::PARAM_STR);
$stmt->execute();
?>
