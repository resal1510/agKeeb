<?php
//Parameters for the SQL server and connection
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'pqqa_agkeebmgmt');
define('DB_PASSWORD', 'YWs-UmL4jSAh');
define('DB_NAME', 'pqqa_agkeeb');

// Connection test to see if it's working fine
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Configure PDO to let him display errors (Only for dev time)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  //Display the error when there is an error (lol)
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
