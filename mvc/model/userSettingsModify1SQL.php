<?php
$sql = "SELECT * FROM Adresses WHERE id_adresse LIKE :idAddr";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":idAddr", $idAddr, PDO::PARAM_STR);
$stmt->execute();
$resultAddrChng = $stmt->fetchAll(\PDO::FETCH_ASSOC);
?>
