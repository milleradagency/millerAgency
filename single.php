<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="main" role="main" class="uk-margin-large-bottom">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <article <?php post_class( "uk-article" ) ?> id="post-<?php the_ID(); ?>">

    <header class="blog-post-header uk-margin-bottom">
      <div class="blog-post">
        <h1 class="blog-post-title uk-heading-primary uk-margin-bottom"><?php the_title(); ?></a></h1>
        <p class="uk-article-meta blog-post-info">
          Written by <span class="blog-author"><?php // the_author() ?><?php the_author_posts_link(); ?></span>
          on <time datetime="<?php the_time('Y-m-d')?>"><?php the_time('l, F jS, Y') ?></time>.
          <!-- at <time><?php the_time() ?></time> -->
          <!-- and posted in <?php the_category(', ') ?> -->
        </p>
      </div>
    </header>

    <section class="elementor-section uk-margin-bottom blog-breadcrumbs uk-text-truncate">
      <ul class="uk-breadcrumb">
        <li class="item-home">
          <a class="bread-link bread-home velocity-out" href="/" title="Home">
            Home
          </a>
        </li>
        <li class="item-parent">
          <a class="bread-parent velocity-out" href="/about-miller-ad-agency" title="Who We Are">
            Who We Are
          </a>
        </li>
        <li class="item-parent">
          <a class="bread-parent velocity-out" href="/about-miller-ad-agency/blog" title="Blog">
            Blog
          </a>
        </li>
        <li class="item-current uk-text-truncate">
          <span title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></span>
        </li>
      </ul>
    </section>

    <!-- <section class="uk-container"> -->
      <!-- Featured Images -->
      <!-- <div class="uk-width-1-1 blog-post-image uk-margin-small-bottom"> -->
        <!-- <?php

          $attr = array(
            'class' => 'uk-width-1-1',
          );

          if( has_post_thumbnail() ):
              echo the_post_thumbnail($attr);
          endif;
        ?> -->
      <!-- </div> -->
    <!-- </section> -->

    <?php the_content('Read the rest of this entry &raquo;'); ?>
    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

    <footer class="blog-post">

      <div class="blog-post uk-flex uk-flex-center uk-text-center">
        <p class="uk-article-meta blog-post-tags"><?php the_tags(); ?></p>
      </div>

      <nav class="blog-post">
        <ul class="blog-post-pagination uk-flex-center uk-flex-between@m uk-text-center uk-pagination">
          <li><span class="uk-pagination-previous"><?php previous_post_link('&laquo; %link') ?></span></li>
          <li><span class="uk-pagination-previous"><?php next_post_link('%link &raquo;') ?></span></li>
        </ul>
      </nav>

    </footer>

    <?php comments_template(); ?>

  </article>

<?php endwhile; else: ?>

  <p class="uk-container elementor-section">Sorry, no posts matched your criteria.</p>

<?php endif; ?>

</div>

<?php get_footer(); ?>
