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

  // transition in body, #main, and article on load
  // thanks to http://stackoverflow.com/a/10559176 for multiple .hasClass()
  // TODO: Add web and branding page-id-*
  var $body = $("body");
  if (
   // -> /services
   $body.hasClass("page-id-54826") ||
   // -> /services/media
   $body.hasClass("page-id-54828") ||
   // -> /services/web
   $body.hasClass("page-id-54830") ||
   // -> /services/branding
   $body.hasClass("page-id-54832") ||
   // -> /blog
   $body.hasClass("page-id-54751")) {
    $("body, section").velocity( fadeIn );
    $("section .elementor-widget-wrap").velocity( fadeIn, { stagger: 150, drag: true });
    $("article.elementor-post").velocity( fadeIn, { stagger: 300, drag: true, display: "flex" });
    $(".sidebar-sticky li").velocity( fadeIn, { stagger: 300, drag: true });
    $(".uk-breadcrumb li").velocity( slideDownIn, { stagger: 300, drag: true });
  } else {
    // $("body, #main, article").velocity( slideRightIn, { stagger: 200, drag: true });
    // $("section .elementor-widget-wrap").velocity( slideUpIn, { stagger: 150, drag: true });
    $("body, #main, article").velocity( fadeIn );
    $("section .elementor-widget-wrap").velocity( fadeIn, { stagger: 150, drag: true });
    $("#navbar").velocity( slideDownIn, { stagger: 100, drag: true });
    $("menu-main-menu li").velocity( slideDownIn, { stagger: 400, drag: true });
    $(".uk-breadcrumb li").velocity( slideDownIn, { stagger: 300, drag: true });
  };

  // transition on out
  // thanks to http://stackoverflow.com/a/38233311 for the correct .not() answer
  $("a[target!='_blank']").not("[href^='#']").on("click", function() {
    $("body, #main, article").velocity( slideDownOut, {
      stagger: 100,
      drag: false
    });
  });

  // specific transitions
  // stagger profile cards
  $(".maa-profile-card").velocity( slideUpIn, {
    stagger: 200,
    drag: true,
    delay: 100
  });

  // slide up mobile-navbar and <li> items
  $(".mobile-navbar").velocity( fadeIn );
  $(".mobile-navbar a").velocity( slideUpIn, {
    stagger: 100,
    drag: true,
  });

  // wrap mobile sidebar list anchor links in UIkit uk-toggle elements
  $("#offcanvas ul > li > a").wrap("<div uk-toggle='target: #offcanvas' style='padding:5px 0; position: relative; height:15px;'></div>");

  // delete header on homepage
  if($("body").hasClass("home")) {
    $("#main-header").remove();
  } else {
    null
  }

  // remove navbar header on pages that have full-width featured images
  // if ($(""))

  // class .velocity-out transition
  // $(".velocity-out").on("click", function() {
  //   $("body").velocity( slideLeftOut, {
  //     stagger: 100,
  //     drag: true });
  // });

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

  // team page event listeners
  // TODO: Create an employee array and simplify this code process
  // MichaelAngelo
  $("#MichaelAngelo").on("click", function() {
    if($("#MichaelAngelo-controls").hasClass("maa-profile-card-controls-open")) {
      $("#MichaelAngelo-controls").removeClass("maa-profile-card-controls-open");
    } else {
      $("#MichaelAngelo-controls").addClass("maa-profile-card-controls-open");
    }
  });

  // WilliamPansky
  $("#WilliamPansky").on("click", function() {
    if($("#WilliamPansky-controls").hasClass("maa-profile-card-controls-open")) {
      $("#WilliamPansky-controls").removeClass("maa-profile-card-controls-open");
    } else {
      $("#WilliamPansky-controls").addClass("maa-profile-card-controls-open");
    }
  });

  // if list has .uk-scrollspy, inject it with the required styles
  // if ($("div").hasClass("uk-scrollspy")) {
  //   // adds necessary classes
  //   $(".uk-scrollspy ul").addClass("uk-nav uk-nav-default tm-nav uk-nav-parent-icon");
  //
  //   // adds necessary html elements required by UIkit by menu type
  //   // targets and injects for the Services — Media menu
  //   if ($("ul").is("#menu-services-media")) {
  //     $(this).html( '<ul uk-scrollspy-nav="closest: li; scroll: true; offset: 100" id="menu-services-media" class="menu">' );
  //   };
  // };

  // <ul uk-scrollspy-nav="closest: li; scroll: true; offset: 100" class="uk-nav uk-nav-default tm-nav uk-nav-parent-icon">

  // add .uk-text-lead to first <p> tag inside article.post for blog posts
  // if ($("article").hasClass("uk-article")) {
  //     $("article p:first-of-type").addClass("uk-text-lead", function() {
  //       $("p").not($(this)).removeClass("uk-text-lead");
  //     });
  // } else {
  //   null
  // };

  // add class="uk-button uk-button-text" to navbar items
  // $(".uk-navbar-right a").addClass("uk-button");
  // $(".uk-navbar-right a").addClass("uk-button-text");


  // replace elementor default list styles on blog pages
  // TODO: Move script to ONLY the blog loop page
  if ($("article").hasClass("post")) {
    // adds UIkit heading bullet style to all widget <h5> items
    $(".elementor-widget-container h5").addClass("uk-heading-bullet");

    // adds UIkit list styles to category widget
    $(".elementor-widget-wp-widget-categories ul").addClass("uk-list");

    // adds UIkit list styles to archives widget
    $(".elementor-widget-wp-widget-archives ul").addClass("uk-list");

    // adds UIkit list styles to blog menu widget
    $(".elementor-widget-wp-widget-nav_menu ul").addClass("uk-list");
  } else {
    null
  };

  // add .uk-text-lead to first <p> tag inside article.post for blog posts
  // TODO: make this work?
  // TODO: Move script to ONLY single blog posts
  if ($("article").hasClass("type-post")) {
      $(".elementor").addClass("blog-post");
  } else {
    null
  };

  // toTop - Remove hash (#) from URL bar
  // TODO: Make this work, lol
  // $("a.uk-totop").click(function(event) {
  //   event.preventDefault();
  // });

  // anchor.js
  // https://www.bryanbraun.com/anchorjs
  // anchors.options = {
  //   visible: "always",
  //   icon: "#"
  // };
  // anchors.add(".anchored");

  // Inject Material Waves Effect
  // http://fian.my.id/Waves/
  // let materialButton = "a.elementor-button"
  // Waves.attach(materialButton, ["waves-button", "waves-float", "waves-light"]);
  // Waves.init();

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

});

// Prevent a#SECTION from being added to URL on click
// http://stackoverflow.com/a/20215413
// This literally prevents the selected element's default action, so
// use temporarily for development purposes
// $("a.elementor-button").click(function(event) {
//   event.preventDefault();
// });
// $("a.elementor-button").on("click", function() {
//   $(this).blur();
// });


// Prevent parent scroll when hitting the bottom of sidebar scroll
// http://stackoverflow.com/a/10514680
// http://jsbin.com/itajok/539/edit?html,css,js,output
// $(function() {
//   var sideNav = $(".side-nav"),
//     height = sideNav.height(),
//     scrollHeight = sideNav.get(0).scrollHeight;
//
//   sideNav.bind("mousewheel", function(e, d) {
//     if((this.scrollTop === (scrollHeight - height) && d < 0) || (this.scrollTop === 0 && d > 0)) {
//       e.preventDefault();
//     }
//   });
// });
