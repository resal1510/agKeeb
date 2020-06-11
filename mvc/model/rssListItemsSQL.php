<?php
$sth = $pdo->prepare('SELECT * FROM Images INNER JOIN Articles ON Images.article = Articles.id_article ORDER BY date_creation DESC LIMIT 0,5');
$sth->execute();
$resultRss = $sth->fetchAll(\PDO::FETCH_ASSOC);

$sth = $pdo->prepare('SELECT date_creation FROM Articles ORDER BY date_creation DESC LIMIT 0,1');
$sth->execute();
$rssDate = $sth->fetchAll(\PDO::FETCH_ASSOC);
?>
