var tempInt;
var numberProduct;
var arrayPrice = [];
//Update prices in real time while modifying the number of items
$(document).ready(function(){
  $(".quantity-input").on("input", function(){
    arrayPrice = [];
    var temp = '#'+this.id;
    var tempInt = temp.replace(/[^0-9]/gi, '');
    var newPriceTmp = "#price"+tempInt;
    var productPrice = "#ProductPrice"+tempInt;
    var productId = "#ProductID"+tempInt;

    var actualPrice = $(productPrice).val();
    var numberProduct = $(this).val();
    var newPrice = parseFloat(actualPrice) * parseFloat(numberProduct);
    newPrice = (Math.round(newPrice * 100) / 100).toFixed(2);

    //Dont let user write something below 1
    if (numberProduct >= 1) {
      $(newPriceTmp).text(newPrice);
    } else {
      $(this).val(1);
    }

    //Don't let the user write something greater than 99
    if (numberProduct > 99) {
      $(this).val(99);
    }

    //Can only write 0-9 characters. no letters or special characters
    var inputs = $(".priceProducts");
    for(var i = 0; i < inputs.length; i++){
        var tmpPrice = $(inputs[i]).text();
        tmpPrice = (Math.round(tmpPrice * 100) / 100).toFixed(2);
        arrayPrice.push(tmpPrice);
    }

    //Add all items that is in the shopping cart
    var sumTotal = arrayPrice.reduce(function(a, b){
        return parseFloat(a) + parseFloat(b);
    }, 0);

    //Set totals for shopping cart page
    $("#subtotal").text(parseFloat(sumTotal));
    $("#totaloftotal").text(parseFloat(sumTotal) + 8);

    //Update in real time the cart
    var realId = $(productId).val()
     $.ajax({
         type: 'POST',
         url: 'mvc/controller/modifyCart.php',
         data: { idItem: realId, newQuantity: numberProduct, action: "modify"},
         success: function(data) {
           console.log(data);
         }
     });
  });

  var inputs = $(".priceProducts");
  for(var i = 0; i < inputs.length; i++){
      var tmpPrice = $(inputs[i]).text();
      tmpPrice = (Math.round(tmpPrice * 100) / 100).toFixed(2);
      arrayPrice.push(tmpPrice);
  }

  var sumTotal = arrayPrice.reduce(function(a, b){
      return parseFloat(a) + parseFloat(b);
  }, 0);

  $("#subtotal").text(parseFloat(sumTotal));
  $("#totaloftotal").text(sumTotal + 8);
});

$(document).ready(function(){
  $(".clickDel").on("click", function(){
    if (confirm("Êtes-vous sûr de vouloir supprimer cet article du panier ?")) {
      var toDelete = this.id.replace(/[^0-9]/gi, '');
      $.ajax({
          type: 'POST',
          url: 'mvc/controller/modifyCart.php',
          data: { idToDelete: toDelete, action: "delete"},
          success: function(data) {
            console.log(data);
            if (data) {
              location.reload(true);
            }
          }
      });
    }
  });

  $("#goPayment").on("click", function(){
    // Redirect to "payment" page w/ url
    window.location.href = "payment.php";
  });
});
