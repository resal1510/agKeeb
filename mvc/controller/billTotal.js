$(document).ready(function() {
  var sum = 8;
    $(".itemPriceT").each(function(){
        sum += +$(this).html();
    });
    $(".totalPrice").html(sum);
});
