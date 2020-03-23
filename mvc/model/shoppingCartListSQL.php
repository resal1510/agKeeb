<?php
$sth = $pdo->prepare("SELECT * FROM `Images` INNER JOIN Articles ON Images.article = Articles.id_article");
$sth->execute();
$resultbeta = $sth->fetchAll(\PDO::FETCH_ASSOC);
$keys = array_keys($saved_cart_items);
?>
