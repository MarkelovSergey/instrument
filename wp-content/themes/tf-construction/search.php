<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TF Construction
 */

get_header(); ?>
 
<div class="container-fluid c_space c_blog">
	<!-- Left Sidebar Start -->
	<div class="container">
		<div class="col-md-9 right_side port-gallery">
		<?php
			if (have_posts()):
					?>
					<header class="page-header">
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'tf-construction' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->
				<?php
				while ( have_posts() ) : the_post();
		
					get_template_part( 'template-parts/content', 'search' );

				endwhile; // End of the loop.
				?>
					<div class="clearfix"></div>
					<?php the_posts_pagination(); ?>
					<div class="clearfix"></div>
			<?php
			else :
						get_template_part( 'template-parts/content', 'none' );

			endif; 
		?>
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
