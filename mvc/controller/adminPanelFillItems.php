<?php
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (trim($_POST["idItem"])) {
    $idItem = $_POST["idItem"];
  }

$sth = $pdo->prepare('SELECT * FROM Articles INNER JOIN Images ON id_article = Images.article WHERE id_article LIKE :id');
$sth->bindParam(':id', $idItem, PDO::PARAM_STR);
$sth->execute();
$resultItems1 = $sth->fetchAll(\PDO::FETCH_ASSOC);

  $itemID = "id_article";
  $itemName = "nom_article";
  $itemCat = "categorie";
  $itemDesc = "description";
  $itemPrice = "prix_unitaire";
  $itemStock = "stock";
  $itemState = "enabled";
  $itemImageName = "nom_image";
  $stars = "note";

  foreach ($resultItems1 as $key) {
    $id  = $key[$itemID];
    $nom = $key[$itemName];
    $cat = $key[$itemCat];
    $desc = $key[$itemDesc];
    $price = $key[$itemPrice];
    $stock = $key[$itemStock];
    $state = $key[$itemState];
    $image = $key[$itemImageName];
  }

  $sth2 = $pdo->prepare("SELECT * FROM `Commentaires` WHERE article LIKE :wantedId");
  $sth2->bindParam(':wantedId', $id, PDO::PARAM_STR);
  $sth2->execute();
  $resultForReviews = $sth2->fetchAll(\PDO::FETCH_ASSOC);

  $rAllNotes = array();
  foreach ($resultForReviews as $key) {
  $rNumberStars = $key[$stars];
  array_push($rAllNotes, $rNumberStars);
  }

  if (count($rAllNotes) == 0) {
      $rAStarsEmptyVar = '<img src="img/star-empty.svg" style="width: 22px;">';
      $rActualStars = str_repeat($rAStarsEmptyVar, 5);
  } else {
    $rAverageStars = round(array_sum($rAllNotes)/count($rAllNotes) * 2) / 2;
    if (strpos( $rAverageStars, '.' ) === false) {
      $rAStarsVar = '<img src="img/star.svg" style="width: 22px;">';
      $rAStarsEmptyVar = '<img src="img/star-empty.svg" style="width: 22px;">';
      $emptyStars = 5 - $rAverageStars;

      $rActualStarsEmpty = str_repeat($rAStarsEmptyVar, $emptyStars);
      $rActualStarsTemp = str_repeat($rAStarsVar, $rAverageStars);

      $rActualStars = $rActualStarsTemp. $rActualStarsEmpty;
    } else {
    $rAverageStars = $rAverageStars - 0.5;
      $rAStarsVar = '<img src="img/star.svg" style="width: 22px;">';
      $rAStarsMiddleVar = '<img src="img/star-half-empty.svg" style="width: 22px;">';
      $rAStarsEmptyVar = '<img src="img/star-empty.svg" style="width: 22px;">';

      $emptyStars = 4 - $rAverageStars;

      $rActualStarsEmpty = str_repeat($rAStarsEmptyVar, $emptyStars);
      $rActualStarsTemp = str_repeat($rAStarsVar, $rAverageStars);
      $rActualStars = $rActualStarsTemp. $rAStarsMiddleVar. $rActualStarsEmpty;
    }
  }

  $addrArray = array('id' => $id, 'name' => $nom, 'cat' => $cat, 'desc' => $desc, 'price' => $price, 'stock' => $stock, 'state' => $state, 'image' => $image, 'stars' => $rActualStars);
  echo json_encode($addrArray);
}
?>
