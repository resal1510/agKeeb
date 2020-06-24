<?php
include "mvc/controller/config.php";
include "mvc/controller/checkRememberMe.php";
include "mvc/controller/productPageScriptStart.php";
include "mvc/view/mainHeader.html";
include "mvc/controller/navbarInclude.php";
include "mvc/view/viewProductPage.php";
include "mvc/view/footer.html";
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="/agkeeb/assets/js/script.min.js"></script>
<script src="mvc/controller/productPageScriptAddcart.js"></script>
<script src="mvc/controller/generalKeepScrollPos.js"></script>
<script src="mvc/controller/productPageAddComm.js"></script>
<?php $canLeave = "false"; ?>
