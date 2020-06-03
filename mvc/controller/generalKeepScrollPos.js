function keepScrollPos() {
  localStorage.setItem('my-scroll-pos', $(window).scrollTop());
}

$(document).ready(function() {
  var pos = localStorage.getItem('my-scroll-pos', 0);
  if (pos) {
    $(window).scrollTop(pos);
  }
  localStorage.removeItem('my-scroll-pos');
});
