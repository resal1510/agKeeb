<?php
require_once "config.php";
include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelSelectSQL.php';

$fId = "id_etat";
$fState = "nom_etat";

foreach ($resultCat as $data) {
 print_r('<option value = "'.$data[$fId].'">'.$data[$fState].'</option>');
}

?>
