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

//Detect last page with the GET
$lastPage;

if (isset($_GET['lpage'])) {
  $lastPage = $_GET['lpage'];
} else {
  $lastPage = 'index.php';
}

//Redirect to last page or index if it was not working
echo '<meta http-equiv="refresh" content="1; URL='.$lastPage.'">';
?>
