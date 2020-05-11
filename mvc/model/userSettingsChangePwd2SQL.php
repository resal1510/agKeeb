<?php
$sql = "UPDATE Clients SET pwd = :newPassword WHERE Clients.id_client = :customerID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":customerID", $_SESSION["idClient"], PDO::PARAM_STR);
$stmt->bindParam(":newPassword", $newPwdHash, PDO::PARAM_STR);
?>
