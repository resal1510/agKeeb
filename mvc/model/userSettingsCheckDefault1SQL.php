<?php
$sql = "SELECT defaut, categorie, id_adresse FROM `Adresses` INNER JOIN Clients ON Adresses.client = Clients.id_client WHERE Clients.id_client LIKE :idCustomer AND categorie LIKE :catAddr";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":idCustomer", $idCustomer, PDO::PARAM_STR);
$stmt->bindParam(":catAddr", $actualCategory, PDO::PARAM_STR);
$stmt->execute();
$resultAddrDefault1 = $stmt->fetchAll(\PDO::FETCH_ASSOC);
?>
