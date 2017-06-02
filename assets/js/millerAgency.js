$(document).ready(function() {

  let fadeIn        = "transition.fadeIn";
  let fadeOut       = "transition.fadeOut";
  let slideUpIn     = "transition.slideUpIn";
  let slideUpOut    = "transition.slideUpOut";
  let slideDownIn   = "transition.slideDownIn";
  let slideDownOut  = "transition.slideDownOut";
  let slideRightIn  = "transition.slideRightIn";
  let slideRightOut = "transition.slideRightOut";
  let slideLeftIn   = "transition.slideLeftIn";
  let slideLeftOut  = "transition.slideLeftOut";

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

  // delete header on homepage
  if($("body").hasClass("home")) {
    $("#main-header").remove();
  } else {
    null
  }

  // if sidebar-sticky has class .sidebar-sticky then inject UIkit uk-nav styles
  if ($("div").hasClass("sidebar-sticky")) {
    $("ul.menu").addClass("uk-nav uk-nav-default");
  };

  // lazy load youtube embed videos
  // https://webdesign.tutsplus.com/tutorials/how-to-lazy-load-embedded-youtube-videos--cms-26743
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

  // replace elementor default list styles on blog pages
  // TODO: Move script to ONLY the blog loop page
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

  // add .blog-post to blog posts
  // if ($("article").hasClass("uk-article")) {
  //   $(".elementor").addClass("blog-post");
  // } else {
  //   null
  // };

}); // end document.ready();

// transition on out
// thanks to http://stackoverflow.com/a/38233311 for the correct .not() answer
// $("a[target!='_blank']").not("[href^='#']").on("click", function() {
//   $("body, #main, article").velocity( slideDownOut, {
//     stagger: 100,
//     drag: false
//   });
// });

// wrap mobile sidebar list anchor links in UIkit uk-toggle elements
// $(function() {
//   $("#offcanvas ul > li > a").wrap("<div uk-toggle='target: #offcanvas' style='padding:5px 0; position: relative; height:15px;'></div>");
// });

// mobile bottom navbar icon swap
$(".maa-mobile-toggle").on("click", function() {
  $("#mobileOffCanvas > i").toggleClass("fa-bars fa-times");
});

// slide in mini-navbar after scroll for 100vh
// http://stackoverflow.com/a/26729887
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


// ---------
// stops scroll from jumping back to stop
$('a.sidebar-sticky-scroll').on('click', function(e){
  return false;
});
