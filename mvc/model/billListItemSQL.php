<?php
$sth = $pdo->prepare('SELECT *
FROM Contenu_commandes
INNER JOIN Articles ON Contenu_commandes.article = Articles.id_article
WHERE commande LIKE :id');
$sth->bindParam(':id', $lastOrderID, PDO::PARAM_STR);
$sth->execute();
$resultOrder = $sth->fetchAll(\PDO::FETCH_ASSOC);
?>
