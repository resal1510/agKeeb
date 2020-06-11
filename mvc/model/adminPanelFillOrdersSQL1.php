<?php $sth = $pdo->prepare('SELECT * FROM Commandes WHERE id_commande LIKE :id');
$sth->bindParam(':id', $idItem, PDO::PARAM_STR);
$sth->execute();
$resultOrders1 = $sth->fetchAll(\PDO::FETCH_ASSOC); ?>
