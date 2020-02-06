<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>

<?php
require_once "config.php";


?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <!-- Set charset, title -->
  <meta charset="utf-8">
  <title>agKeeb Shop</title>
  <!-- Import Bootstrap, jQuery, PopperJS and FontAwesome -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a77b3e076e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Import local JS and CSS files -->
  <script src="js/script.js" charset="utf-8"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include "header.php"?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <?php
    $sth = $pdo->prepare("SELECT * FROM `Images` INNER JOIN Articles ON Images.article = Articles.id_article");
    $sth->execute();
    $result3 = $sth->fetchAll(\PDO::FETCH_ASSOC);

    $nom = "nom_article";
    $id = "id_article";
    $enabled = "enabled";
    $price = "prix";
    $nom_image = "nom_image";
    $description = "description";

    foreach ($result3 as $key) {
      print_r('<div class="container">
        <div class="product">
          <div class="img-container">
            <img src="uploads/'.$key[$nom_image].'">
          </div>
          <div class="product-info">
            <div class="product-content">
              <h1>'.$key[$nom].'</h1>
              <p>'.$key[$description].'</p>
              <ul>
                <li>Lorem ipsum dolor sit ametconsectetu.</li>
                <li>adipisicing elit dlanditiis quis ip.</li>
                <li>lorem sde glanditiis dars fao.</li>
              </ul>
              <div class="buttons">
                <a class="button add" href="#">Add to Cart</a>
                <span class="button" id="price">'.$key[$price].' CHF</span>
              </div>
            </div>
          </div>
        </div>
      </div>');
    }
     ?>


  </form>
</body>
</html>
