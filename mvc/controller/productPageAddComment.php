<?php
include "config.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if (!empty(trim($_POST["nameComment"]))) {
    $addName = $_POST["nameComment"];
  }
  if (!empty(trim($_POST["starsComment"]))) {
    $addStars = $_POST["starsComment"];
  }
  if (!empty(trim($_POST["commentComment"]))) {
    $addComm = $_POST["commentComment"];
  }
  $addId = $_POST["idItemComment"];
  $addCustId = $_POST["idCustComment"];

  //Add comment into SQL
  include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/productPageAddCommentSQL.php";
}
?>
