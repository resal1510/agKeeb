<?php
// Check if user is already logged, if yes, redirect him to index.php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    include "mvc/view/viewPayment.php";
} else {
  $currentPage = basename($_SERVER['REQUEST_URI']);
      print_r('<body>
      <br>
          <h5>Vous devez être connecté pour pouvoir passer une commande.</h5>
          <h6><a href="login.php?lpage='.$currentPage.'">Se connecter</a></h6>
        </body>');
    }
?>
