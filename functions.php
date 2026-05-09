<?php
// Enqueue child theme styles
// Astra parent styles are loaded automatically
// Only need to enqueue the child stylesheet
function astra_child_enqueue_styles() {
    wp_enqueue_style(
        'astra-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->get('Version')
    );
}
// add_action is wordpress hook system
// "when wordpress runs wp_enqueue_scripts, run our function too"
add_action('wp_enqueue_scripts', 'astra_child_enqueue_styles');

// Customize the WordPress admin footer
function golden_fork_admin_footer() {
    echo '<span>The Golden Fork Admin Panel | Developed by Dom | ' . date('Y') . '</span>';
}
add_filter('admin_footer_text', 'golden_fork_admin_footer');

// Add custom body class to all pages
function golden_fork_body_classes($classes) {
    $classes[] = 'golden-fork-site';
    return $classes;
}
add_filter('body_class', 'golden_fork_body_classes');

// Remove WordPress version number (security best practice)
function golden_fork_remove_version() {
    return '';
}
add_filter('the_generator', 'golden_fork_remove_version');

// Redirect 404 errors to custom 404 page
function golden_fork_404_redirect() {
    if(is_404()) {
        wp_redirect(home_url('/404-page-not-found'));
        exit();
    }
}
add_action('template_redirect', 'golden_fork_404_redirect');
