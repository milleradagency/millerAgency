<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */



// ==============================================================
// Async load
// ikreativ.com/async-with-wordpress-enqueue
// ==============================================================
function ikreativ_async_scripts($url) {
  if ( strpos( $url, '#asyncload') === false )
    return $url;
  else if ( is_admin() )
    return str_replace( '#asyncload', '', $url );
  else
    return str_replace( '#asyncload', '', $url )."' async='async";
}
add_filter( 'clean_url', 'ikreativ_async_scripts', 11, 1 );



// ==============================================================
// load scripts
// wordpress enqueue  => developer.wordpress.org/reference/functions/wp_enqueue_script
// wordpress register => developer.wordpress.org/reference/functions/wp_register_script
// blog about topic   => premium.wpmudev.org/blog/adding-scripts-and-styles-wordpress-enqueueing
// enqueue via CDN    => stackoverflow.com/a/40403412
// ==============================================================
function millerAgency_assets() {

  // ------------------------------
  // # DE-REGISTER SCRIPTS
  // This removes scripts that are unneccesary on a global scale
  // Please see below for the conditional (if) statements
  wp_deregister_script( 'wp-embed' );                                                   // ## WP-Embed (codex.wordpress.org/Embeds)
  wp_deregister_script( 'jquery' );                                                     // ## Original jQuery
  wp_deregister_script( 'jquery-ui' );                                                  // ## jQuery UI
  wp_deregister_script( 'jquery-numerator' );                                           // ## Numerator
  wp_deregister_script( 'waypoints' );                                                  // ## Waypoints
  wp_deregister_script( 'elementor-pro-frontend' );                                     // ## Elementor Pro Frontend
  wp_deregister_script( 'elementor-frontend' );                                         // ## Elementor Frontend
  wp_deregister_script( 'simple-job-board-validate-telephone-input' );                  // ## Phone Number Validation
  wp_deregister_script( 'simple-job-board-validate-telephone-input-utiliy' );           // ## Phone Number Validation Utilities
  wp_deregister_script( 'simple-job-board-front-end' );                                 // ## Simple Job Board

  // ------------------------------
  // # jQuery, jQuery UI, and jQuery Migrate
  wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', null, null, false );
  wp_enqueue_script( 'jquery' );
  wp_register_script( 'jquery-ui', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', null, null, false );
  wp_enqueue_script( 'jquery-ui' );
  wp_register_script( 'jquery-migrate', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js', null, null, false );
  wp_enqueue_script( 'jquery-migrate' );

  // ------------------------------
  // # Velocity.js
  wp_register_script( 'velocity', 'https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.min.js', null, null, true );
  wp_enqueue_script( 'velocity' );

  // ------------------------------
  // # VelocityUI.js
  wp_register_script( 'velocity_ui', 'https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.ui.min.js', null, null, true );
  wp_enqueue_script( 'velocity_ui' );

  // ------------------------------
  // # Adds UIkit dependancy DOM items before loading UIkit next
  wp_register_script( 'uikit_toggle', get_template_directory_uri() . '/assets/js/uikit-toggle.js', null, null, true );
  wp_enqueue_script( 'uikit_toggle' );

  // ------------------------------
  // # UIkit
  wp_register_script( 'uikit', get_template_directory_uri() . '/assets/js/uikit.min.js', null, null, true );
  wp_enqueue_script( 'uikit' );

  // ------------------------------
  // # UIkit Icons
  wp_register_script( 'uikit_icons', get_template_directory_uri() . '/assets/js/uikit-icons.min.js', null, null, true );
  wp_enqueue_script( 'uikit_icons' );

  // ------------------------------
  // # Highlight.js
  wp_register_script( 'highlightjs', get_template_directory_uri() . '/assets/js/highlight.pack.js#asyncload', null, null, true );
  wp_enqueue_script( 'highlightjs' );

  // ------------------------------
  // # PAGE - Numerator — Used for the Elementor Widget => Counter
  if ( is_page_template( 'elementor_page_counter.php' ) ) {
    wp_register_script( 'jquery-numerator', get_site_url() . '/wp-content/plugins/elementor/assets/lib/jquery-numerator/jquery-numerator.min.js#asyncload', null, null, true );
    wp_enqueue_script( 'jquery-numerator' );
  }

  // ------------------------------
  // # PAGE - Slider — Used for the Elementor Widget => Slides
  if ( is_page_template( 'elementor_page_slider.php' ) ) {
    wp_register_script( 'slick', get_site_url() . '/wp-content/plugins/elementor/assets/lib/slick/slick.min.js#asyncload', null, null, true );
    wp_enqueue_script( 'slick' );
  }

  // ------------------------------
  // # PAGE => Services
  if ( is_page( 'Advertising' ) ) {
    // Numerator
    wp_register_script( 'jquery-numerator', get_site_url() . '/wp-content/plugins/elementor/assets/lib/jquery-numerator/jquery-numerator.min.js#asyncload', null, null, true );
    wp_enqueue_script( 'jquery-numerator' );

    // Custom Velocity.js Accordion Scripts
    // wp_register_script( 'page-services', get_template_directory_uri() . '/assets/js/page-services.js#asyncload', null, null, true );
    // wp_enqueue_script( 'page-services' );
  }

  // ------------------------------
  // # PAGE => Radio
  if ( is_page( 'Radio' ) ) {
    // wp_register_script( 'jquery-numerator', get_site_url() . '/wp-content/plugins/elementor/assets/lib/jquery-numerator/jquery-numerator.min.js#asyncload', null, null, true );
    wp_enqueue_style( 'wp-mediaelement' );
    wp_enqueue_script( 'wp-mediaelement' );
  }

  // ------------------------------
  // # Blog - Numerator — Used for the Elementor Widget => Counter
  // Checks if the "counter" tag exists
  if ( has_tag( 'counter' ) ) {
    wp_register_script( 'jquery-numerator', get_site_url() . '/wp-content/plugins/elementor/assets/lib/jquery-numerator/jquery-numerator.min.js#asyncload', null, null, true );
    wp_enqueue_script( 'jquery-numerator' );
  }

  // ------------------------------
  // # Simple Job Board
  // Checks if the "jobpost" post_type tern returns true
  if ( is_singular( 'jobpost' ) ) {
    // ------------------------------
    // ## Simple Job Board — Phone Number Validation
    wp_register_script( 'simple-job-board-validate-telephone-input', get_site_url() . '/wp-content/plugins/simple-job-board/public/js/intlTelInput.min.js#asyncload', null, null, true );
    wp_enqueue_script( 'simple-job-board-validate-telephone-input' );

    // ------------------------------
    // ## Simple Job Board — Phone Number Validation Utilities
    wp_register_script( 'simple-job-board-validate-telephone-input-utiliy', get_site_url() . '/wp-content/plugins/simple-job-board/public/js/intlTelInput-utils.js#asyncload', null, null, true );
    wp_enqueue_script( 'simple-job-board-validate-telephone-input-utiliy' );

    // ------------------------------
    // ## Simple Job Board — jQuery UI Core
    // wp_deregister_script( 'jquery-ui-core' );
    // wp_register_script( 'jquery-ui-core', get_site_url() . '/wp-includes/js/jquery/ui/jquery.ui.core.min.js#asyncload', null, null, true );
    // wp_enqueue_script( 'jquery-ui-core' );
    wp_register_script( 'jquery-effects-core', get_site_url() . '/wp-includes/js/jquery/ui/effect.min.js', null, null, true );
    wp_enqueue_script( 'jquery-effects-core' );
    wp_register_script( 'jquery-ui-core', get_site_url() . '/wp-includes/js/jquery/ui/core.min.js', null, null, true );
    wp_enqueue_script( 'jquery-ui-core' );
    // wp_register_script( 'jquery-ui', get_site_url() . '/wp-includes/js/jquery/ui/core.min.js', null, null, true );
    // wp_enqueue_script( 'jquery-ui' );

    // ------------------------------
    // ## Simple Job Board — Front-end Scripts
    // wp_register_script( 'simple-job-board-front-end', get_site_url() . '/wp-content/plugins/simple-job-board/public/js/simple-job-board-public.js#asyncload', null, null, true );
    wp_register_script( 'simple-job-board-front-end', get_site_url() . '/wp-content/plugins/simple-job-board/public/js/simple-job-board-public.js#asyncload', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker' ), '1.4.0', TRUE );
    wp_enqueue_script( 'simple-job-board-front-end' );

    wp_localize_script(
        'simple-job-board-front-end',
        'application_form',
        array(
            'ajaxurl'              => esc_js( admin_url('admin-ajax.php') ),
            'setting_extensions'   => is_array( get_option('job_board_upload_file_ext') ) ? array_map( 'esc_js', get_option('job_board_upload_file_ext') ) : esc_js( get_option('job_board_upload_file_ext') ),
            'all_extensions_check' => esc_js( get_option('job_board_all_extensions_check') ),
            'allowed_extensions'   => is_array( get_option('job_board_allowed_extensions') ) ? array_map( 'esc_js', get_option('job_board_allowed_extensions') ) : esc_js( get_option('job_board_allowed_extensions') ),
            'job_listing_content'  => esc_js( get_option('job_board_listing') ),
            'jobpost_content'      => esc_js( get_option('job_board_jobpost_content') ),
            'jquery_alerts'        => array(
                'invalid_extension'         => apply_filters( 'sjb_invalid_file_ext_alert', esc_html__( 'This is not an allowed file extension.', 'simple-job-board' ) ),
                'application_not_submitted' => apply_filters( 'sjb_job_not_submitted_alert', esc_html__('Your application could not be processed.', 'simple-job-board') ),
            ),
            'file' =>array(
                'browse' => esc_html__('Browse', 'simple-job-board'),
                'no_file_chosen' => esc_html__('No file chosen', 'simple-job-board'),
            )
        )
    );
  }

  // ------------------------------
  // # Waypoints
  wp_register_script( 'waypoints', get_site_url() . '/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js', null, null, true );
  wp_enqueue_script( 'waypoints' );

  // ------------------------------
  // # Elementor Pro Frontend
  wp_register_script( 'elementor-pro-frontend', get_site_url() . '/wp-content/plugins/elementor-pro/assets/js/frontend.min.js#asyncload', null, null, true );
  wp_enqueue_script( 'elementor-pro-frontend' );

  // ------------------------------
  // # Elementor Frontend
  wp_register_script( 'elementor-frontend', get_site_url() . '/wp-content/plugins/elementor/assets/js/frontend.min.js#asyncload', null, null, true );
  wp_enqueue_script( 'elementor-frontend' );

  // ------------------------------
  // # millerAgency.js
  wp_register_script( 'millerjs', get_template_directory_uri() . '/assets/js/millerAgency.js#asyncload', null, null, true );
  wp_enqueue_script( 'millerjs' );

}
add_action( 'wp_enqueue_scripts', 'millerAgency_assets' );



// ==============================================================
// load admin scripts
// ==============================================================
function admin_assets() {
  // ------------------------------
  // # jQuery, jQuery UI, and jQuery Migrate
  wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', null, null, false );
  wp_enqueue_script( 'jquery' );
  wp_register_script( 'jquery-ui', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', null, null, false );
  wp_enqueue_script( 'jquery-ui' );
  wp_register_script( 'jquery-migrate', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js', null, null, false );
  wp_enqueue_script( 'jquery-migrate' );

  // ------------------------------
  // # Elementor Pro Frontend
  wp_register_script( 'elementor-pro-frontend', get_site_url() . '/wp-content/plugins/elementor-pro/assets/js/frontend.min.js#asyncload', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker' ), null, null, true );
  wp_enqueue_script( 'elementor-pro-frontend' );

  // ------------------------------
  // # Elementor Frontend
  wp_register_script( 'elementor-frontend', get_site_url() . '/wp-content/plugins/elementor/assets/js/frontend.min.js#asyncload', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker' ), null, null, true );
  wp_enqueue_script( 'elementor-frontend' );

  // ------------------------------
  // # Highlight.js
  wp_register_script( 'highlightjs', get_template_directory_uri() . '/assets/js/highlight.pack.js#asyncload', array( 'jquery' ), null, null, true );
  wp_enqueue_script( 'highlightjs' );

  // ------------------------------
  // # Highlight.js
  wp_register_script( 'adminCustomScripts', get_template_directory_uri() . '/assets/js/adminCustomScripts.js#asyncload', array( 'jquery' ), null, null, true );
  wp_enqueue_script( 'adminCustomScripts' );

  // ------------------------------
  // # PAGE => Services
  // if ( is_page( 'Advertising' ) ) {
  //   // Custom Velocity.js Accordion Scripts
  //   wp_register_script( 'page-services', get_template_directory_uri() . '/assets/js/page-services.js#asyncload', null, null, true );
  //   wp_enqueue_script( 'page-services' );
  // }

}
add_action( 'admin_enqueue_scripts', 'admin_assets', 500 );



// ==============================================================
// Custom HTML5 Comment Markup
// ==============================================================
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li>
     <article <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
       <header class="comment-author vcard">
          <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
          <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
          <time><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a></time>
          <?php edit_comment_link(__('(Edit)'),'  ','') ?>
       </header>
       <?php if ($comment->comment_approved == '0') : ?>
          <em><?php _e('Your comment is awaiting moderation.') ?></em>
          <br />
       <?php endif; ?>

       <?php comment_text() ?>

       <nav>
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
       </nav>
     </article>
    <!-- </li> is added by wordpress automatically -->
<?php
}



// ==============================================================
// Featured Image
// ==============================================================
function mytheme_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );



// ==============================================================
// Nav Menus
// ==============================================================
function nav_menu() {
	register_nav_menu( 'main', 'Main Menu' );
	register_nav_menu( 'mobile', 'Mobile Menu' );
}
add_action( 'after_setup_theme', 'nav_menu' );



// ==============================================================
// Widgetized Sidebar HTML5 Markup
automatic_feed_links();
// ==============================================================



// ==============================================================
// Elementor post.css Fix
// https://github.com/pojome/elementor/issues/902
// ==============================================================
if ( isset( $meta['time'] ) ) {
	wp_enqueue_style( 'elementor-post-' . $this->post_id, $this->url, [ ], $meta['time'] );
}



// ==============================================================
// Remove sanitization for WordPress posts
remove_filter( 'pre_user_description', 'wp_filter_post_kses');
// ==============================================================



// ==============================================================
// ADD USER ID COLUMN
// https://rudrastyh.com/wordpress/get-user-id.html
// ==============================================================

// ------------------------------
// Adding the column
function rd_user_id_column( $columns ) {
	$columns['user_id'] = 'ID';
	return $columns;
}
add_filter('manage_users_columns', 'rd_user_id_column');

// ------------------------------
// Column content
function rd_user_id_column_content($value, $column_name, $user_id) {
	if ( 'user_id' == $column_name )
		return $user_id;
	return $value;
}
add_action('manage_users_custom_column',  'rd_user_id_column_content', 10, 3);

// ------------------------------
// Column style (you can skip this if you want)
function rd_user_id_column_style(){
	echo '<style>.column-user_id{width: 5%}</style>';
}

// ------------------------------
// Add action into wordpress
add_action('admin_head-users.php',  'rd_user_id_column_style');



// ==============================================================
// # BREADCRUMBS
// thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin
// ==============================================================
function custom_breadcrumbs() {

    // Settings
    $separator          = '';
    $breadcrums_id      = '';
    $breadcrums_class   = 'uk-breadcrumb';
    $home_title         = 'Home';

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        // echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</span></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                // echo '<li class="separator"> ' . $separator . ' </li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . $custom_tax_name . '</span></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                // echo '<li class="separator"> ' . $separator . ' </li>';

            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end(array_values($category));

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    // changed category slot in blog post breadcrumbs to simply go back to /blog
                    $cat_display .= '<li class="item-cat">'.'<a href="/about-miller-ad-agency/blog">'.Blog.'</a>'.'</li>';
                    // $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    // $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                // echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    // $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</span></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><span class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</span></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            // echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            // echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</span></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            // echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</span></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</span></li>';

        } else if ( is_author() ) {

            // Author archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><span class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</span></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</span></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><span class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</span></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ul>';

    }

} // END BREADCRUMBS
