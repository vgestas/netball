<?php
/**
 * Plugin Name: Mega Addons For Elementor
 * Description: Mega Addons gives you multi plugins all in one. It's very powerful for any theme.
 * Plugin URI: http://elementor.topdigitaltrends.net/
 * Author: Qamar Sheeraz, Nasir Ahmad
 * Author URI: https://profiles.wordpress.org/nasir179125/
 * Version: 1.7
 * Stable tag: 1.7
 */

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 $css_path = site_url( '/wp-content/plugins/ultimate-addons-for-elementor/css/', '' );

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 require_once( 'classes/ma-elementor.php' );
  
 global $mae;
 $uae = new MA_Elementor( __FILE__ );
 $uae->version = '1.7';
 $uae->init();
?>