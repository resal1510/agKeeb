<?php
// Init session and include config
session_start();
// Set and clean variables
$email = $password = $confirm_password = $email_err = $password_err = $confirm_password_err = $captcha_err = $remember_cookie ="";
$customerCreatedDefault = 'false';
$defaultAdresse = 5;
$isActive = 'true';
// Check if user is already logged, if yes, redirect him to index.php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}
// Data processing when the form is validated, when a POST is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Check if captcha is correct and filled
  if (empty(trim($_POST["captcha"]))) {
    $captcha_err = "Merci de remplir le captcha";
  } else {
    if ($_POST["captcha"] == $_SESSION['code']) {
      $captcha_err = "";
    } else {
      $captcha_err = "Captcha incorrect";
    }}
  // Validate mail address
  if (empty(trim($_POST["email"]))) {
    $email_err = "Merci d'entrer le mail.";
  } else {
    // Check if the mail already exists or not. Include needed SQL
    include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/registerCheckMailSQL.php";
    if ($stmt->rowCount() == 1) {
      $email_err = "This email is already taken.";
    } else {
      $email = trim($_POST["email"]);
    }}
  // Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } elseif (strlen(trim($_POST["password"])) < 8) {
    $password_err = "Password must have at least 8 characters.";
  } else {
    $password = trim($_POST["password"]);
  }
  // Validate confirm password
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm password.";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "Password did not match.";
    }}
  // Check input errors before inserting in database
  if (empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($captcha_err)) {
    // Create the user with parameters. Include needed SQL
    include "/var/www/allanresin2.tk/html/agkeeb/mvc/model/registerCreateSQL.php";
    // Redirect to login page
    header("location: login.php");
  }}
  // Close statement and connection
  //unset($stmt);
  //unset($pdo);
?>
