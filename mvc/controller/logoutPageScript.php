<?php
// Init session
session_start();

include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/logoutSQL.php";

//Delete remember-me cookie and DB row
unset($_COOKIE['keeplogin']);
setcookie("keeplogin", "", time()-3600);

// Reset session variables
$_SESSION = array();


// Break the connection
session_destroy();
?>
