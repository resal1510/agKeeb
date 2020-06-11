<?php
$sql = "INSERT INTO Images (id_image, article, taille_image, nom_image) VALUES (NULL, :article, :size, :filename)";
$stmt = $pdo->prepare($sql);
// Set params
$stmt->bindParam(":article", $articleImage, PDO::PARAM_STR);
$stmt->bindParam(":size", $size, PDO::PARAM_STR);
$stmt->bindParam(":filename", $filename, PDO::PARAM_STR);
// Execute SQL
$stmt->execute();
?>
