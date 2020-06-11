<?php
$pdo->exec('SET NAMES utf8');
$sth = $pdo->prepare("SELECT * FROM Etat_commandes");
$sth->execute();
$resultCat = $sth->fetchAll(\PDO::FETCH_ASSOC);
?>
