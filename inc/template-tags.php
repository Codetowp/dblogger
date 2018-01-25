<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package dblogger
 */

if ( ! function_exists( 'dblogger_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function dblogger_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html_x( 'Posted on %s', 'post date', 'dblogger' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'dblogger' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'dblogger_category_list' ) ) :
/**
 * Prints HTML with meta information for the categories
 */
function dblogger_category_list() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'dblogger' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links">' . esc_html__( 'in %1$s', 'dblogger' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}
}
endif;
if ( ! function_exists( 'dblogger_days_ago' ) ) :
/**
 * Outputs date
 */
function dblogger_days_ago() {        
    $days = round((date('U') - get_the_time('U')) / (60*60*24));
	if ($days==0) {
		echo " today "; 
	}
	elseif ($days==1) {
		echo "yesterday "; 
	}
	elseif ($days > 10) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html( '%s', 'post date', 'dblogger' ),$time_string 
	);
    $sep=' ';
	echo '<span class="posted-on">'. $posted_on,$sep.'</span>'; 
	}
	else {
		echo  $days . " days ago ";
	} 
    }
endif;
if ( ! function_exists( 'dblogger_is_selective_refresh' ) ) {
    function dblogger_is_selective_refresh()
    {
        return isset($GLOBALS['dblogger_is_selective_refresh']) && $GLOBALS['dblogger_is_selective_refresh'] ? true : false;
    }
}
function dblogger_get_default( $setting ) {

	$dblogger = Dblogger_Customizer_Library::Instance();
	$options = $dblogger->get_options();

	if ( isset( $options[$setting]['default'] ) ) {
		return $options[$setting]['default'];
	}

}