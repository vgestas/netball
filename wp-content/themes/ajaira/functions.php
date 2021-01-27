<?php

/**
 * ajaira functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ajaira
 */

if (!function_exists('ajaira_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ajaira_setup()
	{
		/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ajaira, use a find and replace
	 * to change 'ajaira' to the name of your theme in all the template files.
	 */
		load_theme_textdomain('ajaira', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
		add_theme_support('title-tag');

		/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary' => esc_html__('Primary', 'ajaira'),
			'footer-menu' => esc_html__('Footer Menu', 'ajaira'),
			'footer-social-menu' => esc_html__('Footer Social Menu', 'ajaira')
		));

		/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('ajaira_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));


		// Editor style
		add_editor_style(array('/css/editor-style.css', 'https://fonts.googleapis.com/css?family=Lato:300,400,700|Merriweather', '/css/font-awesome.min.css'));
	}
endif;
add_action('after_setup_theme', 'ajaira_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ajaira_content_width()
{
	$GLOBALS['content_width'] = apply_filters('ajaira_content_width', 640);
}
add_action('after_setup_theme', 'ajaira_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ajaira_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'ajaira'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'ajaira'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'ajaira_widgets_init');

function ajaira_fonts_url()
{
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Merriweather, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$merriweather = _x('on', 'Merriweather font: on or off', 'ajaira');

	if ('off' !== $merriweather) {
		$font_families = array();

		$font_families[] = 'Lato:300,400,700|Merriweather';

		$query_args = array(
			'family' => urlencode(implode('|', $font_families)),
			'subset' => urlencode('latin,latin-ext'),
		);

		$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
	}

	return esc_url_raw($fonts_url);
}

/**
 * Enqueue scripts and styles.
 */
function ajaira_scripts()
{

	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');

	wp_enqueue_style('ajaira-font-icon', get_template_directory_uri() . '/css/font-awesome.min.css');

	wp_enqueue_style('ajaira-google-fonts', ajaira_fonts_url(), array(), null);

	wp_enqueue_style('ajaira-slilcknav', get_template_directory_uri() . '/css/slicknav.css');

	wp_enqueue_style('ajaira-style', get_stylesheet_uri());

	wp_enqueue_style('ajaira-responsive', get_template_directory_uri() . '/css/responsive.css');


	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20151215', true);

	wp_enqueue_script('query.slicknav', get_template_directory_uri() . '/js/jquery.slicknav.js', array('jquery'), '20151215', true);

	wp_enqueue_script('ajaira', get_template_directory_uri() . '/js/ajaira.js', array('jquery'), '20151215', true);

	// wp_enqueue_script( 'ajaira-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script('ajaira-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ajaira_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
