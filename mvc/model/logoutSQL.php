<?php
include "/var/www/allanresin2.tk/html/agkeeb/mvc/controller/config.php";

$actualId = $_SESSION["idClient"];
$sql = "UPDATE Clients SET remember_cookie = '' WHERE Clients.id_client LIKE :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $actualId, PDO::PARAM_STR);
$stmt->execute();
?>
