<?php
$sth = $pdo->prepare("SELECT * FROM `Images` INNER JOIN Articles ON Images.article = Articles.id_article WHERE Articles.id_article LIKE :wantedId");
$sth->bindParam(':wantedId', $idAsked, PDO::PARAM_STR);
$sth->execute();
$resultForImage = $sth->fetchAll(\PDO::FETCH_ASSOC);

$sth2 = $pdo->prepare("SELECT * FROM `Commentaires` INNER JOIN Clients ON Commentaires.client = Clients.id_client INNER JOIN Articles ON Commentaires.article = Articles.id_article WHERE Articles.id_article LIKE :wantedId");
$sth2->bindParam(':wantedId', $idAsked, PDO::PARAM_STR);
$sth2->execute();
$resultForReviews = $sth2->fetchAll(\PDO::FETCH_ASSOC);
?>
