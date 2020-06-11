<body>
    <main class="page payment-page">
        <section class="clean-block payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Payment</h2>
                </div>
                <form>
                    <div class="products">
                        <h3 class="title" style="padding-bottom: 19px;">Checkout</h3>
                        <?php include "mvc/controller/paymentListScript.php"; ?>
                        <div class="total">
                        <p class="item-name" style="margin-bottom: 16px;font-size: 14px;">Frais d'expédition<span class="price">CHF <span id="expPrice">8</span></span></p><span style="font-size: 18px;color: #71c3ff;">Total</span><span class="price" style="font-size: 18px;color: #71c3ff;">CHF <span id="totalPrice"></span></span></div>
                    </div>
                    <div class="card-details">
                        <h3 class="title mb-2" style="margin-bottom: 0px;">Adresse de livraison</h3><span style="font-size: 14px;">Mes adresses:</span>
                        <div class="form-row justify-content-between mt-2 addr1">
                            <?php include "mvc/controller/paymentListAddr.php"; ?>
                        </div>
                        <div class="col" style="padding-left: 0px;padding-right: 0px;"><a href="userSettings.php">Ajouter/modifier une adresse</a></div>
                        <h3 class="title mb-2 mt-5" style="margin-bottom: 0px;">Adresse de facturation</h3><span style="font-size: 14px;">Mes adresses:</span>
                        <div class="form-row justify-content-between mt-2 addr2">
                            <?php include "mvc/controller/paymentListAddr2.php"; ?>
                        </div>
                        <div class="col" style="padding-left: 0px;padding-right: 0px;"><a href="userSettings.php">Ajouter/modifier une adresse</a></div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                  <button class="btn btn-primary btn-block shadow-sm border-0" type="button" onclick="submitOrder()" style="background-color: #71c3ff;">Commander</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
<script src="mvc/controller/paymentTotal.js"></script>
<script src="mvc/controller/paymentAddressLogic.js"></script>
<script src="mvc/controller/paymentSubmitOrder.js"></script>
</body>
