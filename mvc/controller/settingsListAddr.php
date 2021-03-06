<?php
//Setup variables
$name = $surname = $address = $npa = $city = "";
$customerMail = $_SESSION["email"];
$resultAddr1 = array();

//Call function with "1" parameter to find only for the category 1 address
getAddrQuery(1);

//Foreach to fetch all data from the pdo response array
$tname = "prenom"; $tsurname = "nom"; $taddress = "rue_num"; $tnpa = "npa"; $tcity = "ville"; $tdefault = "defaut"; $tid = "id_adresse";
$number = 1;
foreach ($resultAddr1 as $key) {
  $name = $key[$tname];
  $surname = $key[$tsurname];
  $address = $key[$taddress];
  $npa = $key[$tnpa];
  $city = $key[$tcity];
  $isDefault = $key[$tdefault];
  $idAddress = $key[$tid];

  //Echo a new line with the address
  if ($isDefault) {
    echo '<div id="addressL'.$idAddress.'" class="col-auto p-2 border-custom-selected mb-3 rounded mr-4 Edit shipAddr"><span>'.$name.' '.$surname.'<br>'.$address.'<br>'.$npa.' '.$city.'</span></div>';
  } else {
    echo '<div id="addressL'.$idAddress.'" class="col-auto p-2 border-custom mb-3 rounded mr-4 Edit shipAddr"><span>'.$name.' '.$surname.'<br>'.$address.'<br>'.$npa.' '.$city.'</span></div>';
  }
  $number++;
}
?>
