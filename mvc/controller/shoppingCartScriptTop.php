<?php
//Declare variables
$cartIsEmpty = 0;
$saved_cart_items = "";

if (isset($_COOKIE["cart_items_cookie"])) {
//If there is something in the cart
$cookie = stripslashes($_COOKIE["cart_items_cookie"]);
$saved_cart_items = json_decode($cookie, true);
} else {
//If the cart is empty
$cartIsEmpty = 1;
}
 ?>
