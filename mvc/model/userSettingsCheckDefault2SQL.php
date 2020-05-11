<?php
$sql = "UPDATE Adresses SET defaut = 0 WHERE Adresses.id_adresse LIKE :idAddr";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":idAddr", $key[$fId], PDO::PARAM_STR);
$stmt->execute();
?>
