<?php
function getQueryLisst()
{
  $sql = 'SELECT * FROM Images INNER JOIN Articles ON Images.article = Articles.id_article'.$dynOrder;
  $sth = $pdo->prepare($sql);
  $sth->execute();
  $rListCatalog = $sth->fetchAll(\PDO::FETCH_ASSOC);

  echo $sql;
}

$nom = "nom_article";
$id = "id_article";
$enabled = "enabled";
$price = "prix_unitaire";
$nom_image = "nom_image";
$description = "description";
$category = "categorie";
?>
