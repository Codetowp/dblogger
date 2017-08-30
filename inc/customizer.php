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
			'selector'        => '.site-title a',
			'render_callback' => 'dblogger_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'dblogger_customize_partial_blogdescription',
		) );        
	}
	
     $wp_customize->remove_control('blogdescription');
     $wp_customize->remove_section('header_image');
     $wp_customize->remove_section('background_image');    
     $wp_customize->get_section('title_tagline')->title = __( 'Branding' ); 
     $wp_customize->add_setting( 'dblogger_accent_color',  
            array(
                'default' => '#f53347', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color', 
            ) );
			
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dblogger_accent_color', 
           array(
			'label'      => esc_attr__( 'Accent Color', 'dblogger' ),
			'description' => esc_attr__( 'Add Accent Color to Button.', 'dbloger' ),
			'section'    => 'colors',
		) ) );
		
     $wp_customize->add_setting( 'header_image', array(
			'default'                   => '',
			'type'                      => 'theme_mod',
			'capability'                => 'edit_theme_options',
			'sanitize_callback'         => 'esc_url_raw',
		) );
    
     $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,'header_image', array(
            'label'                     => __( 'Header Image', '' ),
            'section'                   => 'title_tagline',
            'settings'                  => 'header_image',
            'context'                   => 'header_image',
            'priority'                  => 20,
            ) 
        ) );
		
    
    $wp_customize->add_section( 'dblogger_theme_info', array(
          'title'                 => __( 'Theme INFO', 'dblogger' ),
          'priority'              => 0,
       ) );   
   
	$wp_customize->add_setting( 'dblogger_info', array(
		'capability'                => 'edit_theme_options',
	'sanitize_callback'         => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new dblogger_info( $wp_customize, 'dblogger_info', array(
		'section'                   => 'dblogger_theme_info',
		'priority'                  => 10,
	) ) );    
    
     
     /* Front page sections */
     $wp_customize->add_panel( 'dblogger_panel' ,
		array(
			'priority'        => 130,
			'title'           => esc_html__( 'Frontpage Theme Sections', 'dblogger' ),
			'description'     => '',
			/*'active_callback' => 'onepress_showon_frontpage'*/
		)
	);
    
    $wp_customize->add_section('dblogger_header', array(
        'title'                     => __('Header Intro', 'dblogger'),
        'description'               => 'Easily edit your header section',
        'priority'                  => 99,
         'panel'                     => 'dblogger_panel',

    ));

    $wp_customize->add_setting( 'dblogger_back_img', array(
        'default'                   => '',
        'type'                      => 'theme_mod',
        'capability'                => 'edit_theme_options',
        'sanitize_callback'         => 'esc_url_raw',
        'transport'                 => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,'dblogger_back_img', array(
        'label'                     => __( 'Background Image', '' ),
        'section'                   => 'dblogger_header',
        'settings'                  => 'dblogger_back_img',
        'context'                   => 'dblogger_back_img',
        'priority'                  => 1,
        ) 
    ) );

    $wp_customize->add_setting( 'dblogger_heder_text', array(      
        'default'                   => 'Create your own website with our free themes.' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage',             
    ) );    

    $wp_customize->add_control( 'dblogger_heder_text', array(
        'type'						=> 'text',
        'label' 					=> __( 'Heading', 'dblogger' ),
        'section'  					=> 'dblogger_header',
        'priority' 					=> 2,
    ) );	

    $wp_customize->add_setting( 'dblogger_tagline_text', array(      
        'default'                   => 'WELCOME TO DCRAZED' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage',               
    ) );    

    $wp_customize->add_control( 'dblogger_tagline_text', array(
        'type'						=> 'text',
        'label' 					=> __( 'Tagline', 'dblogger' ),
        'section'  					=> 'dblogger_header',
        'priority' 					=> 3,
    ) );	

    $wp_customize->add_setting( 'dblogger_button_text', array(      
        'default'                   => 'click more' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage',               
    ) );    

    $wp_customize->add_control( 'dblogger_button_text', array(
        'type'						=> 'text',
        'label' 					=> __( 'Button Text', 'dblogger' ),
        'section'  					=> 'dblogger_header',
        'priority' 					=> 4,
    ) );	


    $wp_customize->add_setting( 'dblogger_button_url', array(      
        'default'                   => 'www.burstfly.com' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage',               
    ) );    

    $wp_customize->add_control( 'dblogger_button_url', array(
        'type'						=> 'text',
        'label' 					=> __( 'Button Url', 'dblogger' ),
        'section'  					=> 'dblogger_header',
        'priority' 					=> 5
    ) );	  
    
   
    
    
    /***************************Banner Settings**********************/
    $wp_customize->add_section('dblogger_general_banners_controls', array(
        'title'                     => __('Banner Settings', 'dblogger'),
        'panel'                     => 'dblogger_panel',  
        'priority'                  => 100,

    ));
    
    /*banner type*/

     $wp_customize->add_setting( 'dblogger_banner_type', array( 
		'default'           => 'image'
     ));
    
    $wp_customize->add_control('dblogger_banner_type',array(
		'type'        => 'radio',
		'choices'     => array(
			'image'   => esc_html__( 'Image', 'dblogger' ),
			'adsense' => esc_html__( 'AdSense', 'dblogger' )
		),
		'label'       => esc_html__( 'The type of the banner', 'dblogger' ),
		'description' => esc_html__( 'Select what type of banner you want to use: normal image or adsense script',
		                             'dblogger' ),
		'section'     => 'dblogger_general_banners_controls',
	));
    
    
    
  /**Banner url */
    
    $wp_customize->add_setting( 'dblogger_banner_link', array(
	                            'sanitize_callback' => 'esc_url_raw',
	                            'default'           => esc_url( '#' ),
                            )
                    );
    $wp_customize->add_control('dblogger_banner_link', array(
		'label'           => esc_html__( 'Banner Link:', 'dblogger' ),
		'description'     => esc_html__( 'Add the link for banner image.', 'dblogger' ),
		'section'         => 'dblogger_general_banners_controls',
		'settings'        => 'dblogger_banner_link',
		'type'			  => 'text',	
		'active_callback' => 'banners_type_callback',
	   )
    );


    
    /*banner img*/  
    $wp_customize->add_setting( 'dblogger_banner_image',array(
	         'default'           => esc_url( get_template_directory_uri() . '/img/banner.png' ),
      )
    );
    
 $wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'dblogger_banner_image',
		array(
			'label'           => esc_html__( 'Banner Image:', 'dblogger' ),
			'description'     => esc_html__( 'Recommended size: 728 x 90', 'dblogger' ),
			'section'         => 'dblogger_general_banners_controls',
			'active_callback' => 'banners_type_callback',
		)
	)
);   
    
    
/**
 * AdSense code
 */
 $wp_customize->add_setting( 'dblogger_banner_adsense_code', array(
	                            'sanitize_callback' => 'esc_html',
	                            'default'           => ''
                            )
);

$wp_customize->add_control( 'dblogger_banner_adsense_code', array(
		'label'           => esc_html__( 'AdSense Code:', 'dblogger' ),
		'description'     => esc_html__( 'Add the code you retrieved from your AdSense account. You only need to insert the <ins> tag.', 'dblogger' ),
		'section'         => 'dblogger_general_banners_controls',
		'settings'        => 'dblogger_banner_adsense_code',
		'type'            => 'textarea',
		'active_callback' => 'banners_type_false_callback',
	)
);


    
  
    
    //************************** SOCIAL SECTION****************************************//  
    
    $wp_customize->add_section( 'social', array(
        'title'                     => __( '[Dblogger]Header Social', 'dblogger'  ),
        'priority'                  => 100,
        'panel'                     => 'dblogger_panel',  
    ) );

    $social_sites = array( 'facebook', 'twitter','instagram',  'google-plus', 'pinterest', 'linkedin', 'rss');

		foreach( $social_sites as $social_site ) {
			$wp_customize->add_setting( "social[$social_site]", array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_url_raw'
			) );

			$wp_customize->add_control( "social[$social_site]", array(
					'label'   => ucwords( $social_site ) . __( " Url:", 'dblogger' ),
					'section' => 'social',
					'type'    => 'text',
			) );
		}

  //**************************  GUIDE SECTION****************************************//    
    
    $wp_customize->add_section('dblogger_guide_section', array(
        'title'                     => __('Guide section', 'dblogger'),
        'description'               => 'Easily edit the index',
        'priority'                  => 101,
         'panel'                     => 'dblogger_panel',  
    ) );
    $wp_customize->add_setting( 'dblogger_guide_icon', array(
			'default'                   => '',
			'type'                      => 'theme_mod',
			'capability'                => 'edit_theme_options',
			'sanitize_callback'         => 'esc_url_raw',
            'transport'                 => 'postMessage',
		) );
	 $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,'dblogger_guide_icon', array(
            'label'                     => __( 'Guide Icon', '' ),
            'section'                   => 'dblogger_guide_section',
            'settings'                  => 'dblogger_guide_icon',
            'context'                   => 'dblogger_guide_icon',
            'priority'                  => 2,
            ) 
        ) );

     $wp_customize->add_setting( 'dblogger_guide_title', array(   
          'default'              =>'How to Guides',
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
            'default'               => 'Start a blog and earn money online. Learn from
                                    these amazing articles we have created for you 
                                        that help you build any type of blog from scracth.', 
            'sanitize_callback'         => 'sanitize_text_field',
            'transport'                 => 'postMessage',
        ));
     $wp_customize->add_control( 'dblogger_guide_desc', array(
            'type'                      => 'textarea',
            'label'                     => __( 'Description', 'dblogger' ),
            'section'                   => 'dblogger_guide_section',
            'priority'                  =>  3,
        ) );
      global $options_categories;
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
                'choices'    => $options_categories
            ));
    
      $wp_customize->add_setting(
      'dblogger_post_number',
		array(
            'default' => '6',
			'sanitize_callback' => 'dblogger_sanitize_integer'
		)
     );

      $wp_customize->add_control(
      'dblogger_post_number',
      array(
        'type' => 'integer',
		
        'label' => __('Number Of Slides To Show - i.e 10 (default is 6)','dblogger'),
        'section' => 'dblogger_guide_section',
		
        )
    );
    
    
  //************************** OUR THEME SECTION****************************************//    
    
    $wp_customize->add_section('dblogger_theme_section', array(
        'title'                     => __('Our Theme section', 'dblogger'),
        'description'               => 'Easily edit the index',
        'priority'                  => 102,
        'panel'                     => 'dblogger_panel',  
    ) );

  
      $wp_customize->add_setting( 'dblogger_theme_title', array(      
        'default'                   => 'Our Themes' ,
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
        'default'                   => 'click more' ,
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
        'default'                   => '#' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage',               
    ) );    

    $wp_customize->add_control( 'dblogger_theme_button_url', array(
        'type'						=> 'text',
        'label' 					=> __( 'Button Url', 'dblogger' ),
        'section'  					=> 'dblogger_theme_section',
        'priority' 					=> 5
    ) );	  


     $wp_customize->add_setting( 'dblogger_theme_link_title', array(      
        'default'                   => 'Download Now' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage',               
      ) );    

     $wp_customize->add_control( 'dblogger_theme_link_title', array(
        'type'						=> 'text',
        'label' 					=> __( 'Link Title', 'dblogger' ),
        'section'  					=> 'dblogger_theme_section',
        'priority' 					=> 6,
      ) );
    
    
     $wp_customize->add_setting(
    'dblogger_page_post_count',
		array(
            'default' => '6',
			'sanitize_callback' => 'dblogger_sanitize_integer'
		)
    );

    $wp_customize->add_control(
    'dblogger_page_post_count',
    array(
        'type' => 'integer',
		
        'label' => __('Number Of Page To Show (default - 6)','dblogger'),
        'section' => 'dblogger_theme_section',
		
        )
    );
    
    
    
    $wp_customize->add_setting( 'dblogger_theme_tag_check', array(
			'default'    => '1',
			'capability' => 'manage_options',
			'transport' => 'postMessage',
	) );
	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'dblogger_theme_tag_check', array(
			'settings' => 'dblogger_theme_tag_check',
			'label'    => __( 'Enable/Disable tag this section', 'dblogger' ),
			'section'  => 'dblogger_theme_section',
			'type'     => 'ios',
            'priority' 				   => 7,

	) ) );

    
      //************************** OUR Blog SECTION****************************************//    
    
    $wp_customize->add_section('dblogger_blog_section', array(
        'title'                     => __('Our Blog Section', 'dblogger'),
        'description'               => 'Easily edit the blog',
        'priority'                  => 103,
        'panel'                     => 'dblogger_panel', 
    ) );

  
      $wp_customize->add_setting( 'dblogger_blog_title', array(      
        'default'                   => 'From the blog' ,
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
        'default'                   => 'See more' ,
        'sanitize_callback'         => 'sanitize_text_field',
        'transport'                 => 'postMessage',               
    ) );    

    $wp_customize->add_control( 'dblogger_blog_button_text', array(
        'type'						=> 'text',
        'label' 					=> __( 'Button Text', 'dblogger' ),
        'section'  					=> 'dblogger_blog_section',
        'priority' 					=> 4,
    ) );	

    $wp_customize->add_setting(
    'dblogger_blog_post_count',
		array(
            'default' => '2',
			'sanitize_callback' => 'dblogger_sanitize_integer'
		)
    );

    $wp_customize->add_control(
    'dblogger_blog_post_count',
    array(
        'type' => 'integer',
		
        'label' => __('Number Of Blog To Show - i.e 10 (default is 2)','dblogger'),
        'section' => 'dblogger_blog_section',
		
        )
    );
        
     $wp_customize->add_setting(
    'dblogger_post_related_post_count',
		array(
            'default' => '3',
			'sanitize_callback' => 'dblogger_sanitize_integer'
		)
    );

    $wp_customize->add_control(
    'dblogger_post_related_post_count',
    array(
        'type' => 'integer',
		
        'label' => __('Number Of Related Post To Show - i.e 10 (default is 3)','dblogger'),
        'section' => 'dblogger_blog_section',
		
        )
    );
    
    
    /* Subscribe Settings
		----------------------------------------------------------------------*/
		$wp_customize->add_section( 'dblogger_newsletter' ,
			array(
				'priority'    => 110,
				'title'       => esc_html__( 'Subscribe', 'dblogger' ),
				'description' => '',
                'panel'                     => 'dblogger_panel', 
				
			)
		);
    
        $wp_customize->add_setting( 'dblogger_newsletter_disable', 
           array( 
               'default' => 0,
               /*'transport' => 'postMessage',*/
               'sanitize_callback' => 'dblogger_main_sanitize_checkbox',
               'transport'          =>'postMessage',
           ) );
    
	   $wp_customize->add_control( 'dblogger_newsletter_disable', array(
			'type'									=> 'checkbox',
			'label' 								=> __( 'Hide Subscribe?', 'dblogger' ),
			'section'  								=> 'dblogger_newsletter',
			'priority' 								=> 1,
            'description' => esc_html__('Check this box to hide subscribe form.', 'dblogger'),
        
	       ) );	
    
			// Mailchimp Form Title
		$wp_customize->add_setting( 'dblogger_newsletter_title',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => esc_html__( 'SUBSCRIBE', 'dblogger' ),
                    'transport'         => 'postMessage', 
				)
			);
		$wp_customize->add_control( 'dblogger_newsletter_title',
				array(
					'label'       => esc_html__('Subscribe Form Title', 'dblogger'),
					'section'     => 'dblogger_newsletter',
					'description' => ''
				)
			);

			// Mailchimp action url
		$wp_customize->add_setting( 'dblogger_newsletter_mailchimp',
				array(
					'sanitize_callback' => 'devfly_main_sanitize_url',
					'default'           => '',
                    'transport'         => 'postMessage', 
				)
			);
		$wp_customize->add_control( 'dblogger_newsletter_mailchimp',
				array(
					'label'       => esc_html__('MailChimp Action URL', 'dblogger'),
					'section'     => 'dblogger_newsletter',
					'description' => __( 'The newsletter form use MailChimp, please follow <a target="_blank" href="http://kb.mailchimp.com/lists/signup-forms/host-your-own-signup-forms">this guide</a> to know how to get MailChimp Action URL. Example <i>//yourlist.us8.list-manage.com/subscribe/post?u=anything</i>', 'dblogger' )
					
				)
			);
    
        $wp_customize->add_setting( 'dblogger_newsletter_det', 
               array(      
                 'default'                   => 'We protect your privacy. We provide you with high quality   updates.' ,
                 'sanitize_callback'         => 'sanitize_text_field',
                 'transport'                 => 'postMessage',               
               ) );    

        $wp_customize->add_control( 'dblogger_newsletter_det', 
             array(
                'type'						=> 'text',
                'label' 					=> __( 'Newsletter Details', 'dblogger' ),
                'section'  					=> 'dblogger_newsletter',
             ) );	
    
    
    /*fonts*/
     
      $wp_customize->add_section('dblogger_font', 
             array(
                'title'                     => __('Font', 'dblogger'),
                'description'               => 'Easily edit your body section',
                'priority'                  => 103,
          
                ));
    
    
    // paragraph
     $font_choices = customizer_library_get_font_choices();
    
     $wp_customize->add_setting( 'dblogger_paraph_font', array(
            'default'        => 'Open Sans',
        ) );

        $wp_customize->add_control( 'dblogger_paraph_font', array(
            'label'   => 'Dblogger Paragragh Font Family',
            'section' => 'dblogger_font',
            'type'    => 'select',
            'choices' => $font_choices,
            'priority' => 1,
			));
    
    $wp_customize->add_setting( 'dblogger_paraph_font_color', 
            array(
                'default' => '#9C9C9C', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color', 
            ) );
	 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dblogger_paraph_font_color', 
           array(
			'label'      => esc_attr__( 'Paragraph Font Color', 'dblogger' ),
			'section'    => 'dblogger_font',
               'priority'   => 2,
		) ) );    

    
     $wp_customize->add_setting( 'dblogger_paragragph_font_size', array(
			'default'       => get_theme_mod( 'dblogger_paragragph_font_size', '24px' ),
			'capability'    => 'edit_theme_options',
			'transport'     => 'refresh',
	) );

	$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'dblogger_paragragph_font_size', array(
			'type'     => 'range-value',
			'section'  => 'dblogger_font',
			'settings' => 'dblogger_paragragph_font_size',
			'label'    => __( 'Paragraph Font Width' ),
			'input_attrs' => array(
				'min'    => 11,
				'max'    => 24,
				'step'   => 1,
				'suffix' => 'px',
		  ),
        'priority'   => 3,
	) ) );
    
    /*font */
       
    $wp_customize->add_setting( 'dblogger_font_family', array(
            'default'        => 'Open Sans',
             'transport'     => 'refresh',
        ) );

    $wp_customize->add_control( 'dblogger_font_family', array(
        'label'   => 'Dblogger Font Family',
        'section' => 'dblogger_font',
        'type'    => 'select',
        'choices' => $font_choices,
        'priority' => 4,
        ));
        
    
    $wp_customize->add_setting( 'dblogger_font_color', 
            array(
                'default' => '#5a5a5a', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color', 
            ) );
	 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dblogger_font_color', 
           array(
			'label'      => esc_attr__( 'Font Color', 'dblogger' ),
			'section'    => 'dblogger_font',
               'priority'   => 5,
		) ) );
    
    
    
}
add_action( 'customize_register', 'dblogger_customize_register' );


function dblogger_sanitize_integer( $input ) {
    	if( is_numeric( $input ) ) {
        return intval( $input );
   	}
	}

function dblogger_sanitize_slidecat( $input ) {
    global $options_categories;
    if ( array_key_exists( $input, $options_categories ) ) {
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

function banners_type_callback( $control ) {
	if ( $control->manager->get_setting( 'dblogger_banner_type' )->value() == 'image' ) {
		return true;
	}

	return false;
}

function banners_type_false_callback( $control ) {
	if ( $control->manager->get_setting( 'dblogger_banner_type' )->value() == 'image' ) {
		return false;
	}

	return true;
}




/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function dblogger_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function dblogger_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dblogger_customize_preview_js() {
	wp_enqueue_script( 'dblogger-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'dblogger_customize_preview_js' );
