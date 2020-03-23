<?php
$sql = "UPDATE Clients SET remember_cookie = :cookie WHERE Clients.id_client LIKE :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $idClientLogin, PDO::PARAM_STR);
$stmt->bindParam(":cookie", $tmphash, PDO::PARAM_STR);
$stmt->execute();
?>
