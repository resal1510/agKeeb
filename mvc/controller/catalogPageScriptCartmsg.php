<?php
if (isset($_GET['action'])) {
  $action = $_GET['action'];
} else {
  $action = "";
}

echo "<div class='col-md-12' style='margin-top: 72px;'>";
    if($action=='added'){
        echo "<div class='alert alert-info'>";
            echo "Le produit a été ajouté au panier!";
        echo "</div>";
    }

    if($action=='exists'){
        echo "<div class='alert alert-info'>";
            echo "Le produit existe déjà dans votre panier ! Pour modifier la quantité, merci de le faire sur la page Panier";
        echo "</div>";
    }
echo "</div>";
 ?>
