<?php
if(isset($_COOKIE["keeplogin"])){
    $keepCookie = $_COOKIE["keeplogin"];
    $actualIp = $_SERVER['REMOTE_ADDR'];

    include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/rememberMeSQL.php";

    foreach ($rRememberMe as $key) {
      $savedIp = $key["derniere_ip"];
      $savedMail = $key["mail"];
      $savedId = $key["id_client"];
    }

    $tmpData = $savedMail.$actualIp;
    $tempNewHash = hash('sha256', $tmpData);
    if (($savedIp == $actualIp) && ($keepCookie == $tempNewHash)) {
      session_start();
      // Set session
      $_SESSION["loggedin"] = true;
      $_SESSION["lbrme"] = true;
      $_SESSION["idClient"] = $savedId;
      $_SESSION["email"] = $savedMail;  
    }
}
 ?>
