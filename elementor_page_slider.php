<?php /* Template Name: Elementor: Slider */ ?>

<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="main" role="main" class="uk-margin-large-bottom">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="elementor-section uk-margin-small-bottom uk-margin-small-top uk-text-truncate">
      <?php custom_breadcrumbs(); ?>
    </section>
    <article class="post" id="post-<?php the_ID(); ?>">
      <header class="uk-container-expand" id="main-header">

        <!-- Featured Images -->
        <div class="uk-width-1-1 hero-image uk-margin-small-bottom">
          <?php

            $attr = array(
              'class' => 'uk-width-1-1',
            );

            if( has_post_thumbnail() ):
                echo the_post_thumbnail($attr);
            endif;
          ?>
        </div>
      </header>

    <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

  </article>
  <?php endwhile; endif; ?>

  <?php comments_template(); ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
