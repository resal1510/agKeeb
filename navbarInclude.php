<?php

// Initialize the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    include 'navbar-normal.html';
} else {
  include 'navbar-logged.html';
}

 ?>
