<?php
// Init session
session_start();
// Check if user is already logged, if yes, redirect him to index.php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

// include config file
require_once "config.php";

// Set and clean variables
$email = $password = $confirm_password = "";
$email_err = $password_err = $confirm_password_err = $captcha_err = "";
$customerCreatedDefault = "'false'";
$defaultAdresse = "'5'";
$isActive = "'true'";

// Data processing when the form is validated
if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty(trim($_POST["captcha"]))){
      $captcha_err = "Merci de remplir le captcha";
  } else {
    if ($_POST["captcha"] == $_SESSION['code']) {
      $captcha_err = "";
    } else {
        $captcha_err = "Captcha incorrect";
    }
  }

    // Validate mail address
    if(empty(trim($_POST["email"]))){
        $email_err = "Merci d'entrer .";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_client FROM Clients WHERE mail = :mail";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":mail", $param_email, PDO::PARAM_STR);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($captcha_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO Clients (mail, pwd, customerCreated, adresse_livraison, adresse_facturation, actif, derniere_ip) VALUES (:mail, :pwd, $customerCreatedDefault, $defaultAdresse, $defaultAdresse, $isActive, :lastip)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":mail", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":pwd", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":lastip", $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);

            // Set parameters
            $param_email = $email;
            $salt_password = "i;151-120#";
            $param_password = hash("sha256", $password . $salt_password);
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}
?>
