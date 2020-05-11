<?php
$oldPwd_err = $newPwd_err = $confirmPwd_err = $samePwd_err = $newPwd_success = $newPwd2_err = $pwdChange_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  switch ($_POST["what"]) {
    case 'changepwd':
    include "mvc/controller/userSettingsChangePwd.php";
      break;
    case 'modifyaddr':
      include "mvc/controller/userSettingsModifyAddr.php";
      break;
    case 'addAddr':
      include "mvc/controller/userSettingsNewAddr.php";
      break;
    case 'delAddr':
      include "mvc/controller/userSettingsDeleteAddr.php";
      break;
  }
}
?>
