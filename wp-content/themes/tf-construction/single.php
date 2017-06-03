<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TF Construction
 */

get_header(); ?>
 	
<div class="container-fluid c_space c_blog">
	<!-- Left Sidebar Start -->
	<div class="container">
		<div class="col-md-9 right_side port-gallery">
				<?php
				while ( have_posts() ) : the_post();
		
					get_template_part( 'template-parts/content', 'single' );
		
					?>	
						<div class="clearfix"></div>
						<?php the_post_navigation(); ?>
						<div class="clearfix"></div>
				        
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
		
				endwhile; // End of the loop.
				?>
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
