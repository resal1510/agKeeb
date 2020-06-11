<?php $sth = $pdo->prepare('SELECT * FROM Articles INNER JOIN Images ON id_article = Images.article WHERE id_article LIKE :id');
$sth->bindParam(':id', $idItem, PDO::PARAM_STR);
$sth->execute();
$resultItems1 = $sth->fetchAll(\PDO::FETCH_ASSOC); ?>
