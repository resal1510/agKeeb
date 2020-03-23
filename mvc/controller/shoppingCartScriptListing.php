<?php
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

$n = 1;
function numberIncrease() {
  echo $n;
  ++$n;
}
// include config file
include "config.php";
include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/shoppingCartListSQL.php";
//Take all ID's of products in the cart
if (count($saved_cart_items) > 0) {
  for($i = 0; $i < count($saved_cart_items); $i++) {
      $idCartTmp = $keys[$i];
      //Take all needed values from DB
      foreach ($resultbeta as $key) {
        $idDbTmp = $key[$id];
        $imgDbTmp = $key[$nom_image];
        $priceDbTmp = $key[$price];
        $nameDbTmp = $key[$nom];
        //If product id in the cart == id in the DB
        if ($idDbTmp == $idCartTmp) {
          //Take the quantity
          foreach($saved_cart_items[$keys[$i]] as $key => $value) {
              $qtyCartTmp = $value;
              $actualPrice = $qtyCartTmp * $priceDbTmp;
              //And display the product in the cart page w/ correct values
              ++$incrNumber;
              echo '<div class="product">
                  <div class="row justify-content-center align-items-center">
                      <div class="col-md-3">
                          <div class="product-image"><img class="img-fluid d-block mx-auto" style="height:120px" src="uploads/'.$imgDbTmp.'"></div>
                      </div>
                      <div class="col-md-5 col-lg-4 product-info align-top"><a class="product-name" href="#">'.$nameDbTmp.'</a>
                      <div class="product-specs mt-1">
                          <div><span>Couleur:&nbsp;</span><span class="value">RGB</span>
                          </div>
                      </div>
                      </div>
                      <input type="text" id="ProductPrice'.$incrNumber.'" value="'.$priceDbTmp.'" hidden>
                      <input type="text" id="ProductID'.$incrNumber.'" value="'.$idDbTmp.'" hidden>
                      <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantité</label><input type="number" id="quantity'.$incrNumber.'" class="form-control quantity-input" value="'.$qtyCartTmp.'" max="99" /></div>
                      <div class="col-lg-2 price"><span style="font-size: 16px;">CHF <span id="price'.$incrNumber.'" class="priceProducts" style="font-size: 16px;">'.$actualPrice.'<br></span></span></div>
                      <div class="col"><i class="fas fa-trash-alt clickDel" id="delete'.$idDbTmp.'" style="cursor: pointer;"></i></div>
                  </div>
              </div>';
          }
        }
      }
  }
} else {
  echo "Votre panier est vide.";
}
 ?>
