<?php
if (empty(trim($_POST["passwdDisable"]))) {
    $actualPasswdErr = "Merci d'insérer votre mot de passe actuel";
} else {
    $passwd = trim($_POST["passwdDisable"]);
}

if (empty($actualPasswdErr)) {
  include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/userSettingsChangePwdSQL.php";
  $Fpwd = "pwd";
  foreach ($resultPwdChange as $key) {
    $actualPwd = $key[$Fpwd];
  }

  $check_password = hash("sha256", $passwd . "i;151-120#");
  //Compare the provided passwd hash with the one stored into database
  if ($check_password == $actualPwd) {
    $sql = "UPDATE Clients SET active = 'false' WHERE Clients.id_client = :idAccount";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idAccount", $_SESSION["idClient"], PDO::PARAM_STR);
    $stmt->execute();

    $randomString = substr(str_shuffle(MD5(microtime())), 0, 30);
    $dynLink = 'https://sandbox.allanresin.ch/agkeeb/recover.php?id='.$randomString;

    $sql = "UPDATE Clients SET recover = :recover WHERE Clients.id_client = :idAccount";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idAccount", $_SESSION["idClient"], PDO::PARAM_STR);
    $stmt->bindParam(":recover", $randomString, PDO::PARAM_STR);
    $stmt->execute();

    $confirmDisable = '<p style="color:rgb(113,195,255); font-weight:bold">Votre compte a bien été désactivé. Vous pouvez maintenant vous déconnecter.<br>
                  Pour retrouver accès à votre compte ultérieurement, vous devriez utiliser ce lien unique :</p>
                  <p style="font-weight:bold">'.$dynLink.'</p>';
    session_destroy();
  } else {
    $errDis2 = "Mot de passe incorrect";
  }
}
?>
