<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TF Construction
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class("row c-blog-section"); ?>>
	<?php if(has_post_thumbnail()): 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
		<div class="img-thumbnail">
		<?php the_post_thumbnail('tf-construction-fullwidth', array( 'class' => 'img-responsive' )); ?>
		<div class="overlay">
			<a class="c_port p_left" href="<?php echo esc_url($image[0]); ?>"><i class="fa fa-search"></i></a>
			<a class="p_right" href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-chain"></i></a>
		</div>
	</div>
	<?php endif; ?>	
	<div class="row post-data">
		<header class="entry-header col-md-12">
			<?php	
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php tf_construction_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; 
			?>
		</header><!-- .entry-header -->
	
		<div class="entry-summary col-md-12">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	
		<footer class="entry-footer col-md-12">
			<a class="btn btn-readmore" href=" <?php echo esc_url( get_permalink() ); ?>"> <?php _e('READ MORE', 'tf-construction'); ?> </a>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php tf_construction_entry_footer(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; 
			?>
		</footer><!-- .entry-footer -->

	</div>
</article><!-- #post-## -->
<div class="clearfix"></div>