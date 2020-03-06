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

print_r("<br><br><br><br><br>");




 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>agKeeb</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="css/styles.min.css">
</head>

<body>
  <?php include "navbarInclude.php"?>
    <div class="spacer" style="margin-top: 72px"></div>
    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
                <div class="content">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
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
                                require_once "config.php";

                                $sth = $pdo->prepare("SELECT * FROM `Images` INNER JOIN Articles ON Images.article = Articles.id_article");
                                $sth->execute();
                                $resultbeta = $sth->fetchAll(\PDO::FETCH_ASSOC);

                                $keys = array_keys($saved_cart_items);
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
                                                      <div class="col-md-5 product-info align-top"><a class="product-name" href="#">'.$nameDbTmp.'</a>
                                                          <div class="product-specs mt-1">
                                                              <div><span>Couleur:&nbsp;</span><span class="value">RGB</span>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <input type="text" id="ProductPrice'.$incrNumber.'" value="'.$priceDbTmp.'" hidden>
                                                      <input type="text" id="ProductID'.$incrNumber.'" value="'.$idDbTmp.'" hidden>
                                                      <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantité</label><input type="number" id="quantity'.$incrNumber.'" class="form-control quantity-input" value="'.$qtyCartTmp.'"></div>
                                                      <div class="col price"><span style="font-size: 16px;">CHF <span id="price'.$incrNumber.'" class="priceProducts" style="font-size: 16px;">'.$actualPrice.'<br></span></span></div>
                                                  </div>
                                              </div>';
                                          }
                                        }
                                      }
                                  }
                                } else {
                                  echo "Votre panier est vide.";
                                }





/*
                                foreach ($saved_cart_items as $key => $value) {
                                  $pId = $key;
                                  $pQuantity = $saved_cart_items[$key][$quantityTmp];
                                  print_r("ok");
                                  foreach ($resultProducts as $key2 => $value2) {
                                    print_r($key2[$idTmp]);
                                    if ($key2[$idTmp] == $pId) {
                                      print_r($pId." is founded");
                                    }
                                  }
                                }
*/

                                 ?>



                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <h3>Résumé</h3>
                                <h4><span class="text">Sous-total</span><span class="price">CHF <span id="subtotal"></span></span></h4>
                                <h4><span class="text">Frais d'expédition</span><span class="price">CHF 8</span></h4>
                                <h4><span class="text">Total</span><span class="price">CHF <span id="totaloftotal"></span></span></h4><button class="btn btn-primary btn-block btn-lg shadow border-0" type="button" style="background-color: #71c3ff;">Passer en caisse</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
    var arrayPrice = [];
    $(document).ready(function(){
      $(".quantity-input").on("input", function(){
        arrayPrice = [];
        // Print entered value in a div box
        var temp = '#'+this.id;
        var tempInt = temp.replace(/[^0-9]/gi, '');
        var newPriceTmp = "#price"+tempInt;
        var productPrice = "#ProductPrice"+tempInt;
        var productId = "#ProductID"+tempInt;

        var actualPrice = $(productPrice).val();
        var numberProduct = $(this).val();
        var newPrice = actualPrice * numberProduct;

        if (numberProduct >= 1) {
          $(newPriceTmp).text(newPrice);
        } else {
          $(this).val(1);
        }


        var inputs = $(".priceProducts");
        for(var i = 0; i < inputs.length; i++){
            var tmpPrice = $(inputs[i]).text().replace(/[^0-9]/gi, '');
            arrayPrice.push(parseInt(tmpPrice));
        }


        var sumTotal = arrayPrice.reduce(function(a, b){
            return a + b;
        }, 0);

        console.log("New total : "+sumTotal); // Prints: 15

        $("#subtotal").text(sumTotal);
        $("#totaloftotal").text(sumTotal + 8);
      });


      var inputs = $(".priceProducts");
      for(var i = 0; i < inputs.length; i++){
          var tmpPrice = $(inputs[i]).text().replace(/[^0-9]/gi, '');
          arrayPrice.push(parseInt(tmpPrice));
      }


      var sumTotal = arrayPrice.reduce(function(a, b){
          return a + b;
      }, 0);

      console.log("New total : "+sumTotal); // Prints: 15

      $("#subtotal").text(sumTotal);
      $("#totaloftotal").text(sumTotal + 8);
    });

    function updateCart() {
      // get basic information for updating the cart
       var id = $(productId).val();
       var quantity = numberProduct;

       // redirect to update_quantity.php, with parameter values to process the request
       window.location.href = "update_quantity.php?id=" + id + "&quantity=" + quantity;



       $.ajax({
           type: 'POST',
           url: 'add.php',
           data: { Couleur: choixCouleur, Imprimante: choixImprimante, Nombre: compteur },
       });
    }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="js/script.min.js"></script>
</body>

</html>
