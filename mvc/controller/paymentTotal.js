$(document).ready(function() {
  //Price of the shipping taxes
  var expPrice = $("#expPrice").html();
  //Calculate the sum of all listed items price
  var sumItems = 0;
  $('.itemPrice').each(function() {
    sumItems += parseFloat($(this).html());
  });
  //Make sure all are int to be able to do the sum correctly
  var total = parseFloat(expPrice) + parseFloat(sumItems);
  //Display the total into the total span
  $("#totalPrice").text(total);
});
