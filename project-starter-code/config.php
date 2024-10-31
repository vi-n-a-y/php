<?php 
if ( ! defined( 'WP_DEBUG' ) ) { //add this code in config while where you find the 'if condition ' mentioned in the code the enable  a debug log in wp-content if error is present.
  define('WP_DEBUG', true);
  define('WP_DEBUG_LOG', true);
  define('WP_DEBUG_DISPLAY', false);
  @ini_set('display_errors', 0);
}



