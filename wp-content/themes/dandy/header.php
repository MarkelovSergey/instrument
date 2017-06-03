<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dandy
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
	$dandyBreadYes = get_theme_mod('dandy_theme_options_BreadYes', '1');
	$topDandyHeader = get_theme_mod('dandy_theme_options_topheader', '1');
	$socialHeader = get_theme_mod('dandy_theme_options_socialheader', '1');
	$facebookURL = get_theme_mod('dandy_theme_options_facebookurl', '');
	$twitterURL = get_theme_mod('dandy_theme_options_twitterurl', '');
	$googleplusURL = get_theme_mod('dandy_theme_options_googleplusurl', '');
	$linkedinURL = get_theme_mod('dandy_theme_options_linkedinurl', '');
	$instagramURL = get_theme_mod('dandy_theme_options_instagramurl', '');
	$youtubeURL = get_theme_mod('dandy_theme_options_youtubeurl', '');
	$pinterestURL = get_theme_mod('dandy_theme_options_pinteresturl', '');
	$tumblrURL = get_theme_mod('dandy_theme_options_tumblrurl', '');
	$vkURL = get_theme_mod('dandy_theme_options_vkurl', '');
	$showNews = get_theme_mod('dandy_theme_options_showflashnews', '1');
	$flashText = get_theme_mod('dandy_theme_options_flashnewstext', __('Flash News', 'dandy') );
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dandy' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
	<?php if($topDandyHeader == 1): ?>
		<div class="TopDandyHeader">
			<div class="dandyTop">
			<?php if($showNews == 1): ?>
			<div class="flashNews">
				<strong><?php echo esc_attr($flashText); ?></strong>
				<ul id="dandyFlash">
				<?php
					$number_post = get_theme_mod('dandy_theme_options_flashnewsnumber', '5');
					$args = array( 'posts_per_page' => esc_attr($number_post), 'post_status'=>'publish', 'post_type'=>'post', 'orderby'=>'date', 'ignore_sticky_posts' => true );
					$myposts = new wp_query( $args );
					while( $myposts->have_posts() ) : $myposts->the_post();
				?>
				<li>
						<a title="<?php the_time(get_option('date_format')); ?>" href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 4 ); ?></a>
						<span class="theFlashDate"><i class="fa fa-angle-double-right spaceLeftRight"></i><?php echo wp_trim_words( get_the_content() , '25' ); ?></span>
				</li>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</ul>
			</div>
		<?php endif; ?><!-- .flashNews -->
				<?php if($socialHeader == 1): ?>
				<div class="SocialTopDandy">
				<?php if (!empty($facebookURL)) : ?>
					<a href="<?php echo esc_url($facebookURL); ?>" title="<?php esc_attr_e( 'Facebook', 'dandy' ); ?>"><i class="fa fa-facebook spacesocial"><span class="screen-reader-text"><?php esc_attr_e( 'Facebook', 'dandy' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($twitterURL)) : ?>
					<a href="<?php echo esc_url($twitterURL); ?>" title="<?php esc_attr_e( 'Twitter', 'dandy' ); ?>"><i class="fa fa-twitter spacesocial"><span class="screen-reader-text"><?php esc_attr_e( 'Twitter', 'dandy' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($googleplusURL)) : ?>
					<a href="<?php echo esc_url($googleplusURL); ?>" title="<?php esc_attr_e( 'Google Plus', 'dandy' ); ?>"><i class="fa fa-google-plus spacesocial"><span class="screen-reader-text"><?php esc_attr_e( 'Google Plus', 'dandy' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($linkedinURL)) : ?>
					<a href="<?php echo esc_url($linkedinURL); ?>" title="<?php esc_attr_e( 'Linkedin', 'dandy' ); ?>"><i class="fa fa-linkedin spacesocial"><span class="screen-reader-text"><?php esc_attr_e( 'Linkedin', 'dandy' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($instagramURL)) : ?>
					<a href="<?php echo esc_url($instagramURL); ?>" title="<?php esc_attr_e( 'Instagram', 'dandy' ); ?>"><i class="fa fa-instagram spacesocial"><span class="screen-reader-text"><?php esc_attr_e( 'Instagram', 'dandy' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($youtubeURL)) : ?>
					<a href="<?php echo esc_url($youtubeURL); ?>" title="<?php esc_attr_e( 'YouTube', 'dandy' ); ?>"><i class="fa fa-youtube spacesocial"><span class="screen-reader-text"><?php esc_attr_e( 'YouTube', 'dandy' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($pinterestURL)) : ?>
					<a href="<?php echo esc_url($pinterestURL); ?>" title="<?php esc_attr_e( 'Pinterest', 'dandy' ); ?>"><i class="fa fa-pinterest spacesocial"><span class="screen-reader-text"><?php esc_attr_e( 'Pinterest', 'dandy' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($tumblrURL)) : ?>
					<a href="<?php echo esc_url($tumblrURL); ?>" title="<?php esc_attr_e( 'Tumblr', 'dandy' ); ?>"><i class="fa fa-tumblr spacesocial"><span class="screen-reader-text"><?php esc_attr_e( 'Tumblr', 'dandy' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($vkURL)) : ?>
					<a href="<?php echo esc_url($vkURL); ?>" title="<?php esc_attr_e( 'VK', 'dandy' ); ?>"><i class="fa fa-vk spacesocial"><span class="screen-reader-text"><?php esc_attr_e( 'VK', 'dandy' ); ?></span></i></a>
				<?php endif; ?>
			   </div>
			   <?php endif; ?>
			</div>   
		</div>
		<?php endif; ?><!--end top-->
				<div class="headContDan">
						<?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ): ?>
					<div class="dandy-logo"><?php the_custom_logo()?></div>
						<?php else : ?>
					<div class="site-branding">
						<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div><!-- .site-branding --><?php endif; ?>
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i><?php esc_html_e( 'Select a page...', 'dandy' ); ?></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>	<!--end headcontdan-->
			<?php if( get_header_image() && is_home() ): ?>
				<div class="dandyHeaderimg">
						<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
				</div>
			<?php elseif ( has_post_thumbnail() && is_singular() ) :?>
				<img class="singleDandyimage" src="<?php the_post_thumbnail_url('dandy-single-image'); ?>"/>		
			<?php endif; // End header image check. ?>
			<?php if($dandyBreadYes == 1): ?>
				<?php if ( !is_front_page() && !is_home() ) : ?>
					<div class="dandyBreadcrumb">
						<?php dandy_breadcrumb();?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
	</header><!-- #masthead -->
	<div id="content" class="site-content">
