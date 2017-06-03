<?php

/* * *
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard.
 *
 */


// Display Theme Info page.
function tf_construction_theme_info_page() {
	// Get Theme Details from style.css.
	$theme = wp_get_theme();
	?>
	<div class="wrap theme-info-wrap">
		<div class="row">
			<div class="theme-left">
				<div class="theme-info-inner">
					<img src="<?php echo esc_url(get_template_directory_uri().'/screenshot.png'); ?>" class="img-responsive theme-screenshot">
				</div>
			</div>
			<div class="theme-right">
				<div class="theme-info-inner">
					<h1 class="theme-heading"> <?php esc_html_e( 'Welcome to', 'tf-construction'); ?> <span class="theme-name"> <?php echo esc_html($theme->get( 'Name' )); ?> </span> <span class="theme-version"> <?php echo esc_html($theme->get( 'Version' )); ?> </span> </h1>
					<div class="theme-description"><?php echo esc_html( $theme->get( 'Description' ) ); ?></div>
					<br>
					<hr>
					<div class="info-links">
							<strong><?php esc_html_e( 'Theme Links', 'tf-construction' ); ?></strong>
							<br>
							<br>
							<a class="button button-default" href="<?php echo esc_url( 'http://demo.themefarmer.com/tf-construction/' ); ?>" target="_blank"><?php esc_html_e( 'Theme Demo', 'tf-construction' ); ?></a>
							<a class="button button-default" href="<?php echo esc_url( 'https://www.themefarmer.com/documentation/documentation-tf-construction/' ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'tf-construction' ); ?></a>
							<a class="button button-default" href="<?php echo esc_url( 'https://www.themefarmer.com/free-themes/tf-construction-wordpress-theme/' ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'tf-construction' ); ?></a>
							<hr>
							<a class="button button-primary" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customize', 'tf-construction' ); ?></a>
					</div>
					<hr>
				</div>
			</div>
		</div>
	</div>
	<?php
}

// Add Theme Info page to admin menu.
function tf_construction_add_theme_info_page() {
	// Get Theme Details from style.css
	$theme = wp_get_theme();
	add_theme_page(sprintf( esc_html__( 'Welcome to %1$s %2$s', 'tf-construction' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ), esc_html__( 'Theme Info', 'tf-construction' ), 'edit_theme_options', 'tf-construction', 'tf_construction_theme_info_page');
}
add_action( 'admin_menu', 'tf_construction_add_theme_info_page' );

function tf_construction_theme_info_page_css( $hook ) {

	if ( 'appearance_page_tf-construction' != $hook ) {
		return;
	}
	wp_enqueue_style( 'tf-construction-theme-info-style', get_template_directory_uri() . '/css/theme-info.css' );
}
add_action( 'admin_enqueue_scripts', 'tf_construction_theme_info_page_css' );
