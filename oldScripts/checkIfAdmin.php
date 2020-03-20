<?php
include "../mvc/controller/config.php";
$connectedMail = $_SESSION["email"];
$result = "";
$array = "";

$stmt = $pdo->prepare("SELECT admin FROM Clients WHERE mail = :mail");
$stmt->bindParam(":mail", $connectedMail, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
$isAdmin = json_decode(json_encode($result));
?>
