<?php
$pdo->exec('SET NAMES utf8');
$sth = $pdo->prepare("SELECT * FROM Commandes ORDER BY id_commande DESC");
$sth->execute();
$resultOrders = $sth->fetchAll(\PDO::FETCH_ASSOC);
?>
