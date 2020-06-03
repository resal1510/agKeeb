<?php
$stmt = $pdo->prepare("SELECT admin FROM Clients WHERE mail = :mail");
$stmt->bindParam(":mail", $_SESSION["email"], PDO::PARAM_STR);
$stmt->execute();
$resultIsAdmin = $stmt->fetchAll(\PDO::FETCH_ASSOC);
$admin = "admin";
?>
