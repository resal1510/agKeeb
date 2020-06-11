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

include "config.php";
include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/productStartSQL.php";

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
$pName = $pDesc = $pImage = $pPrice = $pEnabled = $rNumberStars = $rComment = $rDate = $rVisible = $pCategory = "";
$rCount = 0;
$rAllNotes = array();

foreach ($resultForImage as $key) {
  $pName = $key[$nom];
  $pDesc = $key[$description];
  $pImage = $key[$nom_image];
  $pPrice = $key[$price];
  $pEnabled = $key[$enabled];
  $pCat = $key[$category];
}
 ?>
