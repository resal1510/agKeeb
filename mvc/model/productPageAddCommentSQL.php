<?php
$sql = "INSERT INTO Commentaires (id_commentaire, client, article, pseudo, commentaire, note, date_creation, visible) VALUES (NULL, :customerID, :itemID, :name, :comm, :note, CURRENT_TIMESTAMP, 'true')";
$stmt = $pdo->prepare($sql);
    // Set params
    $stmt->bindParam(":customerID", $addCustId, PDO::PARAM_STR);
    $stmt->bindParam(":itemID", $addId, PDO::PARAM_STR);
    $stmt->bindParam(":name", $addName, PDO::PARAM_STR);
    $stmt->bindParam(":comm", $addComm, PDO::PARAM_STR);
    $stmt->bindParam(":note", $addStars, PDO::PARAM_STR);
    // Execute SQL
    $stmt->execute();
?>
