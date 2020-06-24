<?php
// Check if user is already logged, if yes, redirect him to index.php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  include "mvc/view/viewUserSettings.php";
} else {
  $currentPage = basename($_SERVER['REQUEST_URI']);
  //header('Location: https://sandbox.allanresin.ch/agkeeb/');
   print_r('<body>
  <br>
      <h5>Vous devez être connecté pour pouvoir modifier vos paramètres.</h5>
      <h6><a href="login.php?lpage='.$currentPage.'">Se connecter</a></h6>
    </body>');
  }
  exit();
?>
