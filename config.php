<?php
//Paramètres concernant la base de donnée SQL
define('DB_SERVER', 'pqqa.myd.infomaniak.com');
define('DB_USERNAME', 'pqqa_agkeebmgmt');
define('DB_PASSWORD', 'YWs-UmL4jSAh');
define('DB_NAME', 'pqqa_agkeeb');

// Test de connexion, voir si ça joue
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Configurer PDO pour qu'il affiche les erreurs d'exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  //Erreur si ça arrive pas a se connecter
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
