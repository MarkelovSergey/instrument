<?php 
/*
* Template Name: Full Width
*/

get_header(); ?>

<div class="container-fluid c_space c_blog">
    <!-- Left Sidebar Start -->
    <div class="container">
        <div class="col-md-12 right_side port-gallery">
                <?php
                        while ( have_posts() ) : the_post();
            
                            get_template_part( 'template-parts/content', 'page' );
            
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
            
                        endwhile; // End of the loop.
                        ?>
        </div><!-- #primary -->
    </div>
</div>
<?php
get_footer();
