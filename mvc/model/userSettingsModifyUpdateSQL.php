<?php
$sql = "UPDATE Adresses SET prenom = :name, nom = :surname, rue_num = :address, npa = :npa, ville = :city, telephone = :phone, defaut = :addrDefault WHERE Adresses.id_adresse = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":name", $newName, PDO::PARAM_STR);
$stmt->bindParam(":surname", $newSurname, PDO::PARAM_STR);
$stmt->bindParam(":address", $newAddress, PDO::PARAM_STR);
$stmt->bindParam(":npa", $newNpa, PDO::PARAM_STR);
$stmt->bindParam(":city", $newCity, PDO::PARAM_STR);
$stmt->bindParam(":phone", $newPhone, PDO::PARAM_STR);
$stmt->bindParam(":addrDefault", $newDefault, PDO::PARAM_STR);
$stmt->bindParam(":id", $idAddr, PDO::PARAM_STR);
$stmt->execute();
?>
