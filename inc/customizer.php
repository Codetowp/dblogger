<?php
/**
 * dblogger Theme Customizer
 *
 * @package dblogger
 */

function dblogger_customize_register( $wp_customize ) {    
	require get_template_directory() . '/inc/lib/fo-to-range.php';
	require get_template_directory() . '/inc/lib/theme-info.php';   

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.navbar-brand h3',
			'render_callback' => 'dblogger_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'dblogger_customize_partial_blogdescription',
		) );   
          $wp_customize->selective_refresh->add_partial( 'dblogger_tagline_text', array(
			'selector'        => '#home-banner .sub',
			'render_callback' => 'dblogger_customize_partial_tagline_text',
		) ); 
        $wp_customize->selective_refresh->add_partial( 'dblogger_header_text', array(
			'selector'        => '#home-banner h1',
			'render_callback' => 'dblogger_customize_partial_header_text',
		) ); 
        $wp_customize->selective_refresh->add_partial( 'dblogger_guide_title', array(
			'selector'        => '#guide-block h2',
			'render_callback' => 'dblogger_customize_partial_guide_title',
		) ); 
        $wp_customize->selective_refresh->add_partial( 'dblogger_theme_title', array(
			'selector'        => '#theme-block .container h2',
			'render_callback' => 'dblogger_customize_partial_theme_title',
		) );
		$wp_customize->selective_refresh->add_partial( 'dblogger_theme_button_url', array(
			'selector'        => '#theme-block .container .btn-white',
			'render_callback' => 'dblogger_customize_partial_theme_title',
		) );		
        $wp_customize->selective_refresh->add_partial( 'dblogger_blog_title', array(
			'selector'        => '#from-blog h2',
			'render_callback' => 'dblogger_customize_partial_blog_title',
		) );
        $wp_customize->selective_refresh->add_partial( 'dblogger_newsletter_title', array(
			'selector'        => '#newsletter-block .container',
			'render_callback' => 'dblogger_customize_partial_newsletter_title',
		) );
	}
	
	
//**************************  General WordPress settings ****************************************// 
	$wp_customize->add_panel( 'dblogger_wp_settings' ,
		array(
			'priority'        => 100,
			'title'           => esc_html__( 'WordPress Settings', 'dblogger' ),
	) );   	
	$wp_customize->get_section('background_image')-> panel = 'dblogger_wp_settings';
	$wp_customize->get_control( 'background_color'  )->section   = 'background_image';
	$wp_customize->get_section('title_tagline')->title = __( 'Branding' , 'dblogger' ); 
	$wp_customize->get_section('header_image')->title = __( 'Archive Banner' , 'dblogger' ); 
	$wp_customize->get_section('header_image')->description = __( 'Add custom banner for categories, 404, search pages etc' , 'dblogger' ); 
	$wp_customize->get_section('header_image')-> panel = 'dblogger_global_panel';
	
    
//**************************  COLORS ****************************************// 
    $wp_customize->add_setting( 'dblogger_accent_color',  
		array(
			'default' => '#f53347', 
			'transport' => 'refresh', 
			'sanitize_callback' => 'sanitize_hex_color', 
		) );
			
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dblogger_accent_color', 
		array(
			'label'      => esc_attr__( 'Accent Color', 'dblogger' ),
			'description' => esc_attr__( 'Add Accent Color to Button.', 'dblogger' ),
			'section'    => 'colors',) 
		) );
    
    $wp_customize->add_setting( 'dblogger_secondary_color',  
		array(
			'default' => '#3c3e8b', 
			'transport' => 'refresh', 
			'sanitize_callback' => 'sanitize_hex_color', 
		) );
			
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dblogger_secondary_color', 
		array(
			'label'      => esc_attr__( 'Secondary Color', 'dblogger' ),
			'description' => esc_attr__( 'Add Secondary Color to Button.', 'dblogger' ),
			'section'    => 'colors',) 
	) );    
 
	$wp_customize->add_section( 'dblogger_theme_info', 
		array(
			'title'                 => __( 'Documentation & Links', 'dblogger' ),
			'priority'              => 0,
	) );   
   
	$wp_customize->add_setting( 'dblogger_info', 
		array(
			'capability'                => 'edit_theme_options',
			'sanitize_callback'         => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new dblogger_info( $wp_customize, 'dblogger_info', 
		array(
			'section'                   => 'dblogger_theme_info',
			'priority'                  => 10,) 
	) );             
    
//*************************** GLOBAL SETTINGS PANEL ***************************//
	$wp_customize->add_panel( 'dblogger_global_panel' ,
		array(
			'priority'        => 50,
			'title'           => esc_html__( 'Global Settings', 'dblogger' ),
			'description'     => '',
	) );    
	 
    // Ad Banner SETTINGS
	$wp_customize->add_section('dblogger_general_banners_controls',
		array(
			'title'                     => __('Ad Banner Settings', 'dblogger'),
			'panel'                     => 'dblogger_global_panel',  
			'priority'                  => 98,
	) );    

	$wp_customize->add_setting( 'dblogger_banner_type', 
		array( 
			'default'           => 'image',
			'sanitize_callback' => 'dblogger_banners_type_callback',
	));
    
	$wp_customize->add_control('dblogger_banner_type',
		array(
			'type'        => 'radio',
			'choices'     => array(
				'image'   => esc_html__( 'Image', 'dblogger' ),
				'adsense' => esc_html__( 'AdSense', 'dblogger' )
				),
			'label'       => esc_html__( 'The type of the banner', 'dblogger' ),
			'description' => esc_html__( 'Select what type of banner you want to use: normal image or adsense script','dblogger' ),
			'section'     => 'dblogger_general_banners_controls',
	));    

	$wp_customize->add_setting( 'dblogger_banner_link',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'           => esc_url( '#' ),
	) );
	$wp_customize->add_control('dblogger_banner_link', 
		array(
			'label'           => esc_html__( 'Banner Link:', 'dblogger' ),
			'description'     => esc_html__( 'Add the link for banner image.', 'dblogger' ),
			'section'         => 'dblogger_general_banners_controls',
			'settings'        => 'dblogger_banner_link',
			'type'			  => 'text',	
			'active_callback' => 'dblogger_banners_type_callback',
	) );
     
	$wp_customize->add_setting( 'dblogger_banner_image',
		array(
			'default'           =>  get_template_directory_uri() . '/assets/img/ads.jpg',
			'sanitize_callback' => 'esc_url_raw',

	) );
    
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,'dblogger_banner_image',
			array(
				'label'           => esc_html__( 'Banner Image:', 'dblogger' ),
				'description'     => esc_html__( 'Recommended size: 728 x 90', 'dblogger' ),
				'section'         => 'dblogger_general_banners_controls',
				'active_callback' => 'dblogger_banners_type_callback',
			)
	) );   

	$wp_customize->add_setting( 'dblogger_banner_adsense_code', 
		array(
			'sanitize_callback' => 'esc_html',
			'default'           => ''
		)
	);

	$wp_customize->add_control( 'dblogger_banner_adsense_code', 
		array(
			'label'           => esc_html__( 'AdSense Code:', 'dblogger' ),
			'description'     => esc_html__( 'Add the code you retrieved from your AdSense account. You only need to insert the <ins> tag.', 'dblogger' ),
			'section'         => 'dblogger_general_banners_controls',
			'settings'        => 'dblogger_banner_adsense_code',
			'type'            => 'textarea',
			'active_callback' => 'dblogger_banners_type_false_callback',
	) );
	
	// Post SETTINGS
	$wp_customize->add_section( 'dblogger_post_settings' ,
		array(
			'priority'    => 105,
			'title'       => esc_html__( 'Post Settings', 'dblogger' ),
			'description' => '', 
			'panel'       => 'dblogger_global_panel',
		)
	);
	
	$wp_customize->add_setting('dblogger_post_related_post_count', array(
		'default' => 3,
		'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control('dblogger_post_related_post_count', array(
		'type' => 'integer',		
		'label' => __('Number Of Related Post To Show','dblogger'),
		'section' => 'dblogger_post_settings',		
	) );
	
    // Font SETTINGS
     
	$wp_customize->add_section('dblogger_font_settings', 
		array(
			'title'                     => __('Font Settings', 'dblogger'),
			'description'               => __('Change font family, size and color (Headings & Paragraph) for Homepage, Blog Posts & Pages.', 'dblogger'),
			'panel'                     => 'dblogger_global_panel',
			'priority'                  => 40,
	));    

	$font_choices = dblogger_get_font_choices();

	$wp_customize->add_setting( 'dblogger_paragraph_font', array(
		'default'        => 'PT Serif',
		'sanitize_callback' => 'dblogger_sanitize_font_choice',
	) );

	$wp_customize->add_control( 'dblogger_paragraph_font', array(
		'label'   => __('Change paragraph font family', 'dblogger' ),
		'description'   => __('Applies to subtitles, widget content, single post & pages', 'dblogger' ),
		'section' => 'dblogger_font_settings',
		'type'    => 'select',
		'choices' => $font_choices,
		'priority' => 1,
	));
    
	$wp_customize->add_setting( 'dblogger_paragraph_font_color', 
		array(
			'default' => '#43484d', 
			'transport' => 'refresh', 
			'sanitize_callback' => 'sanitize_hex_color', 
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dblogger_paragraph_font_color', 
		array(
			'label'      => esc_attr__( 'Pick paragraph font color', 'dblogger' ),
			'description'   => esc_attr__('Applies only to single posts & pages', 'dblogger' ),
			'section'    => 'dblogger_font_settings',
			'priority'   => 2,
		) 
	) );    

	$wp_customize->add_setting( 'dblogger_paragraph_font_size', array(
		'default'       => 16,
		'capability'    => 'edit_theme_options',
		'transport'     => 'refresh',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( new Dblogger_Customizer_Range_Value_Control( $wp_customize, 'dblogger_paragraph_font_size', array(
		'type'     => 'range-value',
		'section'  => 'dblogger_font_settings',
		'settings' => 'dblogger_paragraph_font_size',        
		'label'    => __( 'Pick paragraph font size' , 'dblogger' ),
		'description'   => esc_attr__('Applies only to single posts & pages.', 'dblogger' ),
		'input_attrs' => array(
		'min'    => 11,
		'max'    => 24,
		'step'   => 1,
		'suffix' => 'px',
		),
		'priority'   => 3,
	) ) );
       
	$wp_customize->add_setting( 'dblogger_heading_font_family', array(
		'default'        => 'Montserrat',
		'transport'     => 'refresh',
		'sanitize_callback' => 'dblogger_sanitize_font_choice',
	) );

	$wp_customize->add_control( 'dblogger_heading_font_family', array(
		'label'   => __('Change heading font family', 'dblogger' ),
		'description'   =>  __('Applies to all headings.', 'dblogger' ),
		'section' => 'dblogger_font_settings',
		'type'    => 'select',
		'choices' => $font_choices,
		'priority' => 4,
	));

	$wp_customize->add_setting( 'dblogger_headings_font_color', 
		array(
			'default' => '#5a5a5a', 
			'transport' => 'refresh', 
			'sanitize_callback' => 'sanitize_hex_color', 
		) );
		
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dblogger_headings_font_color', 
		array(
			'label'      => __( 'Pick heading font color', 'dblogger' ),
			'description'   =>  __('Applies only to headings in single posts & pages.', 'dblogger' ),
			'section'    => 'dblogger_font_settings',
			'priority'   => 5,
		) ) );

	// Social Links

	$wp_customize->add_section( 'dblogger_social_links', array(
		'title'                     => __( 'Social Links', 'dblogger'  ),
		'priority'                  => 99,
		'panel'                     => 'dblogger_global_panel',  
	) );

	$social_sites = array( 'facebook', 'twitter','instagram',  'google-plus', 'pinterest', 'linkedin', 'rss');

	foreach( $social_sites as $social_site ) {
		$wp_customize->add_setting( "dblogger_social_links[$social_site]", array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		) );

		$wp_customize->add_control( "dblogger_social_links[$social_site]", array(
			'label'   => ucwords( $social_site ) . __( " Url:", 'dblogger' ),
			'section' => 'dblogger_social_links',
			'type'    => 'text',
		) );
	}

//**************************  FRONTPAGE SECTIONS ****************************************// 
	$wp_customize->add_panel( 'dblogger_panel' ,
		array(
			'priority'        => 90,
			'title'           => esc_html__( 'Frontpage Sections', 'dblogger' ),
			'description'     => '',
	) );

    // Header INTRO    
	$wp_customize->add_section('dblogger_header', array(
		'title'                     => __('Header Intro', 'dblogger'),
		'description'               => __('Easily edit your header section', 'dblogger'),
		'priority'                  => 100,
		'panel'                    => 'dblogger_panel',
	));
    
	$wp_customize->add_setting( 'dblogger_header_check',
		array(
			'sanitize_callback' => 'dblogger_sanitize_checkbox',
			'default'           => '',
			'capability'        => 'manage_options',
			'transport'         => 'refresh',
	) );
	
	$wp_customize->add_control( new Dblogger_Customizer_Toggle_Control( $wp_customize, 'dblogger_header_check', 
		array(
			'settings' => 'dblogger_header_check',
			'label'    => __( 'Disable Header?', 'dblogger' ),
			'section'  => 'dblogger_header',
			'type'     => 'ios',
			'priority' => 1,) 
	) );    
         
	$wp_customize->add_setting( 'dblogger_back_img', array(
		'default'           => esc_url( get_template_directory_uri() . '/assets/img/b-1.jpg' ),
		'type'                      => 'theme_mod',
		'capability'                => 'edit_theme_options',
		'sanitize_callback'         => 'esc_url_raw',
		'transport'                 => 'refresh',
	) );

    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,'dblogger_back_img', array(
        'label'                     => __( 'Background Image', 'dblogger' ),
        'section'                   => 'dblogger_header',
        'settings'                  => 'dblogger_back_img',
        'context'                   => 'dblogger_back_img',
        'priority'                  => 2,
        ) 
    ) );    

	$wp_customize->add_setting( 'dblogger_tagline_text', array(      
		'default'                   => esc_html__('Session Title', 'dblogger'),
		'sanitize_callback'         => 'sanitize_text_field',
		'transport'                 => 'postMessage',               
	) );    

	$wp_customize->add_control( 'dblogger_tagline_text', array(
		'type'						=> 'text',
		'label' 					=> __( 'Section Title', 'dblogger' ),
		'section'  					=> 'dblogger_header',
		'priority' 					=> 3,
	) );	

	$wp_customize->add_setting( 'dblogger_header_text', array(   
		'default'                   => esc_html__('Section Description', 'dblogger'),
		'sanitize_callback'         => 'sanitize_text_field',
		'transport'                 => 'postMessage',             
	) );    

    $wp_customize->add_control( 'dblogger_header_text', array(
        'type'						=> 'text',
        'label' 					=> __( 'Heading', 'dblogger' ),
        'section'  					=> 'dblogger_header',
        'priority' 					=> 4,
    ) );	

    $wp_customize->add_setting( 'dblogger_button_text', array(      
        'default'                   => esc_html__('Read More', 'dblogger'),
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage',               
    ) );    
    $wp_customize->add_control( 'dblogger_button_text', array(
        'type'						=> 'text',
        'label' 					=> __( 'Button Text', 'dblogger' ),
        'section'  					=> 'dblogger_header',
        'priority' 					=> 5,
    ) );

    $wp_customize->add_setting( 'dblogger_button_url', array(      
        'default'           => esc_url( '#' ),
        'sanitize_callback'         => 'esc_url_raw',
        'transport'                 => 'postMessage',               
    ) );   
    $wp_customize->add_control( 'dblogger_button_url', array(
        'type'						=> 'text',
        'label' 					=> __( 'Button Url', 'dblogger' ),
        'section'  					=> 'dblogger_header',
        'priority' 					=> 6
    ) );	  

	// Category SECTION
    
    $wp_customize->add_section('dblogger_guide_section', array(
        'title'                     => __('Category section', 'dblogger'),
        'description'               => __('Show any category posts on homepage', 'dblogger'),
        'priority'                  => 101,
         'panel'                     => 'dblogger_panel',  
    ) );
    
	$wp_customize->add_setting( 'dblogger_guide_check',
		array(
			'sanitize_callback' => 'dblogger_sanitize_checkbox',
			'default'           => 0,
			'capability'        => 'manage_options',
			'transport'         => 'refresh',
		)
	);
	
	$wp_customize->add_control( new Dblogger_Customizer_Toggle_Control( $wp_customize, 'dblogger_guide_check', array(
		'settings' => 'dblogger_guide_check',
		'label'    => __( 'Disable this section ?', 'dblogger' ),
		'section'  => 'dblogger_guide_section',
		'type'     => 'ios',
		'priority' => 1,) 
	) );
        
	$wp_customize->add_setting( 'dblogger_guide_icon', array(
		'default'           => esc_url( get_template_directory_uri() . '/assets/img/f-fa-book.png' ),
		'type'                      => 'theme_mod',
		'capability'                => 'edit_theme_options',
		'sanitize_callback'         => 'esc_url_raw',
		'transport'                 => 'refresh',
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,'dblogger_guide_icon', array(
		'label'                     => __( 'Guide Icon', 'dblogger' ),
		'section'                   => 'dblogger_guide_section',
		'settings'                  => 'dblogger_guide_icon',
		'context'                   => 'dblogger_guide_icon',
		'priority'                  => 2,) 
	) );

	$wp_customize->add_setting( 'dblogger_guide_title', array(   
		'default'                   => esc_html__('Section Title', 'dblogger'),
		'sanitize_callback'         => 'sanitize_text_field',
		'transport'                 => 'postMessage',               
	) ); 
	
	$wp_customize->add_control( 'dblogger_guide_title', array(
		'type'						=> 'text',
		'label' 					=> __( 'Title', 'dblogger' ),
		'section'  					=> 'dblogger_guide_section',
		'priority' 					=> 2,
	) );	   
    
	$wp_customize->add_setting( 'dblogger_guide_desc', array(
		'default'               => esc_html__('Section Description.', 'dblogger'),
		'sanitize_callback'     => 'sanitize_text_field',
		'transport'             => 'postMessage',
	));
	
	$wp_customize->add_control( 'dblogger_guide_desc', array(
		'type'                      => 'textarea',
		'label'                     => __( 'Description', 'dblogger' ),
		'section'                   => 'dblogger_guide_section',
		'priority'                  =>  3,
	) );
    
	global $dblogger_options_categories;
	$wp_customize->add_setting('dblogger_slide_categories', array(
		'default' => '',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dblogger_sanitize_slidecat'
	));
	
	$wp_customize->add_control('dblogger_slide_categories', array(
		'label' => __('Slider Category', 'dblogger'),
		'section' => 'dblogger_guide_section',
		'type'    => 'select',
		'description' => __('Select a category for the featured post slider', 'dblogger'),
		'choices'    => $dblogger_options_categories
	));
    
	$wp_customize->add_setting('dblogger_post_number', array(
			'default' => '6',
			'sanitize_callback' => 'absint'
		)
	);
	
	$wp_customize->add_control('dblogger_post_number', array(
			'type' => 'integer',
			'label' => __('Number Of Slides To Show - i.e 10 (default is 6)','dblogger'),
			'section' => 'dblogger_guide_section',
		)
	);
 
	// Pages SECTION
    
	$wp_customize->add_section('dblogger_theme_section', array(
		'title'                     => __('Pages section', 'dblogger'),
		'description'               => 'Show your latest pages here',
		'priority'                  => 102,
		'panel'                     => 'dblogger_panel',  
	) );
    
	$wp_customize->add_setting( 'dblogger_theme_check', array(
			'sanitize_callback' => 'dblogger_sanitize_checkbox',
			'default'           => 0,
			'capability'        => 'manage_options',
			'transport'         => 'refresh',
		)
	);
	
	$wp_customize->add_control( new Dblogger_Customizer_Toggle_Control( $wp_customize, 'dblogger_theme_check', array(
		'settings' => 'dblogger_theme_check',
		'label'    => __( 'Disable this section', 'dblogger' ),
		'section'  => 'dblogger_theme_section',
		'type'     => 'ios',
		'priority' => 1,
	) ) );
        
	$wp_customize->add_setting( 'dblogger_theme_title', array(  
		'default'                   => esc_html__('Pages', 'dblogger'),
		'sanitize_callback'         => 'sanitize_text_field',
		'transport'                 => 'postMessage',               
	) );    

	$wp_customize->add_control( 'dblogger_theme_title', array(
		'type'						=> 'text',
		'label' 					=> __( 'Title', 'dblogger' ),
		'section'  					=> 'dblogger_theme_section',
		'priority' 					=> 2,
	) );	  

    $wp_customize->add_setting( 'dblogger_theme_button_text', array(      
        'default'                   => esc_html__('Read More', 'dblogger'), 
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage',               
    ) );    

    $wp_customize->add_control( 'dblogger_theme_button_text', array(
        'type'						=> 'text',
        'label' 					=> __( 'Button Text', 'dblogger' ),
        'section'  					=> 'dblogger_theme_section',
        'priority' 					=> 4,
    ) );	

    $wp_customize->add_setting( 'dblogger_theme_button_url', array(     
        'default'                   => esc_url('#'),
        'sanitize_callback'         => 'esc_url_raw',
        'transport'                 => 'postMessage',               
    ) );    

    $wp_customize->add_control( 'dblogger_theme_button_url', array(
        'type'						=> 'text',
        'label' 					=> __( 'Button Url', 'dblogger' ),
        'section'  					=> 'dblogger_theme_section',
        'priority' 					=> 5
    ) );	  

	$wp_customize->add_setting( 'dblogger_theme_link_title', array(   
		'default'                   => esc_html__('Read More', 'dblogger'),        
		'sanitize_callback'         => 'sanitize_text_field',
		'transport'                 => 'postMessage',               
	) );    

	$wp_customize->add_control( 'dblogger_theme_link_title', array(
		'type'						=> 'text',
		'label' 					=> __( 'Link Title', 'dblogger' ),
		'section'  					=> 'dblogger_theme_section',
		'priority' 					=> 6,
	) );
    
    $wp_customize->add_setting( 'dblogger_tag_title', array(      
        'default'                   => esc_html__('Tag', 'dblogger'),  
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage',               
      ) );    

	$wp_customize->add_control( 'dblogger_tag_title', array(
		'type'						=> 'text',
		'label' 					=> __( 'Tag Title', 'dblogger' ),
		'section'  					=> 'dblogger_theme_section',
		'priority' 					=> 6,
	) );
    
	$wp_customize->add_setting('dblogger_page_post_count', array(
			'default' => '6',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control('dblogger_page_post_count', array(
			'type' => 'integer',

			'label' => __('Number Of Page To Show (default - 6)','dblogger'),
			'section' => 'dblogger_theme_section',
		)
	);
        
	$wp_customize->add_setting( 'dblogger_theme_tag_check', array(
		'default'    => 1,
		'capability' => 'manage_options',
		'transport' => 'postMessage',
		'sanitize_callback' => 'dblogger_sanitize_checkbox',
	) );
	
	$wp_customize->add_control( new Dblogger_Customizer_Toggle_Control( $wp_customize, 'dblogger_theme_tag_check', array(
		'settings' => 'dblogger_theme_tag_check',
		'label'    => __( 'Enable/Disable tag section', 'dblogger' ),
		'section'  => 'dblogger_theme_section',
		'type'     => 'ios',
		'priority' => 7,
		
	) ) );

	// Our Blog SECTION
	
	$wp_customize->add_section('dblogger_blog_section', array(
		'title'                     => __('Our Blog Section', 'dblogger'),
		'description'               => __('Change settings for no of posts on homepage and manage related posts on single post.', 'dblogger'),
		'priority'                  => 103,
		'panel'                     => 'dblogger_panel', 
	) );    
    
	$wp_customize->add_setting( 'dblogger_blog_check', array(
			'sanitize_callback' => 'dblogger_sanitize_checkbox',
			'default'           => '',
			'capability'        => 'manage_options',
			'transport'         => 'refresh',
		)
	);
	
	$wp_customize->add_control( new Dblogger_Customizer_Toggle_Control( $wp_customize, 'dblogger_blog_check', array(
		'settings' => 'dblogger_blog_check',
		'label'    => __( 'Disable Blog Section?', 'dblogger' ),
		'section'  => 'dblogger_blog_section',
		'type'     => 'ios',
		'priority' => 1,
	) ) );
          
	$wp_customize->add_setting( 'dblogger_blog_title', array(      
		'default'                   => esc_html__('Our Blog', 'dblogger'),  
		'sanitize_callback'         => 'sanitize_text_field',
		'transport'                 => 'postMessage',               
	) );    

	$wp_customize->add_control( 'dblogger_blog_title', array(
		'type'						=> 'text',
		'label' 					=> __( 'Title', 'dblogger' ),
		'section'  					=> 'dblogger_blog_section',
		'priority' 					=> 2,
	) );	  

    $wp_customize->add_setting( 'dblogger_blog_button_text', array(      
        'default'                   => esc_html__('Read More', 'dblogger'),  
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage',               
    ) );    

    $wp_customize->add_control( 'dblogger_blog_button_text', array(
        'type'						=> 'text',
        'label' 					=> __( 'Button Text', 'dblogger' ),
        'section'  					=> 'dblogger_blog_section',
        'priority' 					=> 4,
    ) );	
    
     $wp_customize->add_setting( 'dblogger_blog_button_url', array(     
        'default'                   => esc_url('#'),
        'sanitize_callback'         => 'esc_url_raw',
        'transport'                 => 'postMessage',               
    ) );    

    $wp_customize->add_control( 'dblogger_blog_button_url', array(
        'type'						=> 'text',
        'label' 					=> __( 'Button Url', 'dblogger' ),
        'section'  					=> 'dblogger_blog_section',
        'priority' 					=> 3
    ) );	
	
    $wp_customize->add_setting( 'dblogger_blog_post_count', array(
            'default'           => 2,
			'sanitize_callback' => 'absint',
            'transport'         => 'refresh',  
		)
    );
	
    $wp_customize->add_control( 'dblogger_blog_post_count', array(
        'type' => 'integer',
        'label' => __('Number Of Posts To Show','dblogger'),
        'section' => 'dblogger_blog_section',
		
        )
    );
	
    // Subscribe SETTINGS
	
	$wp_customize->add_section( 'dblogger_newsletter' , array(
			'priority'    => 110,
			'title'       => esc_html__( 'Subscribe', 'dblogger' ),
			'description' => '',
			'panel'                     => 'dblogger_panel', 
		)
	);
    
	$wp_customize->add_setting( 'dblogger_newsletter_disable', array(
			'sanitize_callback' => 'dblogger_sanitize_checkbox',
			'default'           => '',
			'capability'        => 'manage_options',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control( new Dblogger_Customizer_Toggle_Control( $wp_customize, 'dblogger_newsletter_disable',                   array(
		'settings' => 'dblogger_newsletter_disable',
		'label'    => __( 'Enable newsletter?', 'dblogger' ),
		'section'  => 'dblogger_newsletter',
		'type'     => 'ios',
		'priority' => 1,
	) ) );
    
	$wp_customize->add_setting( 'dblogger_newsletter_title', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__( 'Subscribe to our newsletter', 'dblogger' ),
			'transport'         => 'postMessage', 
		)
	);
	$wp_customize->add_control( 'dblogger_newsletter_title', array(
			'label'       => esc_html__('Subscribe Form Title', 'dblogger'),
			'section'     => 'dblogger_newsletter',
			'description' => ''
		)
	);
	
	$wp_customize->add_setting( 'dblogger_newsletter_mailchimp', array(
			'sanitize_callback' => 'esc_url_raw',
			'default'           => '',
			'transport'         => 'postMessage', 
		)
	);
	$wp_customize->add_control( 'dblogger_newsletter_mailchimp', array(
			'label'       => esc_html__('MailChimp Action URL', 'dblogger'),
			'section'     => 'dblogger_newsletter',
			'description' => esc_html__( 'The newsletter form use MailChimp, please follow <a target="_blank" href="http://kb.mailchimp.com/lists/signup-forms/host-your-own-signup-forms">this guide</a> to know how to get MailChimp Action URL. Example <i>//yourlist.us8.list-manage.com/subscribe/post?u=anything</i>', 'dblogger' )
		)
	);
    
	$wp_customize->add_setting( 'dblogger_newsletter_det',  array(      
			'default'                   => __('We protect your privacy. We provide you with high quality updates.' , 'dblogger'),
			'sanitize_callback'         => 'sanitize_text_field',
			'transport'                 => 'postMessage', 
		)
	);    

	$wp_customize->add_control( 'dblogger_newsletter_det', array(
			'type'						=> 'text',
			'label' 					=> __( 'Newsletter Details', 'dblogger' ),
			'section'  					=> 'dblogger_newsletter',
		) 
	);	 
}
add_action( 'customize_register', 'dblogger_customize_register' );


function dblogger_sanitize_slidecat( $input ) {
	global $dblogger_options_categories;
		if ( array_key_exists( $input, $dblogger_options_categories ) ) {
			return $input;
		} else {
			return '';
		}
}

function dblogger_main_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
		return 1;
    } else {
		return 0;
    }
}

function dblogger_banners_type_callback( $control ) {
	if ( $control->manager->get_setting( 'dblogger_banner_type' )->value() == 'image' ) {
		return true;
	}
	return false;
}

function dblogger_banners_type_false_callback( $control ) {
	if ( $control->manager->get_setting( 'dblogger_banner_type' )->value() == 'image' ) {
		return false;
	}
	return true;
}

function dblogger_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
		return 1;
    } else {
		return 0;
    }
}
//select sanitization function
function dblogger_sanitize_select( $input, $setting ){
	 
	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible select options 
	$choices = $font_choices;
					 
	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
		 
}
/**
 * Render all selective refresh partial.
 *
 * @return void
 */
function dblogger_customize_partial_blogname() {
	bloginfo( 'name' );
}
function dblogger_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function dblogger_customize_partial_tagline_text() {
	return get_theme_mod('dblogger_tagline_text');
}
function dblogger_customize_partial_header_text() {
	return get_theme_mod('dblogger_header_text');
}
function dblogger_customize_partial_guide_title() {
	return get_theme_mod('dblogger_guide_title');
}
function dblogger_customize_partial_theme_title() {
	return get_theme_mod('dblogger_theme_title');
}
function dblogger_customize_partial_blog_title() {
	return get_theme_mod('dblogger_blog_title');
}
function dblogger_customize_partial_newsletter_title() {
	return  get_theme_mod('dblogger_newsletter_title');
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dblogger_customize_preview_js() {
	wp_enqueue_script( 'dblogger-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'dblogger_customize_preview_js' );

function dblogger_customizer_css() {
	wp_enqueue_style( 'dblogger-customizer-css', get_template_directory_uri() . '/assets/css/customizer.css' );
	}
add_action( 'customize_controls_print_styles', 'dblogger_customizer_css' );