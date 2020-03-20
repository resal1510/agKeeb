<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Init the session
session_start();
// Include sql config file
include "config.php";

// CHeck if the user is already connected, if so, redirect him to index.php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

include "checkRememberMe.php";

// Def all vars and clean them
$email = $password = $idClientLogin = "";
$email_err = $password_err = "";
// Data processing once the form is validated
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Verify if the user is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Merci d'entrer un nom d'utilisateur";
    } else{
        $email = trim($_POST["email"]);
    }
    // Verify of the password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Merci d'entrer un mot de passe.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Verify user and password if its correct
    if(empty($email_err) && empty($password_err)){
        // Prepare SQL statement
          $sql = "SELECT id_client, mail, pwd FROM Clients WHERE mail = :mail";
          if($stmt = $pdo->prepare($sql)){
              // Set params
              $stmt->bindParam(":mail", $param_email, PDO::PARAM_STR);
              $param_email = trim($_POST["email"]);
              // Execute SQL query
              if($stmt->execute()){
                  // Check if the user exists, if yes, check if the password is OK
                  if($stmt->rowCount() == 1){
                      if($row = $stmt->fetch()){
                          $id = $row["id"];
                          $email = $row["mail"];
                          $hashed_password = $row["pwd"];
                          $salt_password = "i;151-120#";
                          $check_password = hash("sha256", $password . $salt_password);
                          if($check_password == $hashed_password){
                              // If the password is correct, then check if the account is disabled or not
                              $sql = "SELECT * FROM Clients WHERE mail LIKE :mailCheck";
                              if ($stmt = $pdo->prepare($sql))
                              {
                                  //Set params
                                  $stmt->bindParam(":mailCheck", $param_email, PDO::PARAM_STR);
                                  // Execute SQL
                                  if ($stmt->execute())
                                  {
                                      $rLogin = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                                      //--------------------------------------------------------
                                    $a1 = json_encode($rLogin);
                                    $a2 = json_decode($a1, true);
                                    //Check if the account is enabled or not
                                    foreach ($a2 as $ok) {
                                      $idClientLogin = $ok["id_client"];
                                        if ($ok["actif"] == "false") {
                                          //If yes, redirect the user into disabled account page
                                          header("location: mvc/view/disabledAccount.php");
                                        } else {
                                          //If the user is enables, start the session
                                          session_start();
                                          // Set session
                                          $_SESSION["loggedin"] = true;
                                          $_SESSION["id"] = $id;
                                          $_SESSION["idClient"] = $idClientLogin;
                                          $_SESSION["email"] = $email;
                                          //Update "last-ip" in the customer table in the DB
                                          //include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/loginLastIPSQL.php";;
                                          $sql = "UPDATE Clients SET derniere_ip = :lastIp WHERE Clients.id_client LIKE :id";
                                          $stmt = $pdo->prepare($sql);
                                          $stmt->bindParam(":id", $idClientLogin, PDO::PARAM_STR);
                                          $stmt->bindParam(":lastIp", $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
                                          $stmt->execute();

                                          if(trim($_POST["rememberme"])){
                                            //$sid = session_id();
                                            //Generate a random string in sha256 and put it in the cookie
                                            $data = $email.$_SERVER['REMOTE_ADDR'];
                                            $tmphash = hash('sha256', $data);
                                            setcookie("keeplogin", $tmphash, time()+30*24*60*60);
                                            //Update database
                                            //include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/loginRememberSQL.php";
                                            $sql = "UPDATE Clients SET remember_cookie = :cookie WHERE Clients.id_client LIKE :id";
                                            $stmt = $pdo->prepare($sql);
                                            $stmt->bindParam(":id", $idClientLogin, PDO::PARAM_STR);
                                            $stmt->bindParam(":cookie", $tmphash, PDO::PARAM_STR);
                                            $stmt->execute();
                                          }
                                          // Redirect to index page
                                          header("location: index.php");
                                        }
                                      }
                                    }
                                }
                        } else{
                            // Error if the password is wrong
                            $password_err = "Login incorrect mdp, merci de réessayer.";
                        }
                    }
                } else{
                    // Error if the mail address is wrong
                    $email_err = "Login incorrect mail, merci de réessayer.";
                }
            } else{
                echo "Quelque chose s'est mal passé, merci de réessayer plus tard";
            }
        }
        // finish sql
        unset($stmt);
    }
    // close PDO connection
    unset($pdo);
}
?>
