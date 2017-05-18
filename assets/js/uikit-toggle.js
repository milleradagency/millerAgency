$(document).ready(function() {
  // adds UIkit's uk-toggle HTML to buttons with the .uk-toggle class
  if ($("div").hasClass("uk-toggle")) {
    $(".uk-toggle > div > div > a").attr("uk-toggle", "");
  };
});
