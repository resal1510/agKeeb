<?php
include "config.php";
include "checkRememberMe.php";
// Initialize the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    include 'mvc/view/navbar-normal.php';
} else {
  include 'mvc/view/navbar-logged.php';
}
?>
