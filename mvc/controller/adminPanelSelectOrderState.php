<?php
require_once "config.php";
$pdo->exec('SET NAMES utf8');
$sth = $pdo->prepare("SELECT * FROM Etat_commandes");
$sth->execute();
$resultCat = $sth->fetchAll(\PDO::FETCH_ASSOC);

$fId = "id_etat";
$fState = "nom_etat";

foreach ($resultCat as $data) {
 print_r('<option value = "'.$data[$fId].'">'.$data[$fState].'</option>');
}

?>
