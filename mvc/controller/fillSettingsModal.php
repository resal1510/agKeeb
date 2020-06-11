<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$idAddr = "";
include '../model/paymentListAddressSQL.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (trim($_POST["idAddresse"])) {
    $idAddr = $_POST["idAddresse"];
  }


  getAddrQuery(3, $idAddr);

  $tname = "prenom"; $tsurname = "nom"; $taddress = "rue_num"; $tnpa = "npa"; $tcity = "ville"; $tdefault = "defaut"; $tPhone = "telephone"; $tCat = "categorie";
  foreach ($resultAddr3 as $key) {
    $name = $key[$tname];
    $surname = $key[$tsurname];
    $address = $key[$taddress];
    $npa = $key[$tnpa];
    $city = $key[$tcity];
    $isDefault = $key[$tdefault];
    $phone = $key[$tPhone];
    $category = $key[$tCat];
  }

  $addrArray = array('name' => $name, 'surname' => $surname, 'address' => $address, 'npa' => $npa, 'city' => $city, 'default' => $isDefault, 'phone' => $phone, 'category' => $category);
  echo json_encode($addrArray);
}
?>
