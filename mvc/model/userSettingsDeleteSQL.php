<?php
$sql = "DELETE FROM Adresses WHERE Adresses.id_adresse = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $idAddr, PDO::PARAM_STR);
$stmt->execute();
?>
