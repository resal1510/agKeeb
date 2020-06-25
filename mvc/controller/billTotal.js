$(document).ready(function() {
  var total = 0;
    $(".itemPriceT").each(function(){
        total += +$(this).html();
    });
    $(".totalPrice").html(total.toFixed(2));

    if (total > 100) {
      $("#expPriceBill").html(0);
    } else {
      $("#expPriceBill").html(8);
    }
});
