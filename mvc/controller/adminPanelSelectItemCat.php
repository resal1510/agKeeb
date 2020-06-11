<?php
require_once "config.php";
include '/var/www/allanresin2.tk/html/agkeeb/mvc/model/adminPanelSelectItemCatSQL.php';

$fId = "id_categorie_article";
$fcategorie = "categorie_article";

foreach ($resultCat as $data) {
 print_r('<option value = "'.$data[$fId].'">'.$data[$fcategorie].'</option>');
}

?>
