<?php
require_once "config.php";
$connectedMail = $_SESSION["email"];
$result = "";
$array = "";

$stmt = $pdo->prepare("SELECT admin FROM login WHERE email = :email");
$stmt->bindParam(":email", $connectedMail, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
$isAdmin = json_decode(json_encode($result));
?>