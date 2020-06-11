<?php $pdo->exec('SET NAMES utf8');
$sth = $pdo->prepare("SELECT * FROM Categories_articles");
$sth->execute();
$resultCat = $sth->fetchAll(\PDO::FETCH_ASSOC); ?>
