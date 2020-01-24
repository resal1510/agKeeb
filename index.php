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

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<body>
  <?php include "header.php"?>

  <div class="spacer"></div>
  <p>Debug buttons (Login) :</p>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/index.php';">index</button>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/register.php';">register</button>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/login.php';">login</button>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/logout.php';">logout</button>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/testlogin.php';">check login</button>
  <div class="spacer"></div>
  <p>Debug buttons (Admin panel things) :</p>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/manageitems.php';">Manage items</button>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/manageaccounts.php';">Manage accounts </button>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/manageorders.php';">Manage orders </button>
</body>

</html>
