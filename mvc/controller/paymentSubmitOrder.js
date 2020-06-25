function submitOrder() {
  //Declare variables for all 2 addresses
  var addressTmp1; var addressTmp2; var addressShip; var addressPay; var totalPrice; var urlOption;

  //Take all data needed (Addresses selected IDs)
  addressTmp1 = $('div.addr1 > .border-custom-selected').attr("id");
  addressTmp2 = $('div.addr2 > .border-custom-selected').attr("id");
  addressShip = addressTmp1.replace(/\D/g,'');
  addressPay = addressTmp2.replace(/\D/g,'');

  //Take total price
  totalPrice = parseInt($('#totalPrice').html());

  //AJAX Call to the php file that create the final order into the db
  $.ajax({
        url: 'mvc/controller/createOrder.php',
        type: 'POST',
        data: {
            addressShip: addressShip,
            addressPay: addressPay,
            totalPrice: totalPrice
        },
        success: function(data) {
          var dataTmp = "OrderID:"+data;
          urlOption = btoa(dataTmp);
          window.location.replace("http://sandbox.allanresin.ch/agkeeb/confirmation.php?order="+urlOption);
        }
    });
}
