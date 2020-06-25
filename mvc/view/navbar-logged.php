<?php include "mvc/controller/shoppingCartNumberItems.php"; ?>
<body>
  <div class="spacer" style="margin-bottom: 72px"></div>
  <nav class="navbar navbar-light navbar-expand-lg text-muted shadow-sm navigation-clean-search fixed-top" style="background-color: #FFFFFF;padding-left: 100px;padding-right: 100px;">
    <div class="container-fluid"><a class="navbar-brand text-black-50" href="index.php" style="margin-left: 0px;">agKeeb</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="margin-right: 0px;"><span
          class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navcol-1" style="margin-right: 0px;">
        <ul class="nav navbar-nav">
          <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="margin: 0px;padding: 8px;">Catalogue</a>
            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="catalog.php?cat=1">Plaques</a><a class="dropdown-item" role="presentation" href="catalog.php?cat=2">Circuits imprimés</a><a class="dropdown-item"
                role="presentation" href="catalog.php?cat=3">Interrupteurs</a><a class="dropdown-item" role="presentation" href="catalog.php?cat=4">Touches</a><a class="dropdown-item" role="presentation" href="catalog.php?cat=5">Câbles</a><a
                class="dropdown-item" role="presentation" href="catalog.php?cat=6">Stabilisateurs</a><a class="dropdown-item" role="presentation" href="catalog.php?cat=7">Boîtiers</a>
              <div class="dropdown-divider" role="presentation"></div><a class="dropdown-item" role="presentation" href="catalog.php">Tous les articles</a>
            </div>
          </li>
        </ul>
        <form class="form-inline mr-auto" target="_self" action="catalog.php">
          <div class="form-group" style="padding-left: 21px;">
            <label for="search-field"><i class="fa fa-search"></i></label>
            <input placeholder="Rechercher ..." class="form-control search-field" id="search-field" type="search" name="search">
          </div>
        </form>
        <span class="navbar-text">
          <a href="shoppingCart.php">
            <span class="fa-layers fa-fw fa-2x" style="margin-right:7px">
                <i class="fas fa-shopping-cart" style="font-size: 16px" color="#000000"></i>
                <span class="fa-layers-counter" style="background: Tomato" id="allCartItemVal" color="#000000"><?php echo $i; ?></span></a>
            </span><a href="shoppingCart.php" style="margin-right: 27px; color: #465765;">Panier</a>
          </span>
        <ul class="nav navbar-nav">
          <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="margin: 0px;padding: 8px;">Mon compte</a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" role="presentation" href="orders.php"><i class="fas fa-shopping-bag" style="margin-right:10px;"></i>Commandes</a>
              <a class="dropdown-item" role="presentation" href="userSettings.php"><i class="fas fa-users-cog" style="margin-right:10px;"></i>Paramètres</a>
              <?php include "mvc/controller/navBarCheckAdmin.php" ?>
              <div class="dropdown-divider"></div>
              <?php include "mvc/controller/navbarLScript.php" ?>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="spacer" style=""></div>
