<?php $pdo->exec('SET NAMES utf8');
$sth = $pdo->prepare("SELECT * FROM Articles ORDER BY id_article DESC");
$sth->execute();
$resultItems = $sth->fetchAll(\PDO::FETCH_ASSOC); ?>
