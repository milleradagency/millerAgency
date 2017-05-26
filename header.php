<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php // The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags ?>

    <?php // ---------------------- ?>
    <?php // Document Title ?>
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <?php // ---------------------- ?>
    <?php // Mobile Meta ?>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <!-- COMPANY INFORMATION -->
    <meta name="url" content="<?php echo get_site_url(); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="keywords" content="the lunch, goodwill, dallas, 2017">
    <meta name="author" content="Miller Ad Agency">
    <meta name="copyright" content="Miller Ad Agency">
    <meta name="subject" content="Advertising Agency Website">
    <meta name="coverage" content="US">
    <!-- FRONT-END DEVELOPER -->
    <meta name="designer" content="William Pansky, williampansky.com">

    <?php // ---------------------- ?>
    <?php // HEADER ITEMS ?>
    <?php // Place favicon.ico and apple-touch-icon.png in the root directory ?>

    <?php // ---------------------- ?>
    <?php // versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/css/normalize.css") ?>
    <?php // versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/css/main.css") ?>

    <?php // ---------------------- ?>
    <?php // Wordpress Templates require a style.css in theme root directory ?>
    <?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."style.css") ?>

    <?php // ---------------------- ?>
    <?php // Modernizr ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <?php // ---------------------- ?>
    <?php // Wordpress <head> items ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php // ---------------------- ?>
    <?php // Highlight.js Stylesheet ?>
    <link rel="stylesheet" href="/wp-content/themes/millerAgency/assets/css/atom-one-dark.css">

    <?php // ---------------------- ?>
    <?php // Adobe TypeKit ?>
    <script src="https://use.typekit.net/qak6syp.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

    <?php // ---------------------- ?>
    <?php // Plugin <head> stylesheets ?>
    <?php wp_head(); ?>

    <link rel="stylesheet" href="/wp-content/themes/millerAgency/assets/css/main.css">

</head>
<body <?php body_class(); ?>>
  <!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
  <![endif]-->

  <?php // ---------------------- ?>
  <?php // WRAPPER ?>
  <div id="container" class="uk-offcanvas-content">
    <div id="toTop"></div>

    <?php // ---------------------- ?>
    <?php // NAVBAR (STATIC) ?>
    <?php // https://github.com/uikit/uikit/issues/1952 ?>
    <nav id="navbar" style="opacity:0;">
      <div class="uk-container uk-margin-remove-top uk-margin-remove-bottom uk-navbar-container uk-navbar-transparent" uk-navbar>
        <div class="uk-navbar-left">
          <a href="<?php echo get_option('home'); ?>/" class="uk-logo">
            <img src="<?php echo get_site_url(); ?>/wp-content/themes/millerAgency/assets/images/miller/miller-icon.svg" alt="<?php bloginfo('name'); ?>">
            <span class="uk-padding-smaller">Miller Ad Agency</span>
          </a>
        </div>
        <div class="uk-navbar-right">
            <?php $menu_args = array(
              'theme_location'    => 'main',
              'container'         => 'ul',
              'container_class'   => '',
              'container_id'      => '',
              'menu_class'        => 'uk-navbar-nav uk-visible@m',
              'menu_id'           => '',
              'echo'              => true,
              'depth'             => 0,
            );
            wp_nav_menu( $menu_args );?>
          <a uk-navbar-toggle-icon="" href="#offcanvas" uk-toggle="target: #offcanvas" class="uk-navbar-toggle uk-hidden@m uk-navbar-toggle-icon uk-icon"></a>
        </div>
      </div>
    </nav>

    <?php // ---------------------- ?>
    <?php // NAVBAR (STICKY) ?>
    <?php
      // TODO: Figure out how to clone the normal navbar above (#navbar) and
      // use those elements for this feature — goal is to cut down on redundancy
    ?>
    <nav class="mini-navbar" id="navbar-fixed-top">
      <div class="uk-container uk-navbar-container uk-navbar-transparent" uk-navbar>
        <div class="uk-navbar-left">
          <a href="<?php echo get_option('home'); ?>/" class="uk-navbar-item uk-logo">
            <span><?php bloginfo('name'); ?></span>
          </a>
        </div>
        <div class="uk-navbar-right">
            <?php $menu_args = array(
              'theme_location'    => 'main',
              'container'         => 'ul',
              'container_class'   => '',
              'container_id'      => '',
              'menu_class'        => 'uk-navbar-nav uk-visible@m',
              'menu_id'           => '',
              'echo'              => true,
              'depth'             => 0,
            );
            wp_nav_menu( $menu_args );?>
          <a uk-navbar-toggle-icon="" href="#offcanvas" uk-toggle="target: #offcanvas" class="uk-navbar-toggle uk-hidden@m uk-navbar-toggle-icon uk-icon"></a>
        </div>
      </div>
    </nav>

    <?php // ---------------------- ?>
    <?php // NAVBAR (MOBILE) ?>
    <nav class="mobile-navbar uk-hidden@m" id="navbar-fixed-bottom" style="display:none;">
      <div class="uk-margin-remove uk-padding-remove uk-navbar-transparent uk-flex-around uk-flex-bottom" uk-navbar>
        <a href="tel:9722432211" class="uk-icon uk-flex-center uk-text-center uk-padding-small">
          <i class="fa fa-phone" aria-hidden="true"></i><br />
          <span class="uk-text-smaller uk-text-uppercase">Call</span>
        </a>
        <a href="/services" class="uk-icon uk-flex-center uk-text-center uk-padding-small">
          <i class="fa fa-briefcase" aria-hidden="true"></i><br />
          <span class="uk-text-smaller uk-text-uppercase">Services</span>
        </a>
        <a href="/about-miller-ad-agency" class="uk-icon uk-flex-center uk-text-center uk-padding-small">
          <i class="fa fa-users" aria-hidden="true"></i><br />
          <span class="uk-text-smaller uk-text-uppercase">About</span>
        </a>
        <a href="#offcanvas" uk-toggle id="mobileOffCanvas" class="uk-icon uk-flex-center uk-text-center uk-padding-small maa-mobile-toggle">
          <i class="fa fa-bars" aria-hidden="true"></i><br />
          <span class="uk-text-smaller uk-text-uppercase">Menu</span>
        </a>
      </div>
    </nav>

    <?php // ---------------------- ?>
    <?php // SITE CONTENT ?>
