<?php
$orderID = "";
if (trim($_GET["order"])) {
  $tmpID = $_GET["order"];
  $tmpID2 = base64_decode($tmpID);
  preg_match_all('!\d+!', $tmpID2, $matches);
  $tmpOrder = implode(' ', $matches[0]);
  $orderID = ltrim($tmpOrder, '1');
}

?>
