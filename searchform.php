<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package dblogger
 */
?>

<form id="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get"> 
	<input type="text" placeholder="<?php echo esc_attr_x( 'Search...&hellip;', 'placeholder', 'dblogger' ); ?>"  value="<?php echo get_search_query(); ?>" name="s" size="40"/>
</form>

