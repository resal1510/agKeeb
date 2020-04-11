<?php
//Setup variables
$name = $surname = $address = $npa = $city = "";
$customerMail = $_SESSION["email"];
$resultAddr2 = array();

//Call function with "2" parameter to find only for the category 2 address
getAddrQuery(2);

//Foreach to fetch all data from the pdo response array
foreach ($resultAddr2 as $key) {
  $name = $key[$tname];
  $surname = $key[$tsurname];
  $address = $key[$taddress];
  $npa = $key[$tnpa];
  $city = $key[$tcity];
  $isDefault = $key[$tdefault];
  $idAddress = $key[$tid];

  if ($isDefault) {
    echo '<div id="addressF'.$idAddress.'" class="col-auto p-2 border-custom-selected mb-3 rounded customDivAddress addr2"><span>'.$name.' '.$surname.'<br>'.$address.'<br>'.$npa.' '.$city.'</span></div>';
  } else {
    echo '<div id="addressF'.$idAddress.'" class="col-auto p-2 border-custom mb-3 rounded customDivAddress addr2"><span>'.$name.' '.$surname.'<br>'.$address.'<br>'.$npa.' '.$city.'</span></div>';
  }
  $number++;
}
?>
