<?php
// Include sql config file
include "mvc/controller/config.php";
include "mvc/controller/checkRememberMe.php";
include "mvc/view/mainHeader.html";
include "mvc/controller/navbarInclude.php"
?>
<p>Debug buttons (Login) :</p>
<button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/index.php';">index</button>
<button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/register.php';">register</button>
<button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/login.php';">login</button>
<button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/logout.php';">logout</button>
<button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/oldScripts/testlogin.php';">check login</button>
<div class="spacer"></div>
<p>Debug buttons (Admin panel things) :</p>
<button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/oldScripts/itemsManagement.php';">Manage items</button>
<button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/oldScripts/accountsManagement.php';">Manage accounts </button>
<button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/oldScripts/ordersManagement.php';">Manage orders </button>
<div class="spacer"></div>
<p>Debug buttons (normal things) :</p>
<button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/oldScripts/orderCreate.php';">Create an order</button>
<button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/shoppingCart.php';">Shopping cart</button>
<button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/productPage.php';">Product page</button>
<button onclick="window.location.href = 'http://allanresin2.tk/agkeeb/catalog.php';">Catalog</button>
</body>

</html>
