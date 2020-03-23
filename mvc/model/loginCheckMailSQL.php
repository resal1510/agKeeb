<?php
$sql = "SELECT id_client, mail, pwd FROM Clients WHERE mail = :mail";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":mail", $pMail, PDO::PARAM_STR);
$stmt->execute();
?>
