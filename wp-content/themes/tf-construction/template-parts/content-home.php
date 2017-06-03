<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TF Construction
 */

?>
<div class="swiper-slide">
    <div id="post-<?php the_ID(); ?>" <?php post_class("row c_blog_post"); ?>>
		<?php if(has_post_thumbnail()): 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
		<div class="img-thumbnail">
			<?php the_post_thumbnail('tf-construction-home-thumb', array( 'class' => 'img-responsive' )); ?>
			<div class="overlay">
				<a class="c_port p_left" href="<?php echo esc_url($image[0]); ?>"><i class="fa fa-search"></i></a>
				<a class="p_right" href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-chain"></i></a>
			</div>
		</div>
		<?php endif; ?>	
		<header class="entry-header">
			<?php	
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php tf_construction_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif;
				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php tf_construction_entry_footer(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif;
			?>
		</header><!-- .entry-header -->
		<div class="entry-summary col-md-12">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<a class="btn btn-readmore" href="<?php echo esc_url( get_permalink() ); ?>"> <?php _e('READ MORE', 'tf-construction'); ?> </a>
	</div><!-- #post-## -->
</div><!-- #post-## -->