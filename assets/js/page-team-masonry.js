$(document).ready(function() {

  // masonry script initialize for /team page
  // https://github.com/desandro/masonry
  if($("section").hasClass("maa-profile-grid")) {
    $(".maa-profile-grid").masonry({
      // options...
      itemSelector: ".elementor-col-33",
      columnWidth: 0
    });
  };

});
