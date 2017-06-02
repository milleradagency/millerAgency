<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="main" role="main" class="maa-author">

  <?php // AUTHOR LOOP
    global $wp_query;
    $curauth = $wp_query->get_queried_object();
  ?>

  <?php // AUTHOR PROFILE COVER PHOTO
    $image = wp_get_attachment_image_src($curauth->profile_cover_photo);
  ?>

  <section class="elementor-section uk-margin-small-bottom uk-margin-small-top uk-text-truncate">
    <ul class="uk-breadcrumb uk-container">
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
        <a class="bread-parent velocity-out" href="/about-miller-ad-agency/team" title="Team Miller">
          Team Miller
        </a>
      </li>
      <li class="item-current uk-text-truncate">
        <span title="<?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?>"><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></span>
      </li>
    </ul>
  </section>

  <section class="uk-margin-bottom">
    <?php // echo wp_get_attachment_image($curauth->profile_cover_photo, array( "class" => "maa-profile-cover-image" ) );  ?>
    <div class="uk-cover-container maa-profile-cover-photo">
      <img src="<?php echo $image[0] ?>" alt="<?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?>'s Profile Cover Photo" uk-cover>
    </div>
    <div class="uk-text-center maa-profile-image">
      <img class="uk-border-circle uk-text-center" src="<?php echo get_wp_user_avatar_src($user_id, 'original'); ?>">
      <h1 class="uk-article-title uk-margin-remove-bottom uk-margin-small-top"><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h1>
      <h2 class="uk-text-small uk-text-uppercase uk-margin-remove"><?php echo $curauth->employee_title; ?></h2>
    </div>
  </section>

  <?php if ( !empty( $curauth->facebook ) ) { echo "<section class='uk-margin-bottom uk-container'>"; } ?>
    <?php if ( !empty( $curauth->facebook ) ) { echo "<ul class='uk-iconnav uk-text-center uk-flex-between uk-flex-center@m'>"; } ?>

      <?php if ( !empty( $curauth->facebook ) ) { echo "<li>". "<a href='https://facebook.com/$curauth->facebook' alt='Facebook' target='_blank' class='uk-padding-smaller maa-social-icon' uk-icon='icon: facebook' title='Facebook' uk-tooltip></a>" ."</li>"; } ?>

      <?php if ( !empty( $curauth->github ) ) { echo "<li>". "<a href='https://github.com/$curauth->github' alt='GitHub' target='_blank' class='uk-padding-smaller maa-social-icon' uk-icon='icon: github' title='GitHub' uk-tooltip></a>" ."</li>"; } ?>

      <?php if ( !empty( $curauth->instagram ) ) { echo "<li>". "<a href='https://instagram.com/$curauth->instagram' alt='Instagram' target='_blank' class='uk-padding-smaller maa-social-icon' uk-icon='icon: instagram' title='Instagram' uk-tooltip></a>" ."</li>"; } ?>

      <?php if ( !empty( $curauth->linkedin ) ) { echo "<li>". "<a href='https://linkedin.com/in/$curauth->linkedin' alt='LinkedIn' target='_blank' class='uk-padding-smaller maa-social-icon' uk-icon='icon: linkedin' title='LinkedIn' uk-tooltip></a>" ."</li>"; } ?>

      <?php if ( !empty( $curauth->pinterest ) ) { echo "<li>". "<a href='https://pinterest.com/$curauth->pinterest' alt='Pinterest' target='_blank' class='uk-padding-smaller maa-social-icon' uk-icon='icon: pinterest' title='Pinterest' uk-tooltip></a>" ."</li>"; } ?>

      <?php if ( !empty( $curauth->twitter ) ) { echo "<li>". "<a href='https://twitter.com/$curauth->twitter' alt='Twitter' target='_blank' class='uk-padding-smaller maa-social-icon' uk-icon='icon: twitter' title='Twitter' uk-tooltip></a>" ."</li>"; } ?>

    <?php if ( !empty( $curauth->facebook ) ) { echo "</ul>"; } ?>
  <?php if ( !empty( $curauth->facebook ) ) { echo "</section>"; } ?>

  <?php if ( !empty( $curauth->description ) ) { echo "<section class='uk-container uk-margin-large-bottom'>"; } ?>
    <?php if ( !empty( $curauth->description ) ) { echo "<p class='maa-author-bio'>". $curauth->description ."</p>"; } ?>
  <?php if ( !empty( $curauth->description ) ) { echo "</section>"; } ?>

  <?php if ( !empty( $curauth->accomplishment01 ) ) { echo "<section class='uk-container uk-margin-large-bottom'>"; } ?>
    <?php if ( !empty( $curauth->accomplishment01 ) ) { echo "<div uk-grid class='uk-child-width-1-1'>"; } ?>
      <?php if ( !empty( $curauth->accomplishment01 ) ) { echo "<div>"; } ?>
        <?php if ( !empty( $curauth->accomplishment01 ) ) { echo "<h2>". Accomplishments ."</h2>"; } ?>
      <?php if ( !empty( $curauth->accomplishment01 ) ) { echo "</div>"; } ?>
      <?php if ( !empty( $curauth->accomplishment01 ) ) { echo "<div class='uk-margin-small-top'>"; } ?>
        <?php if ( !empty( $curauth->accomplishment01 ) ) { echo "<ul class='uk-list uk-list-bullet'>"; } ?>
          <?php if ( !empty( $curauth->accomplishment01 ) ) { echo "<li>". $curauth->accomplishment01 ."</li>"; } ?>
          <?php if ( !empty( $curauth->accomplishment02 ) ) { echo "<li>". $curauth->accomplishment02 ."</li>"; } ?>
          <?php if ( !empty( $curauth->accomplishment03 ) ) { echo "<li>". $curauth->accomplishment03 ."</li>"; } ?>
          <?php if ( !empty( $curauth->accomplishment04 ) ) { echo "<li>". $curauth->accomplishment04 ."</li>"; } ?>
          <?php if ( !empty( $curauth->accomplishment05 ) ) { echo "<li>". $curauth->accomplishment05 ."</li>"; } ?>
          <?php if ( !empty( $curauth->accomplishment06 ) ) { echo "<li>". $curauth->accomplishment06 ."</li>"; } ?>
          <?php if ( !empty( $curauth->accomplishment07 ) ) { echo "<li>". $curauth->accomplishment07 ."</li>"; } ?>
          <?php if ( !empty( $curauth->accomplishment08 ) ) { echo "<li>". $curauth->accomplishment08 ."</li>"; } ?>
          <?php if ( !empty( $curauth->accomplishment09 ) ) { echo "<li>". $curauth->accomplishment09 ."</li>"; } ?>
          <?php if ( !empty( $curauth->accomplishment10 ) ) { echo "<li>". $curauth->accomplishment10 ."</li>"; } ?>
        <?php if ( !empty( $curauth->accomplishment01 ) ) { echo "</ul>"; } ?>
      <?php if ( !empty( $curauth->accomplishment01 ) ) { echo "</div>"; } ?>
    <?php if ( !empty( $curauth->accomplishment01 ) ) { echo "</div>"; } ?>
  <?php if ( !empty( $curauth->accomplishment01 ) ) { echo "</section>"; } ?>

  <?php if (have_posts()) : ?>

  <section class="uk-container maa-author-blogs">
    <h2>Blog Posts</h2>
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
    <h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    <h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    <!-- <h2 class="pagetitle">Author Archive</h2> -->
    <?php } ?>

    <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class( "uk-article" ) ?>>
      <header>
        <h3 id="post-<?php the_ID(); ?>" class="uk-text-lead uk-margin-remove-bottom"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
      </header>
      <?php  // BLOG POST CONTENT ?>
      <?php // the_content() ?>
      <footer>
        <time class="uk-text-meta" datetime="<?php the_time('Y-m-d')?>"><?php the_time('l, F jS, Y') ?></time>
        <!-- <?php the_tags('Tags: ', ', ', '<br />'); ?> -->
        <!-- Posted in <?php the_category(', ') ?> -->
        <?php  // EDIT BLOG POST LINK ?>
        <?php // edit_post_link('Edit', '', ' | '); ?>
        <?php  // COMMENTS LINK ?>
        <?php // comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
      </footer>
    </article>
    <?php endwhile; ?>

    <nav class="blog-post">
      <ul class="blog-post-pagination uk-flex-between uk-pagination">
        <li><span class="uk-pagination-previous"><?php next_posts_link('&laquo; Older Entries') ?></span></li>
        <li><span class="uk-pagination-previous"><?php previous_posts_link('Newer Entries &raquo;') ?></span></li>
      </ul>
    </nav>
  </section>

  <?php else :
    //
    // if ( is_category() ) { // If this is a category archive
    //   printf("<h2>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
    // } else if ( is_date() ) { // If this is a date archive
    //   echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
    // } else if ( is_author() ) { // If this is a category archive
    //   $userdata = get_userdatabylogin(get_query_var('author_name'));
    //   printf("<h2>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
    // } else {
    //   echo("<h2>No posts found.</h2>");
    // }
    // get_search_form();

  endif;
  ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
