<?php
$sql = "SELECT *
FROM Commandes
INNER JOIN Contenu_commandes ON Commandes.id_commande = Contenu_commandes.commande
INNER JOIN Articles ON Articles.id_article = Contenu_commandes.article
INNER JOIN Etat_commandes ON Etat_commandes.id_etat = Commandes.etat
WHERE client LIKE :id
ORDER BY id_commande DESC";

$customerID = $_SESSION['idClient'];
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $customerID, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
?>
