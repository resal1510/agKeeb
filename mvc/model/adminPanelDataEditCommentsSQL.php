<?php
$sql = "UPDATE Commentaires SET visible = :state WHERE Commentaires.id_commentaire = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $commentID, PDO::PARAM_STR);
/*$stmt->bindParam(":cText", $commentText, PDO::PARAM_STR);*/
$stmt->bindParam(":state", $commentState, PDO::PARAM_STR);
$stmt->execute();
?>
