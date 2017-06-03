<?php if(!get_theme_mod('tf_construction_hide_projects', false)): ?>
<!-- Services Start -->
<section class="container-fluid space c-projects">
    <div class="row theme_section_title">
        <h1 class="section_title"><?php echo esc_html(get_theme_mod( 'tf_construction_project_header_text')); ?> </h1>
        <p class="section_title_description"><?php echo esc_html(get_theme_mod( 'tf_construction_project_desc_text')); ?> </p>
    </div>
    <div class="container">
        <div class="row c-projects-sec">
            <?php 
            for ($i=1; $i <= 4; $i++) :
                    $page_id = absint(get_theme_mod( 'tf_construction_project_'.$i, 0));
                    if($page_id){
                        $project_img = wp_get_attachment_image_src(get_post_thumbnail_id($page_id), 'full');
                        $project_img = $project_img[0];
                    }else{
                        $project_img = get_template_directory_uri().'/images/slider'.$i.'.jpg';
                    }
                ?>
                <div class="col-md-3 col-sm-6 c_project">
                    <div class="c-project-inner">
                        <img src="<?php echo esc_url($project_img); ?>" class="img-responsive"/>
                        <div class="overlay">
                            <?php if($page_id): $post = get_post($page_id); ?>
                            <a href="<?php echo esc_url(get_permalink($page_id)) ?>" class="project-link"><i class="fa fa-link"></i></a>
                            <h2 class="project-title"><?php echo wp_kses_post($post->post_title); ?></h2>                        
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php 
            endfor;
            ?>
        </div>
    </div>
</section>
<!-- Services Start -->
<?php endif; ?>