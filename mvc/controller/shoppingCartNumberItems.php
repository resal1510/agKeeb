<?php
$cookie = isset($_COOKIE['cart_items_cookie']) ? $_COOKIE['cart_items_cookie'] : "";
$cookie = stripslashes($cookie);
$saved_cart_items = json_decode($cookie, true);

$i = 0;
foreach($saved_cart_items as $row) {
  $i = $i + $row['quantity'];
}
?>
