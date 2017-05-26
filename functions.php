<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */



// ------------------------------
// Async load
// ikreativ.com/async-with-wordpress-enqueue
function ikreativ_async_scripts($url) {
  if ( strpos( $url, '#asyncload') === false )
    return $url;
  else if ( is_admin() )
    return str_replace( '#asyncload', '', $url );
  else
    return str_replace( '#asyncload', '', $url )."' async='async";
}
add_filter( 'clean_url', 'ikreativ_async_scripts', 11, 1 );



// ------------------------------
// load main stylesheet
// https://stackoverflow.com/a/41840861
// using 'wp_print_styles' instead of 'wp_enqueue_styles' forces our main.css file
// to be loaded after all the plugin stylesheets, allowing our custom styles to
// override the elementor defaults
// function millerStyles() {
//   wp_register_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );
//   wp_enqueue_style( 'main' );
// }
// add_action ( 'wp_print_styles', 'millerStyles' );



// ------------------------------
// load scripts
// wordpress enqueue  => developer.wordpress.org/reference/functions/wp_enqueue_script
// wordpress register => developer.wordpress.org/reference/functions/wp_register_script
// blog about topic   => premium.wpmudev.org/blog/adding-scripts-and-styles-wordpress-enqueueing
// enqueue via CDN    => stackoverflow.com/a/40403412
function millerAgency_assets() {

  // jQuery 3.2.1 CDN
  wp_deregister_script( 'jquery' ); // removes old jquery before loading new jquery
  wp_register_script( 'jquery_cdn', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', null, '3.2.1', true );
	wp_enqueue_script( 'jquery_cdn' );

  // jQuery 3.2.1 local
  // wp_register_script( 'jquery_local', get_template_directory_uri() . '/assets/js/jquery-3.2.1.min.js', null, null, true );
  // wp_enqueue_script( 'jquery_local' );


  // Velocity.js
  wp_register_script( 'velocity', 'https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.min.js', null, null, true );
  wp_enqueue_script( 'velocity' );

  // VelocityUI.js
  wp_register_script( 'velocity_ui', 'https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.ui.min.js', null, null, true );
  wp_enqueue_script( 'velocity_ui' );

  // Adds UIkit dependancy DOM items before loading UIkit next
  wp_register_script( 'uikit_toggle', get_template_directory_uri() . '/assets/js/uikit-toggle.js', null, null, true );
  wp_enqueue_script( 'uikit_toggle' );

  // UIkit
  wp_register_script( 'uikit', get_template_directory_uri() . '/assets/js/uikit.min.js', null, null, true );
  wp_enqueue_script( 'uikit' );

  // UIkit Icons
  wp_register_script( 'uikit_icons', get_template_directory_uri() . '/assets/js/uikit-icons.min.js', null, null, true );
  wp_enqueue_script( 'uikit_icons' );

  // Highlight.js
  wp_register_script( 'highlightjs', get_template_directory_uri() . '/assets/js/highlight.pack.js#asyncload', null, null, true );
  wp_enqueue_script( 'highlightjs' );

  // millerAgency.js
  wp_register_script( 'millerjs', get_template_directory_uri() . '/assets/js/millerAgency.js#asyncload', null, null, true );
  wp_enqueue_script( 'millerjs' );

}
add_action( 'wp_enqueue_scripts', 'millerAgency_assets' );



// ------------------------------
// Custom HTML5 Comment Markup
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



// ------------------------------
// Featured Image
function mytheme_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );



// ------------------------------
// Nav Menus
function nav_menu() {
	register_nav_menu( 'main', 'Main Menu' );
	register_nav_menu( 'mobile', 'Mobile Menu' );
}
add_action( 'after_setup_theme', 'nav_menu' );



// ------------------------------
// Widgetized Sidebar HTML5 Markup
automatic_feed_links();



// ------------------------------
// Elementor post.css Fix
// https://github.com/pojome/elementor/issues/902
if ( isset( $meta['time'] ) ) {
	wp_enqueue_style( 'elementor-post-' . $this->post_id, $this->url, [ ], $meta['time'] );
}



// ------------------------------
// Remove sanitization for WordPress posts
remove_filter( 'pre_user_description', 'wp_filter_post_kses');



// ------------------------------
// custom post taxonomy — seperates portfolio categories from blog categories
// codex.wordpress.org/Function_Reference/register_taxonomy#Example
function create_portfolio_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Work Categories', 'Taxonomy General Name' ),
		'singular_name'     => _x( 'Work Category', 'Taxonomy Singular Name' ),
		'search_items'      => __( 'Search Work Categories' ),
		'all_items'         => __( 'All Work Categories' ),
		'parent_item'       => __( 'Parent Work Category' ),
		'parent_item_colon' => __( 'Parent Work Category:' ),
		'edit_item'         => __( 'Edit Work Category' ),
		'update_item'       => __( 'Update Work Category' ),
		'add_new_item'      => __( 'Add New Work Category' ),
		'new_item_name'     => __( 'New Work Name' ),
		'menu_name'         => __( 'Work Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
    'show_in_menu'      => true,
		'show_admin_column' => true,
    'show_in_admin_bar' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'work' ),
	);

  register_taxonomy( 'work_categories', array( 'portfolio' ), $args );
}

// Hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_portfolio_taxonomy', 0 );



// ------------------------------
// custom post type — portfolio/work
// wpbeginner.com/wp-tutorials/how-to-create-custom-post-types-in-wordpress/
function custom_post_type() {
  // Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Portfolio', 'Post Type General Name' ),
		'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name' ),
		'menu_name'           => __( 'Portfolio' ),
		// 'parent_item_colon'   => __( 'Parent Movie' ),
		'all_items'           => __( 'All' ),
		'view_item'           => __( 'View Portfolio' ),
		'add_new_item'        => __( 'Add New Portfolio' ),
		'add_new'             => __( 'Add New' ),
		'edit_item'           => __( 'Edit Portfolio' ),
		'update_item'         => __( 'Update Portfolio' ),
		'search_items'        => __( 'Search Portfolio' ),
		'not_found'           => __( 'Not Found' ),
		'not_found_in_trash'  => __( 'Not found in Trash' ),
	);

  // Set other options for Custom Post Type
	$args = array(
		'label'               => __( 'portfolio' ),
		'description'         => __( 'Our work portfolio' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'work_catrgories' ),
		// You can associate this CPT with a taxonomy or custom taxonomy.
		'taxonomies'          => array( 'work_catrgories' ),
		// A hierarchical CPT is like Pages and can have Parent and child items.
    // A non-hierarchical CPT is like Posts.
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		// 'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		//'capability_type'     => 'page',
	);

	// Registering your Custom Post Type
	register_post_type( 'portfolio', $args );
}

// Hook into the 'init' action so that the function
// containing our post type registration is not
// unnecessarily executed.
add_action( 'init', 'custom_post_type', 1 );



// ------------------------------
// ADD USER ID COLUMN
// https://rudrastyh.com/wordpress/get-user-id.html
// Adding the column
function rd_user_id_column( $columns ) {
	$columns['user_id'] = 'ID';
	return $columns;
}
add_filter('manage_users_columns', 'rd_user_id_column');

// Column content
function rd_user_id_column_content($value, $column_name, $user_id) {
	if ( 'user_id' == $column_name )
		return $user_id;
	return $value;
}
add_action('manage_users_custom_column',  'rd_user_id_column_content', 10, 3);

// Column style (you can skip this if you want)
function rd_user_id_column_style(){
	echo '<style>.column-user_id{width: 5%}</style>';
}
add_action('admin_head-users.php',  'rd_user_id_column_style');

// ------------------------------
// Widgetized Sidebar HTML5 Markup
// if ( function_exists('register_sidebar') ) {
//   register_sidebar( array(
//     'name' => 'Sidebar Widget 1',
//     'id' => 'sidebar-widget-1',
//     'description' => 'Appears in the sidebar area',
//     'before_widget' => '<div id="%1$s" class="widget %2$s">',
//     'after_widget' => '</div>',
//     'before_title' => '<h3 class="widget-title">',
//     'after_title' => '</h3>',
//   ) );
//   register_sidebar( array(
//     'name' => 'Sidebar Widget 2',
//     'id' => 'sidebar-widget-2',
//     'description' => 'Appears in the sidebar area',
//     'before_widget' => '<div id="%1$s" class="widget %2$s">',
//     'after_widget' => '</div>',
//     'before_title' => '<h3 class="widget-title">',
//     'after_title' => '</h3>',
//   ) );
//   register_sidebar( array(
//     'name' => 'Sidebar Widget 3',
//     'id' => 'sidebar-widget-3',
//     'description' => 'Appears in the sidebar area',
//     'before_widget' => '<div id="%1$s" class="widget %2$s">',
//     'after_widget' => '</div>',
//     'before_title' => '<h3 class="widget-title">',
//     'after_title' => '</h3>',
//   ) );
//   register_sidebar( array(
//     'name' => 'Footer Widget 1',
//     'id' => 'footer-widget-1',
//     'description' => 'Appears in the footer area',
//     'before_widget' => '<div id="%1$s" class="widget %2$s">',
//     'after_widget' => '</div>',
//     'before_title' => '<h3 class="widget-title">',
//     'after_title' => '</h3>',
//   ) );
//   register_sidebar( array(
//     'name' => 'Footer Widget 2',
//     'id' => 'footer-widget-2',
//     'description' => 'Appears in the footer area',
//     'before_widget' => '<div id="%1$s" class="widget %2$s">',
//     'after_widget' => '</div>',
//     'before_title' => '<h3 class="widget-title">',
//     'after_title' => '</h3>',
//   ) );
//   register_sidebar( array(
//     'name' => 'Footer Widget 3',
//     'id' => 'footer-widget-3',
//     'description' => 'Appears in the footer area',
//     'before_widget' => '<div id="%1$s" class="widget %2$s">',
//     'after_widget' => '</div>',
//     'before_title' => '<h3 class="widget-title">',
//     'after_title' => '</h3>',
//   ) );
// }

// register_sidebar(array(
//   'before_widget' => '<section>',
//   'after_widget' => '</section>',
//   'before_title' => '<h2 class="widgettitle">',
//   'after_title' => '</h2>',
// ));



// ------------------------------
// Custom Functions for CSS/Javascript Versioning
$GLOBALS["TEMPLATE_URL"] = get_bloginfo('template_url')."/";
$GLOBALS["TEMPLATE_RELATIVE_URL"] = wp_make_link_relative($GLOBALS["TEMPLATE_URL"]);

// ------------------------------
// Add ?v=[last modified time] to style sheets
function versioned_stylesheet($relative_url, $add_attributes=""){
  echo '<link rel="stylesheet" href="'.versioned_resource($relative_url).'" '.$add_attributes.'>'."\n";
}

// ------------------------------
// Add ?v=[last modified time] to javascripts
function versioned_javascript($relative_url, $add_attributes=""){
  echo '<script src="'.versioned_resource($relative_url).'" '.$add_attributes.'></script>'."\n";
}

// ------------------------------
// Add ?v=[last modified time] to a file url
function versioned_resource($relative_url){
  $file = $_SERVER["DOCUMENT_ROOT"].$relative_url;
  $file_version = "";

  if(file_exists($file)) {
    $file_version = "?v=".filemtime($file);
  }

  return $relative_url.$file_version;
}

// ------------------------------
// limit masonry script to ONLY the /team page
// https://github.com/desandro/masonry
// https://wordpress.stackexchange.com/a/61246
// function masonry_script() {
//   if ( is_page( "team" ) ) {
//     wp_enqueue_script(
//         "masonry", "/wp-content/themes/millerAgency/assets/js/masonry.pkgd.min.js"
//     );
//   } else {
//     // null
//   }
// }
// add_action( "wp_enqueue_scripts", "masonry_script" );



// ------------------------------
// Breadcrumbs
// https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin
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

}

// admin stylesheet
// add_action('admin_head', 'maa_admin_stylesheet');
//
// function maa_admin_stylesheet() {
//   echo '<link rel="stylesheet" href="admin.css" type="text/css" media="all" />';
// }

// ------------------------------
// Our custom post type function
// http://www.wpbeginner.com/wp-tutorials/how-to-create-custom-post-types-in-wordpress/
// function custom_post_type() {
//
// // Set UI labels for Custom Post Type
// 	$labels = array(
// 		'name'                => _x( 'Docs', 'Post Type General Name', 'millerAgency' ),
// 		'singular_name'       => _x( 'Doc', 'Post Type Singular Name', 'millerAgency' ),
// 		'menu_name'           => __( 'Docs', 'millerAgency' ),
// 		'parent_item_colon'   => __( 'Parent Movie', 'millerAgency' ),
// 		'all_items'           => __( 'All Docs', 'millerAgency' ),
// 		'view_item'           => __( 'View Doc', 'millerAgency' ),
// 		'add_new_item'        => __( 'Add New Doc', 'millerAgency' ),
// 		'add_new'             => __( 'Add New', 'millerAgency' ),
// 		'edit_item'           => __( 'Edit Doc', 'millerAgency' ),
// 		'update_item'         => __( 'Update Doc', 'millerAgency' ),
// 		'search_items'        => __( 'Search Doc', 'millerAgency' ),
// 		'not_found'           => __( 'Not Found', 'millerAgency' ),
// 		'not_found_in_trash'  => __( 'Not found in Trash', 'millerAgency' ),
// 	);
//
// // Set other options for Custom Post Type
//
// 	$args = array(
// 		'label'               => __( 'docs', 'millerAgency' ),
// 		'description'         => __( 'Documentation for creating content on Miller.Agency', 'millerAgency' ),
// 		'labels'              => $labels,
// 		// Features this CPT supports in Post Editor
// 		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
// 		// You can associate this CPT with a taxonomy or custom taxonomy.
// 		'taxonomies'          => array( 'genres' ),
// 		// A hierarchical CPT is like Pages and can have
// 		// Parent and child items. A non-hierarchical CPT
// 		// is like Posts.
//
// 		'hierarchical'        => false,
// 		'public'              => false,
// 		'show_ui'             => true,
// 		'show_in_menu'        => true,
// 		'show_in_nav_menus'   => true,
// 		'show_in_admin_bar'   => true,
// 		'menu_position'       => 5,
// 		'can_export'          => true,
// 		'has_archive'         => true,
// 		'exclude_from_search' => true,
// 		'publicly_queryable'  => true,
// 		'capability_type'     => 'page',
// 	);
//
// 	// Registering your Custom Post Type
// 	register_post_type( 'docs', $args );
// }
//
// // Hook into the 'init' action so that the function
// // Containing our post type registration is not
// // unnecessarily executed.
// add_action( 'init', 'custom_post_type', 0 );

// ------------------------------
// Wordpress WYSIWYG TinyMCE Editor Customizations
// https://codex.wordpress.org/TinyMCE_Custom_Styles
