<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$whatCategory = "";
$categoryListNumbers = ["Tous les articles", "Plaques", "Circuits imprimés", "Interrupteurs", "Touches", "Câbles", "Stabilisateurs", "Boîtiers"];

if (isset($_GET["cat"])) {
  $whatCategory = trim($_GET["cat"]);
} else {
  $whatCategory = 0;
}

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
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark">
            <div class="container" style="margin-top: 72px;">
              <div class="block-heading">
                  <h2 style="color: #71c3ff; text-shadow: 0px 5px 5px rgba(0,0,0,0.1),
                 10px 5px 5px rgba(0,0,0,0.05),
                 -10px 5px 5px rgba(0,0,0,0.05);"><?php echo $categoryListNumbers[$whatCategory]; ?></h2>
              </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-3" style="margin-left: 155p;">
                            <div class="d-none d-md-block text-center"><select class="mt-3"><optgroup label="This is a group"><option value="12" selected="">This is item 1</option><option value="13">This is item 2</option><option value="14">This is item 3</option></optgroup></select></div>
                        </div>
                        <div class="col-md-9">
                            <div class="products">
                                <div class="row no-gutters">
                                  <?php
                                  require_once "config.php";

                                  $sth = $pdo->prepare("SELECT * FROM `Images` INNER JOIN Articles ON Images.article = Articles.id_article");
                                  $sth->execute();
                                  $result3 = $sth->fetchAll(\PDO::FETCH_ASSOC);

                                  $nom = "nom_article";
                                  $id = "id_article";
                                  $enabled = "enabled";
                                  $price = "prix_unitaire";
                                  $nom_image = "nom_image";
                                  $description = "description";
                                  $category = "categorie";

                                  foreach ($result3 as $key) {
                                    $baseCode = '<div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" style="height:160px" src="uploads/'.$key[$nom_image].'"></a></div>
                                            <div class="product-name"><a href="#">'.$key[$nom].'</a></div>
                                            <div class="about">
                                                <div class="rating"><img src="img/star.svg"><img src="img/star.svg"><img src="img/star.svg"><img src="img/star-half-empty.svg"><img src="img/star-empty.svg"></div>
                                                <div class="price">
                                                    <h3>CHF '.$key[$price].'</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';

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
                                   ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="js/script.min.js"></script>
</body>

</html>
