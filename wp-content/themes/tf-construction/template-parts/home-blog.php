<?php $theme_data =  tf_construction_get_theme_var(); ?>
<!-- Blogs Start -->
<section class="container-fluid space c_blog">
    <div class="row theme_section_title">
        <h1 class="section_title"><?php echo esc_html($theme_data['blog_heading']); ?></h1>
        <p class="section_title_description"><?php echo esc_html($theme_data['blog_desc']); ?></p>
    </div>
    <div class="container">
        <div class="row c_blog_desc">
            <div class="swiper-container swiper2">
                <div class="swiper-wrapper">
                	<?php 
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'post', 'paged'=>$paged, 'posts_per_page' => 3, 'ignore_sticky_posts' => 1, );
						$wp_query = new WP_Query( $args );
						while($wp_query->have_posts()){
							$wp_query->the_post();
							get_template_part('template-parts/content','home'); 
						}
                        wp_reset_postdata(); 
					?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blogs End -->