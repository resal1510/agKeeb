<?php
$sql = "DELETE FROM Articles WHERE Articles.id_article = $articleImage";
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>
