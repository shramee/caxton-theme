<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Caxton theme
 */

class Caxton_Theme {
	/** @var self Instance */
	private static $_instance;

	/**
	 * Returns instance of current calss
	 * @return self Instance
	 */
	public static function instance() {
		if ( ! self::$_instance ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	private $settings = [];

	/**
	 * Caxton_Theme constructor.
	 */
	public function __construct() {
		add_action( 'wp', [ $this, 'wp' ] );
		add_action( 'after_setup_theme', [ $this, 'content_width' ], 0 );
		add_action( 'after_setup_theme', [ $this, 'setup' ] );
		add_action( 'customize_save_after', [ $this, 'save_settings' ] );
	}

	/**
	 * Setup settings and page hooks
	 */
	public function wp() {
		$this->settings = get_option( 'cxth_customize_settings', [] );
		if ( is_customize_preview() ) {
			$this->settings = wp_parse_args( CxTh_Design::live_settings(), $this->settings );
		}

		add_filter( 'body_class', [ $this, 'body_classes' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'scripts_and_styles' ] );
		add_action( 'wp_head', [ $this, 'pingback_header' ] );
	}

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	public function setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Caxton theme, use a find and replace
		 * to change 'cxth' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cxth', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main menu', 'cxth' ),
			'mobile-menu' => esc_html__( 'Mobile menu', 'cxth' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'cxth_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 * Priority 0 to make it available to lower priority callbacks.
	 * @global int $content_width
	 */
	public function content_width() {
		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'cxth_content_width', 1280 );
	}

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	public function body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}

		return array_merge( $this->settings['body_class'], $classes );
	}

	public function scripts_and_styles() {
		wp_enqueue_style( 'caxton-customizer', get_template_directory_uri() . '/customizer.css', [], $this->settings['rev'] );

		if ( ! empty( $this->settings['css'] ) ) {
			wp_add_inline_style( 'caxton-customizer', $this->settings['css'] );
		}

		if ( ! empty( $this->settings['gf_url'] ) ) {
			wp_enqueue_style( 'caxton-google-fonts', $this->settings['gf_url'] );
		}

		wp_enqueue_style( 'cxth-style', get_stylesheet_uri() );

		wp_enqueue_script( 'cxth-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

		wp_enqueue_script( 'cxth-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 */
	public function pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}

	public function save_settings() {
		$old_settings = get_option( 'cxth_customize_settings', [] );

		$settings = CxTh_Design::live_settings();

		$customizer_file = fopen( trailingslashit( get_stylesheet_directory() ) . "customizer.css", "w" );

		if ( fwrite( $customizer_file, $settings['css'] ) ) {
			unset( $settings['css'] ); // Unset css property if written to file.
		}

		fclose( $customizer_file );

		if ( empty( $old_settings['rev'] ) ) {
			$old_settings['rev'] = 0;
		}
		$settings['rev'] = ++$old_settings['rev'];
		update_option( 'cxth_customize_settings', $settings );
	}

}

Caxton_Theme::instance();