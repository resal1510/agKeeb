<?php $pdo->exec('SET NAMES utf8');
$sth = $pdo->prepare("SELECT * FROM Clients ORDER BY id_client DESC");
$sth->execute();
$resultCustomers = $sth->fetchAll(\PDO::FETCH_ASSOC); ?>
