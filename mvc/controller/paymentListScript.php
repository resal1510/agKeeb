<?php
$id = "id_article";
$price = "prix_unitaire";
$nom = "nom_article";
$saved_cart_items;
$incrNumber = 0;
include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/shoppingCartListSQL.php";
//Take all ID's of products in the cart
if (count($saved_cart_items) > 0) {
  for($i = 0; $i < count($saved_cart_items); $i++) {
      $idCartTmp = $keys[$i];
      //Take all needed values from DB
      foreach ($resultbeta as $key) {
        $idDbTmp = $key[$id];
        //$imgDbTmp = $key[$nom_image];
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
              echo '<div class="item">
                    <span class="price">CHF <span class="itemPrice">'.$actualPrice.'</span></span>
                    <p class="item-name">'.$nameDbTmp.'</p>
                    </div>';
          }
        }
      }
  }
}
?>
