// ==============================================================
//
// # global variables
//
// ==============================================================
const fadeIn        = "transition.fadeIn";
const fadeOut       = "transition.fadeOut";
const slideUpIn     = "transition.slideUpIn";
const slideUpOut    = "transition.slideUpOut";
const slideDownIn   = "transition.slideDownIn";
const slideDownOut  = "transition.slideDownOut";
const slideRightIn  = "transition.slideRightIn";
const slideRightOut = "transition.slideRightOut";
const slideLeftIn   = "transition.slideLeftIn";
const slideLeftOut  = "transition.slideLeftOut";




// ==============================================================
//
// # document.ready()
//
// ==============================================================
$(document).ready(function() {

  // transition in on load
  // thanks to http://stackoverflow.com/a/10559176 for multiple .hasClass()
  // TODO: Add web and branding page-id-*
  // $("body").velocity( fadeIn );
  $("#navbar").velocity( slideDownIn );

  // slide up mobile-navbar and <li> items
  $(".mobile-navbar").velocity( slideUpIn );
  $(".mobile-navbar a").velocity( slideUpIn, {
    stagger: 100,
    drag: false,
  });

}); // end document.ready();




// ==============================================================
//
// # delete header on homepage
//
// ==============================================================
if($("body").hasClass("home")) {
  $("#main-header").remove();
} else {
  null
}



// ==============================================================
//
// # if sidebar-sticky has class .sidebar-sticky
// then inject UIkit uk-nav styles
//
// ==============================================================
if ($("div").hasClass("sidebar-sticky")) {
  $("ul.menu").addClass("uk-nav uk-nav-default");
};



// ==============================================================
//
// # lazy load youtube embed videos
// webdesign.tutsplus.com/tutorials/how-to-lazy-load-embedded-youtube-videos--cms-26743
//
// ==============================================================
(function() {
  var youtube = document.querySelectorAll( ".youtube" );
  for (var i = 0; i < youtube.length; i++) {
    var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/sddefault.jpg";
    var image = new Image();
      image.src = source;
      image.addEventListener( "load", function() {
        youtube[ i ].appendChild( image );
      }( i ) );
      youtube[i].addEventListener( "click", function() {
        var iframe = document.createElement( "iframe" );
          iframe.setAttribute( "frameborder", "0" );
          iframe.setAttribute( "allowfullscreen", "" );
          iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );
          this.innerHTML = "";
          this.appendChild( iframe );
        } );
  };
} )();




// ==============================================================
//
// # replace elementor default list styles on blog pages
// TODO: Move script to ONLY the blog loop page
//
// ==============================================================
if ($("article").hasClass("post")) {
  // adds UIkit heading bullet style to all widget <h5> items
  // $(".elementor-widget-container h5").addClass("uk-heading-bullet");
  // adds UIkit list styles to category widget
  $(".elementor-widget-wp-widget-categories ul").addClass("uk-list");
  // adds UIkit list styles to archives widget
  $(".elementor-widget-wp-widget-archives ul").addClass("uk-list");
  // adds UIkit list styles to blog menu widget
  $(".elementor-widget-wp-widget-nav_menu ul").addClass("uk-list");
} else {
  null
};




// ==============================================================
//
// # maa-video-overlay
// removeClass on click to get rid of :before and :after css props
//
// ==============================================================
$("#millerVideo30").on("click", function() {
  $(this).removeClass("maa-video-overlay");
});




// ==============================================================
//
// # mobile bottom navbar icon swap
//
// ==============================================================
$(".maa-mobile-toggle").on("click", function() {
  $("#mobileOffCanvas > i").toggleClass("fa-bars fa-times");
});




// ==============================================================
//
// # slide in mini-navbar after scrolling for 100vh
// http://stackoverflow.com/a/26729887
//
// ==============================================================
jQuery(function($) {
  var miniNav = $("#navbar-fixed-top");
  var $win = $(window);
  var winH = $win.height(); // Get the window height.

  $win.on("scroll", function () {
    if ($(this).scrollTop() > winH ) {
        miniNav.addClass("mini-navbar-visible");
    } else {
        miniNav.removeClass("mini-navbar-visible");
    }
  }).on("resize", function(){ // If the user resizes the window
    winH = $(this).height(); // you'll need the new height value
  });
});




// ==============================================================
//
// # slide in toTop button after scrolling for 100vh
// http://stackoverflow.com/a/26729887
//
// ==============================================================
jQuery(function($) {
  var top = $("#toTopBtn");
  var $win = $(window);
  var winH = $win.height(); // Get the window height.

  $win.on("scroll", function () {
    if ($(this).scrollTop() > winH ) {
        top.addClass("toTopBtn-visible");
    } else {
        top.removeClass("toTopBtn-visible");
    }
  }).on("resize", function(){ // If the user resizes the window
    winH = $(this).height(); // you'll need the new height value
  });
});




// ==============================================================
//
// # stops scroll from jumping back to stop
//
// ==============================================================
$('a.sidebar-sticky-scroll').on('click', function(e){
  return false;
});




// ==============================================================
//
// # PAGE => SERVICES
// Specific code for the fullscreen accordion effect
//
// ==============================================================
$(".maa-services-accordion").on('click', '.maa-services-accordion-item', function() {
  let $content    = $(this).find('.maa-services-accordion-content');
  // var $inner      = $(this).find('.maa-services-accordion-content-inner').children();
  let $inner      = $(this).find('.maa-services-accordion-content-inner');
  let $header     = $(this).find('i');
  let fadeIn      = "transition.fadeIn";
  let fadeOut     = "transition.fadeOut";

  if ($content.is(':hidden')) {
    $content.velocity('slideDown', { duration: 600 });
    $inner.velocity('fadeIn', { stagger: 1000, duration: 2000 });
    $header.toggleClass("fa-plus-circle fa-minus-circle");
  }
  else {
    $content.velocity('slideUp', { duration: 200 });
    $inner.css('opacity', '0');
    $header.toggleClass("fa-plus-circle fa-minus-circle");
  }
});
