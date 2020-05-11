$(document).ready(function() {
  //On click on a shipping address modal
  $(".shipAddr").on("click", function() {
    //Take the ID of the address and send it w/ ajax
    var tmpid = $(this).attr("id").replace(/\D/g, '');
    $.ajax({
      url: 'mvc/controller/fillSettingsModal.php',
      type: 'POST',
      dataType: 'json',
      data: {
        idAddresse: tmpid
      },
      //If success, take all data from db and set them into values of inputs
      success: function(data) {
        $('#titleAddressModif').html("Modifier mon adresse de livraison :");
        $('#editName').val(data.name);
        $('#editSurname').val(data.surname);
        $('#editAddr').val(data.address);
        $('#editNpa').val(data.npa);
        $('#editCity').val(data.city);
        $('#editPhone').val(data.phone);
        $('#idAddr').attr("value", tmpid);
        //Tricky stuff for checkbox
        if (data.default == 1) {
          $('#editDefault').prop('checked', true);
        } else {
          $('#editDefault').prop('checked', false);
        }
      }
    });
  });
  //On click on a payment address modal
  $(".payAddr").on("click", function() {
    //Take the ID of the address and send it w/ ajax
    var tmpid = $(this).attr("id").replace(/\D/g, '');
    $.ajax({
      url: 'mvc/controller/fillSettingsModal.php',
      type: 'POST',
      dataType: 'json',
      data: {
        idAddresse: tmpid
      },
      //If success, take all data from db and set them into values of inputs
      success: function(data) {
        $('#titleAddressModif').html("Modifier mon adresse de facturation :");
        $('#editName').val(data.name);
        $('#editSurname').val(data.surname);
        $('#editAddr').val(data.address);
        $('#editNpa').val(data.npa);
        $('#editCity').val(data.city);
        $('#editPhone').val(data.phone);
        $('#idAddr').attr("value", tmpid);
        //Tricky stuff for checkbox
        if (data.default == 1) {
          $('#editDefault').prop('checked', true);
        } else {
          $('#editDefault').prop('checked', false);
        }
      }
    });
  });

  //When we click on new ship address
  $("#startNewShip").on("click", function() {
    $('#newCat').attr("value", 1);
    $('#titleNewAddr').html('Ajouter une adresse de livraison :');
  });

  //When we click on new pay address
  $("#startNewPay").on("click", function() {
    $('#newCat').attr("value", 2);
    $('#titleNewAddr').html('Ajouter une adresse de paiement :');
  });

  //When we click the delete button on an address
  $("#deleteAddr").on("click", function() {
    var tmpid = $('#idAddr').val();
    var confirmDelete = confirm("Êtes-vous sûr de supprimer cette adresse ? \n(Cette action est irreversible !!)");
    var whatIs = "delAddr";
    if (confirmDelete) {
      $('#whatInput').val("delAddr");
      $('#editForm').submit();
    } else {
      alert("nok");
    }
  });

});
//Set checkbox value when checked or not
$('#editDefault').on("click", function() {
  $(this).val($(this).prop('checked'));
});
$('#shipDefault').on("click", function() {
  $(this).val($(this).prop('checked'));
});
