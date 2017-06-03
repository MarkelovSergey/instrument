<?php $theme_data =  tf_construction_get_theme_var(); ?>
<?php if(!$theme_data['hide_slider']): ?>
<!-- Slider Start -->
<section class="row c_slider">
    <div class="swiper-container swiper1">
        <div class="swiper-wrapper">
            <?php 
                for ($i=1; $i <= 3; $i++) :
                    $slide_page_id = absint(get_theme_mod( 'tf_construction_slider_'.$i, 0));
                    if($slide_page_id){
                        $slide_img = wp_get_attachment_image_src(get_post_thumbnail_id($slide_page_id), 'full');
                        $slide_img = $slide_img[0];
                    }else{
                        $slide_img = get_template_directory_uri().'/images/slider'.$i.'.jpg';
                    }
                ?>
                <div class="swiper-slide">
                    <img src="<?php echo esc_url($slide_img); ?>" class="img-responsive"/>
                    <div class="container">
                        <div class="carousel-caption">
                            <?php if($slide_page_id): $post = get_post($slide_page_id); ?>
                            <h2 class="slide-title animation animated-item-1"><?php echo wp_kses_post($post->post_title); ?></h2>
                            <p class="slide-desc animation animated-item-2"><?php echo wp_kses_post($post->post_content); ?></p>
                            <?php endif; ?>
                            <?php if(!empty($theme_data['slide_button_link'])): ?>
                            <a href="<?php echo esc_url($theme_data['slide_button_link']); ?>" class="btn s_link animation animated-item-3"> <?php echo esc_html($theme_data['slide_button_text']); ?> </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php  endfor; ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination1"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-next1"></div>
        <div class="swiper-button-prev swiper-button-prev1"></div>
    </div>
    <?php 
        if(class_exists('WPCF7') && function_exists('wpcf7_contact_form_tag_func')): 
            $form_id = absint(get_theme_mod('tf_construction_contact_form'));
            if($form_id):
            ?>
            <div class="home-contact">
                <h2 class="contact-title"><?php echo esc_html(get_theme_mod('tf_construction_contact_form_header')); ?></h2>
                <?php echo wpcf7_contact_form_tag_func(array('id'=> $form_id), null, 'contact-form-7'); ?>
            </div>
            <?php 
            endif; 
        endif; 
    ?>
</section>
<!-- Slider End -->
<?php endif; ?>
