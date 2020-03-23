<?php
$sql = "SELECT * FROM Clients WHERE mail LIKE :mailCheck";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":mailCheck", $pMail, PDO::PARAM_STR);
$stmt->execute();
$a2 = json_decode(json_encode($stmt->fetchAll(\PDO::FETCH_ASSOC)), true);
?>
