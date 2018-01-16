<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package dblogger
 */

if ( ! function_exists( 'dblogger_demo_build_styles' ) && class_exists( 'Dblogger_Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function dblogger_demo_build_styles() {

	// Primary Color
	$setting = 'primary-color';
	$mod = get_theme_mod( $setting, dblogger_get_default( $setting ) );

	if ( $mod !== dblogger_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Dblogger_Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.primary'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Secondary Color
	$setting = 'secondary-color';
	$mod = get_theme_mod( $setting, dblogger_get_default( $setting ) );

	if ( $mod !== dblogger_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Dblogger_Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.secondary'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}



}
endif;

add_action( 'dblogger_styles', 'dblogger_demo_build_styles' );
