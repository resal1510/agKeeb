<?php
require_once "config.php";
$pdo->exec('SET NAMES utf8');
$sth = $pdo->prepare("SELECT * FROM Categories_articles");
$sth->execute();
$resultCat = $sth->fetchAll(\PDO::FETCH_ASSOC);

$fId = "id_categorie_article";
$fcategorie = "categorie_article";

foreach ($resultCat as $data) {
 print_r('<option value = "'.$data[$fId].'">'.$data[$fcategorie].'</option>');
}

?>
