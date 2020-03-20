
<?php
include "config.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$sql = "UPDATE Clients SET remember_cookie = :cookie WHERE Clients.id_client LIKE :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $idClientLogin, PDO::PARAM_STR);
$stmt->bindParam(":cookie", $tmphash, PDO::PARAM_STR);
$stmt->execute();
?>
