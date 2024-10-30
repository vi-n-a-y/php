<?php
// Enable various theme support features
add_action('after_setup_theme', 'my_child_theme_setup');

function my_child_theme_setup() {
    add_theme_support('custom-logo');
    add_theme_support('custom-header');
    add_theme_support('custom-background');
    add_theme_support('post-thumbnails');
    
    // Additional theme supports
    add_theme_support('title-tag'); // Automatically manage the document title
    add_theme_support('automatic-feed-links'); // RSS feed links in head
    add_theme_support('html5', array(
        'search-form', 
        'comment-form', 
        'comment-list', 
        'gallery', 
        'caption'
    )); // Enable HTML5 markup
    add_theme_support('customize-selective-refresh-widgets'); // Better widget editing in Customizer
    add_theme_support('editor-styles'); // Allow styling in the block editor
    add_theme_support('wp-block-styles'); // Block editor styles support
    add_theme_support('responsive-embeds'); // Responsive video embeds

    // Add any other supports you need
}

