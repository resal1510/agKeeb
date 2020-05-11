<main class="page shopping-cart-page">
  <section class="clean-block clean-cart dark">
    <div class="container">
      <div class="block-heading">
          <h2 class="text-info">Panier</h2>
      </div>
      <div class="content">
        <div class="row no-gutters">
          <div class="col-md-12 col-lg-8">
            <div class="items">
              <?php include "mvc/controller/shoppingCartScriptListing.php" ?>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <div class="summary">
              <h3>Résumé</h3>
              <h4><span class="text">Sous-total</span><span class="price">CHF <span id="subtotal"></span></span></h4>
              <h4><span class="text">Frais d'expédition</span><span class="price">CHF 8</span></h4>
              <h4>
                <span class="text">Total</span>
                <span class="price">CHF <span id="totaloftotal"></span></span>
              </h4>
              <button class="btn btn-primary btn-block btn-lg shadow-sm border-0" id="goPayment" type="button" style="background-color: #71c3ff;">Passer en caisse</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<script src="mvc/controller/shoppingCartScript.js"></script>
</body>
