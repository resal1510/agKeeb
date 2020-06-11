<?php $sth = $pdo->prepare('SELECT * FROM Contenu_commandes INNER JOIN Articles ON article = Articles.id_article WHERE commande LIKE :id');
$sth->bindParam(':id', $idItem, PDO::PARAM_STR);
$sth->execute();
$resultOrders2 = $sth->fetchAll(\PDO::FETCH_ASSOC); ?>
