<?php
/**
 * Plugin Name: Ultimate Carousel For Elementor
 * Description: Drag & touch Carousel anything at any position (row / column) in VC
 * Plugin URI: http://elementor.topdigitaltrends.net/advanced-carousel
 * Author: Nasir Ahmad
 * Author URI: http://elementor.topdigitaltrends.net/contact
 * Version: 2.1.5
 * Stable tag: 2.1.5
 */

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 require_once( 'classes/ma-elementor.php' );
  
 global $mae;
 $uae = new UCFE_Elementor( __FILE__ );
 $uae->version = '2.1.5';
 $uae->init();
?>