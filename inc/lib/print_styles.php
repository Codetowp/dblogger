<?php
if (!function_exists('text_color_styles'))  {
	function text_color_styles(){
		echo '<style type="text/css" >';
		$color_value = get_theme_mod('header_textcolor', '');
		$append_color = sprintf( 'color: %s;',  $color_value );
		if ( $color_value ) {
			echo "\n" . '#top-header a , .openmenu-nav{' . $append_color . '}';
		}
		echo "\n". "</style>". "\n";
	}
}
add_action( 'wp_head', 'text_color_styles' );



if (!function_exists('dblogger_paraph_font'))  {
	function dblogger_paraph_font(){
		echo '<style type="text/css" >';
		$fontfamily_value = get_theme_mod('dblogger_paraph_font', '');
		$append_family = sprintf( 'font-family: %s;',  $fontfamily_value );
			// Output the styles.
		if ( $fontfamily_value ) {
			echo "\n" . 'p{' . $append_family . '}' ;
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_paraph_font' );


if (!function_exists('dblogger_paragraph_font_size_styles'))  {
	function dblogger_paragraph_font_size_styles(){
		echo '<style type="text/css" >';
		$fontparagfamily_value = get_theme_mod('dblogger_paragragph_font_size', '');
		$append_para_family_font = sprintf( 'font-size: %spx !important;',  $fontparagfamily_value );
			// Output the styles.
		if ( $fontparagfamily_value ) {
			echo "\n" . 'p{' . $append_para_family_font . '}';
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_paragraph_font_size_styles' );

if (!function_exists('dblogger_paraph_font_color'))  {
	function dblogger_paraph_font_color(){
		echo '<style type="text/css" >';
		$color_value = get_theme_mod('dblogger_paraph_font_color', '');
		$append_color = sprintf( 'color: %s !important;',  $color_value );
			// Output the styles.
		if ( $color_value ) {
			echo "\n" . 'p{' . $append_color . '}' ;
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_paraph_font_color' );


if (!function_exists('dblogger_font_family'))  {
	function dblogger_font_family(){
		echo '<style type="text/css">';
		$fontfamily_value = get_theme_mod('dblogger_font_family', '');
		$append_family = sprintf( 'font-family: %s;',  $fontfamily_value );
			// Output the styles.
		if ( $fontfamily_value ) {
			echo "\n" . 'h1{' . $append_family . '}'."\n".'h2{'.$append_family.'}'."\n".'h3{'.$append_family.'}'.
                "\n".'h4{'.$append_family.'}'."\n".'h5{'.$append_family.'}' ;
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_font_family' );


if (!function_exists('dblogger_font_color'))  {
	function dblogger_font_color(){
		echo '<style type="text/css" id="rijo-css">';
		$color_value = get_theme_mod('dblogger_font_color', '');
		$append_color = sprintf( 'color: %s;',  $color_value );
			// Output the styles.
		if ( $color_value ) {
			echo "\n" . 'h1{' . $append_color . '}'."\n".'h2{'.$append_color.'}'."\n".'h3{'.$append_color.'}'.
                "\n".'h4{'.$append_color.'}'."\n".'h5{'.$append_color.'}' ;
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_font_color' );


if (!function_exists('dblogger_accent_color'))  {
	function dblogger_accent_color(){
		echo '<style type="text/css" id="rijo-css">';
		$color_value = get_theme_mod('dblogger_accent_color', '');
		$append_color = sprintf( 'color: %s;',  $color_value );
			// Output the styles.
		if ( $color_value ) {
			echo "\n" . 'ul .nav-tabs li .active{' . $append_color . '}'."\n".'.input-group button{'.$append_color.'}'."\n".'.view-payment{'.$append_color.'}'."\n".'#top-menu .navbar-fixed-top{'.$append_color.'}';
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_accent_color' );
if (!function_exists('dblogger_accent_color'))  {
	function dblogger_accent_color(){
		echo '<style type="text/css" id="rijo-css">';
		$color_value = get_theme_mod('dblogger_accent_color', '');
		$append_color = sprintf( 'color: %s;',  $color_value );
        $append_color_link = sprintf( 'background: %s;',  $color_value );
        $append_color_button = sprintf( 'background-color: %s;',  $color_value );
			// Output the styles.
		if ( $color_value ) {
			echo "\n" . '.theme-post-caption .view-payment{'.$append_color_link.'}'."\n".'#top-menu .navbar-fixed-top{'.$append_color_link.'}'."\n".'.btn-default{'.$append_color_button.'}'."\n".'.btn-white:hover{'.$append_color_button.'}'."\n".'button, input[type="button"], input[type="reset"], input[type="submit"]{'.$append_color_button.'}'."\n".'#top-menu.navbar-default{'.$append_color_button.'}';
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_accent_color' );
