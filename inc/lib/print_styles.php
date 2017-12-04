<?php
if ( !function_exists( 'text_color_styles') )  {
	function text_color_styles(){
		echo '<style type="text/css" >';
		$color_value = get_theme_mod('header_textcolor', '');
		$append_color = sprintf( 'color: %s;',  $color_value );
		if ( $color_value ) {
			echo "\n" . '#top-header a , .openmenu-nav{' . esc_html( $append_color ) . '}';
		}
		echo "\n". "</style>". "\n";
	}
}
add_action( 'wp_head', 'text_color_styles' );



if (!function_exists('dblogger_paragraph_font'))  {
	function dblogger_paragraph_font(){
		echo '<style type="text/css" >';
		$fontfamily_value = get_theme_mod('dblogger_paragraph_font', '');
		$append_family = sprintf( 'font-family: %s;',  $fontfamily_value );
			// Output the styles.
		if ( $fontfamily_value ) {
			echo "\n" . 'p{' . esc_html( $append_family ). '}' ."\n". '#guide-block p{'.esc_html( $append_family ).'}' ."\n". '#guide-block .nav-tabs h6{'.esc_html( $append_family ).'}' ."\n". '#newsletter-block p{' .esc_html( $append_family ).'}' ."\n". '#Blog-home p{'.esc_html( $append_family ).'}' ."\n". '.widget ul li{'.esc_html( $append_family ).'}' . "\n". '.widget widget-title{'.esc_html( $append_family ).'}' . "\n" . '#home-banner span{'.esc_html( $append_family ).'}'."\n".'.author-box .author-description{'.esc_html( $append_family ).'}';
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_paragraph_font' );


if (!function_exists('dblogger_paragraph_font_size_styles'))  {
	function dblogger_paragraph_font_size_styles(){
		echo '<style type="text/css" >';
		$fontparagfamily_value = get_theme_mod('dblogger_paragraph_font_size', '');
		$append_para_family_font = sprintf( 'font-size: %spx !important;',  $fontparagfamily_value );
			// Output the styles.
		if ( $fontparagfamily_value ) {
			echo "\n" . 'p{' . esc_html( $append_para_family_font ) . '}';
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_paragraph_font_size_styles' );

if (!function_exists('dblogger_paragraph_font_color'))  {
	function dblogger_paragraph_font_color(){
		echo '<style type="text/css" >';
		$color_value = get_theme_mod('dblogger_paragraph_font_color', '');
		$append_color = sprintf( 'color: %s;',  $color_value );
			// Output the styles.
		if ( $color_value ) {
			echo "\n" . '#theme-details p, .single .single-post p{' .esc_html( $append_color ) . '}' ;
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_paragraph_font_color' );


if (!function_exists('dblogger_heading_font_family'))  {
	function dblogger_heading_font_family(){
		echo '<style type="text/css">';
		$fontfamily_value = get_theme_mod('dblogger_heading_font_family', '');
		$append_family = sprintf( 'font-family: %s;',  $fontfamily_value );
			// Output the styles.
		if ( $fontfamily_value ) {
			echo "\n" . 'h1,h2,h3,h4,h5,h6{'.esc_html( $append_family ).'}' ;
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_heading_font_family' );


if (!function_exists('dblogger_headings_font_color'))  {
	function dblogger_headings_font_color(){
		echo '<style type="text/css" id="rijo-css">';
		$color_value = get_theme_mod('dblogger_headings_font_color', '');
		$append_color = sprintf( 'color: %s;',  $color_value );
			// Output the styles.
		if ( $color_value ) {
			echo "\n" . 'h1{' .esc_html( $append_color ) . '}'."\n".'h2{'.esc_html( $append_color ).'}'."\n".'h3{'.esc_html( $append_color ).'}'.
                "\n".'h4{'.esc_html( $append_color ).'}'."\n".'h5{'.esc_html( $append_color ).'}' ;
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_headings_font_color' );


if (!function_exists('dblogger_accent_color'))  {
	function dblogger_accent_color(){
		echo '<style type="text/css" id="accent-css">';
		$color_value = get_theme_mod('dblogger_accent_color', '');
		$append_color = sprintf( 'color: %s !important;',  $color_value );
        $append_color_link = sprintf( 'background: %s !important;',  $color_value );
        $append_bckcolor = sprintf( 'background-color: %s;',  $color_value );
        $append_border=sprintf( 'border: 2px %s solid;',  $color_value );
        $append_border_s=sprintf( 'border-color: %s;',  $color_value );
        $append_border_b=sprintf('border-bottom: 20px solid %s;',$color_value );
			// Output the styles.
		if ( $color_value ) {
			echo "\n" .'#top-menu.navbar-default{'.esc_html( $append_bckcolor ).'}'."\n".'#top-menu.navbar-default .navbar-nav > li a:hover{'.esc_html( $append_bckcolor ).'}'."\n".'.btn-default{'.esc_html( $append_bckcolor ).'}'."\n".'.guide-block .nav-tabs > li.active > a > h6, .guide-block .nav-tabs > li.active > a:hover{'.esc_html( $append_color ).'}'."\n".'.btn-white:hover{'.esc_html( $append_bckcolor ).'}'."\n".'.btn-white:hover{'.esc_html( $append_border ).'}'."\n".'button, input[type="button"], input[type="reset"], input[type="submit"]{'.esc_html( $append_bckcolor ).'}'."\n".'.guide-block .nav-tabs > li.active:before, .guide-block .nav-tabs > li:hover:before{'.esc_html( $append_color_link ).'}'."\n".'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover {'.esc_html( $append_bckcolor ).'}'."\n".'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover {'.esc_html( $append_border_s ).'}'."\n".'#top-menu.navbar-default .navbar-nav ul li{'.esc_html( $append_bckcolor ).'}'."\n"."\n".'#top-menu.navbar-default .navbar-nav ul:before{'.esc_html( $append_border_b ).'}'."\n"."\n".'#respond input[type=submit]{'.esc_html( $append_bckcolor ).'}'."\n"."\n".'#respond input[type=submit]:hover{'.esc_html( $append_bckcolor ).'}'."\n"."\n".'.single .single-post ul li:before{'.esc_html( $append_bckcolor ).'}'."\n"."\n".'.widget_archive li a:hover{'.esc_html( $append_color ).'}'."\n"."\n".'.widget_categories li a:hover{'.esc_html( $append_color ).'}'."\n"."\n".'.widget_meta li a:hover{'.esc_html( $append_color ).'}'."\n"."\n".'.widget_meta li:hover:before{'.esc_html( $append_color ).'}'."\n"."\n".'aside li a:hover{'.esc_html( $append_color ).'}'."\n"."\n".'.posts-navigation ul li a:hover, .nav-links a:hover{'.esc_html( $append_bckcolor ).'}'."\n"."\n".'.btn-default:hover{'.esc_html( $append_bckcolor ).'}'."\n"."\n".'.btn-default:hover{'.esc_html( $append_border_s ).'}'."\n"."\n".'.cat-links a:hover{'.esc_html( $append_color ).'}'."\n"."\n".'.tags-links a:hover{'.esc_html( $append_color ).'}'."\n";
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_accent_color' );


if (!function_exists('dblogger_secondary_color'))  {
	function dblogger_secondary_color(){
		echo '<style type="text/css" id="secondary-color-css">';
		$color_value = get_theme_mod('dblogger_secondary_color', '');
        $append_bckcolor = sprintf( 'background-color: %s !important;',  $color_value );
        $append_color=sprintf('color:%s;',$color_value);
        $append_border= sprintf('border: 2px %s solid',$color_value);
			// Output the styles.
		if ( $color_value ) {
			echo "\n" .'.on{'.esc_html( $append_bckcolor ).'}'."\n".'.theme-post-caption .view-payment{'.esc_html( $append_bckcolor ).'}'."\n".'.widget_categories ul{'.esc_html( $append_bckcolor ).'}'."\n".'.author-box .author-box-title a{'.esc_html( $append_bckcolor ).'}'."\n"."\n".'.author-box .author-box-title{'.esc_html( $append_color ).'}'."\n"."\n".'a{'.esc_html( $append_color ).'}'."\n"."\n".'.widget-title{'.esc_html( $append_color ).'}'."\n"."\n".'.tagcloud a{'.esc_html( $append_border ).'}'."\n"."\n".'.tagcloud a:hover{'.esc_html( $append_border ).'}'."\n"."\n".'.tagcloud a:hover{'.esc_html( $append_bckcolor ).'}'."\n"."\n".'.social-links-top > li > a:hover{'.esc_html( $append_color ).'}'."\n"."\n".'.also-like-block h4, #comments .comment-reply-title{'.esc_html( $append_color ).'}'."\n"."\n".'.badge-info{'.esc_html( $append_bckcolor ).'}'."\n";
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_secondary_color' );

