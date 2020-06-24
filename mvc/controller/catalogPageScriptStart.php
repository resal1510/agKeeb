<?php
session_start ();

$GLOBALS['$whatCategory'] = "";
$categoryListNumbers = ["Tous les articles", "Plaques", "Circuits imprimés", "Interrupteurs", "Touches", "Câbles", "Stabilisateurs", "Boîtiers", 'Recherche :'];

if (isset($_GET["cat"])) {
  $GLOBALS['$whatCategory'] = trim($_GET["cat"]);
} else {
  $GLOBALS['$whatCategory'] = 0;
}

if (isset($_GET["search"])) {
  $GLOBALS['$whatCategory'] = 8;
}
 ?>
