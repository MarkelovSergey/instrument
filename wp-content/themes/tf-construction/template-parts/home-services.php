<?php $theme_data =  tf_construction_get_theme_var(); ?>
<!-- Services Start -->
<section class="container-fluid space c_services">
    <div class="row theme_section_title">
        <h1 class="section_title"><?php echo esc_html($theme_data['services_header_text']); ?> </h1>
        <p class="section_title_description"><?php echo esc_html($theme_data['services_desc_text']); ?> </p>
    </div>
    <div class="container">
        <div class="row c_service_sec">
            <?php 
            for ($i=1; $i <= 3; $i++) :
                $page_id = absint(get_theme_mod( 'tf_construction_services_'.$i, 0));
                $icon_class = get_theme_mod( 'tf_construction_services_icon_'.$i, 'fa fa-star');
                $post = get_post($page_id);
                ?>
                <div class="col-md-4 col-sm-6 c_ser">
                    <div class="c-service-inner">
                        <span><i class="fa <?php echo esc_attr($icon_class); ?>"></i></span>
                        <h2><?php echo wp_kses_post($post->post_title); ?></h2>
                        <p><?php echo wp_kses_post($post->post_content); ?></p>
                    </div>
                </div>
                <?php 
            endfor;
            ?>
        </div>
    </div>
</section>
<!-- Services Start -->