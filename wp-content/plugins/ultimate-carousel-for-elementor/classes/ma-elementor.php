<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * UAE Base Class
 *
 * All functionality pertaining to core functionality of the Ultimate Addons For Elementor plugin.
 *
 * @package WordPress
 * @subpackage UAE
 * @author Nasir
 * @since 1.0
 *
 */

class UCFE_Elementor {
	public $version;
	private $file;

	private $plugin_url;
	private $assets_url;
	private $plugin_path;

	const MINIMUM_PHP_VERSION = '7.0';	

	public $mae;
	
	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct ( $file ) {
		$this->version = '';
		$this->file = $file;
		$this->prefix = 'uae_';

		/* Plugin URL/path settings. */
		$this->plugin_url = str_replace( '/classes', '', plugins_url( plugin_basename( dirname( __FILE__ ) ) ) );
		$this->plugin_path = str_replace( 'classes', '', plugin_dir_path( __FILE__ ));
		$this->assets_url = $this->plugin_url . '/assets';

		
	} // End __construct()

	/**
	 * init function.
	 *
	 * @access public
	 * @return void
	 */
	public function init () {

		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'uae_front_enqueue_styles' ] );
		// Register Widget Scripts
		// add_action( 'elementor/frontend/after_register_scripts', [ $this, 'uae_front_enqueue_scripts' ] );

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}


		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );		

		add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );

	} // End init()


	public function uae_front_enqueue_styles() {
		wp_enqueue_style( 'slick-carousal-css', plugins_url( '../css/slick-carousal.css' , __FILE__ ));
		wp_enqueue_script( 'slick-js', plugins_url( '../js/slick.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		wp_enqueue_script( 'custom-tm-js', plugins_url( '../js/custom-tm.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		wp_enqueue_style( 'font_awesome_solid', plugins_url( '../css/font-awesome/css/all.css', __FILE__ ) );
		wp_enqueue_style( 'font_awese_solid', plugins_url( '../../elementor/assets/lib/font-awesome/css/solid.min.css', __FILE__ ) );
	}
	

	/**
	 * Print array
	 *
	 * Print array in readable format.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function pa( $arr ) {

		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'uae' ),
			'<strong>' . esc_html__( 'Mega Addons for Elementor', 'uae' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'uae' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'uae' ),
			'<strong>' . esc_html__( 'Mega Addons for Elementor', 'uae' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'uae' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'ultimate-addons',
			[
				'title' => __( 'Ultimate Carousel', 'uae' ),
				'icon' => 'fa fa-plug',
			]
		);
	}


	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {
		// Include Widget files
		require_once( $this->plugin_path . '/widgets/advanced-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_ucfe_advanced_carousel() );
	}

	/**
	 * register_plugin_version function.
	 *
	 * @access public
	 * @return void
	 */
	public function register_plugin_version () {
		if ( $this->version != '' ) {
			update_option( 'ma_elementor' . '-version', $this->version );
		}
	} // End register_plugin_version()
} // End Class
?>