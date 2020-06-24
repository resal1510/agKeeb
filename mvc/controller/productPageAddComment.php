<?php
include "config.php";
session_start();
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

  //Check if captcha is correct and filled
  if (empty(trim($_POST["captchaComment"]))) {
    $captcha_err = "Merci de remplir le captcha";
  } else {
    if ($_POST["captchaComment"] == $_SESSION['code']) {
      $captcha_err = "";
    } else {
      $captcha_err = "Captcha incorrect";
    }}

  $addId = $_POST["idItemComment"];
  $addCustId = $_POST["idCustComment"];

  if (empty($captcha_err)) {
    //Add comment into SQL
    include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/productPageAddCommentSQL.php";
    $validState = array('state' => 'true', 'o1' => $_POST["captchaComment"], 'o2' => $_SESSION['code'], 'err' => $captcha_err);
    echo json_encode($validState);
  } else {
    $validState = array('state' => 'false', 'o1' => $_POST["captchaComment"], 'o2' => $_SESSION['code'], 'err' => $captcha_err);
    echo json_encode($validState);
  }
}
?>
