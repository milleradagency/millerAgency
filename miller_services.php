<?php /* Template Name: Miller Services */ ?>

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
    <!-- <header class="uk-container-expand uk-margin-small-top" id="main-header">
    </header> -->

    <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

  </article>
  <?php endwhile; endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
