<?php
session_start();
//Declare variable
$baseOK = 0;
$shipAddress = $payAddress = $totalPrice = $idCreatedOrder = "";
$quantityTmp = "quantity";
$idTmp = "id_article";
$pId = $pQuantity = "";
$incrNumber = 0;
//Var for the foreach
$id = "id_article";
$price = "prix_unitaire";
$nom_image = "nom_image";
$description = "description";
$nom = "nom_article";

//Take all POST dats (two addresses)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (trim($_POST["addressShip"])) {
    $shipAddress = $_POST["addressShip"];
  } if (trim($_POST["addressPay"])) {
    $payAddress = $_POST["addressPay"];
  } if (trim($_POST["totalPrice"])) {
    $totalPrice = $_POST["totalPrice"];
  }

  //Take cart cookie data
  $cookie = stripslashes($_COOKIE["cart_items_cookie"]);
  $saved_cart_items = json_decode($cookie, true);

  //Include config file and script to take all items
  include "config.php";
  include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/shoppingCartListSQL.php";

  for($i = 0; $i < count($saved_cart_items); $i++) {
      $idCartTmp = $keys[$i];
      //Take all needed values from DB
      foreach ($resultbeta as $key) {
        $idDbTmp = $key[$id];
        $priceDbTmp = $key[$price];
        $nameDbTmp = $key[$nom];
        //If product id in the cart == id in the DB
        if ($idDbTmp == $idCartTmp) {
          //Take the quantity
          foreach($saved_cart_items[$keys[$i]] as $key => $value) {
              $qtyCartTmp = $value;
              $actualPrice = $qtyCartTmp * $priceDbTmp;
              //echo "ID : ".$idDbTmp." Name : ".$nameDbTmp." Quantity : ".$qtyCartTmp." Total price : ".$actualPrice."  <br>";
              if ($baseOK == 0) {
                //Create the base order into the Database
                include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/createOrderSQL1.php";
                $idCreatedOrder = $pdo->lastInsertId();
                //echo $idCreatedOrder;
                $baseOK = 1;
              }
              //Create the items and link them to the correct order
              include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/createOrderSQL2.php";
          }
        }
      }
  }
  //Add the correct addresses for this order
  include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/createOrderSQL3.php";
  if ($stmt->execute()) {

    //Delete all cart items when the order is placed
    include 'modifyCart.php';
    for($i = 0; $i < count($saved_cart_items); $i++) {
        $idCartTmp = $keys[$i];
        delete($idCartTmp);
      }
    //Return if the insert was OK or not, to know if we must redirect the user or not
    $_SESSION["lastOrder"] = $idCreatedOrder;
    echo $idCreatedOrder;
  } else {
    echo 0;
  }
}

?>
