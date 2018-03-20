<?php
/**
 * Breadcrumbs of the theme
 *
 * @package dblogger
 */

function dblogger_breadcrumb_link() {
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
}
?>