/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
    
  //************************** HEADERSECTION****************************************//    

     wp.customize( 'dblogger_heder_text', function( value ) {
		value.bind( function( to ) {
			$( '#home-banner h1' ).text( to );
		} );
	} );
    
     wp.customize( 'dblogger_tagline_text', function( value ) {
		value.bind( function( to ) {
			$( '#home-banner span' ).text( to );
		} );
	} );    
    
     wp.customize( 'dblogger_button_text', function( value ) {
		value.bind( function( to ) {
			$( '#home-banner a' ).text( to );
		} );
	} );     
    
     wp.customize( 'dblogger_button_url', function( value ) {
		value.bind( function( to ) {
			$( '#home-banner href' ).text( to );
		} );
	} );    
    
    /*Color*/
    
    wp.customize( 'dblogger_accent_color', function( value ) {
			value.bind( function( to ) {
				$( ' .btn-default' ).css( 'background-color', to );
			} );
		} );
    
     wp.customize( 'dblogger_accent_color', function( value ) {
			value.bind( function( to ) {
				$( 'ul li .active' ).css( 'color', to );
			} );
		} );
    
    
     wp.customize( 'dblogger_accent_color', function( value ) {
			value.bind( function( to ) {
				$( '#top-menu .navbar-fixed-top' ).css( 'background-color', to );
			} );
		} );
    
     wp.customize( 'dblogger_accent_color', function( value ) {
			value.bind( function( to ) {
				$( '.theme-post-caption .view-payment' ).css( 'background', to );
			} );
		} );
     wp.customize( 'dblogger_accent_color', function( value ) {
			value.bind( function( to ) {
				$( '.input-group-btn button' ).css( 'background-color', to );
			} );
		} );
    
   
  //************************** GUIDE SECTION****************************************//    

    
     wp.customize( 'dblogger_guide_title', function( value ) {
		value.bind( function( to ) {
			$( '#guide-block h2' ).text( to );
		} );
	} );  
        
      wp.customize( 'dblogger_guide_desc', function( value ) {
		value.bind( function( to ) {
			$( '#guide-block p' ).text( to );
		} );
	} );  
           
  //************************** OUR THEME SECTION****************************************//    
    
    wp.customize( 'dblogger_theme_title', function( value ) {
        value.bind( function( to ) {
            $( '#theme-block h2' ).text( to );
        } );
	} );   
    
    wp.customize( 'dblogger_theme_button_text', function( value ) {
        value.bind( function( to ) {
            $( '#theme-block .section-title a' ).text( to );
        } );
    } );     
    
    wp.customize( 'dblogger_theme_button_url', function( value ) {
        value.bind( function( to ) {
            $( '#theme-block href' ).text( to );
        } );
    } ); 
    
    
    wp.customize( 'dblogger_theme_tag_check', function( value ) {
			value.bind( function( to ) {
            if ( true === to) {
            $( '.theme-post-caption .badge-info' ).show();
            } 
            else {
            $( '.theme-post-caption .badge-info' ).hide();
            } 
			} );
		} ); 
    
    wp.customize( 'dblogger_theme_link_title', function( value ) {
        value.bind( function( to ) {
            $( '.theme-post-caption .view-payment a' ).text( to );
        } );
    } );  
    
    
     //************************** OUR THEME SECTION****************************************//    
    
    wp.customize( 'dblogger_blog_title', function( value ) {
        value.bind( function( to ) {
            $( '#from-blog .section-title h2' ).text( to );
        } );
	} );   
    
    wp.customize( 'dblogger_blog_button_text', function( value ) {
        value.bind( function( to ) {
            $( '#from-blog .section-title a' ).text( to );
        } );
    } );   
    
    
    
     //************************** newsletter SECTION****************************************// 
    
     wp.customize( 'dblogger_newsletter_disable', function( value ) {
			value.bind( function( to ) {
            if ( true === to) {
            $( '#newsletter-block' ).show();
            } 
            else {
            $( '#newsletter-block' ).hide();
            } 
			} );
		} ); 
    
    
	  wp.customize( 'dblogger_newsletter_title', function( value ) {
        value.bind( function( to ) {
            $( '#newsletter-block h3' ).text( to );
        } );
    } );   
    
    wp.customize( 'dblogger_newsletter_det', function( value ) {
        value.bind( function( to ) {
            $( '#newsletter-block p' ).text( to );
        } );
    } );    
    
    
} )( jQuery );
