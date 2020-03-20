<?php
include "/var/www/allanresin2.tk/html/agkeeb/mvc/controller/config.php";

$sth = $pdo->prepare("SELECT * FROM `Images` INNER JOIN Articles ON Images.article = Articles.id_article");
$sth->execute();
$rListCatalog = $sth->fetchAll(\PDO::FETCH_ASSOC);

$nom = "nom_article";
$id = "id_article";
$enabled = "enabled";
$price = "prix_unitaire";
$nom_image = "nom_image";
$description = "description";
$category = "categorie";
?>
