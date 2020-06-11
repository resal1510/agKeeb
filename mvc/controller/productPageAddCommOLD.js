$(".rStars").on("click", function() {
  switch ($(this).attr('id')) {
    case 'rStars1':
    $('#rStars1').attr("src", "img/star.svg");
    $('#rStars2').attr("src", "img/star-empty.svg");
    $('#rStars3').attr("src", "img/star-empty.svg");
    $('#rStars4').attr("src", "img/star-empty.svg");
    $('#rStars5').attr("src", "img/star-empty.svg");
    $('#rTotStars').val('1');
      break;
    case 'rStars2':
    $('#rStars1').attr("src", "img/star.svg");
    $('#rStars2').attr("src", "img/star.svg");
    $('#rStars3').attr("src", "img/star-empty.svg");
    $('#rStars4').attr("src", "img/star-empty.svg");
    $('#rStars5').attr("src", "img/star-empty.svg");
    $('#rTotStars').val('2');
      break;
    case 'rStars3':
    $('#rStars1').attr("src", "img/star.svg");
    $('#rStars2').attr("src", "img/star.svg");
    $('#rStars3').attr("src", "img/star.svg");
    $('#rStars4').attr("src", "img/star-empty.svg");
    $('#rStars5').attr("src", "img/star-empty.svg");
    $('#rTotStars').val('3');
      break;
    case 'rStars4':
    $('#rStars1').attr("src", "img/star.svg");
    $('#rStars2').attr("src", "img/star.svg");
    $('#rStars3').attr("src", "img/star.svg");
    $('#rStars4').attr("src", "img/star.svg");
    $('#rStars5').attr("src", "img/star-empty.svg");
    $('#rTotStars').val('4');
      break;
    case 'rStars5':
    $('#rStars1').attr("src", "img/star.svg");
    $('#rStars2').attr("src", "img/star.svg");
    $('#rStars3').attr("src", "img/star.svg");
    $('#rStars4').attr("src", "img/star.svg");
    $('#rStars5').attr("src", "img/star.svg");
    $('#rTotStars').val('5');
      break;
    default:
  }
});

$("#reviewSubmit").click(function() {
  //Set error var
  var nErr; var sErr; var cErr;
  //Get all values to check them later
  var name = $('#nameComment').val();
  var stars = $('#rTotStars').val();
  var comment = $('#commentComment').val();
  var idItem = $('#idItemComment').val();
  var idCust = $('#idCustComment').val();
  //Check if everything is ok before submitting
  if (name == "") {
    $('#nameErr').html("Merci d'entrer un pseudo.");
    nErr = 1;
  }
  if (stars == 0) {
    $('#starsErr').html("Merci de mettre au minimum 1 étoile.");
    sErr = 1;
  }
  if (comment.length < 20) {
    $('#commErr').html("Merci d'entrer au minimum 20 caractères.");
    cErr = 1;
  }
  //If there is an error, do nothing
  if (nErr || sErr || cErr) {
    console.log("Not ready to submit");
  } else {
    //If no errors, submit
    $.ajax({
      url: 'mvc/controller/productPageAddComment.php',
      type: 'POST',
      dataType: 'json',
      data: {
        nameComment: name, starsComment: stars, commentComment: comment, idItemComment: idItem, idCustComment: idCust
      },
    });
    animLoadComm();
    setTimeout(function(){
      location.reload();
    }, 1500);
    animation.destroy()
  }
});

function animLoadComm() {
  var animation = bodymovin.loadAnimation({
  container: document.getElementById('loadingAnim'), // Required
  path: 'assets/jsonAnim/loading.json', // Required
  renderer: 'svg', // Required
  loop: true, // Optional
  autoplay: true, // Optional
  name: "loading", // Name for future reference. Optional.
})
}
