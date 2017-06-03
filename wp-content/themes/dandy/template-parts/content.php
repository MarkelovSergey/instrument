<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dandy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<?php if ( is_single() ) :?>
		<div class="entry-meta">
			<?php dandy_posted_on(); ?> 
		</div><?php endif; ?><!-- .entry-meta -->
			<?php if ( has_post_thumbnail() && !is_single() ) : ?>
			<figure class="imageDpost">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<figcaption>
					<img class="imageDandypost" src="<?php the_post_thumbnail_url('dandy-image-post'); ?>"/>
				</figcaption>
				</a>
			</figure>
			<?php elseif ( !has_post_thumbnail() && !is_single() ): ?>
			<figure class="imageDpost">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<figcaption>
					<img class="imageDandypost" src="<?php echo get_template_directory_uri(); ?>/images/no-image-home.png" alt="<?php esc_attr_e( 'No image', 'dandy' ); ?>" />
				</figcaption>
				</a>
			</figure>
            <?php endif; ?>	
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( is_single() ) {
				the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'dandy' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dandy' ),
					'after'  => '</div>',
				) );
			} else {
				the_excerpt();
			}
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php dandy_entry_footer(); ?>
		<?php if ( !is_single() ) : ?>
		<span class="moretag"><a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read More', 'dandy') ?></a></span>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
