<?php
$sql = "INSERT INTO Articles (categorie, nom_article, prix_unitaire, stock, enabled, description) VALUES (:categoryItem, :nameItem, :priceItem, :stockItem, :stateItem, :descItem)";
$stmt = $pdo->prepare($sql);
// Set params
$stmt->bindParam(":nameItem", $addName, PDO::PARAM_STR);
$stmt->bindParam(":categoryItem", $addCat, PDO::PARAM_STR);
$stmt->bindParam(":priceItem", $addPrice, PDO::PARAM_STR);
$stmt->bindParam(":stockItem", $addStock, PDO::PARAM_STR);
$stmt->bindParam(":descItem", $addDesc, PDO::PARAM_STR);
$stmt->bindParam(":stateItem", $addStatus, PDO::PARAM_STR);
// Execute SQL
$stmt->execute();
?>
