<?php $pdo->exec('SET NAMES utf8');
$sth = $pdo->prepare("SELECT * FROM Commentaires ORDER BY id_commentaire DESC");
$sth->execute();
$resultComments = $sth->fetchAll(\PDO::FETCH_ASSOC); ?>
