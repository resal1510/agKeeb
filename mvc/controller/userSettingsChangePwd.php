<?php
    if (empty(trim($_POST["oldPwd"]))) {
        $oldPwd_err = "Merci d'insérer votre mot de passe actuel";
        echo "fdp";
    } else {
        $oldPwd = trim($_POST["oldPwd"]);
        echo "string";
    }

    if (empty(trim($_POST["newPwd"]))) {
        $newPwd_err = "Merci d'insérer votre nouveau mot de passe";
        echo $newPwd_err;
    } else {
        $newPwd = trim($_POST["newPwd"]);
    }

    if (empty(trim($_POST["confirmPwd"]))) {
      $confirmPwd_err = "Merci d'insérer une deuxième fois votre nouveau mot de passe";
      echo $confirmPwd_err;
    } else {
      $confirmPwd = trim($_POST["confirmPwd"]);
      if ($confirmPwd == $newPwd) {
        //Main code here
        include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/userSettingsChangePwdSQL.php";
        $Fpwd = "pwd";
        foreach ($resultPwdChange as $key) {
          $actualPwd = $key[$Fpwd];
        }
        $check_password = hash("sha256", $oldPwd . "i;151-120#");
        //Compare the provided passwd hash with the one stored into database
        if ($check_password == $actualPwd) {
          $newPwdHash = hash("sha256", $newPwd . "i;151-120#");
          if ($check_password == $newPwdHash) {
            $pwdChange_err = "Votre nouveau mot de passe ne peux pas être le même que l'ancien !";
          } else {
            include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/userSettingsChangePwd2SQL.php";
            if ($stmt->execute()) {
              $newPwd_success = "Votre mot de passe a bien été changé !";
              $oldPwd = $newPwd = $confirmPwd = "";
            } else {
              $newPwd2_err = "Une erreur est survenue lors du changement de mot de passe.<br>Merci de réessayer.";
            }
          }
        } else {
          $samePwd_err = "Le mot de passe actuel n'est pas valide.";
        }
      } else {
        $confirmPwd_err = "Les deux nouveaux mots de passe ne coresspondent pas.";
      }
    }
?>
