<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package TF Construction
 */

get_header(); ?>
 
<div class="container-fluid c_space c_blog">
	<!-- Left Sidebar Start -->
	<div class="container">
		<div class="col-md-12 right_side port-gallery">
				<section class="error-404 not-found">
					<div class="col-md-12 page-header error">
							<h1>40<span class="grey">4</span></h1>
							<h2><span class="fa fa-exclamation-circle"></span><?php _e('ERROR','tf-construction'); ?></h2>
							<h3><?php _e('Page cannot be found','tf-construction'); ?></h3>
							<p><?php _e('The Page you requested is not be found. This could be spelling error in the url.','tf-construction'); ?></p>
							<a href="<?php echo esc_url(home_url()); ?>" class="btn"><?php _e('Go back to homepage','tf-construction'); ?></a>
					</div><!-- .page-header -->
	
					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'tf-construction' ); ?></p>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
		</div><!-- #primary -->
	</div>
</div>
<?php
get_footer();
