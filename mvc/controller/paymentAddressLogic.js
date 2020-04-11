//Set variables
var rawID_normal;
var rawID_selected;

//When we click on the address boxes
$(".customDivAddress").click(function(e) {
  //Is it has class "border-custom" (So, when the address is'nt selected)
  if ($(this).hasClass("border-custom")) {
    //Check if it has the class "addr2" to diferenciate the two addresses group (livraison / facturation)
    if (!$(this).hasClass('addr2')) {
      //If addr2 isn't here (So it's the first address group with parent "div.addr1")
      rawID_normal = $(this).attr("id");
      rawID_selected = $('div.addr1 > .border-custom-selected').attr('id');
      //Change se selected address into a non selected address
      $('div.addr1 > #' + rawID_selected).removeClass("border-custom-selected");
      $('div.addr1 > #' + rawID_selected).addClass("border-custom");
      //Change the non selected address into a selected address
      $('div.addr1 > #' + rawID_normal).removeClass("border-custom");
      $('div.addr1 > #' + rawID_normal).addClass("border-custom-selected");
    } else {
      //If addr2 is here (So it's the second address group with parent "div.addr2")
      rawID_normal = $(this).attr("id");
      rawID_selected = $('div.addr2 > .border-custom-selected').attr('id');
      //Change se selected address into a non selected address
      $('div.addr2 > #' + rawID_selected).removeClass("border-custom-selected");
      $('div.addr2 > #' + rawID_selected).addClass("border-custom");
      //Change the non selected address into a selected address
      $('div.addr2 > #' + rawID_normal).removeClass("border-custom");
      $('div.addr2 > #' + rawID_normal).addClass("border-custom-selected");
    }
  }
});

$('.customDivAddress').hover( function() {
    $(this).removeClass("shadow-drop-2-center-reverse")
    $(this).addClass("shadow-drop-2-center");
  }, function() {
    $(this).removeClass("shadow-drop-2-center")
    $(this).addClass("shadow-drop-2-center-reverse");
  } );
