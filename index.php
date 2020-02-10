<?php
/* Après tous les tests, dé-commenter ça pour remettre le check de login

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

*/
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<body>
  <?php include "navbarInclude.php"?>

  <div class="spacer"></div>
  <p>Debug buttons (Login) :</p>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/index.php';">index</button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/register.php';">register</button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/login.php';">login</button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/logout.php';">logout</button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/testlogin.php';">check login</button>
  <div class="spacer"></div>
  <p>Debug buttons (Admin panel things) :</p>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/manageitems.php';">Manage items</button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/manageaccounts.php';">Manage accounts </button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/manageorders.php';">Manage orders </button>
  <div class="spacer"></div>
  <p>Debug buttons (normal things) :</p>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/createorder.php';">Create an order</button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/panier.php';">Shopping cart</button>
</body>

</html>
