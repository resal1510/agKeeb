<?php include "mvc/controller/ordersLinkToBill.php";?>
<body class="a4 p-4" onload="window.print()">
    <div>
        <h1 class="mb-5 border-bottom pb-3" style="color: rgb(113,195,255);">agKeeb</h1>
    </div>
    <div class="border rounded-0 border-secondary p-3">
        <h2 class="text-break mb-5">Commande #<?php if(!empty($lastOrderID)){echo $lastOrderID;}else {echo $_SESSION["lastOrder"];} ?> :</h2>
        <div class="row justify-content-between mb-2">
            <div class="col-7">
                <h5><strong>Article</strong></h5>
            </div>
            <div class="col">
                <h5><strong>Quantité</strong></h5>
            </div>
            <div class="col d-md-flex justify-content-md-end">
                <h5><strong>Prix</strong></h5>
            </div>
        </div>
        <?php include "mvc/controller/billListItems.php";?>
        <div class="p-3 mt-4 border">
            <div class="row mb-2">
                <div class="col" style="font-size: 14px;color: rgb(108,117,125);"><span>Frais d'éxpedition</span></div>
                <div class="col d-md-flex justify-content-md-end" style="font-size: 14px;color: rgb(108,117,125);"><span>CHF <span id="expPriceBill"></span></span></div>
            </div>
            <div class="row">
                <div class="col" style="font-size: 20px;"><span><strong>Total:</strong></span></div>
                <div class="col d-md-flex justify-content-md-end" style="font-size: 20px;"><span><strong>CHF <span class="totalPrice"></span></strong></span></div>
            </div>
        </div>
    </div>
</body>
<script src="mvc/controller/billTotal.js"></script>
</html>
