<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */



// ------------------------------
// load main stylesheet
// https://stackoverflow.com/a/41840861
// using 'wp_print_styles' instead of 'wp_enqueue_styles' forces our main.css file
// to be loaded after all the plugin stylesheets, allowing our custom styles to
// override the elementor defaults
function millerStyles() {
  wp_register_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );
  wp_enqueue_style( 'main' );
}
add_action ( 'wp_print_styles', 'millerStyles' );



// ==============================================================
// # THEME CUSTOMIZATION
// premium.wpmudev.org/blog/wordpress-theme-customization-api/
// ==============================================================

// ------------------------------
// ## THEME CUSTOMIZATION - Creating a Section
// ------------------------------
// The add_section() is used to create sections.
// It takes two parameters, a section slug and an array of arguments.
// Note that sections will not show up when empty.
$wp_customize->add_section(
	'millerAgency_footer_options',
	array(
		'title'       => __( 'Footer Settings', 'millerAgency' ),
		'priority'    => 100, // determines order of the section
		'capability'  => 'edit_theme_options',
		'description' => __('Change footer options here.', 'millerAgency'),
	)
);

// ------------------------------
// ## THEME CUSTOMIZATION - Adding Settings
// ------------------------------
// Settings are created with the add_setting() method. They, too, take a slug
// as the first parameter and an array of arguments as the second.
$wp_customize->add_setting( 'footer_bg_color',
	array(
		'default' => 'f1f1f1'
	)
);

// ------------------------------
// ## THEME CUSTOMIZATION - Creating A Control
// ------------------------------
// Controls are put in place with the add_control() method. This method takes a
// slug and an argument array or it can also receive a dedicated control object.

// I’ve passed a control object to the add_control() method. This object
// should be constructed by passing the $wp_customize object as the first
// parameter, a unique ID for the control as the second and an
// array of arguments as the third.

// Note that the control is where it all comes together. section is set to
// the ID of the section we created and settings is set to the ID of the setting.
$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize,
	'footer_bg_color_control',
	array(
		'label'    => __( 'Footer Background Color', 'millerAgency' ),
		'section'  => 'mytheme_footer_options',
		'settings' => 'footer_bg_color',
		'priority' => 10,
	)
));

// ------------------------------
// ## THEME CUSTOMIZATION - Using Setting Values
// ------------------------------
// By default, settings are saved in a theme_mod. Theme_mods are an alternative
// to the Settings API, they provide an easy way of handling theme-specific
// settings. All you need to do to retrieve the value of a setting is use
// the get_theme_mod() function with the id of the setting passed to it.




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
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'add_new', 'page', 'work_catrgories' ),
		// You can associate this CPT with a taxonomy or custom taxonomy.
		'taxonomies'          => array( 'work_catrgories' ),
		// A hierarchical CPT is like Pages and can have Parent and child items.
    // A non-hierarchical CPT is like Posts.
		'hierarchical'        => true,
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
		'capability_type'     => 'page',
	);

	// Registering your Custom Post Type
	register_post_type( 'portfolio', $args );
}

// Hook into the 'init' action so that the function
// containing our post type registration is not
// unnecessarily executed.
add_action( 'init', 'custom_post_type', 1 );



// ------------------------------
// Widgetized Sidebar HTML5 Markup
if ( function_exists('register_sidebar') ) {
  register_sidebar( array(
    'name' => 'Sidebar Widget 1',
    'id' => 'sidebar-widget-1',
    'description' => 'Appears in the sidebar area',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
  register_sidebar( array(
    'name' => 'Sidebar Widget 2',
    'id' => 'sidebar-widget-2',
    'description' => 'Appears in the sidebar area',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
  register_sidebar( array(
    'name' => 'Sidebar Widget 3',
    'id' => 'sidebar-widget-3',
    'description' => 'Appears in the sidebar area',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
  register_sidebar( array(
    'name' => 'Footer Widget 1',
    'id' => 'footer-widget-1',
    'description' => 'Appears in the footer area',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
  register_sidebar( array(
    'name' => 'Footer Widget 2',
    'id' => 'footer-widget-2',
    'description' => 'Appears in the footer area',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
  register_sidebar( array(
    'name' => 'Footer Widget 3',
    'id' => 'footer-widget-3',
    'description' => 'Appears in the footer area',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}

register_sidebar(array(
  'before_widget' => '<section>',
  'after_widget' => '</section>',
  'before_title' => '<h2 class="widgettitle">',
  'after_title' => '</h2>',
));



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
function masonry_script() {
  if ( is_page( "team" ) ) {
    wp_enqueue_script(
        "masonry", "/wp-content/themes/millerAgency/assets/js/masonry.pkgd.min.js"
    );
  } else {
    // null
  }
}
add_action( "wp_enqueue_scripts", "masonry_script" );



// admin stylesheet
add_action('admin_head', 'maa_admin_stylesheet');
function maa_admin_stylesheet() {
  echo '<link rel="stylesheet" href="admin.css" type="text/css" media="all" />';
}



// ------------------------------
// Wordpress WYSIWYG TinyMCE Editor Customizations
// https://codex.wordpress.org/TinyMCE_Custom_Styles
