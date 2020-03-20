<?php
$sql = "UPDATE Clients SET derniere_ip = :lastIp WHERE Clients.id_client LIKE :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $idClientLogin, PDO::PARAM_STR);
$stmt->bindParam(":lastIp", $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
$stmt->execute();
?>
