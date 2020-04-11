<?php
function getAddrQuery($categoryAddr) {
  include '/var/www/allanresin2.tk/html/agkeeb/mvc/controller/config.php';
  global $customerMail; global $resultAddr1; global $resultAddr2;
  $sth = $pdo->prepare('SELECT * FROM Adresses INNER JOIN Clients ON Adresses.client = Clients.id_client WHERE mail LIKE :customer AND categorie LIKE :category');
  $sth->bindParam(':customer', $customerMail, PDO::PARAM_STR);
  $sth->bindParam(':category', $categoryAddr, PDO::PARAM_STR);
  $sth->execute();
  ${"resultAddr" . $categoryAddr} = $sth->fetchAll(\PDO::FETCH_ASSOC);
}
?>
