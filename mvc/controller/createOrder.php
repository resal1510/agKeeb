<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
//Declare variable
$baseOK = 0;
$shipAddress = $payAddress = $totalPrice = "";
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
                $sql = "INSERT INTO Commandes (id_commande, client, etat, montant, date_creation) VALUES (NULL, :idCustomer, '1', :orderPrice, CURRENT_TIMESTAMP)";
                $stmt = $pdo->prepare($sql);
                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(":idCustomer", $_SESSION["idClient"], PDO::PARAM_STR);
                $stmt->bindParam(":orderPrice", $totalPrice, PDO::PARAM_STR);
                $stmt->execute();
                $idCreatedOrder = $pdo->lastInsertId();
                //echo $idCreatedOrder;
                $baseOK = 1;
              }
              //Create the items and link them to the correct order
              $sql = "INSERT INTO Contenu_commandes (id_contenu_commandes, commande, article, quantite) VALUES (NULL, :lastOrder, :item, :quantity)";
              $stmt = $pdo->prepare($sql);
              // Bind variables to the prepared statement as parameters
              $stmt->bindParam(":lastOrder", $idCreatedOrder, PDO::PARAM_STR);
              $stmt->bindParam(":item", $idDbTmp, PDO::PARAM_STR);
              $stmt->bindParam(":quantity", $qtyCartTmp, PDO::PARAM_STR);
              $stmt->execute();
          }
        }
      }
  }
  //Add the correct addresses for this order
  $sql = "INSERT INTO L_Commandes_Adresses (id_commande_adresses, commande, adresse_livraison, adresse_facturation) VALUES (NULL, :order, :shipAddr, :payAddr)";
  $stmt = $pdo->prepare($sql);
  // Bind variables to the prepared statement as parameters
  $stmt->bindParam(":order", $idCreatedOrder, PDO::PARAM_STR);
  $stmt->bindParam(":shipAddr", $shipAddress, PDO::PARAM_STR);
  $stmt->bindParam(":payAddr", $payAddress, PDO::PARAM_STR);
  if ($stmt->execute()) {
    //
    // TODO: Delete the Shopping cart cookie because the order is created
    //
    //Return if the insert was OK or not, to know if we must redirect the user or not
    echo $idCreatedOrder;
  } else {
    echo 0;
  }
}

?>
