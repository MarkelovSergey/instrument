<?php
function tf_construction_get_social_block(){
    $theme_data =  tf_construction_get_theme_var();;
    $open_new_tab = ($theme_data['social_link_open_in_new_tab'])?'target="_blank"':'';
    ?>
        <ul class="c_social">
        	<?php if(!empty($theme_data['social_link_facebook'])): ?>
            <li><a href="<?php echo esc_url($theme_data['social_link_facebook']); ?>"  <?php echo esc_attr($open_new_tab); ?>><i class="fa fa-facebook icon"></i></a></li>
            <?php endif; ?>
            <?php if(!empty($theme_data['social_link_google'])): ?>
            <li><a href="<?php echo esc_url($theme_data['social_link_google']); ?>"  <?php echo esc_attr($open_new_tab); ?>><i class="fa fa-google-plus icon"></i></a></li>
            <?php endif; ?>
            <?php if(!empty($theme_data['social_link_twitter'])): ?>
            <li><a href="<?php echo esc_url($theme_data['social_link_twitter']); ?>"  <?php echo esc_attr($open_new_tab); ?>><i class="fa fa-twitter icon"></i></a></li>
            <?php endif; ?>
            <?php if(!empty($theme_data['social_link_youtube'])): ?>
            <li><a href="<?php echo esc_url($theme_data['social_link_youtube']); ?>"  <?php echo esc_attr($open_new_tab); ?>><i class="fa fa-youtube icon"></i></a></li>
            <?php endif; ?>
            <?php if(!empty($theme_data['social_link_linkedin'])): ?>
            <li><a href="<?php echo esc_url($theme_data['social_link_linkedin']); ?>"  <?php echo esc_attr($open_new_tab); ?>><i class="fa fa-linkedin icon"></i></a></li>
            <?php endif; ?>
        </ul>    
    <?php
}

function tf_construction_get_contact_block()
{
    $theme_data =  tf_construction_get_theme_var();
    ?>
     <ul class="c_contacts">
            <?php if(!empty($theme_data['contact_email'])): ?>
            <li><a href="mailto:<?php echo esc_attr($theme_data['contact_email']); ?>" ><i class="fa fa-envelope icon"></i><?php echo esc_html($theme_data['contact_email']); ?></a></li>
            <?php endif; ?>
            <?php if(!empty($theme_data['contact_phone'])): ?>
            <li><a href="callto:<?php echo esc_attr($theme_data['contact_phone']); ?>" ><i class="fa fa-phone icon"></i><?php echo esc_html($theme_data['contact_phone']); ?></a></li>
            <?php endif; ?>
    </ul>
    <?php
}

function tf_construction_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'tf_construction_excerpt_more');

function tf_construction_comment_form_fields($fields) {

    $fields['author'] = '<div class="form-group col-md-4"><label  for="name">' . __('NAME', 'tf-construction') . ':</label><input type="text" class="form-control" id="name" name="author" placeholder="' . esc_attr__('Full Name', 'tf-construction') . '"></div>';
    $fields['email']  = '<div class="form-group col-md-4"><label for="email">' . __('EMAIL', 'tf-construction') . ':</label><input type="email" class="form-control" id="email" name="email" placeholder="' . esc_attr__('Your Email Address', 'tf-construction') . '"></div>';
    $fields['url']    = '<div class="form-group col-md-4"><label  for="url">' . __('WEBSITE', 'tf-construction') . ':</label><input type="text" class="form-control" id="url" name="url" placeholder="' . esc_attr__('Website', 'tf-construction') . '"></div>';
    return $fields;
}
add_filter('comment_form_fields', 'tf_construction_comment_form_fields');

function tf_construction_comment_form_defaults($defaults) {
    $defaults['submit_field']   = '<div class="form-group col-md-4">%1$s %2$s</div>';
    $defaults['comment_field']  = '<div class="form-group col-md-12"><label  for="message">' . __('COMMENT', 'tf-construction') . ':</label><textarea class="form-control" rows="5" id="comment" name="comment" placeholder="' . esc_attr__('Message', 'tf-construction') . '"></textarea></div>';
    $defaults['title_reply_to'] = __('Post Your Reply Here To %s', 'tf-construction');
    $defaults['class_submit']   = 'btn';
    $defaults['label_submit']   = __('SUBMIT COMMENT', 'tf-construction');
    $defaults['title_reply']    = '<h2>' . __('Post Your Comment Here', 'tf-construction') . '</h2>';
    $defaults['role_form']      = 'form';
    return $defaults;

}
add_filter('comment_form_defaults', 'tf_construction_comment_form_defaults');


function tf_construction_comment( $comment, $args, $depth ){
    //get theme data
    global $comment_data;
    //translations
    $leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] :__('Reply','tf-construction'); ?>
    <div class="col-xs-12 comment-detail">
        <div class="col-xs-2 comments-pics">
        <?php echo get_avatar($comment,$size = '80'); ?>
        </div>
        <div class="col-xs-10 comments-text">
            <h3>
                <?php comment_author();?> 
                <span> 
                    <?php 
                        if ( ('d M  y') == get_option( 'date_format' ) ) : ?>
                    <?php comment_date('F j, Y');?>
                    <?php else : ?>
                    <?php comment_date(); ?>
                    <?php endif; ?>
                    <?php _e('at','tf-construction');?>&nbsp;<?php comment_time('g:i a'); ?>
                 </span>
             </h3>  
             <p><?php comment_text() ; ?></p>
            <?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            <?php if ( $comment->comment_approved == '0' ) : ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'tf-construction' ); ?></em>
            <br/>
            <?php endif; ?>
        </div>
    </div>                              
    <?php
}


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function tf_construction_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    return $classes;
}
add_filter( 'body_class', 'tf_construction_body_classes' );


/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function tf_construction_jetpack_setup() {
    // Add theme support for Infinite Scroll.
    add_theme_support( 'infinite-scroll', array(
        'container' => 'main',
        'render'    => 'tf_construction_infinite_scroll_render',
        'footer'    => 'page',
    ) );

    // Add theme support for Responsive Videos.
    add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'tf_construction_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function tf_construction_infinite_scroll_render() {
    while ( have_posts() ) {
        the_post();
        if ( is_search() ) :
            get_template_part( 'template-parts/content', 'search' );
        else :
            get_template_part( 'template-parts/content', get_post_format() );
        endif;
    }
}

function tf_construction_is_woocommerce_activated() {
    return class_exists( 'woocommerce' ) ? true : false;
}


add_action( 'tgmpa_register', 'tf_construction_register_required_plugins' );
function tf_construction_register_required_plugins() {

    $plugins = array(
        // This is an example of how to include a plugin bundled with a theme.
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
    );
    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );
    tgmpa( $plugins, $config );
}



?>