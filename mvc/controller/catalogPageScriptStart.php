<?php
session_start ();

$whatCategory = "";
$categoryListNumbers = ["Tous les articles", "Plaques", "Circuits imprimés", "Interrupteurs", "Touches", "Câbles", "Stabilisateurs", "Boîtiers"];

if (isset($_GET["cat"])) {
  $whatCategory = trim($_GET["cat"]);
} else {
  $whatCategory = 0;
}
 ?>
