<?php
$sql = "INSERT INTO Adresses (id_adresse, client, categorie, prenom, nom, rue_num, npa, ville, telephone, defaut)
        VALUES (NULL, :idCustomer, :idCategory, :name, :surname, :addr, :npa, :city, :phone, :def)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":idCustomer", $idCustomer, PDO::PARAM_STR);
$stmt->bindParam(":idCategory", $actualCategory, PDO::PARAM_STR);
$stmt->bindParam(":name", $newNameShip, PDO::PARAM_STR);
$stmt->bindParam(":surname", $newSurnameShip, PDO::PARAM_STR);
$stmt->bindParam(":addr", $newAddressShip, PDO::PARAM_STR);
$stmt->bindParam(":npa", $newNpaShip, PDO::PARAM_STR);
$stmt->bindParam(":city", $newCityShip, PDO::PARAM_STR);
$stmt->bindParam(":phone", $newPhoneShip, PDO::PARAM_STR);
$stmt->bindParam(":def", $newDefault, PDO::PARAM_STR);
$stmt->execute();
?>
