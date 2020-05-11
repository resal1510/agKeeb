<main class="page product-page">
  <section class="clean-block clean-product dark">
    <div class="container">
      <?php include "mvc/controller/catalogPageScriptCartmsg.php" ?>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="catalog.php"><span>Catalogue</span></a></li>
        <li class="breadcrumb-item"><a href="sex"><span>sex</span></a></li>
        <li class="breadcrumb-item"><a href="#"><span><?php echo $pName ?></span></a></li>
      </ol>
      <div class="block-content">
        <div class="product-info">
          <div class="row">
            <div class="col-md-6" style="text-align:center">
              <?php echo '<img src="uploads/'.$pImage.'" alt="" style="width: 360px; height: 360px">'; ?>
            </div>
            <div class="col-md-6">
              <div class="info">
                <h3 style="margin-top: 20px;margin-bottom: 8px;"><?php echo $pName ?></h3>
                <div class="rating">
                  <?php include "mvc/controller/productPageScriptStars.php" ?>
                </div>
                <h3 style="margin-top: 20px;margin-bottom: 20px;">CHF <?php echo $pPrice ?></h3>
                <!-- <div style="height: 44px;margin-bottom: 20px;"><select class="custom-select" style="height: 44px;margin-bottom: 20px;width: 150px;">
                    <option value="couleur" selected="" disabled="" hidden="">Couleur</option>
                    <option value="rouges">Rouges</option>
                    <option value="bleus">Bleus</option>
                    <option value="noirs">Noirs</option>
                  </select></div> -->
                <form class='add-to-cart-form' method="get" action="javascript:submitToCart();">
                  <?php include "mvc/controller/productPageScriptDispoCart.php" ?>
                </form>
                <div class="summary" style="margin-top: 20px;padding-top: 20px;">
                  <p style="margin-bottom: 20px;"><?php echo $pDesc ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <h4 style="margin-bottom: 16px;">Commentaires</h4>
        </div>
        <div id="commentaires" class="fade show tab-pane active">
          <?php include "mvc/controller/productPageScriptComments.php" ?>
        </div>
      </div>
    </div>
  </section>
</main>
</body>
