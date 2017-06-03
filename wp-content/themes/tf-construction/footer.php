<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TF Construction
 */

?>
	</div><!-- #content -->
	<!-- Footer Start -->
	<?php 
	    $footer_widget  = array(
    		'name' => __( 'Footer Widget Area', 'tf-construction' ),
    		'id' => 'footer-widget-area',
    		'description' => __( 'footer widget area', 'tf-construction' ),
    		'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 footer_widget widget">',
    		'after_widget'  =>  '</div>',
    		'before_title'  =>  '<div class="row widget_head widget-heading"><h2>',
    		'after_title'   =>  '</h2></div>', 
		);
	?>
	<footer>
		<div class="container-fluid c_footer">
			<div class="container">
				<div class="row c_foot">
				    <?php	if ( is_active_sidebar( 'footer-widget-area' ) ) { ?>
            			<?php dynamic_sidebar( 'footer-widget-area'); ?>
				    <?php }else{ 
				        the_widget('WP_Widget_Calendar', 'title='.__('Calendar', 'tf-construction'), $footer_widget);
                		the_widget('WP_Widget_Categories', null, $footer_widget);
                		the_widget('WP_Widget_Pages', null, $footer_widget);
                		the_widget('WP_Widget_Archives', null, $footer_widget);
				    } ?>
				</div>
			</div>
		</div>
		<div class="container-fluid c_footercopy">
			<div class="container">
				<div class="row c_foots">
					<div class="site-info">
                		&copy; <?php echo date('Y'); bloginfo( 'name' ); ?>
                		<span class="sep"> | </span>
                		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'tf-construction' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'tf-construction' ), 'WordPress' ); ?></a>
                		<span class="sep"> | </span>
						<?php printf( esc_html__( 'Theme by %1$s.', 'tf-construction' ),  '<a href="'.esc_url('http://themefarmer.com').'" rel="designer">Theme Farmer</a>' ); ?>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer>
	<a href="#" class="scroll_up" title="<?php _e('Go Top','tf-construction');?>"><i class="fa fa-angle-up"></i></a>
	<!-- Footer End -->
	
	
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
