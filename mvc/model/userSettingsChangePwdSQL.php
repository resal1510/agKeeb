<?php
$sql = "SELECT pwd FROM Clients WHERE id_client LIKE :customerID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":customerID", $_SESSION["idClient"], PDO::PARAM_STR);
$stmt->execute();
$resultPwdChange = $stmt->fetchAll(\PDO::FETCH_ASSOC);
?>
