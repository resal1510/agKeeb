<?php
$sql = "SELECT id_client, mail, pwd FROM Clients WHERE mail = :mail";
if($stmt = $pdo->prepare($sql)){
    // Set params
    $stmt->bindParam(":mail", $param_email, PDO::PARAM_STR);
    $param_email = trim($_POST["email"]);
?>
