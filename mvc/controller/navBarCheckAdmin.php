<?php
include "/var/www/allanresin2.tk/html/agkeeb/mvc/controller/config.php";
include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/generalCheckIfAdminSQL.php';

foreach ($resultIsAdmin as $key) {
  if ($key[$admin]) {
    print_r('<a class="dropdown-item" role="presentation" href="adminPanel.php"><i class="fas fa-unlock" style="margin-right:10px;"></i>Administration</a>');
  }
}
?>
