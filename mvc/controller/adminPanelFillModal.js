//To fill items modal
$(".Item").on("click", function() {
  //Take the ID of the address and send it w/ ajax
  var tmpid = $(this).attr("id").replace(/\D/g,'');

  $.ajax({
    url: 'mvc/controller/adminPanelFillItems.php',
    type: 'POST',
    dataType: 'json',
    data: {
      idItem: tmpid
    },
    //If success, take all data from db and set them into values of inputs
    success: function(data) {
      var imgHtml = '<img src="uploads/'+data.image+'" alt="" style="width: 200px; height: 200px">';
      $('#itemIDTitle').html(data.id);
      $('#itemID').val(data.id);
      $('#itemID1').val(data.id);
      $('#itemName').val(data.name);
      $('#itemCategory').val(data.cat);
      $('#itemImage').html(imgHtml);
      $('#itemDescription').val(data.desc);
      $('#itemPrice').val(data.price);
      $('#itemStock').val(data.stock);
      $('#itemRating').html(data.stars);
      $('#itemState').val(data.state);


    }
  });
});

//To fill user accounts modal
$(".Account").on("click", function() {
  //Take the ID of the address and send it w/ ajax
  var tmpid = $(this).attr("id").replace(/\D/g,'');
  $.ajax({
    url: 'mvc/controller/adminPanelFillAccounts.php',
    type: 'POST',
    dataType: 'json',
    data: {
      idItem: tmpid
    },
    //If success, take all data from db and set them into values of inputs
    success: function(data) {
      $('#customerIdTitle').html(data.id);
      $('#idAccount').val(data.id);
      $('#mailAccount').val(data.mail);
      $('#adminAccount').val(data.admin);
      $('#stateAccount').val(data.active);
      $('#ipAccount').val(data.ip);
    }
  });
});

//To fill orders modal
$(".Order").on("click", function() {
  //Take the ID of the address and send it w/ ajax
  var tmpid = $(this).attr("id").replace(/\D/g,'');
  $.ajax({
    url: 'mvc/controller/adminPanelFillOrders.php',
    type: 'POST',
    dataType: 'json',
    data: {
      idItem: tmpid
    },
    //If success, take all data from db and set them into values of inputs
    success: function(data) {
      $('#orderIdTitle').html(data.id);
      $('#idOrder').val(data.id);
      $('#accountOrder').val(data.customer);
      $('#dateOrder').val(data.date);
      $('#priceOrder').val(data.price);
      $('#stateOrder').val(data.state);
      $('#ordersFillContent').html(data.content);
    }
  });
});

//To fill comments modal
$(".Comment").on("click", function() {
  //Take the ID of the address and send it w/ ajax
  var tmpid = $(this).attr("id").replace(/\D/g,'');
  $.ajax({
    url: 'mvc/controller/adminPanelFillComments.php',
    type: 'POST',
    dataType: 'json',
    data: {
      idItem: tmpid
    },
    //If success, take all data from db and set them into values of inputs
    success: function(data) {
      $('#noteIdTitle').html(data.id);
      $('#idComment').val(data.id);
      $('#itemComment').val(data.article);
      $('#noteComment').html(data.note);
      $('#commentComment').val(data.comm);
      $('#accountComment').val(data.customer);
      $('#dateComment').val(data.date);
      $('#stateComment').val(data.visible);
    }
  });
});
