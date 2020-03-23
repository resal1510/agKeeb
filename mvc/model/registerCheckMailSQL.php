<?php
$param_email = trim($_POST["email"]);
$sql = "SELECT id_client FROM Clients WHERE mail = :mail";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":mail", $param_email, PDO::PARAM_STR);
$stmt->execute();
?>
