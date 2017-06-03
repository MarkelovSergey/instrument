<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TF Construction
 */

get_header(); ?>

<div class="container-fluid c_space c_blog">
	<!-- Left Sidebar Start -->
	<div class="container">
		<div class="col-md-12 right_side port-gallery">
			<?php if ( have_posts() ) : ?>
                <?php woocommerce_content(); ?>
            <?php endif; ?> 
		</div>
	</div>
</div>
<?php
get_footer();
