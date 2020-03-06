<?php
//If a product is selected with catalog page (or just a get request w/ this name)
if (isset($_GET["id_product"])) {
  //Take the ID and store it
  $idAsked = trim($_GET["id_product"]);
} else {
  //Else, redirect to catalog because we can't dispolay empty product page
  if ($canLeave == "true") {
    header("Location: catalog.php");
  } else {
    $idAsked = 0;
  }
}

require_once "config.php";

$sth = $pdo->prepare("SELECT * FROM `Images` INNER JOIN Articles ON Images.article = Articles.id_article WHERE Articles.id_article LIKE :wantedId");
$sth->bindParam(':wantedId', $idAsked, PDO::PARAM_STR);
$sth->execute();
$resultForImage = $sth->fetchAll(\PDO::FETCH_ASSOC);

$sth2 = $pdo->prepare("SELECT * FROM `Commentaires` INNER JOIN Clients ON Commentaires.client = Clients.id_client INNER JOIN Articles ON Commentaires.article = Articles.id_article WHERE Articles.id_article LIKE :wantedId");
$sth2->bindParam(':wantedId', $idAsked, PDO::PARAM_STR);
$sth2->execute();
$resultForReviews = $sth2->fetchAll(\PDO::FETCH_ASSOC);


//Variable for the foreach statement
$nom = "nom_article";
$id = "id_article";
$enabled = "enabled";
$price = "prix_unitaire";
$nom_image = "nom_image";
$description = "description";
$category = "categorie";
$stars = "note";
$comment = "commentaire";
$date = "date";
$isVisible = "visible";


//Variable that we will use uin the html
$pName = $pDesc = $pImage = $pPrice = $pEnabled = $rNumberStars = $rComment = $rDate = $rVisible = "";
$rCount = 0;
$rAllNotes = array();

foreach ($resultForImage as $key) {
  $pName = $key[$nom];
  $pDesc = $key[$description];
  $pImage = $key[$nom_image];
  $pPrice = $key[$price];
  $pEnabled = $key[$enabled];
}

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Product - Brand</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="css/styles.min.css">
</head>
<body>
  <?php include "navbarInclude.php"?>
    <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container" style="margin-top: 72px;">
                <div class="block-content">
                    <div class="product-info">
                        <div class="row">
                            <div class="col-md-6">
                              <?php echo '<img src="uploads/'.$pImage.'" alt="" style="width: 500px; height: 540px">'; ?>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <h3 style="margin-top: 20px;margin-bottom: 8px;"><?php echo $pName ?></h3>
                                    <div class="rating"><?php
                                    foreach ($resultForReviews as $key) {
                                      $rNumberStars = $key[$stars];
                                      array_push($rAllNotes, $rNumberStars);
                                    }
                                    $rAverageStars = round(array_sum($rAllNotes)/count($rAllNotes) * 2) / 2;
                                    if (strpos( $rAverageStars, '.' ) === false) {
                                        $rAStarsVar = '<img src="img/star.svg" style="width: 22px;">';
                                        $rAStarsEmptyVar = '<img src="img/star-empty.svg" style="width: 22px;">';
                                        $emptyStars = 5 - $rAverageStars;

                                        $rActualStarsEmpty = str_repeat($rAStarsEmptyVar, $emptyStars);
                                        $rActualStarsTemp = str_repeat($rAStarsVar, $rAverageStars);

                                        $rActualStars = $rActualStarsTemp. $rActualStarsEmpty;
                                        echo $rActualStars;
                                    } else {
                                      $rAverageStars = $rAverageStars - 0.5;
                                        $rAStarsVar = '<img src="img/star.svg" style="width: 22px;">';
                                        $rAStarsMiddleVar = '<img src="img/star-half-empty.svg" style="width: 22px;">';
                                        $rAStarsEmptyVar = '<img src="img/star-empty.svg" style="width: 22px;">';

                                        $emptyStars = 4 - $rAverageStars;

                                        $rActualStarsEmpty = str_repeat($rAStarsEmptyVar, $emptyStars);
                                        $rActualStarsTemp = str_repeat($rAStarsVar, $rAverageStars);
                                        $rActualStars = $rActualStarsTemp. $rAStarsMiddleVar. $rActualStarsEmpty;
                                        echo $rActualStars;
                                    }
                                     ?></div>
                                    <h3 style="margin-top: 20px;margin-bottom: 20px;">CHF <?php echo $pPrice ?></h3>
                                    <div style="height: 44px;margin-bottom: 20px;"><select class="custom-select" style="height: 44px;margin-bottom: 20px;width: 150px;"><option value="couleur" selected="" disabled="" hidden="">Couleur</option><option value="rouges">Rouges</option><option value="bleus">Bleus</option><option value="noirs">Noirs</option></select></div>
                                    <form class='add-to-cart-form' method="get" action="javascript:submitToCart();">
                                      <?php
                                      $inputIdHidden = '<input type="text" value="'.$idAsked.'" class="productIdToAdd" hidden>';
                                      echo $inputIdHidden;
                                       ?>
                                    <?php
                                    $buttonAddCart = '<input class="cart-quantity border rounded col-2" type="number" style="height: 44px;margin-right: 10px;min-width: 73px;" value="1" min="1"><input class="add-to-cart btn btn-primary shadow border-0" type="submit" style="background-color: #71c3ff;margin-bottom: 3px;">';
                                    $messageNotAvailable = "This item is no longer available.";

                                    if ($pEnabled == "true") {
                                      echo $buttonAddCart;
                                    } else {
                                      echo $messageNotAvailable;
                                    }
                                     ?>
                                   </form>
                                        <div class="summary" style="margin-top: 20px;padding-top: 20px;">
                                            <p style="margin-bottom: 20px;"><?php echo $pDesc ?></p>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4 style="margin-bottom: 16px;">Commentaires</h4>
                    </div>
                    <div id="commentaires" class="fade show tab-pane active">

                      <?php

                        foreach ($resultForReviews as $key) {
                          $rNumberStars = $key[$stars];
                          $rComment = $key[$comment];
                          $rDate = date("d.m.Y", strtotime($key[$date]));
                          $rVisible = $key[$isVisible];

                          if ($rVisible == "true") {
                            switch ($rNumberStars) {
                              case '1':
                                $rStars = '<img src="img/star.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;">';
                                break;
                                case '2':
                                $rStars = '<img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;">';
                                  break;
                                  case '3':
                                  $rStars = '<img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;">';
                                    break;
                                    case '4':
                                    $rStars = '<img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star-empty.svg" style="width: 18px;">';
                                      break;
                                      case '5':
                                      $rStars = '<img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;"><img src="img/star.svg" style="width: 18px;">';
                                        break;
                                      }

                            $reviewHTML = '<div class="border rounded-0 review-item" style="margin-bottom: 30px;padding: 20px;">
                              <div class="rating" style="margin-bottom: 10px;">'.$rStars.'</div>
                                <h4 style="font-size: 19px;"></h4><span class="text-muted">Le '.$rDate.'</span>
                                <p style="margin-top: 12px;font-size: 14px;">'.$rComment.'</p>
                            </div>';
                            echo $reviewHTML;
                            ++$rCount;
                            array_push($rAllNotes, $rNumberStars);
                          }
                        }
                        if ($rCount == 0) {
                          echo "Il n'y a pas encore d'avis disponibles pour cet article.";
                        }


                       ?>


                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="js/script.min.js"></script>
</body>
<?php $canLeave = "false"; ?>
<script>

    function submitToCart() {
      // take parameters from the product
      var id = $(".productIdToAdd").val();
      var quantity = $(".cart-quantity").val();
      //Make url
      var url = "addToCart.php?id=" + encodeURIComponent(id) + "&quantity=" + encodeURIComponent(quantity) + "&id_product=0";
      // Redirect to "addToCart" page w/ url
      window.location.href = url;
    }

</script>
</html>
