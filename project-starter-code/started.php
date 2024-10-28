<?php
function child_styles() {
    wp_enqueue_style( 'child-theme-css', get_stylesheet_directory_uri() . '/style.css', []);
   wp_enqueue_script( 'theme', get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '', true );
        // Pass the AJAX URL to your JavaScript
    wp_localize_script('theme', 'Theme', array('ajaxurl' => admin_url('admin-ajax.php')));


}
add_action( 'wp_enqueue_scripts', 'child_styles', 9999 );


add_filter( 'jetpack_implode_frontend_css', '__return_false', 99 );
add_filter( 'jetpack_sharing_counts', '__return_false', 99 );


add_filter( 'style_loader_src', 'theme_remove_wp_ver_css_js', 9999 );
  // remove Wp version from scripts
add_filter( 'script_loader_src', 'theme_remove_wp_ver_css_js', 9999 );


//  remove WP version from scripts
function theme_remove_wp_ver_css_js( $src ) {
   if ( strpos( $src, 'ver=' ) )
       $src = remove_query_arg( 'ver', $src );
   return $src;
}


function my_login_logo() { ?> <style type="text/css">
#login h1 a,
.login h1 a {
    background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png');
    height: auto;
    width: 226px;
    background-size: contain;
    background-repeat: no-repeat;
    padding-bottom: 30px;
}
</style> <?php } add_action( 'login_enqueue_scripts', 'my_login_logo' );


// Check if the function 'theme_login_url' does not already exist
if ( ! function_exists( 'theme_login_url' ) ) {
  // Define the 'theme_login_url' function
  function theme_login_url() {
      return home_url();
  }
  // Calling the functions only on the login page
add_filter('login_headerurl', 'theme_login_url');
}


// Check if the function 'theme_login_title' does not already exist
if ( ! function_exists( 'theme_login_title' ) ) {
  // Define the 'theme_login_title' function
  function theme_login_title() {
      return get_option('blogname');
  }
  add_filter('login_headertext', 'theme_login_title');
}


// Disable XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );


// Remove wlwmanifest link
function remove_wlwmanifest_link() {
  remove_action( 'wp_head', 'wlwmanifest_link' );
  // Remove RSD link
  remove_action( 'wp_head', 'rsd_link' );
  // Remove oEmbed JSON link
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links',10 );
  remove_action( 'wp_head', 'wp_shortlink_wp_head');
  remove_action('wp_head', 'rest_output_link_wp_head', 10);
  remove_action('template_redirect', 'rest_output_link_header', 11, 0);
  add_theme_support( 'block-template-parts' );
}
add_action( 'init', 'remove_wlwmanifest_link' );

?>

