<?php
$lastOrderID = "";
if (!empty(trim($_GET["order"]))) {
  $tmpID = $_GET["order"];
  $tmpID2 = base64_decode($tmpID);
  preg_match_all('!\d+!', $tmpID2, $matches);
  $lastOrderID = implode(' ', $matches[0]);
  $_SESSION["lastOrder"] = $lastOrderID;
  $errorLastID = "";
}
?>
