<?php $sth = $pdo->prepare('SELECT * FROM Commentaires WHERE id_commentaire LIKE :id');
$sth->bindParam(':id', $idItem, PDO::PARAM_STR);
$sth->execute();
$resultReviews1 = $sth->fetchAll(\PDO::FETCH_ASSOC); ?>
