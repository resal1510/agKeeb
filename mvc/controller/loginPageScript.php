<?php
//Start session and include needed files
session_start();
include "config.php";
include "checkRememberMe.php";
//Clean variables in case of
$email = $password = $idClientLogin = $email_err = $password_err = "";
//Detect last page with the GET
$lastPage;
if (isset($_GET['lpage'])) {
  $lastPage = $_GET['lpage'];
} else {
  $lastPage = 'index.php';
}
// CHeck if the user is already connected, if so, redirect him to index.php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header('location: '.$lastPage.'');
    exit;
}
//If some data is received via POST to this page :
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["email"]))) {
        $email_err = "Merci d'entrer un nom d'utilisateur";
    } else {
        $email = trim($_POST["email"]);
    }
    if (empty(trim($_POST["password"]))) {
        $password_err = "Merci d'entrer un mot de passe.";
    } else {
        $password = trim($_POST["password"]);
    }
    //Check the last page
    if (empty(trim($_POST["lastPage"]))) {
        $lastPage = "index.php";
    } else {
        $lastPage = $_POST["lastPage"];
    }
    //Check if there is no actual error displayed before continue
    if (empty($email_err) && empty($password_err)) {
        //Set parameters with the email provided
        $pMail = trim($_POST["email"]);
        //Include SQL for this check
        include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/loginCheckMailSQL.php";
        //If there is 1 row (So, if an user with this email exists)
        if ($stmt->rowCount() == 1) {
            //Fetch the result, and take client ID, mail and passwd from database
            $row = $stmt->fetch();
            $id = $row["id"];
            $email = $row["mail"];
            $hashed_password = $row["pwd"];
            $check_password = hash("sha256", $password . "i;151-120#");
            //Compare the provided passwd hash with the one stored into database
            if ($check_password == $hashed_password) {
                //If password OK, check if Enabled. Include SQL for this check
                include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/loginCheckEnableSQL.php";
                foreach ($a2 as $ok) {
                    $idClientLogin = $ok["id_client"];
                    //If the account is disabled
                    if ($ok["active"] == "false") {
                        //Redirect to the page "disabledAccount"
                        header("location: mvc/view/disabledAccount.php");
                    } else {
                        //If the user is enabled, start the session
                        session_start();
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["idClient"] = $idClientLogin;
                        $_SESSION["email"] = $email;
                        //Update "last-ip" in the customer table in the DB. Include SQL for this update
                        include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/loginUpdateIPSQL.php";
                        //Now if the user checked the "Remember me" option
                        if (trim($_POST["rememberme"])) {
                            //Create a hash of the mail + ip address of the customer to create the remember me
                            $data = $email.$_SERVER['REMOTE_ADDR'];
                            $tmphash = hash('sha256', $data);
                            //Update the cookie
                            setcookie("keeplogin", $tmphash, time()+30*24*60*60);
                            //Update the database. Include SQL for this update
                            include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/loginRememberSQL.php";
                        }
                        //Then, when everything is OK, redirect to last page
                        if ($lastPage == "agkeeb") {
                          header('location: index.php');
                        } else {
                          header('location: '.$lastPage.'');
                        }
                    }}}}
    } else {
        // Error if the password is wrong
        $password_err = "Login incorrect, merci de réessayer.";
    }}
//Close PDO and exit all remaining SQL queries.
unset($stmt);
unset($pdo);
?>
