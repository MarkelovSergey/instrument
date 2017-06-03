<div id="secondary" class="col-md-3 c_left_sidebar" role="complementary">
<?php
if (is_active_sidebar( 'sidebar-widget-area' ) ) {
	?>
		<?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
	<?php
}else{

	$args = array(
		'name'          => esc_html__( 'Sidebar', 'tf-construction' ),
		'id'            => 'sidebar-widget-area',
		'description'   => __('Sidebar Widget Area', 'tf-construction' ),
		'before_widget' => '<div id="%1$s" class="row sidebar-widget widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	);
	the_widget('WP_Widget_Search', 'title=Search', $args);
	the_widget('WP_Widget_Archives', null, $args);
	the_widget('WP_Widget_Recent_Posts', null, $args);
	the_widget('WP_Widget_Calendar', 'title=Calendar', $args);
	the_widget('WP_Widget_Categories', null, $args);
	the_widget('WP_Widget_Tag_Cloud', null, $args);

}
?>
</div><!-- #secondary -->
