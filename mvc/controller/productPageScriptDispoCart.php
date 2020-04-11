<?php
$inputIdHidden = '<input type="text" value="'.$idAsked.'" class="productIdToAdd" hidden>';
echo $inputIdHidden;

$buttonAddCart = '<input class="cart-quantity border rounded col-2" type="number" style="height: 44px;margin-right: 10px;min-width: 73px;" value="1" min="1">
                    <button type="submit" class="add-to-cart btn btn-primary shadow-sm border-0" style="background-color: #71c3ff;margin-bottom: 3px;"><i class="fas fa-shopping-cart" style="margin-right:10px;"></i>Ajouter au panier</button>';
$messageNotAvailable = "This item is no longer available.";

if ($pEnabled == "true") {
echo $buttonAddCart;
} else {
echo $messageNotAvailable;
}
?>

<!-- <i class="fas fa-shopping-cart" style="margin-right:10px;">

<input class="add-to-cart btn btn-primary shadow-sm border-0" type="submit" value="Ajouter au panier" style="background-color: #71c3ff;margin-bottom: 3px;">-->
