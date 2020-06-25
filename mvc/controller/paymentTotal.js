$(document).ready(function() {
  //Calculate the sum of all listed items price
  var sumItems = 0;
  $('.itemPrice').each(function() {
    sumItems += parseFloat($(this).html());
  });

  if (parseFloat(sumItems) > 100) {
    $("#expPrice").html(0);
  }
  //Price of the shipping taxes
  var expPrice = $("#expPrice").html();
  //Make sure all are int to be able to do the sum correctly
  var total = parseFloat(expPrice) + parseFloat(sumItems);
  //Display the total into the total span
  $("#totalPrice").text(total.toFixed(2));
});
