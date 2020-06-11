<?php   $sth2 = $pdo->prepare("SELECT * FROM `Commentaires` WHERE article LIKE :wantedId");
  $sth2->bindParam(':wantedId', $id, PDO::PARAM_STR);
  $sth2->execute();
  $resultForReviews = $sth2->fetchAll(\PDO::FETCH_ASSOC); ?>
