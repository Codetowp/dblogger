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
	$disable = get_theme_mod( 'dblogger_post_show_author',1 ) == 1 ? true : false ;

if (  $disable == 1) :  
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( '%s', 'post author', 'dblogger' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo $byline; // WPCS: XSS OK.
endif;
}
endif;

if ( ! function_exists( 'dblogger_category_list' ) ) :
/**
 * Prints HTML with meta information for the categories
 */
function dblogger_category_list() {
	$disable = get_theme_mod( 'dblogger_post_show_category',1 ) == 1 ? true : false ;

    if (  $disable == 1) : 
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'dblogger' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links">' . '%1$s' . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}
endif;
}
endif;
if ( ! function_exists( 'dblogger_days_ago' ) ) :
/**
 * Outputs date
 */

function dblogger_days_ago() {   
$disable = get_theme_mod( 'dblogger_post_show_date',1 ) == 1 ? true : false ;

if (  $disable == 1) :      
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
	echo '<span class="date-article"> <span class="posted-on">'. $posted_on,$sep.'</span> </span>'; // WPCS: XSS OK.
	}
	else {
		echo  esc_html($days) . esc_html__(' days ago ', 'dblogger');
	} 
	endif;
    }

endif;

/**
 * Tag for single posts
 */
 
if ( ! function_exists( 'dblogger_footer_tag' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function  dblogger_footer_tag() 
	{
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) 
		{
			
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'dblogger' ) );
			if ( $tags_list ) 
			{
				/* translators: 1: list of tags. */
				printf( '<span class="tag-links clearfix">' . esc_html( '%1$s', 'dblogger' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
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