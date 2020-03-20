<?php
// Init session
session_start();

$actualId = $_SESSION["idClient"];

require_once "config.php";
$sql = "UPDATE Clients SET remember_cookie = '' WHERE Clients.id_client LIKE :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $actualId, PDO::PARAM_STR);
$stmt->execute();

//Delete remember-me cookie and DB row
unset($_COOKIE['keeplogin']);
setcookie("keeplogin", "", time()-3600);

// Reset session variables
$_SESSION = array();


// Break the connection
session_destroy();
?>
