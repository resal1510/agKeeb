<?php
if (empty($_GET["id"])) {
  header("Location: https://sandbox.allanresin.ch/agkeeb/index.php");
  die();
} else {
  $sth = $pdo->prepare('SELECT recover FROM Clients WHERE recover like :recover');
  $sth->bindParam(':recover', $_GET["id"], PDO::PARAM_STR);
  $sth->execute();

  if ($sth->rowCount() == 0) {
    header("Location: https://sandbox.allanresin.ch/agkeeb/index.php");
  }
}
?>
