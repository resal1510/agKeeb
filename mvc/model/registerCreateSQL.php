<?php
// Prepare an insert statement to create the user
$sql = "INSERT INTO Clients (mail, pwd, derniere_ip, actif, customerCreated, remember_cookie) VALUES (:mail, :pwd, :lastip, :defActive, :defCreated, :remember_cookie)";
$stmt = $pdo->prepare($sql);
// Bind variables to the prepared statement as parameters
$stmt->bindParam(":mail", $email, PDO::PARAM_STR);
$stmt->bindParam(":pwd", $param_password, PDO::PARAM_STR);
$stmt->bindParam(":lastip", $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
$stmt->bindParam(":defCreated", $customerCreatedDefault, PDO::PARAM_STR);
$stmt->bindParam(":defActive", $isActive, PDO::PARAM_STR);
$stmt->bindParam(":remember_cookie", $remember_cookie, PDO::PARAM_STR);
$salt_password = "i;151-120#";
$param_password = hash("sha256", $password . $salt_password);
$stmt->execute();
?>
