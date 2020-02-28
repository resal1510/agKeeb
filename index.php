<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<body>
  <?php include "navbarInclude.php"?>
  <div class="spacer" style="margin-top: 72px"></div>
  <p>Debug buttons (Login) :</p>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/index.php';">index</button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/register.php';">register</button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/login.php';">login</button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/logout.php';">logout</button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/testlogin.php';">check login</button>
  <div class="spacer"></div>
  <p>Debug buttons (Admin panel things) :</p>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/itemsManagement.php';">Manage items</button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/accountsManagement.php';">Manage accounts </button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/ordersManagement.php';">Manage orders </button>
  <div class="spacer"></div>
  <p>Debug buttons (normal things) :</p>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/orderCreate.php';">Create an order</button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/shoppingCart.php';">Shopping cart</button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/productPage.php';">Product page</button>
  <button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/catalog.php';">Catalog</button>
</body>
</html>
