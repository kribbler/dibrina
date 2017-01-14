<?php

/* LOGO 
------------------------------------------------------- */ 

if ( ! function_exists( 'po_logo' ) ) {
function po_logo( $wp_customize ) {
    $wp_customize->add_section(
        'logo',
        array(
            'title' => 'Logo',
			'description' => 'For retina, upload a logo double in size, then enter half the height of the uploaded logo (in px).',
            'priority' => 1,
        )
    );
	
	$wp_customize->add_setting( 'logo_upload', array(
        'sanitize_callback' => 'esc_url_raw',
	) );
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'logo_upload',
			array(
				'label' => 'Logo Upload',
				'section' => 'logo',
				'settings' => 'logo_upload',
				'priority' => 1,
			)
		)
	);
	
	$wp_customize->add_setting( 'logo_height', array(
		'default' => '100',											 
        'sanitize_callback' => 'absint',
    ) );
 
	$wp_customize->add_control( 'logo_height', array(
			'type'        => 'range',
			'priority'    => 2,
			'section'     => 'logo',
			'label'       => 'Logo Height',
			'description' => 'Adjust height of logo.',
			'input_attrs' => array(
				'min'   => 10,
				'max'   => 200,
				'step'  => 1,
				'class' => 'test-class test',
				'style' => 'color: #0a0',
			),
		) 
	);
	
	$wp_customize->add_setting( 'logo_height_mobile', array(
		'default' => '100',															
        'sanitize_callback' => 'absint',
    ) );
 
	$wp_customize->add_control( 'logo_height_mobile', array(
			'type'        => 'range',
			'priority'    => 3,
			'section'     => 'logo',
			'label'       => 'Logo Height (Mobile)',
			'description' => 'Adjust height of logo in mobile view.',
			'input_attrs' => array(
				'min'   => 10,
				'max'   => 200,
				'step'  => 1,
				'class' => 'test-class test',
				'style' => 'color: #0a0',
			),
		) 
	);
	
	$wp_customize->add_setting(
		'logo_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control(
		'logo_url',
		array(
			'label' => 'Logo URL',
			'section' => 'logo',
			'type' => 'text',
			'priority' => 4,
		)
	);
	
	$wp_customize->add_setting( 'blog_logo_upload', array(
        'sanitize_callback' => 'esc_url_raw',
	) );
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'blog_logo_upload',
			array(
				'label' => ' Blog Logo Upload',
				'description' => 'Only appears on blog home and post pages.',
				'section' => 'logo',
				'settings' => 'blog_logo_upload',
				'priority' => 6,
			)
		)
	);
	
	$wp_customize->add_setting( 'blog_logo_height', array(
		'default' => '100',											 
        'sanitize_callback' => 'absint',
    ) );
 
	$wp_customize->add_control( 'blog_logo_height', array(
			'type'        => 'range',
			'priority'    => 7,
			'section'     => 'logo',
			'label'       => 'Blog Logo Height',
			'description' => 'Adjust height of blog logo.',
			'input_attrs' => array(
				'min'   => 10,
				'max'   => 200,
				'step'  => 1,
				'class' => 'test-class test',
				'style' => 'color: #0a0',
			),
		) 
	);
	
	$wp_customize->add_setting( 'blog_logo_height_mobile', array(
		'default' => '100',															
        'sanitize_callback' => 'absint',
    ) );
 
	$wp_customize->add_control( 'blog_logo_height_mobile', array(
			'type'        => 'range',
			'priority'    => 8,
			'section'     => 'logo',
			'label'       => 'Blog Logo Height (Mobile)',
			'description' => 'Adjust height of blog logo in mobile view.',
			'input_attrs' => array(
				'min'   => 10,
				'max'   => 200,
				'step'  => 1,
				'class' => 'test-class test',
				'style' => 'color: #0a0',
			),
		) 
	);
	
	$wp_customize->add_setting(
		'blog_logo_hide',
		array(
			'sanitize_callback' => 'po_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'blog_logo_hide',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Blog Logo',
			'section' => 'logo',
			'priority' => 9,
		)
	);
	
	$wp_customize->add_setting(
		'favicon_url',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'favicon_url',
		array(
			'label' => 'Favicon URL',
			'section' => 'logo',
			'type' => 'text',
			'priority' => 10,
		)
	);

}
}
add_action( 'customize_register', 'po_logo' );


/* GENERAL 
------------------------------------------------------- */ 

if ( ! function_exists( 'po_general' ) ) {
function po_general( $wp_customize ) {
    $wp_customize->add_section(
        'general',
        array(
            'title' => 'General',
            'priority' => 2,
        )
    );
	
	$wp_customize->add_setting( 'blog_image_upload', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'blog_image_upload',
			array(
				'label' => 'Blog Background',
				'section' => 'general',
				'settings' => 'blog_image_upload',
				'priority' => 5,
			)
		)
	);
	
	$wp_customize->add_setting(
		'blog_image_overlay_hide',
		array(
			'sanitize_callback' => 'po_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'blog_image_overlay_hide',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Blog Background Overlay',
			'section' => 'general',
			'priority' => 7,
		)
	);
	
	
}
}
add_action( 'customize_register', 'po_general' );


/* PORTFOLIO 
------------------------------------------------------- */ 
if ( ! function_exists( 'po_portfolio' ) ) {
function po_portfolio( $wp_customize ) {
    $wp_customize->add_section(
        'portfolio',
        array(
            'title' => 'Portfolio',
            'priority' => 3,
        )
    );
	
	$wp_customize->add_setting(
    'portfolio_overlay',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	 
	$wp_customize->add_control(
		'portfolio_overlay',
		array(
			'type' => 'select',
			'label' => 'Overlay',
			'section' => 'portfolio',
			'priority' => 2,
			'choices' => array(
				'' => 'Solid',
				'portfolio-opacity' => 'Transparent',
				'portfolio-remove' => 'Remove',
			),
		)
	);
	
	$wp_customize->add_setting( 'portfolio_opacity', array(
		'default' => '9',											 
        'sanitize_callback' => 'absint',
    ) );
 
	$wp_customize->add_control( 'portfolio_opacity', array(
			'type'        => 'range',
			'priority'    => 3,
			'section'     => 'portfolio',
			'label'       => 'Overlay Transparency',
			'input_attrs' => array(
				'min'   => 6,
				'max'   => 9,
				'step'  => 1,
				'class' => 'test-class test',
				'style' => 'color: #0a0',
			),
		) 
	);
	$wp_customize->add_setting(
		'portfolio_title',
		array(
			'default' => __('Portfolio','pixelobject'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'portfolio_title',
		array(
			'label' => 'Archive Header',
			'description' => 'Header of portfolio archive page.',
			'section' => 'portfolio',
			'type' => 'text',
			'priority' => 4,
		)
	);
	$wp_customize->add_setting(
		'portfolio_category',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'portfolio_category',
		array(
			'label' => 'Archive Category',
			'description' => 'Category of portfolio items to show on portfolio archive page. Separate with commas for multiple categories.',
			'section' => 'portfolio',
			'type' => 'text',
			'priority' => 5,
		)
	);
	$wp_customize->add_setting(
    'portfolio_order',
		array(
			'default' => 'DESC',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	 
	$wp_customize->add_control(
		'portfolio_order',
		array(
			'type' => 'select',
			'label' => 'Archive Order',
			'section' => 'portfolio',
			'priority' => 6,
			'choices' => array(
				'DESC' => 'Descending',
				'ASC' => 'Ascending',
			),
		)
	);
	$wp_customize->add_setting(
    'portfolio_orderby',
		array(
			'default' => 'date',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	 
	$wp_customize->add_control(
		'portfolio_orderby',
		array(
			'type' => 'select',
			'label' => 'Archive Orderby',
			'section' => 'portfolio',
			'priority' => 8,
			'choices' => array(
				'date' => 'Date',
				'title' => 'Title',
				'modified' => 'Last modified',
				'rand' => 'Random',
			),
		)
	);
	$wp_customize->add_setting(
		'portfolio_name',
		array(
			'default' => __('Portfolio','pixelobject'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'portfolio_name',
		array(
			'label' => 'Post Type Name',
			'description' => 'Name of custom post type.',
			'section' => 'portfolio',
			'type' => 'text',
			'priority' => 10,
		)
	);
	$wp_customize->add_setting(
		'portfolio_slug',
		array(
			'default' => __('portfolio','pixelobject'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'portfolio_slug',
		array(
			'label' => 'Post Type Slug',
			'description' => 'Name of custom post type, as it appears within url. Make sure letters are lowercase.',
			'section' => 'portfolio',
			'type' => 'text',
			'priority' => 12,
		)
	);
}
}
add_action( 'customize_register', 'po_portfolio' );


/* TEAM 
------------------------------------------------------- */ 

if ( ! function_exists( 'po_team' ) ) {
function po_team( $wp_customize ) {
    $wp_customize->add_section(
        'team',
        array(
            'title' => 'Team',
            'priority' => 4,
        )
    );
	$wp_customize->add_setting(
		'team_title',
		array(
			'default' => __('Meet the team','pixelobject'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'team_title',
		array(
			'label' => 'Archive Header',
			'section' => 'team',
			'type' => 'text',
			'priority' => 1,
		)
	);
	$wp_customize->add_setting(
		'team_subtitle',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'team_subtitle',
		array(
			'label' => 'Archive Subtitle',
			'section' => 'team',
			'type' => 'text',
			'priority' => 2,
		)
	);
	$wp_customize->add_setting(
		'team_category',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'team_category',
		array(
			'label' => 'Archive Category',
			'section' => 'team',
			'type' => 'text',
			'priority' => 3,
		)
	);
	$wp_customize->add_setting(
    'team_order',
		array(
			'default' => 'DESC',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	 
	$wp_customize->add_control(
		'team_order',
		array(
			'type' => 'select',
			'label' => 'Order',
			'section' => 'team',
			'priority' => 4,
			'choices' => array(
				'DESC' => 'Descending',
				'ASC' => 'Ascending',
			),
		)
	);
	$wp_customize->add_setting(
    'team_orderby',
		array(
			'default' => 'date',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	 
	$wp_customize->add_control(
		'team_orderby',
		array(
			'type' => 'select',
			'label' => 'Orderby',
			'section' => 'team',
			'priority' => 5,
			'choices' => array(
				'date' => 'Date',
				'title' => 'Title',
				'modified' => 'Last modified',
				'rand' => 'Random',
			),
		)
	);
	$wp_customize->add_setting(
    'team_columns',
		array(
			'default' => '3',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	 
	$wp_customize->add_control(
		'team_columns',
		array(
			'type' => 'select',
			'label' => 'Columns',
			'section' => 'team',
			'priority' => 6,
			'choices' => array(
				'6' => '2',
				'4' => '3',
				'3' => '4',
				'2' => '6',
			),
		)
	);
	$wp_customize->add_setting(
		'team_name',
		array(
			'default' => __('Team','pixelobject'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'team_name',
		array(
			'label' => 'Post Type Name',
			'description' => 'Name of custom post type.',
			'section' => 'team',
			'type' => 'text',
			'priority' => 7,
		)
	);
	$wp_customize->add_setting(
		'team_slug',
		array(
			'default' => __('team','pixelobject'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'team_slug',
		array(
			'label' => 'Post Type Slug',
			'description' => 'Name of custom post type, as it appears within url. Make sure letters are lowercase.',
			'section' => 'team',
			'type' => 'text',
			'priority' => 8,
		)
	);
}
}
add_action( 'customize_register', 'po_team' );

/* SOCIAL
------------------------------------------------------- */ 
if ( ! function_exists( 'po_social_profiles' ) ) {
function po_social_profiles( $wp_customize ) {
    $wp_customize->add_section(
        'social_profiles',
        array(
            'title' => 'Social',
            'description' => 'The fields below power the social shortcode. If you include a link/username here, then the icon will be included in the shortcodes output.',
            'priority' => 5,
        )
    );
	$wp_customize->add_setting(
		'email_address',
		array(
			'sanitize_callback' => 'sanitize_email',
		)
	);
	$wp_customize->add_control(
		'email_address',
		array(
			'label' => 'Email Address',
			'section' => 'social_profiles',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'twitter_username',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'twitter_username',
		array(
			'label' => 'Twitter Username',
			'section' => 'social_profiles',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'facebook_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control(
		'facebook_url',
		array(
			'label' => 'Facebook URL',
			'section' => 'social_profiles',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'googleplus_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control(
		'googleplus_url',
		array(
			'label' => 'Google Plus URL',
			'section' => 'social_profiles',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'pinterest_username',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'pinterest_username',
		array(
			'label' => 'Pinterest Username',
			'section' => 'social_profiles',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'youtube_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control(
		'youtube_url',
		array(
			'label' => 'Youtube URL',
			'section' => 'social_profiles',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'vimeo_username',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'vimeo_username',
		array(
			'label' => 'Vimeo Username',
			'section' => 'social_profiles',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'linkedin_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control(
		'linkedin_url',
		array(
			'label' => 'LinkedIn URL',
			'section' => 'social_profiles',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'github_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control(
		'github_url',
		array(
			'label' => 'Github URL',
			'section' => 'social_profiles',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'foursquare_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control(
		'foursquare_url',
		array(
			'label' => 'Foursquare URL',
			'section' => 'social_profiles',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'instagram_username',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'instagram_username',
		array(
			'label' => 'Instagram Username',
			'section' => 'social_profiles',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'flickr_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control(
		'flickr_url',
		array(
			'label' => 'Flickr URL',
			'section' => 'social_profiles',
			'type' => 'text',
		)
	);
}
}
add_action( 'customize_register', 'po_social_profiles' );


/* FOOTER
------------------------------------------------------- */ 

if ( ! function_exists( 'po_footer_details' ) ) {
function po_footer_details( $wp_customize ) {
    $wp_customize->add_section(
        'footer_details',
        array(
            'title' => 'Footer',
            'priority' => 6,
        )
    );
	
	$wp_customize->add_setting(
		'footer_button_text',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Call-To-Action Button Text',
		)
	);
	$wp_customize->add_control(
		'footer_button_text',
		array(
			'label' => 'Call-To-Action Button Text',
			'section' => 'footer_details',
			'type' => 'text',
			'priority' => 1,
		)
	);
	
	$wp_customize->add_setting(
		'footer_button_icon',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'fa-credit-card',
		)
	);
	$wp_customize->add_control(
		'footer_button_icon',
		array(
			'label' => 'Call-To-Action Button Icon',
			'description' => 'Enter a <a href="http://fortawesome.github.io/Font-Awesome/icons/">FontAwesome</a> or Linecons code here.',
			'section' => 'footer_details',
			'type' => 'text',
			'priority' => 2,
		)
	);
	$wp_customize->add_setting(
		'footer_button_link',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'footer_button_link',
		array(
			'label' => 'Call-To-Action Button URL',
			'section' => 'footer_details',
			'type' => 'text',
			'priority' => 3,
		)
	);
	
}
}
add_action( 'customize_register', 'po_footer_details' );


/* TYPOGRAPHY
------------------------------------------------------- */ 
if ( ! function_exists( 'po_typography' ) ) {
function po_typography( $wp_customize ) {
    $wp_customize->add_section(
        'typography',
        array(
            'title' => 'Typography',
			'description' => 'First, get <a href="https://www.google.com/fonts" target="_blank">Google Fonts</a> or <a href="http://pixelobject.com/tutorials/font-setup/" target="_blank">learn more</a>.',
            'priority' => 7,
        )
    );
	
	$wp_customize->add_setting(
		'family_code',
		array(
			'default' => 'Source+Sans+Pro:300,400,600',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'family_code',
		array(
			'label' => 'Font Family Code',
			'section' => 'typography',
			'type' => 'text',
			'priority' => 1,
		)
	);
	$wp_customize->add_setting(
		'header_font',
		array(
			'sanitize_callback' => 'sanitize_text_field', 
			'default' => "'Source Sans Pro', sans-serif;",
			
		)
	);
	$wp_customize->add_control(
		'header_font',
		array(
			'label' => 'Header CSS',
			'section' => 'typography',
			'type' => 'text',
			'priority' => 2,
		)
	);
	$wp_customize->add_setting(
		'body_font',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => "'Source Sans Pro', sans-serif;",
			
		)
	);
	$wp_customize->add_control(
		'body_font',
		array(
			'label' => 'Body CSS',
			'section' => 'typography',
			'type' => 'text',
			'priority' => 3,
		)
	);
}
}
add_action( 'customize_register', 'po_typography' );


/* COLORS - ACCENT
------------------------------------------------------- */ 

if ( ! function_exists( 'po_accent_colors' ) ) {
function po_accent_colors( $wp_customize ) {
    $wp_customize->add_section(
        'accent_colors',
        array(
            'title' => 'Colors - Accent',
            'priority' => 8,
        )
    );
	$wp_customize->add_setting(
		'accent',
		array(
			'default' => '#20C596',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'accent',
			array(
				'label' => 'Accent',
				'section' => 'accent_colors',
				'settings' => 'accent',
				'priority' => 1,
			)
		)
	);
	$wp_customize->add_setting(
		'secondary_accent',
		array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_accent',
			array(
				'label' => 'Secondary Accent',
				'section' => 'accent_colors',
				'settings' => 'secondary_accent',
				'priority' => 2,
			)
		)
	);
}
}
add_action( 'customize_register', 'po_accent_colors' );



/* COLORS - NAV
------------------------------------------------------- */ 
if ( ! function_exists( 'po_nav_colors' ) ) {
function po_nav_colors( $wp_customize ) {
    $wp_customize->add_section(
        'nav_colors',
        array(
            'title' => 'Colors - Nav',
            'priority' => 9,
        )
    );
	$wp_customize->add_setting(
		'nav_text_custom',
		array(
			'sanitize_callback' => 'po_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'nav_text_custom',
		array(
			'type' => 'checkbox',
			'label' => 'Use Custom Text Colors',
			'section' => 'nav_colors',
			'priority' => 1,
		)
	);
	$wp_customize->add_setting(
		'nav_text',
		array(
			'default' => '#5B5E5F',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'nav_text',
			array(
				'label' => 'Text',
				'section' => 'nav_colors',
				'settings' => 'nav_text',
				'priority' => 2,
			)
		)
	);
	$wp_customize->add_setting(
		'nav_text_hover',
		array(
			'default' => '#FFFFFF',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'nav_text_hover',
			array(
				'label' => 'Text Hover',
				'section' => 'nav_colors',
				'settings' => 'nav_text_hover',
				'priority' => 3,
			)
		)
	);
	$wp_customize->add_setting(
		'nav_background',
		array(
			'default' => '#15191B',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'nav_background',
			array(
				'label' => 'Background',
				'section' => 'nav_colors',
				'settings' => 'nav_background',
				'priority' => 4,
			)
		)
	);
	$wp_customize->add_setting(
		'search_background',
		array(
			'default' => '#20C596',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'search_background',
			array(
				'label' => 'Search Background',
				'section' => 'nav_colors',
				'settings' => 'search_background',
				'priority' =>5,
			)
		)
	);
}
}
add_action( 'customize_register', 'po_nav_colors' );


/* COLORS - BLOG
------------------------------------------------------- */ 
if ( ! function_exists( 'po_blog_colors' ) ) {
function po_blog_colors( $wp_customize ) {
    $wp_customize->add_section(
        'blog_colors',
        array(
            'title' => 'Colors - Blog',
            'priority' => 10,
        )
    );
	$wp_customize->add_setting(
		'blog_image_overlay',
		array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'blog_image_overlay',
			array(
				'label' => 'Blog Background Overlay Color',
				'section' => 'blog_colors',
				'settings' => 'blog_image_overlay',
				'priority' => 6,
			)
		)
	);
}
}
add_action( 'customize_register', 'po_blog_colors' );



/* COLORS - SLIDER
------------------------------------------------------- */ 
if ( ! function_exists( 'po_slider_colors' ) ) {
function po_slider_colors( $wp_customize ) {
    $wp_customize->add_section(
        'slider_colors',
        array(
            'title' => 'Colors - Slider',
            'priority' => 11,
        )
    );
	$wp_customize->add_setting(
		'slider_overlay',
		array(
			'default' => '#20C596',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'slider_overlay',
			array(
				'label' => 'Overlay',
				'section' => 'slider_colors',
				'settings' => 'slider_overlay',
				'priority' => 1,
			)
		)
	);
	$wp_customize->add_setting(
		'slider_title',
		array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'slider_title',
			array(
				'label' => 'Title',
				'section' => 'slider_colors',
				'settings' => 'slider_title',
				'priority' => 2,
			)
		)
	);
	
}
}
add_action( 'customize_register', 'po_slider_colors' );


/* COLORS - CONTACT
------------------------------------------------------- */ 
if ( ! function_exists( 'po_contact_colors' ) ) {
function po_contact_colors( $wp_customize ) {
    $wp_customize->add_section(
        'contact_colors',
        array(
            'title' => 'Colors - Form',
            'priority' => 12,
        )
    );
	$wp_customize->add_setting(
		'form_borders',
		array(
			'default' => '#ddd',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'form_borders',
			array(
				'label' => 'Form Borders',
				'section' => 'contact_colors',
				'settings' => 'form_borders',
				'priority' => 1,
			)
		)
	);
}
}
add_action( 'customize_register', 'po_contact_colors' );

/* COLORS - SOCIAL
------------------------------------------------------- */ 
if ( ! function_exists( 'po_social_colors' ) ) {
function po_social_colors( $wp_customize ) {
    $wp_customize->add_section(
        'social_colors',
        array(
            'title' => 'Colors - Social',
            'priority' => 13,
        )
    );
	$wp_customize->add_setting(
		'social_icons',
		array(
			'default' => '#B9BABB',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'social_icons',
			array(
				'label' => 'Social Icons',
				'section' => 'social_colors',
				'settings' => 'social_icons',
				'priority' => 8,
			)
		)
	);
}
}
add_action( 'customize_register', 'po_social_colors' );


/* COLORS - FOOTER
------------------------------------------------------- */ 

if ( ! function_exists( 'po_footer_colors' ) ) {
function po_footer_colors( $wp_customize ) {
    $wp_customize->add_section(
        'footer_colors',
        array(
            'title' => 'Colors - Footer',
            'priority' => 14,
        )
    );
	
	$wp_customize->add_setting(
    'footer_button_color_type',
		array(
			'default' => 'dark',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	 
	$wp_customize->add_control(
		'footer_button_color_type',
		array(
			'type' => 'select',
			'label' => 'Call-To-Action Button Color',
			'section' => 'footer_colors',
			'priority' => 1,
			'choices' => array(
				'dark' => 'dark',
				'light' => 'light',
				'white' => 'white',
				'custom' => 'custom',
			),
		)
	);
	
	$wp_customize->add_setting(
		'footer_button_color',
		array(
			'default' => '#2A3236',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_button_color',
			array(
				'label' => 'Call-To-Action Button Custom Color',
				'section' => 'footer_colors',
				'settings' => 'footer_button_color',
				'priority' => 2,
			)
		)
	);
	
	$wp_customize->add_setting(
		'footer_background',
		array(
			'default' => '#15191B',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_background',
			array(
				'label' => 'Background',
				'section' => 'footer_colors',
				'settings' => 'footer_background',
				'priority' => 3,
			)
		)
	);
	$wp_customize->add_setting(
		'footer_headers',
		array(
			'default' => '#97999A',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_headers',
			array(
				'label' => 'Headers',
				'section' => 'footer_colors',
				'settings' => 'footer_headers',
				'priority' => 5,
			)
		)
	);
	
	$wp_customize->add_setting(
		'footer_twitter_username',
		array(
			'default' => '#3D4142',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_twitter_username',
			array(
				'label' => 'Twitter Name',
				'section' => 'footer_colors',
				'settings' => 'footer_twitter_username',
				'priority' => 9,
			)
		)
	);
	$wp_customize->add_setting(
		'footer_twitter_username_hover',
		array(
			'default' => '#797B7C',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_twitter_username_hover',
			array(
				'label' => 'Twitter Name Hover',
				'section' => 'footer_colors',
				'settings' => 'footer_twitter_username_hover',
				'priority' => 11,
			)
		)
	);
	$wp_customize->add_setting(
		'footer_text',
		array(
			'default' => '#6B6E6F',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_text',
			array(
				'label' => 'Text',
				'section' => 'footer_colors',
				'settings' => 'footer_text',
				'priority' => 13,
			)
		)
	);
	$wp_customize->add_setting(
		'footer_links',
		array(
			'default' => '#999B9C',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_links',
			array(
				'label' => 'Links',
				'section' => 'footer_colors',
				'settings' => 'footer_links',
				'priority' => 15,
			)
		)
	);
	$wp_customize->add_setting(
		'footer_links_hover',
		array(
			'default' => '#E1E1E1',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_links_hover',
			array(
				'label' => 'Links Hover',
				'section' => 'footer_colors',
				'settings' => 'footer_links_hover',
				'priority' => 17,
			)
		)
	);
	$wp_customize->add_setting(
		'footer_bottom_background',
		array(
			'default' => '#1B2022',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_bottom_background',
			array(
				'label' => 'Bottom Background',
				'section' => 'footer_colors',
				'settings' => 'footer_bottom_background',
				'priority' => 21,
			)
		)
	);
	$wp_customize->add_setting(
		'footer_bottom_text',
		array(
			'default' => '#636768',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_bottom_text',
			array(
				'label' => 'Bottom Text',
				'section' => 'footer_colors',
				'settings' => 'footer_bottom_text',
				'priority' => 23,
			)
		)
	);
	$wp_customize->add_setting(
		'footer_bottom_links',
		array(
			'default' => '#818485',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_bottom_links',
			array(
				'label' => 'Bottom Links',
				'section' => 'footer_colors',
				'settings' => 'footer_bottom_links',
				'priority' => 25,
			)
		)
	);
	$wp_customize->add_setting(
		'footer_bottom_links_hover',
		array(
			'default' => '#D9D9DA',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_bottom_links_hover',
			array(
				'label' => 'Bottom Links Hover',
				'section' => 'footer_colors',
				'settings' => 'footer_bottom_links_hover',
				'priority' => 27,
			)
		)
	);
}
}
add_action( 'customize_register', 'po_footer_colors' );


?>