<?php
include "mvc/controller/config.php";
include "mvc/controller/checkRememberMe.php";
include "mvc/view/mainHeader.html";
?>
<script src="/agkeeb/mvc/controller/adminPanelFillModal.js"></script>
<script src="/agkeeb/mvc/controller/generalKeepScrollPos.js"></script>
<?php

include 'mvc/model/paymentListAddressSQL.php';
include "mvc/controller/navbarInclude.php";
include "mvc/controller/adminPanelCheckAdmin.php";
include "mvc/controller/adminPanelDataManagement.php";
include "mvc/view/footer.html";
?>
</html>
