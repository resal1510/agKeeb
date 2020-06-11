<?php $sth = $pdo->prepare('SELECT * FROM Clients WHERE id_client LIKE :id');
$sth->bindParam(':id', $idItem, PDO::PARAM_STR);
$sth->execute();
$resultCustomer1 = $sth->fetchAll(\PDO::FETCH_ASSOC); ?>
