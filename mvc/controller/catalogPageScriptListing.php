<?php
$searchTerm = $dynOrder = $rListCatalog = $resultSearch = $resultList = "";

if (isset($_POST['order'])) {
  $_SESSION['orderby'] = $_POST['order'];
  echo "string";
} else {
  $_SESSION['orderby'] = 'def';
  echo "bite";
}

function getQueryList($a, $check, $s)
{
  include 'config.php';
  $nom = "nom_article";
  $id = "id_article";
  $enabled = "enabled";
  $price = "prix_unitaire";
  $nom_image = "nom_image";
  $description = "description";
  $category = "categorie";

  if ($check) {
    $sql = 'SELECT * FROM Images INNER JOIN Articles ON Images.article = Articles.id_article WHERE Articles.nom_article LIKE :search'.$a;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":search", $s, PDO::PARAM_STR);
    $stmt->execute();
    $resultSearch = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $numberRows = $stmt->fetchColumn();

    if (!$resultSearch) {
      echo '<p style="margin:20px">Aucun nom d\'article ne correspond à votre recherche.</p>';
    } else {
      foreach ($resultSearch as $key) {
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
          echo $baseCode;
        }
      }
    }
  } else {
    $sql2 = 'SELECT * FROM Images INNER JOIN Articles ON Images.article = Articles.id_article'.$a;
    $sth = $pdo->prepare($sql2);
    $sth->execute();
    $resultList = $sth->fetchAll(\PDO::FETCH_ASSOC);
    foreach ($resultList as $key) {
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
        switch ($GLOBALS['$whatCategory']) {
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
  }
}

  $checkSearch = isset($_GET['search']);

  if ($checkSearch) {
    $searchTerm = '%'.$_GET['search'].'%';
  } else {
    $searchTerm = "";
  }

  //getQueryList("", $checkSearch, $searchTerm);

    ob_flush();
    flush();
    switch ($_SESSION['orderby']) {
      case '1':
        getQueryList(" ORDER BY nom_article", $checkSearch, $searchTerm);
        break;
      case '2':
        getQueryList(" ORDER BY nom_article", $checkSearch, $searchTerm);
        break;
      case '3':
        getQueryList(" ORDER BY nom_article", $checkSearch, $searchTerm);
        break;
      case '4':
        getQueryList(" ORDER BY nom_article", $checkSearch, $searchTerm);
        break;
      default:
        getQueryList("", $checkSearch, $searchTerm);
        echo "defaut";
        break;
    }

echo $_SESSION['orderby'];
return true;
 ?>
