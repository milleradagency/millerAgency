<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="main" role="main" class="uk-margin-large-bottom">

  <section class="elementor-section uk-margin-small-bottom uk-margin-small-top uk-text-truncate">
    <?php custom_breadcrumbs(); ?>
  </section>

  <div class="uk-container uk-text-center">
    <summary><h1 class="heading-hero">Uh, oh!</h1></summary>
    <h2 class="uk-text-lead">The page you're looking for has vanished...</h2>
    <h3><span frown>:(</span></h3>
    <p>Wanna go <a href="<?php echo get_site_url(); ?>">home?</a></p>
  </div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
