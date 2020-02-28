<?php
  require_once "config.php";
  //Get the article ID with GET (lol)
  $idArticle = $_GET["id"];
  //Get the image name that is liked to the article
  $sth = $pdo->prepare("SELECT nom_image FROM Images WHERE article = $idArticle");
  $sth->execute();
  $result1 = $sth->fetchAll(PDO::FETCH_ASSOC);
  //print_r($result1["0"]);
  foreach ($result1 as $key) {
    //And set the variable "imageLink" with the local image link
    $imageLink = "uploads/".$key["nom_image"];
  }
  //Display the image when this this page is requested
  header("Content-type: image/png");
  echo $imageLink;
?>
