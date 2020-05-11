<?php
//SQL query to check if another address is already by default
$idCustomer = $_SESSION["idClient"];
//SQL query
include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/userSettingsCheckDefault1SQL.php";
//Switch statement to know if we want to set the address to default (true, 1) or not (false, 0)
$sDefaultAddr = $_POST["newDefault"];
switch ($sDefaultAddr) {
  case true:
  //If we want to set it default
    $newDefault = '1';
    //Search if any other address of the same category is default
    foreach ($resultAddrDefault1 as $key) {
    if ($key[$fCategory] == $actualCategory) {
      //If yes, set the default to "0" for the old default address, to let only 1 default address by category
      if ($key[$fDefault] == "1") {
        //SQL Query
        include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/userSettingsCheckDefault2SQL.php";
        }
      }
    }
    break;
  case false:
    $newDefault = '0';
    break;
}
?>
