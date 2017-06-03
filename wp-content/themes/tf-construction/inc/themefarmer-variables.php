<?php
function tf_construction_get_theme_var() {
	$slide_one_id   = get_theme_mod('tf_construction_slider_one', 0);
	$slide_two_id   = get_theme_mod('tf_construction_slider_two', 0);
	$slide_three_id = get_theme_mod('tf_construction_slider_three', 0);
	
	if($slide_one_id) {
		$slide_image_1 = wp_get_attachment_image_src(get_post_thumbnail_id($slide_one_id), 'full');
		$slide_image_1 = $slide_image_1[0];
	}else{
		$slide_image_1 = '';
	}
		 
	if($slide_two_id) {
		$slide_image_2 = wp_get_attachment_image_src(get_post_thumbnail_id($slide_two_id), 'full');
		$slide_image_2 = $slide_image_2[0];
	}else{
		$slide_image_2 = '';
	}
		 
	if($slide_three_id) {
		$slide_image_3 = wp_get_attachment_image_src(get_post_thumbnail_id($slide_three_id), 'full');
		$slide_image_3 = $slide_image_3[0];
	}else{
		$slide_image_3 = '';
	}
		 

	$services_1_id  = get_theme_mod('tf_construction_services_1',0);
	$services_2_id  = get_theme_mod('tf_construction_services_2',0);
	$services_3_id  = get_theme_mod('tf_construction_services_3',0);

	$theme_data = array(

		//social links
		'social_link_open_in_new_tab' => get_theme_mod('tf_construction_social_new_tab', true),
		'social_link_facebook'        => get_theme_mod('tf_construction_social_link_facebook'),
		'social_link_google'          => get_theme_mod('tf_construction_social_link_google'),
		'social_link_youtube'         => get_theme_mod('tf_construction_social_link_youtube'),
		'social_link_twitter'         => get_theme_mod('tf_construction_social_link_twitter'),
		'social_link_linkedin'        => get_theme_mod('tf_construction_social_link_linkedin'),

		//quick contact
		'contact_email'               => get_theme_mod('tf_construction_top_email'),
		'contact_phone'               => get_theme_mod('tf_construction_top_phone'),

		'hide_slider'                 => get_theme_mod('tf_construction_hide_slider', false),
		'slide_1'                     => ($slide_one_id) ? get_post($slide_one_id) : (object) array('post_title' => '', 'post_content' => ''),
		'slide_2'                     => ($slide_two_id) ? get_post($slide_two_id) : (object) array('post_title' => '', 'post_content' => ''),
		'slide_3'                     => ($slide_three_id) ? get_post($slide_three_id) : (object) array('post_title' => '', 'post_content' => ''),
		'slider_image_one'            => $slide_image_1,
		'slider_image_two'            => $slide_image_2,
		'slider_image_three'          => $slide_image_3,

		'slide_button_text'           => get_theme_mod('tf_construction_slide_button_text'),
		'slide_button_link'           => get_theme_mod('tf_construction_slide_button_link'),

		

		//services
		'services_header_text'        => get_theme_mod('tf_construction_services_header'),
		'services_desc_text'          => get_theme_mod('tf_construction_services_desc'),
		'services_1'            	  => ($services_1_id) ? get_post($services_1_id) : (object) array('post_title' => '', 'post_content' => ''),
		'services_2'            	  => ($services_2_id) ? get_post($services_2_id) : (object) array('post_title' => '', 'post_content' => ''),
		'services_3'            	  => ($services_3_id) ? get_post($services_3_id) : (object) array('post_title' => '', 'post_content' => ''),
		

		

		//home blog
		'blog_heading'				  => get_theme_mod('tf_construction_home_blog_heading'),
		'blog_desc'					  => get_theme_mod('tf_construction_home_blog_desc'),


	);

	return $theme_data;
}

?>