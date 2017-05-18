<?php
/**
* @package WordPress
* @subpackage HTML5_Boilerplate
*/ // https://developer.wordpress.org/reference/functions/get_search_form/
?>

<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="uk-search uk-search-default">
  <span uk-search-icon></span>
  <input name="s" id="search" class="uk-search-input" type="search" placeholder="Search..." value="<?php the_search_query(); ?>">
</form>
