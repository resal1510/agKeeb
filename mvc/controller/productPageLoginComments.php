<?php
// Check if user is logged, to show or not, the "add comment" button
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  print_r('<button class="btn btn-primary border-0 borderCustom AddComment" type="submit" style="background-color: rgb(113,195,255);">
          <i class="fa fa-comment"></i>
          Rédiger un commentaire
          </button>');
} else {
  print_r('Vous devez être connecté pour rédiger un commentaire.');
}
?>
