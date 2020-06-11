<?php
$sql = "UPDATE Clients SET admin = :admin, active = :state WHERE Clients.id_client = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $accountID, PDO::PARAM_STR);
$stmt->bindParam(":admin", $accountAdmin, PDO::PARAM_STR);
$stmt->bindParam(":state", $accountState, PDO::PARAM_STR);
$stmt->execute();
?>
