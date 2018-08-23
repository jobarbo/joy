<?php
// ============================================
// FUNCTIONS.php
// where it all begins
// ============================================

// HEADER STYLES
function header_styles()
{
    $template = get_template_directory_uri();
    wp_register_style('main', $template . '/assets/css/application.css');
    wp_enqueue_style('main'); // Enqueue it!
}

// HEADER SCRIPTS
function header_scripts() {
  $template = get_template_directory_uri();
  wp_register_script('app', $template . '/assets/js/application.js', array(), null);
  wp_enqueue_script('app');
}
// ACTION HOOK
add_action('wp_enqueue_scripts', 'header_styles');
add_action('wp_enqueue_scripts', 'header_scripts');
