<?php
if (!empty(trim($_POST["idAddr"]))) {
  $idAddr = $_POST["idAddr"];
  include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/userSettingsDeleteSQL.php';
}
?>
