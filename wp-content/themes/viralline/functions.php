<?php
// child style enqueue
function viralline_styles() {
    $themeVersion = wp_get_theme()->get('Version');
    // Enqueue our style.css with our own version
    wp_enqueue_style('viralline-style', get_template_directory_uri() . '/style.css',array(), $themeVersion);
   
}
add_action('wp_enqueue_scripts', 'viralline_styles');
?>