<?php /* Template Name: Miller Portfolio */ ?>

<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

 // TODO: MAKE THIS SHIT WORK....

get_header(); ?>

<div id="main" role="main" class="maa-portfolio">

  <?php // ---------------------- ?>
  <?php // PORTFOLIO LOOP
    $taxonomy = "work_categories";
    $terms = get_terms($taxonomy); // Get all terms of the portfolio taxonomy

    if ( $terms && !is_wp_error( $terms ) ) :
  ?>

  <?php // ---------------------- ?>
  <?php // BREADCRUMBS ?>
  <section class="uk-margin-bottom">
    <div class="uk-container uk-margin-small-bottom uk-margin-small-top">
      <ul class="uk-breadcrumb">
        <li class="item-home">
          <a class="bread-link bread-home" href="/" title="Home">
            Home
          </a>
        </li>
        <li class="item-current">
          <a class="bread-parent" title="Portfolio">
            Our Portfolio
          </a>
        </li>
      </ul>
    </div>
  </section>

  <?php // ---------------------- ?>
  <?php // PORTFOLIO GRID ?>
  <section class="uk-container">

    <ul>

      <?php foreach ( $terms as $term ) { ?>
        <li>
          <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
            <?php echo $term->name; ?>
            <?php

              $attr = array(
                'class' => 'uk-width-1-1',
              );

              if( has_post_thumbnail() ):
                  echo get_the_post_thumbnail($attr);
              endif;
            ?>
          </a>
        </li>
      <?php } ?>

    </ul>

    <?php endif;?>

  </section>

</div>

<?php get_footer(); ?>
