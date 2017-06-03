<?php

function tf_construction_upgrade_control($wp_customize) {

	class TF_Construction_Upsale_Customize_Control extends WP_Customize_Section {
		public $type = 'themefarmer-upsell';
		public function render() {
			$classes = 'accordion-section control-section-' . $this->type;
			$id      = 'themefarmer-upsell-buttons-section';
			?>
		    <li id="accordion-section-<?php echo esc_attr($this->id); ?>" class="<?php echo esc_attr($classes); ?>">
		        <div class="themefarmer-upsale">
		          	<a href="<?php echo esc_url('https://www.themefarmer.com/product/tf-construction-pro'); ?>" target="_blank" class="themefarmer-upsale-bt" id="themefarmer-pro-button"><?php _e('VIEW PRO VERSION ', 'tf-construction');?></a>
		        </div>
		    </li>
		    <?php
		}

	}

	$wp_customize->add_section(new TF_Construction_Upsale_Customize_Control($wp_customize, 'themefarmer-upsell-upsell', array(
		'priority' => '0',
	)));

}

function tf_construction_settings_control($wp_customize) {

	class TF_Construction_Page_Dropdown_Control extends WP_Customize_Control {

		public function render_content() {
			$pages = get_pages(array('hide_empty' => false));
			if (!empty($pages)): ?>
            <label>
              	<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
              	<select <?php $this->link();?>>
                <option value="0"><?php esc_html_e('Select Page', 'tf-construction');?></option>
              	<?php
					foreach ($pages as $page):
							printf('<option value="%s" %s>%s</option>',
								$page->ID,
								selected($this->value(), $page->ID, false),
								$page->post_title
							);
					endforeach;
				?>
              	</select>
            </label>
          	<?php
		endif;
		}

	}

	class TF_Construction_Info_Text extends WP_Customize_Control {

		public function render_content() {
		?>
        	<span class="customize-control-title">
        		<?php echo esc_html($this->label); ?>
      		</span>

	      <?php if ($this->description): ?>
	        <span class="description customize-control-description">
	        <?php echo wp_kses_post($this->description); ?>
	        </span>
	      <?php endif;
		}

	}

	/**
	* 
	*/
	class TF_Construction_Select_Contact_Form extends WP_Customize_Control{
		
		function render_content(){
			if(class_exists('WPCF7')){
				$args = array (
				    'post_type'              => 'wpcf7_contact_form',
				    'post_status'            => 'publish',
				);
				// The Query
				$wp_query = new WP_Query( $args );
				if($wp_query->have_posts()):?>
				<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
				<select <?php $this->link();?>>
					<option value="0"><?php esc_html_e('Select Form', 'tf-construction');?></option>
					<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
						<option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
					<?php endwhile; wp_reset_postdata(); ?>
				</select>
				<?php else: _e('Please Create Form first By Contact Form 7 Plugin', 'tf-construction'); ?>
				<?php endif;
			}else{
				_e('Please install and activate Contact Form 7 Plugin to select form', 'tf-construction');
			}
		}

	}

	$wp_customize->add_section('tf_construction_setup_info', array(
		'title'    => __('Theme Setup Info', 'tf-construction'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_setting('tf_construction_homepage_setup', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'tf_construction_sanitize_html',

	));

	$wp_customize->add_control(new TF_Construction_Info_Text($wp_customize, 'tf_construction_homepage_setup',
		array(
			'label'    => __('Home Page Setup', 'tf-construction'),
			'description' => __('1. Create or Edit page with name Home -> Select Template "Home Page" -> Publish. <br><br>
    							2. Go To Appearance -> Customize -> Static Front Page -> Front page displays set it to "A static page" -> for Front page select Home. <a class="tf_construction_go_to_section" href="#accordion-section-static_front_page"> Switch To "A Static Page"</a>', 'tf-construction'),
			'priority' => 1,
			'section'  => 'tf_construction_setup_info',
	)));

	$wp_customize->add_setting('tf_construction_theme_info_page', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'tf_construction_sanitize_html',

	));

	$wp_customize->add_control(new TF_Construction_Info_Text($wp_customize, 'tf_construction_theme_info_page',
		array(
			'label'    => __('Info Page', 'tf-construction'),
			'description' => sprintf('<a class="button button-default" href="%1$s">%2$s</a>', esc_url(admin_url('themes.php?page=tf-construction')), esc_html__('See Theme Info', 'tf-construction')),
			'priority' => 1,
			'section'  => 'tf_construction_setup_info',
	)));
	
	
/** Social & Contacts **/

	$wp_customize->add_section('tf_construction_top_bar_section', array(
		'title'      => __('Social & Contacts Options', 'tf-construction'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_setting('tf_construction_social_new_tab',
		array(
			'default'           => true,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'tf_construction_sanitize_checkbox',
		));

	$wp_customize->add_control('tf_construction_social_new_tab', array(
		'type'     => 'checkbox',
		'priority' => 200,
		'section'  => 'tf_construction_top_bar_section',
		'label'    => __('Open social links in new tab', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_social_link_facebook',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'tf_construction_sanitize_url',
		)
	);

	$wp_customize->add_control('tf_construction_social_link_facebook', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'tf_construction_top_bar_section',
		'label'    => __('Facebook Page URL', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_social_link_google', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'tf_construction_sanitize_url',
	));

	$wp_customize->add_control('tf_construction_social_link_google', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'tf_construction_top_bar_section',
		'label'    => __('Google Page URL', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_social_link_youtube', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'tf_construction_sanitize_url',
		)
	);

	$wp_customize->add_control('tf_construction_social_link_youtube', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'tf_construction_top_bar_section',
		'label'    => __('Youtube Page URL', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_social_link_twitter', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'tf_construction_sanitize_url',
		)
	);
	$wp_customize->add_control('tf_construction_social_link_twitter', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'tf_construction_top_bar_section',
		'label'    => __('Twitter Page URL', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_social_link_linkedin', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'tf_construction_sanitize_url',
		)
	);
	$wp_customize->add_control('tf_construction_social_link_linkedin', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'tf_construction_top_bar_section',
		'label'    => __('Linkedin Page URL', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_top_email', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control('tf_construction_top_email', array(
		'type'     => 'email',
		'priority' => 200,
		'section'  => 'tf_construction_top_bar_section',
		'label'    => __('Email', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_top_phone', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control('tf_construction_top_phone', array(
		'type'     => 'text',
		'priority' => 200,
		'section'  => 'tf_construction_top_bar_section',
		'label'    => __('Phone', 'tf-construction'),
	));

/** Social & Contacts **/

/** Slider **/

	$wp_customize->add_section('tf_construction_slider_section', array(
		'title'      => __('Slider Options', 'tf-construction'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_setting('tf_construction_hide_slider',
		array(
			'default'           => false,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'tf_construction_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('tf_construction_hide_slider', array(
		'type'     => 'checkbox',
		'priority' => 1,
		'section'  => 'tf_construction_slider_section',
		'label'    => __('Hide Slider ', 'tf-construction'),
	));

	for ($i = 1; $i <= 3; $i++) {
		
		$wp_customize->add_setting('tf_construction_slider_'.$i, array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'absint',

		));
		$wp_customize->add_control(new TF_Construction_Page_Dropdown_Control($wp_customize, 'tf_construction_slider_'.$i,
			array(
				'label'    => sprintf(__('Slide %s Page', 'tf-construction'), $i),
				'section'  => 'tf_construction_slider_section',
				'priority' => 1,
		)));
	}
	
	$wp_customize->add_setting('tf_construction_slide_button_text',
		array(
			'default'           => __('Click To Begin', 'tf-construction'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'tf_construction_sanitize_nohtml',
		));

	$wp_customize->add_control('tf_construction_slide_button_text', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'tf_construction_slider_section',
		'label'    => __('Button Text', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_slide_button_link',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'tf_construction_sanitize_url',
		));

	$wp_customize->add_control('tf_construction_slide_button_link', array(
		'type'     => 'url',
		'priority' => 1,
		'section'  => 'tf_construction_slider_section',
		'label'    => __('Button Link', 'tf-construction'),
	));

/** Slider **/

/** Contact Form **/
	$wp_customize->add_section('tf_construction_contact_form_section', array(
		'title'      => __('Contact Form Options', 'tf-construction'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_setting('tf_construction_contact_form_header', array(
			'default'           => __('Get A Quote', 'tf-construction'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('tf_construction_contact_form_header', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'tf_construction_contact_form_section',
		'label'    => __('Form Heading', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_contact_form', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',

	));
	$wp_customize->add_control(new TF_Construction_Select_Contact_Form($wp_customize, 'tf_construction_contact_form',
		array(
			'label'    => __('Select Form', 'tf-construction'),
			'section'  => 'tf_construction_contact_form_section',
			'priority' => 1,
	)));
/** Contact Form **/

/** projects **/
	


	$wp_customize->add_section('tf_construction_project_section', array(
		'title'      => __('Project Options', 'tf-construction'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_setting('tf_construction_hide_projects',
		array(
			'default'           => false,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'tf_construction_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('tf_construction_hide_projects', array(
		'type'     => 'checkbox',
		'priority' => 1,
		'section'  => 'tf_construction_project_section',
		'label'    => __('Hide Projects ', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_project_header_text',
		array(
			'default'           => __('Project Section Heading', 'tf-construction'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('tf_construction_project_header_text', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'tf_construction_project_section',
		'label'    => __('Button Text', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_project_desc_text',
		array(
			'default'           => __('Project Section Description', 'tf-construction'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'tf_construction_sanitize_nohtml',
	));

	$wp_customize->add_control('tf_construction_project_desc_text', array(
		'type'     => 'textarea',
		'priority' => 1,
		'section'  => 'tf_construction_project_section',
		'label'    => __('Button Text', 'tf-construction'),
	));

	for ($i = 1; $i <= 4; $i++) {
		
		$wp_customize->add_setting('tf_construction_project_'.$i, array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'absint',

		));
		$wp_customize->add_control(new TF_Construction_Page_Dropdown_Control($wp_customize, 'tf_construction_project_'.$i,
			array(
				'label'    => sprintf(__('Project %s Page', 'tf-construction'), $i),
				'section'  => 'tf_construction_project_section',
				'priority' => 1,
		)));
	}
/** projects **/

/** services **/

	$wp_customize->add_section('tf_construction_services_section', array(
		'title'      => __('Services Options', 'tf-construction'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_setting('tf_construction_services_header', array(
			'default'           => __('Service Heading Text', 'tf-construction'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('tf_construction_services_header', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'tf_construction_services_section',
		'label'    => __('Title Text', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_services_desc', array(
			'default'           => __('Service description text', 'tf-construction'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('tf_construction_services_desc', array(
		'type'     => 'textarea',
		'priority' => 1,
		'section'  => 'tf_construction_services_section',
		'label'    => __('Description Text', 'tf-construction'),
	));

	for ($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting('tf_construction_services_icon_'. $i, array(
			'default'           => 'fa-star',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('tf_construction_services_icon_'. $i, array(
			'type'     => 'text',
			'priority' => 1,
			'section'  => 'tf_construction_services_section',
			'label'    => sprintf(__('Service %s Icon', 'tf-construction'), $i),
		));

        $wp_customize->add_setting( 'tf_construction_services_' . $i, array(
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'absint',

        ));

        $wp_customize->add_control(
            new TF_Construction_Page_Dropdown_Control(
                $wp_customize, 'tf_construction_services_' . $i,
                array(
                    'label'    => sprintf(__('Service %s Page', 'tf-construction'), $i),
                    'section'  => 'tf_construction_services_section',
                    'priority' => 1,
        )));
    }

    $wp_customize->add_setting( 'tf_construction_service_icon_info', array(
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',

    ));

    $wp_customize->add_control(
        new TF_Construction_Info_Text(
            $wp_customize, 'tf_construction_service_icon_info',
            array(
                'label'       => __('INFO: Change Icon', 'tf-construction'),
                'description' => sprintf(__('Use FontAwesome Icon class to change icon <a href="%s" target="_blank">See More Icons</a>', 'tf-construction'), esc_url('http://fontawesome.io/icons/')),
                'section'  => 'tf_construction_services_section',
                'priority' => 1,
    )));


/** services **/

/** Latest Posts **/

	$wp_customize->add_section('tf_construction_home_blog_section', array(
		'title'      => __('Latest Blog Options', 'tf-construction'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_setting('tf_construction_home_blog_heading',
		array(
			'default'           => __('Our Blogs', 'tf-construction'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));
	$wp_customize->add_control('tf_construction_home_blog_heading', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'tf_construction_home_blog_section',
		'label'    => __('Heading', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_home_blog_desc',
		array(
			'default'           => __('Be updated with latest news', 'tf-construction'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));
	$wp_customize->add_control('tf_construction_home_blog_desc', array(
		'type'     => 'textarea',
		'priority' => 1,
		'section'  => 'tf_construction_home_blog_section',
		'label'    => __('Description', 'tf-construction'),
	));

/** Latest Posts **/

/** Callout  **/

	$wp_customize->add_section('tf_construction_home_callout_section', array(
		'title'      => __('Callout Options', 'tf-construction'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_setting('tf_construction_callout_heading',
		array(
			'default'           => __('Our Callout', 'tf-construction'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));
	$wp_customize->add_control('tf_construction_callout_heading', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'tf_construction_home_callout_section',
		'label'    => __('Heading', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_callout_desc',
		array(
			'default'           => __('Callout Description Text', 'tf-construction'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));
	$wp_customize->add_control('tf_construction_callout_desc', array(
		'type'     => 'textarea',
		'priority' => 1,
		'section'  => 'tf_construction_home_callout_section',
		'label'    => __('Description', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_callout_link', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'tf_construction_sanitize_url',
		)
	);
	$wp_customize->add_control('tf_construction_callout_link', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'tf_construction_home_callout_section',
		'label'    => __('Callout Button URL', 'tf-construction'),
	));

	$wp_customize->add_setting('tf_construction_callout_btn_text',
		array(
			'default'           => __('View Details', 'tf-construction'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));
	$wp_customize->add_control('tf_construction_callout_btn_text', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'tf_construction_home_callout_section',
		'label'    => __('Callout Button Text', 'tf-construction'),
	));

/** Callout  **/

	$wp_customize->get_section('title_tagline')->priority     = 10;
	$wp_customize->get_section('static_front_page')->priority = 30;
	$wp_customize->get_section('header_image')->priority      = 50;

	$wp_customize->get_setting( 'blogname' )->transport 		= 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport 	= 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
}

add_action('customize_register', 'tf_construction_upgrade_control');
add_action('customize_register', 'tf_construction_settings_control');

function tf_construction_custmizer_style(){
        wp_enqueue_style('tf-construction-customizer-css', get_template_directory_uri().'/css/customizer-style.css');
}
add_action('customize_controls_print_styles','tf_construction_custmizer_style');

function tf_construction_customize_preview_js() {
	wp_enqueue_script( 'tf-construction-customizer-preview-script', get_template_directory_uri() . '/js/customizer.js', array('jquery', 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'tf_construction_customize_preview_js' );

function tf_construction_custmizer_scripts(){
	wp_enqueue_script( 'tf-construction-customizer-script', get_template_directory_uri() . '/js/customizer-controls.js', array('jquery'), '20120206', true );
}
add_action( 'customize_controls_enqueue_scripts',   'tf_construction_custmizer_scripts' );

?>
