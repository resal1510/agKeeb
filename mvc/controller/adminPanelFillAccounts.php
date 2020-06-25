<?php
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (trim($_POST["idItem"])) {
    $idItem = $_POST["idItem"];
  }

include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelFillAccountsSQL.php';
  $customerID = "id_client";
  $customerMail = "mail";
  $customerIp = "derniere_ip";
  $customerAdmin = "admin";
  $customerActive = "active";

  foreach ($resultCustomer1 as $key) {
    $id  = $key[$customerID];
    $mail = $key[$customerMail];
    $ip = $key[$customerIp];
    $admin = $key[$customerAdmin];
    $active = $key[$customerActive];
  }

  $listAddrL = "";
  $listAddrF = "";


  //Setup variables
  $name = $surname = $address = $npa = $city = "";
  $customerMail = $mail;
  $categoryAddr = 1;
  $resultAddr1 = array();

  $sth = $pdo->prepare('SELECT * FROM Adresses INNER JOIN Clients ON Adresses.client = Clients.id_client WHERE mail LIKE :customer AND categorie LIKE :category');
  $sth->bindParam(':customer', $customerMail, PDO::PARAM_STR);
  $sth->bindParam(':category', $categoryAddr, PDO::PARAM_STR);
  $sth->execute();
  $resultAddrL = $sth->fetchAll(\PDO::FETCH_ASSOC);

  //Foreach to fetch all data from the pdo response array
  $tname = "prenom"; $tsurname = "nom"; $taddress = "rue_num"; $tnpa = "npa"; $tcity = "ville"; $tdefault = "defaut"; $tid = "id_adresse";
  $number = 1;
  foreach ($resultAddrL as $key) {
    $name = $key[$tname];
    $surname = $key[$tsurname];
    $address = $key[$taddress];
    $npa = $key[$tnpa];
    $city = $key[$tcity];
    $isDefault = $key[$tdefault];
    $idAddress = $key[$tid];

    //Echo a new line with the address
    if ($isDefault) {
      $listAddrL .= '<div id="addressL'.$idAddress.'" class="col-auto p-2 border-custom-selected mb-3 rounded mr-4 Edit EditAdmin"><span>'.$name.' '.$surname.'<br>'.$address.'<br>'.$npa.' '.$city.'</span></div> ';
    } else {
      $listAddrL .= '<div id="addressL'.$idAddress.'" class="col-auto p-2 border-custom mb-3 rounded mr-4 Edit EditAdmin"><span>'.$name.' '.$surname.'<br>'.$address.'<br>'.$npa.' '.$city.'</span></div> ';
    }
    $number++;
  }

  //Setup variables
  $name = $surname = $address = $npa = $city = "";
  $customerMail = $mail;
  $categoryAddr = 2;
  $resultAddr1 = array();

  $sth = $pdo->prepare('SELECT * FROM Adresses INNER JOIN Clients ON Adresses.client = Clients.id_client WHERE mail LIKE :customer AND categorie LIKE :category');
  $sth->bindParam(':customer', $customerMail, PDO::PARAM_STR);
  $sth->bindParam(':category', $categoryAddr, PDO::PARAM_STR);
  $sth->execute();
  $resultAddrF = $sth->fetchAll(\PDO::FETCH_ASSOC);

  //Foreach to fetch all data from the pdo response array
  $number = 1;
  foreach ($resultAddrF as $key) {
    $name = $key[$tname];
    $surname = $key[$tsurname];
    $address = $key[$taddress];
    $npa = $key[$tnpa];
    $city = $key[$tcity];
    $isDefault = $key[$tdefault];
    $idAddress = $key[$tid];

    //Echo a new line with the address
    if ($isDefault) {
      $listAddrF .= '<div id="addressL'.$idAddress.'" class="col-auto p-2 border-custom-selected mb-3 rounded mr-4 Edit EditAdmin"><span>'.$name.' '.$surname.'<br>'.$address.'<br>'.$npa.' '.$city.'</span></div> ';
    } else {
      $listAddrF .= '<div id="addressL'.$idAddress.'" class="col-auto p-2 border-custom mb-3 rounded mr-4 Edit EditAdmin"><span>'.$name.' '.$surname.'<br>'.$address.'<br>'.$npa.' '.$city.'</span></div> ';
    }
    $number++;
  }


  $customerArray = array('id' => $id, 'mail' => $mail, 'ip' => $ip, 'admin' => $admin, 'active' => $active, 'addrL' => $listAddrL, 'addrF' => $listAddrF);
  echo json_encode($customerArray);
}
?>
