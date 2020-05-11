<body>
    <main class="page blog-post-list">
        <section class="clean-block clean-blog-list dark">
            <div class="container">
                <div class="block-content min-vh-100">
                    <div class="clean-blog-post">
                        <div class="row">
                            <div class="col">
                                <h3>Votre commande #<?php echo $orderID; ?> a bien été enregistrée.&nbsp;<i class="fas fa-check" style="color: #52dc3c"></i></h3>
                                <div class="info"><span class="text-muted" onclick="printExternal('bill.php')" style="cursor: pointer;">Télécharger ma facture.</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
<script type="text/javascript">
function printExternal(url) {
    var printWindow = window.open( url, 'Print', 'left=200, top=200, width=950, height=500, toolbar=0, resizable=0');
    printWindow.addEventListener('load', function() {
        if (Boolean(printWindow.chrome)) {
            printWindow.print();
            setTimeout(function(){
                printWindow.close();
            }, 500);
        } else {
            printWindow.print();
            printWindow.close();
        }
    }, true);
}
</script>
