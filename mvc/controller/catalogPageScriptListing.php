<?php
include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/catalogListSQL.php';

foreach ($rListCatalog as $key) {
  $baseCode = '<div class="col-12 col-md-6 col-lg-4">
      <div class="clean-product-item">
          <div class="image"><a href="productPage.php?id_product='.$key[$id].'"><img class="img-fluid d-block mx-auto" style="height:160px" src="uploads/'.$key[$nom_image].'"></a></div>
          <div class="product-name"><a href="productPage.php?id_product='.$key[$id].'">'.$key[$nom].'</a></div>
          <div class="about">
              <div class="rating">
              <?php include "mvc/controller/productPageScriptStars.php" ?>
              </div>
              <div class="price">
                  <h3>CHF '.$key[$price].'</h3>
              </div>
          </div>
      </div>
  </div>';

  if ($key[$enabled] == "true") {
    switch ($whatCategory) {
      case "1":
        if ($key[$category] == "1") {
          print_r($baseCode);
        }
        break;
        case '2':
        if ($key[$category] == "2") {
          print_r($baseCode);
        }
          break;
          case '3':
          if ($key[$category] == "3") {
            print_r($baseCode);
          }
            break;
            case '4':
            if ($key[$category] == "4") {
              print_r($baseCode);
            }
              break;
              case '5':
              if ($key[$category] == "5") {
                print_r($baseCode);
              }
                break;
                case '6':
                if ($key[$category] == "6") {
                  print_r($baseCode);
                }
                  break;
                  case '7':
                  if ($key[$category] == "7") {
                    print_r($baseCode);
                  }
                    break;
      default:
      print_r($baseCode);
        break;
    }
  }
}
 ?>
