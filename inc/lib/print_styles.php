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



if (!function_exists('dblogger_paragraph_font'))  {
	function dblogger_paragraph_font(){
		echo '<style type="text/css" >';
		$fontfamily_value = get_theme_mod('dblogger_paragraph_font', '');
		$append_family = sprintf( 'font-family: %s;',  $fontfamily_value );
			// Output the styles.
		if ( $fontfamily_value ) {
			echo "\n" . 'p{' . $append_family . '}' ."\n". '#guide-block p{'.$append_family.'}' ."\n". '#guide-block .nav-tabs h6{'.$append_family.'}' ."\n". '#newsletter-block p{' .$append_family.'}' ."\n". '#Blog-home p{'.$append_family.'}' ."\n". '.widget ul li{'.$append_family.'}' . "\n". '.widget widget-title{'.$append_family.'}' . "\n" . '#home-banner span{'.$append_family.'}'."\n".'.author-box .author-description{'.$append_family.'}';
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
			echo "\n" . 'p{' . $append_para_family_font . '}';
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
			echo "\n" . '#theme-details p, .single .single-post p{' . $append_color . '}' ;
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
			echo "\n" . 'h1,h2,h3,h4,h5,h6{'.$append_family.'}' ;
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
			echo "\n" . 'h1{' . $append_color . '}'."\n".'h2{'.$append_color.'}'."\n".'h3{'.$append_color.'}'.
                "\n".'h4{'.$append_color.'}'."\n".'h5{'.$append_color.'}' ;
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_headings_font_color' );


if (!function_exists('dblogger_accent_color'))  {
	function dblogger_accent_color(){
		echo '<style type="text/css" id="rijo-css">';
		$color_value = get_theme_mod('dblogger_accent_color', '');
		$append_color = sprintf( 'color: %s !important;',  $color_value );
        $append_color_link = sprintf( 'background: %s !important;',  $color_value );
        $append_bckcolor = sprintf( 'background-color: %s;',  $color_value );
        $append_border=sprintf( 'border: 2px %s solid;',  $color_value );
        $append_border_s=sprintf( 'border-color: %s;',  $color_value );
			// Output the styles.
		if ( $color_value ) {
			echo "\n" .'#top-menu.navbar-default{'.$append_bckcolor.'}'."\n".'#top-menu.navbar-default .navbar-nav > li a:hover{'.$append_bckcolor.'}'."\n".'.btn-default{'.$append_bckcolor.'}'."\n".'.guide-block .nav-tabs > li.active > a > h6, .guide-block .nav-tabs > li.active > a:hover{'.$append_color.'}'."\n".'.btn-white:hover{'.$append_bckcolor.'}'."\n".'.btn-white:hover{'.$append_border.'}'."\n".'button, input[type="button"], input[type="reset"], input[type="submit"]{'.$append_bckcolor.'}'."\n".'.guide-block .nav-tabs > li.active:before, .guide-block .nav-tabs > li:hover:before{'.$append_color_link.'}'."\n".'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover {'.$append_bckcolor.'}'."\n".'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover {'.$append_border_s.'}';
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_accent_color' );


if (!function_exists('dblogger_secondary_color'))  {
	function dblogger_secondary_color(){
		echo '<style type="text/css" id="rijo-css">';
		$color_value = get_theme_mod('dblogger_secondary_color', '');
        $append_bckcolor = sprintf( 'background-color: %s !important;',  $color_value );
			// Output the styles.
		if ( $color_value ) {
			echo "\n" .'.on{'.$append_bckcolor.'}'."\n".'.theme-post-caption .view-payment{'.$append_bckcolor.'}'."\n".'.widget_categories ul{'.$append_bckcolor.'}';
		}
		echo "\n". "</style>". "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'dblogger_secondary_color' );

