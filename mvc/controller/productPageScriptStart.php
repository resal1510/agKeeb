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
