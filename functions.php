<?php
/**
 * Fumetteria functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fumetteria
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fumetteria_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Fumetteria, use a find and replace
		* to change 'fumetteria' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'fumetteria', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-header' => esc_html__( 'Header', 'fumetteria' ),
			'menu-footer' => esc_html__( 'Footer', 'fumetteria' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'fumetteria_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'fumetteria_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fumetteria_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fumetteria_content_width', 1280 );
}
add_action( 'after_setup_theme', 'fumetteria_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fumetteria_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar home', 'fumetteria' ),
			'id'            => 'sidebar-home',
			'description'   => esc_html__( 'Aggiungi i widget.', 'fumetteria' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar post', 'fumetteria' ),
			'id'            => 'sidebar-post',
			'description'   => esc_html__( 'Aggiungi i widget.', 'fumetteria' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fumetteria_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fumetteria_scripts() {
	wp_enqueue_style( 'fumetteria-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'fumetteria-style', 'rtl', 'replace' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( is_singular() ) {
		wp_enqueue_script( 'fumetteria-scripts', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'fumetteria_scripts' );

/**
 * Custom error message on login.
 */
function fumetteria_login_error(){
	return 'Indirizzo email / username o password errati.';
}
add_filter( 'login_errors', 'fumetteria_login_error' );

/**
 * Link logo on the login page to the website.
 */
function fumetteria_login_logo() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'fumetteria_login_logo' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Remove content from page code.
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );
add_filter( 'emoji_svg_url', '__return_false' );

/**
 * Disable Curly Quotes
 */
remove_filter( 'the_content', 'wptexturize' );
remove_filter( 'the_title', 'wptexturize' );
remove_filter( 'the_excerpt', 'wptexturize' );

// Embed wrapper.
function fumetteria_embedWrapper( $html, $url, $attr, $post_id)  {
	if ( strpos( $html, 'youtube' ) !== false ) {
		return '<div class="embed-wrapper">' . $html . '</div>';
	}
	return $html;
}
add_filter( 'embed_oembed_html', 'fumetteria_embedWrapper', 10, 4 );

// Add Fancybox to posts.
function fumetteria_fancybox() {
	wp_enqueue_script ( 'fumetteria-magnificpopup', get_template_directory_uri() . '/assets/vendor/magnificpopup/magnificpopup.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_style( 'fumetteria-magnificpopup-style', get_template_directory_uri() . '/assets/vendor/magnificpopup/magnificpopup.css', false, 'all' );
}
add_action ( 'get_footer', 'fumetteria_fancybox' );

function fumetteria_fancybox_data( $content ) {
	global $post; // Get post
	$pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i"; // Search for image IN link (set from editor)
	$replace = '<a$1href=$2$3.$4$5 class="post-img-link">'; // Replace pattern
	$content = preg_replace( $pattern, $replace, $content ); // Replace content
	return $content; // Echo content
}
add_filter( 'the_content', 'fumetteria_fancybox_data' );