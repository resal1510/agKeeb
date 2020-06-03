<?php
include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/generalCheckIfAdminSQL.php';

// Check if user is already logged, if yes, redirect him to index.php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    foreach ($resultIsAdmin as $key) {
      if ($key[$admin]) {
        include "mvc/view/viewAdminPanel.php";
      } else {
        print_r('<br>Cette page est strictement réservée aux administrateurs d\'agKeeb.<br>');
        print_r('Vous allez être redirigé vers l\'accueil dans 5 secondes ...');
        echo '<meta http-equiv="refresh" content="5; URL=index.php">';
      }
    }
} else {
  $currentPage = basename($_SERVER['REQUEST_URI']);
  print_r('<body>
  <br>
      <h5>Vous devez être connecté pour pouvoir accéder à cette page.</h5>
      <h6><a href="login.php?lpage='.$currentPage.'">Se connecter</a></h6>
    </body>');
    }
?>
