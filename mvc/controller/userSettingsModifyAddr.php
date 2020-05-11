<?php
if (!empty(trim($_POST["idAddr"]))) {
  $idAddr = $_POST["idAddr"];
  //Take all data to compare after
  include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/userSettingsModify1SQL.php';
  //Foreach variables
  $fName = "nom";
  $fSurname = "prenom";
  $fAddr = "rue_num";
  $fNpa = "npa";
  $fCity = "ville";
  $fNumber = "telephone";
  $fDefault = "defaut";
  $fCategory = "categorie";
  $fId = "id_adresse";
  //Foreach statement to save all SQL query data to variables
  foreach ($resultAddrChng as $key) {
    $actualName = $key[$fName];
    $actualSurname = $key[$fSurname];
    $actualAddr = $key[$fAddr];
    $actualNpa = $key[$fNpa];
    $actualCity = $key[$fCity];
    $actualNumber = $key[$fNumber];
    $actualDefault = $key[$fDefault];
    $actualCategory = $key[$fCategory];
  }
  //Take all POST data and save them into variables
  if (!empty(trim($_POST["nameAddr"]))) {
    $newName = $_POST["nameAddr"];
  }
  if (!empty(trim($_POST["surnameAddr"]))) {
    $newSurname = $_POST["surnameAddr"];
  }
  if (!empty(trim($_POST["addressAddr"]))) {
    $newAddress = $_POST["addressAddr"];
  }
  if (!empty(trim($_POST["npaAddr"]))) {
    $newNpa = $_POST["npaAddr"];
  }
  if (!empty(trim($_POST["cityAddr"]))) {
    $newCity = $_POST["cityAddr"];
  }
  if (!empty(trim($_POST["phoneAddr"]))) {
    $newPhone = $_POST["phoneAddr"];
  }
  //Check for other default addresses
  include '/var/www/allanresin2.tk/html/agkeeb/mvc/controller/userSettingsCheckDefault.php';
  //Update the whole address into the database, with all new data from inputs
  include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/userSettingsModifyUpdateSQL.php';
}
?>
