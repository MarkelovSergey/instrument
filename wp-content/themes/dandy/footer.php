<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Dandy
 */

?>
<?php 
	$footerTextDandy  = get_theme_mod('dandy_theme_options_footerTextDandy', __('Proudly powered by WordPress', 'dandy') );
	$socialFooter = get_theme_mod('dandy_theme_options_socialfooter', '1');
	$facebookURL = get_theme_mod('dandy_theme_options_facebookurl', '');
	$twitterURL = get_theme_mod('dandy_theme_options_twitterurl', '');
	$googleplusURL = get_theme_mod('dandy_theme_options_googleplusurl', '');
	$linkedinURL = get_theme_mod('dandy_theme_options_linkedinurl', '');
	$instagramURL = get_theme_mod('dandy_theme_options_instagramurl', '');
	$youtubeURL = get_theme_mod('dandy_theme_options_youtubeurl', '');
	$pinterestURL = get_theme_mod('dandy_theme_options_pinteresturl', '');
	$tumblrURL = get_theme_mod('dandy_theme_options_tumblrurl', '');
	$vkURL = get_theme_mod('dandy_theme_options_vkurl', '');
?>

	</div><!-- #content -->
		<div id="footer-sidebar">
				<div id="footer-sidebar1">
					<?php
					if(is_active_sidebar('footer-1')){
					dynamic_sidebar('footer-1');
					}
					?>
				</div>
				<div id="footer-sidebar2">
					<?php
					if(is_active_sidebar('footer-2')){
					dynamic_sidebar('footer-2');
					}
					?>
				</div>
				<div id="footer-sidebar3">
					<?php
					if(is_active_sidebar('footer-3')){
					dynamic_sidebar('footer-3');
					}
					?>
				</div>
			</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
	
		<div class="site-info">
		
				<a target="_blank" href="https://gecodigital.com/downloads/dandy-theme/" rel="designer" title="Gecodigital">Gecodigital</a> / <a href="http://wp-templates.ru/" title="Шаблоны WordPress">WP</a> / <a href="http://rastenievod.com/" title="Комнатные цветы и растения" rel="nofollow" target="_blank">Растения</a>
		</div><!-- .site-info -->
		<div class="BottomDandy">
		<?php if($socialFooter == 1): ?>
	       <div class="SocialBottomDandy">
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
	</footer><!-- #colophon -->
</div><!-- #page -->
<a href="#top" id="toTop"><i class="fa fa-lg fa-angle-up"></i></a>
<?php wp_footer(); ?>

</body>
</html>
