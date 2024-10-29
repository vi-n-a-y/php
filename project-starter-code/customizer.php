<?php//while adding code this code to the functions.php it give the customizer option to editor
add_action('after_setup_theme', 'my_child_theme_setup');

function my_child_theme_setup() {
    add_theme_support('custom-logo');
    add_theme_support('custom-header');
    add_theme_support('custom-background');
    add_theme_support('post-thumbnails');
    // Add any other supports you need
}
