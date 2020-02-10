<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (isset($_SESSION["loggedin"])) {
    //header("location: login.php");
    $isLogged = true;
} else {
  $isLogged = false;
}
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
  <?php include "navbarInclude.php"?>
<script>
  $( document ).ready(function() {
    console.log("Document ready");
    $("#menuTop").load("menu.html");
});
</script>
<body>
  <div id="menuTop"></div>

  <div class="spacer"></div>
  <div class="spacer"></div>

  <?php
  require_once "admincheck.php";
  print_r($isAdmin[0]->admin);

  if ($isLogged) {
    print_r("Addresse mail connectée : ". $connectedMail."<br>");
    if ($isAdmin[0]->admin) {
      print_r("Ce compte est administrateur.");
    } else {
      print_r("Ce compte est normal.");
    }
  } else {
    print_r("Vous n'êtes pas connecté.");
  }

  ?>
</body>

</html>
