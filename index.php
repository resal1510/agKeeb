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
<head>
  <!-- Set charset, title -->
  <meta charset="utf-8">
  <title>agKeeb Shop</title>
  <!-- Import Bootstrap, jQuery, PopperJS and FontAwesome -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a77b3e076e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Import local JS and CSS files -->
  <script src="/js/script.js" charset="utf-8"></script>
  <link rel="stylesheet" href="/css/style.css">
</head>
<script>
  $( document ).ready(function() {
    console.log("Document ready");
    $("#menuTop").load("menu.html");
});
</script>
<body>
  <div id="menuTop"></div>

  <div class="spacer"></div>
  <span>Debug buttons :</span>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/index.php';">index</button>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/register.php';">register</button>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/login.php';">login</button>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/logout.php';">logout</button>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/testlogin.php';">check login</button>
  <div class="spacer"></div>
  <span>Debug buttons 2 :</span>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/enableitem.php';">Enable/disable product</button>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/listitem.php';">View products status</button>
  <button onclick="window.location.href = 'https://agkeeb.allanresin.ch/accountinfo.php';">View account infos</button>
</body>

</html>
