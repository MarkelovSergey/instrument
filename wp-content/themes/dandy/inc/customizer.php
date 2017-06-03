<?php
/**
 * Dandy Theme Customizer.
 *
 * @package Dandy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dandy_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}
add_action( 'customize_register', 'dandy_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dandy_customize_preview_js() {
	wp_enqueue_script( 'dandy_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'dandy_customize_preview_js' );
/**
 * Customizer css
 */
function dandy_pro_customizer_script() {
	wp_enqueue_style( 'dandypro-customizer-style', get_template_directory_uri() .'/inc/css/customizer-style.css');
}
add_action( 'customize_controls_enqueue_scripts', 'dandy_pro_customizer_script' );

/**
 * Register Custom Settings
 */
function dandy_custom_settings_register( $wp_customize ) {
	
	/*
	Start Dandy Colors
	=====================================================
	*/
	
	$colors = array();
	
	$colors[] = array(
	'slug'=>'dandy_site_color', 
	'default' => '#f18500',
	'label' => __('Primary Color', 'dandy')
	);
	
	$colors[] = array(
	'slug'=>'dandy_site_color_hover', 
	'default' => '#f99e2f',
	'label' => __('Primary Hover Color', 'dandy')
	);

	foreach( $colors as $dandy_theme_options ) {
		// SETTINGS
		$wp_customize->add_setting( 'dandy_theme_options[' . $dandy_theme_options['slug'] . ']', array(
			'default' => $dandy_theme_options['default'],
			'type' => 'option', 
			'sanitize_callback' => 'sanitize_hex_color',
			'capability' => 'edit_theme_options'
		)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$dandy_theme_options['slug'], 
				array('label' => $dandy_theme_options['label'], 
				'section' => 'colors',
				'settings' =>'dandy_theme_options[' . $dandy_theme_options['slug'] . ']',
				)
			)
		);
	}

	/*
	Start dandy Options
	=====================================================
	*/
	$wp_customize->add_section( 'geco_dandy_options', array(
	     'title'    => esc_attr__( 'Dandy Theme Options', 'dandy' ),
	     'priority' => 50,
	) );
	
	/*
	Show Top Header
	=====================================================
	*/
	$wp_customize->add_setting('dandy_theme_options_topheader', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dandy_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('dandy_theme_options_topheader', array(
        'label'      => __( 'Show Top Header', 'dandy' ),
        'section'    => 'geco_dandy_options',
        'settings'   => 'dandy_theme_options_topheader',
        'type'       => 'checkbox',
    ) );
	
	/*
	Show Breadcrumb
	=====================================================
	*/
	$wp_customize->add_setting('dandy_theme_options_BreadYes', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dandy_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('dandy_theme_options_BreadYes', array(
        'label'      => __( 'Show Breadcrumb', 'dandy' ),
        'section'    => 'geco_dandy_options',
        'settings'   => 'dandy_theme_options_BreadYes',
        'type'       => 'checkbox',
    ) );
	
	/*
	Show flash news
	=====================================================
	*/
	$wp_customize->add_setting('dandy_theme_options_showflashnews', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dandy_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('dandy_theme_options_showflashnews', array(
        'label'      => __( 'Show Flash News', 'dandy' ),
        'section'    => 'geco_dandy_options',
        'settings'   => 'dandy_theme_options_showflashnews',
        'type'       => 'checkbox',
    ) );
	
	/*
	Flash news text
	=====================================================
	*/
	$wp_customize->add_setting('dandy_theme_options_flashnewstext', array(
        'default'    => 'Flash News',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr'
    ) );
	
	$wp_customize->add_control('dandy_theme_options_flashnewstext', array(
        'label'      => __( 'Flash News: text to show', 'dandy' ),
        'section'    => 'geco_dandy_options',
        'settings'   => 'dandy_theme_options_flashnewstext',
        'type'       => 'text',
    ) );
	
	/*
	Footer Text
	=====================================================
	*/
	
	$wp_customize->add_setting('dandy_theme_options_footerTextDandy', array(
        'default'    => 'Proudly powered by WordPress',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
    ) );
	
	$wp_customize->add_control('dandy_theme_options_footerTextDandy', array(
        'label'      => __( 'Show Footer Text', 'dandy' ),
        'section'    => 'geco_dandy_options',
        'settings'   => 'dandy_theme_options_footerTextDandy',
        'type'       => 'text',
    ) );
	
	/*
	Start dandy Social
	=====================================================
	*/
	$wp_customize->add_section( 'geco_dandy_socialmedia', array(
	     'title'    => esc_attr__( 'Social Network', 'dandy' ),
	     'priority' => 50,
	) );
	
	/*
	Show social on header
	=====================================================
	*/
	$wp_customize->add_setting('dandy_theme_options_socialheader', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dandy_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('dandy_theme_options_socialheader', array(
        'label'      => __( 'Show Social Buttons on Header', 'dandy' ),
        'section'    => 'geco_dandy_socialmedia',
        'settings'   => 'dandy_theme_options_socialheader',
        'type'       => 'checkbox',
    ) );
	
	/*
	Show social on footer
	=====================================================
	*/
	$wp_customize->add_setting('dandy_theme_options_socialfooter', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dandy_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('dandy_theme_options_socialfooter', array(
        'label'      => __( 'Show Social Buttons on Footer', 'dandy' ),
        'section'    => 'geco_dandy_socialmedia',
        'settings'   => 'dandy_theme_options_socialfooter',
        'type'       => 'checkbox',
    ) );

	/*
	Social Icons
	=====================================================
	*/
	$socialmedia = array();
	
	$socialmedia[] = array(
	'slug'=>'facebookurl', 
	'default' => '',
	'label' => __('Facebook URL', 'dandy')
	);
	$socialmedia[] = array(
	'slug'=>'twitterurl', 
	'default' => '',
	'label' => __('Twitter URL', 'dandy')
	);
	$socialmedia[] = array(
	'slug'=>'googleplusurl', 
	'default' => '',
	'label' => __('Google Plus URL', 'dandy')
	);
	$socialmedia[] = array(
	'slug'=>'linkedinurl', 
	'default' => '',
	'label' => __('Linkedin URL', 'dandy')
	);
	$socialmedia[] = array(
	'slug'=>'instagramurl', 
	'default' => '',
	'label' => __('Instagram URL', 'dandy')
	);
	$socialmedia[] = array(
	'slug'=>'youtubeurl', 
	'default' => '',
	'label' => __('YouTube URL', 'dandy')
	);
	$socialmedia[] = array(
	'slug'=>'pinteresturl', 
	'default' => '',
	'label' => __('Pinterest URL', 'dandy')
	);
	$socialmedia[] = array(
	'slug'=>'tumblrurl', 
	'default' => '',
	'label' => __('Tumblr URL', 'dandy')
	);
	$socialmedia[] = array(
	'slug'=>'vkurl', 
	'default' => '',
	'label' => __('VK URL', 'dandy')
	);
	
	foreach( $socialmedia as $dandy_theme_options ) {
		// SETTINGS
		$wp_customize->add_setting(
			'dandy_theme_options_' . $dandy_theme_options['slug'], array(
				'default' => $dandy_theme_options['default'],
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'type'     => 'theme_mod',
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			$dandy_theme_options['slug'], 
			array('label' => $dandy_theme_options['label'], 
			'section'    => 'geco_dandy_socialmedia',
			'settings' =>'dandy_theme_options_' . $dandy_theme_options['slug'],
			)
		);
	}
		
}
add_action( 'customize_register', 'dandy_custom_settings_register' );

function dandy_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

function dandy_sanitize_select( $input ) {
	return wp_filter_nohtml_kses( $input );
}


/**
 * Add Custom CSS to Header 
 */
function dandy_custom_css_styles() { 
	global $dandy_theme_options;
	$se_options = get_option( 'dandy_theme_options', $dandy_theme_options );
	if( isset( $se_options[ 'dandy_site_color' ] ) ) {
		$dandy_site_color = $se_options['dandy_site_color'];
	}
	if( isset( $se_options[ 'dandy_site_color_hover' ] ) ) {
		$dandy_site_color_hover = $se_options['dandy_site_color_hover'];
	}
?>
<style type="text/css">
	<?php if (!empty($dandy_site_color) && $dandy_site_color != '#f18500' ) : ?>
		.main-navigation a,
		.comment-metadata a,
		.reply a,
		.dandyBreadcrumb a,
		.spacesocial,
		.widget-area h2, 
		#footer-sidebar h3,
		.entry-title a, 
		.cat-links a,
		.tags-links a,
		.comments-link a,
		.edit-link a, 
		.moretag a,
		.site-info a,
		.site-main .navigation.pagination .nav-links .current,
		.site-main .navigation.pagination .nav-links a:hover,
		.nav-previous a,
		.nav-next a,
		.smallPart a,
		.more-tag a,
		.site-title a,
		.site-title a:hover,
		.entry-content a,
		.entry-header h1,
		.page-header h1,
		ul#dandyFlash li a,
		.menu-toggle:hover, 
		.menu-toggle:focus,
		.main-navigation.toggled .menu-toggle,
		.main-navigation ul li .indicator,
		.widget_tag_cloud .tagcloud a,
		.post-navigation .meta-nav small,
		.post-navigation .nav-previous i, 
		.post-navigation .nav-next i{
			color: <?php echo esc_attr($dandy_site_color); ?>;
		}
		.moretag, 
		.site-main .navigation.pagination .nav-links .current,
		.site-main .navigation.pagination .nav-links a,
		blockquote,
		.main-navigation.toggled .nav-menu	{
			border-color: <?php echo esc_attr($dandy_site_color); ?>;
		}
		#toTop,
		.site-main .navigation.pagination .nav-links a,
		.comment-respond .form-submit input,
		.menu-toggle,
		.flashNews strong{
			background-color: <?php echo esc_attr($dandy_site_color); ?>;
		}
		.search-field:focus, 
		#comment:focus{
			outline-color: <?php echo esc_attr($dandy_site_color); ?>;
		}
	<?php endif; ?>	
	<?php if (!empty($dandy_site_color_hover) && $dandy_site_color_hover != '#f99e2f' ) : ?>
		.entry-title a:hover, 
		.entry-meta a:hover, 
		.cat-links a:hover,
		.tags-links a:hover,
		.comments-link a:hover,
		.edit-link a:hover,
		.widget-area a:hover, 
		#footer-sidebar a:hover,
		.dandyBreadcrumb a:hover,
		.site-title a:hover,
		.site-info a:hover, 
		.spacesocial:hover,
		.nav-previous a:hover,
		.nav-next a:hover,
		.smallPart a:hover,
		.more-tag a:hover,
		.entry-content a:hover,
		ul#dandyFlash li a:hover,
		.widget_tag_cloud .tagcloud a:hover,
		.post-navigation .meta-nav span:hover{
			color: <?php echo esc_attr($dandy_site_color_hover); ?>;
		}	
		#toTop:hover,
		.comment-respond .form-submit input:hover{
			background-color: <?php echo esc_attr($dandy_site_color_hover); ?>;
		}
		.moretag:hover {
			background-color: <?php echo esc_attr($dandy_site_color_hover); ?>;
			border-color: <?php echo esc_attr($dandy_site_color_hover); ?>;
		}
	<?php endif; ?>
</style>
<?php 
}
add_action('wp_head', 'dandy_custom_css_styles');
?>