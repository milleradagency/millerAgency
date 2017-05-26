<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

  <div id="main" role="main">

  <?php if (have_posts()) : ?>

    <nav class="uk-container">
      <h1>Search Results</h1>
      <div><?php next_posts_link('&laquo; Older Entries') ?></div>
      <div><?php previous_posts_link('Newer Entries &raquo;') ?></div>
    </nav>

    <?php while (have_posts()) : the_post(); ?>

      <div class="uk-container">
        <article <?php post_class( "search-results" ) ?>>
          <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
          <?php   // POST TIME ?>
          <?php  // the_time('l, F jS, Y') ?>
          <?php // To add the POST TIME back into the theme, add the <time></time> before and after the PHP code ?>

          <?php // <footer> ?>
            <?php  // TAGS ?>
            <?php // the_tags('Tags: ', ', ', '<br />'); ?>
            <?php  // CATEGORIES ?>
            <?php // the_category(', ') ?>
            <?php  // EDIT LINK ?>
            <?php // edit_post_link('Edit', '', ' | '); ?>
            <?php  // COMMENTS ?>
            <?php // comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
          <?php // </footer> ?>
        </article>
      </div>

    <?php endwhile; ?>

    <nav class="uk-container">
      <div><?php next_posts_link('&laquo; Older Entries') ?></div>
      <div><?php previous_posts_link('Newer Entries &raquo;') ?></div>
    </nav>

  <?php else : ?>

    <div class="uk-container">
      <h2>No posts found. Try a different search?</h2>
      <?php get_search_form(); ?>
    </div>

  <?php endif; ?>

  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
