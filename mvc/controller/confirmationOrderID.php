<?php
$orderID = "";

if (trim($_GET["order"])) {
  $tmpID = $_GET["order"];
  $tmpID2 = base64_decode($tmpID);
  preg_match_all('!\d+!', $tmpID2, $matches);
  $orderID = implode(' ', $matches[0]);
}

?>
