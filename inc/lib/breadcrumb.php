<?php
/**
 * Breadcrumbs of the theme
 *
 * @package dblogger
 */

function dblogger_breadcrumb_link() {
	$disable = get_theme_mod( 'dblogger_post_show_breadcrumb',1 ) == 1 ? true : false ;

    if (  $disable == 1) : 
	if ( ! is_home() ) {
		echo '<a href="';
		echo esc_url( home_url( '/' ) );
		echo '">';
		esc_html_e( 'Home', 'dblogger' );
		echo '</a> > ';
		if ( is_category() || is_single() ) {
			the_category( ' > ' );
		} elseif ( is_page() ) {
			the_title();
		}
	}
endif;
}
?>