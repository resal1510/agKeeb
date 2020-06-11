<?php $sth2 = $pdo->prepare("SELECT * FROM `Commentaires` WHERE id_commentaire LIKE :wantedId");
  $sth2->bindParam(':wantedId', $idItemG, PDO::PARAM_STR);
  $sth2->execute();
  $resultForReviews = $sth2->fetchAll(\PDO::FETCH_ASSOC); ?>
