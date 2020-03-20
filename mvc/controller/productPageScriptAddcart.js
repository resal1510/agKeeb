function submitToCart() {
  // take parameters from the product
  var id = $(".productIdToAdd").val();
  var quantity = $(".cart-quantity").val();
  //Make url
  var url = "mvc/controller/addToCart.php?id=" + encodeURIComponent(id) + "&quantity=" + encodeURIComponent(quantity) + "&id_product=0";
  // Redirect to "addToCart" page w/ url
  window.location.href = url;
}
