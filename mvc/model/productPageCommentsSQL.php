<?php
$sth2 = $pdo->prepare("SELECT * FROM `Commentaires` WHERE article LIKE :wantedId ORDER BY `id_commentaire` DESC");
$sth2->bindParam(':wantedId', $idAsked, PDO::PARAM_STR);
$sth2->execute();
$resultForComments = $sth2->fetchAll(\PDO::FETCH_ASSOC);
?>
