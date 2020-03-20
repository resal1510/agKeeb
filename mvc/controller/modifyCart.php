<?php
$id = $quantity = "";

if (isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'modify':
      echo "modify";
      if (isset($_POST['idItem'])) {
        if (isset($_POST['newQuantity'])) {
          update($_POST['idItem'], $_POST['newQuantity']);
        }
      }
      break;
      case 'delete':
        echo "delete";
        if (isset($_POST['idToDelete'])) {
          delete($_POST['idToDelete']);
        }
        break;
  }
}
//Function to update the cookie
function update($newId, $newQuantity) {
  $cookie = $_COOKIE['cart_items_cookie'];
  $cookie = stripslashes($cookie);
  $saved_cart_items = json_decode($cookie, true);

  $saved_cart_items[$newId]=array(
    'quantity'=>$newQuantity
);

$json = json_encode($saved_cart_items, true);
setcookie("cart_items_cookie", $json, time() + (86400 * 30), '/'); // 86400 = 1 day
$_COOKIE['cart_items_cookie']=$json;
}

//Function to delete an item in the cookie
function delete($id) {
  // read the cookie
  $cookie = $_COOKIE['cart_items_cookie'];
  $cookie = stripslashes($cookie);
  $saved_cart_items = json_decode($cookie, true);

  // remove item from the array
  unset($saved_cart_items[$id]);
  // delete cookie value
  unset($_COOKIE["cart_items_cookie"]);
  // empty value and expiration one hour before
  setcookie("cart_items_cookie", "", time() - 3600);
  // enter new value
  $json = json_encode($saved_cart_items, true);
  setcookie("cart_items_cookie", $json, time() + (86400 * 30), '/'); // 86400 = 1 day
  $_COOKIE['cart_items_cookie']=$json;
  echo true;
}
 ?>
