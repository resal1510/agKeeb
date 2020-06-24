<?php
$errRecover = $mail = $pwd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $recoverID = $_GET["id"];

  $sth = $pdo->prepare('SELECT mail, pwd FROM Clients WHERE recover like :id');
  $sth->bindParam(':id', $recoverID, PDO::PARAM_STR);
  $sth->execute();
  $resultRecover1 = $sth->fetchAll(\PDO::FETCH_ASSOC);

  foreach ($resultRecover1 as $key) {
    $mail = $key['mail'];
    $pwd = $key['pwd'];
  }

  if ($_POST["recMail"] != $mail) {
    $errRecover = '<p style="color:red">L\'adresse mail entrée ne correspond pas à ce lien de réactivation</p>';
  } else {
    $tmpHashPwd = hash("sha256", $_POST["recPwd"] . "i;151-120#");
    if ($tmpHashPwd != $pwd) {
      $errRecover = '<p style="color:red">Le mot de passe n\'est pas correct.</p>';
    } else {

      $sth = $pdo->prepare('UPDATE Clients SET active = "true", recover = NULL WHERE Clients.mail = :mail');
      $sth->bindParam(':mail', $mail, PDO::PARAM_STR);
      $sth->execute();

      $errRecover = '<p style="color:green">Votre compte a bien été réactivé.<br>Vous pouvez maintenant vous reconnecter au site.</p>';
    }
  }



}
?>
