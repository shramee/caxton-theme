<?php
/**
 * Caxton theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Caxton theme
 */

$cxth_theme = wp_get_theme();
define( 'CXTH_VER', $cxth_theme->get( 'Version' ) );

if ( ! class_exists( 'Caxton' ) ) {
	function cxth_required_notice() {
		echo
			'<div class="notice is-dismissible error">
				<p>' .
			sprintf(
				__( '%s requires that you have our free %s plugin installed and activated.', 'sfp-blocks' ),
				'<b>Caxton theme</b>',
				'<a href="' . admin_url( 'plugin-install.php?s=caxton&tab=search&type=term' ) . '">Caxton</a>'
			) . '</p>' .
			'<p><a style="background:#e25c4e;border-color:#d23c1e;text-shadow:none;box-shadow:0 1px 0 #883413;" href="' .
			admin_url( 'plugin-install.php?s=caxton&tab=search&type=term' ) . '" class="button-primary button-pootle">' .
			__( 'Install Caxton', 'sfp_blocks' ) . '</a></p>' .
			'</div>';
	}

	add_action( 'admin_notices', 'cxth_required_notice' );
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cxth_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cxth' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cxth' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'cxth_widgets_init' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/theme-class.php';

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

function cxth_get_tpl( $name, $before, $after ) {
	$prefix = apply_filters( 'cxth_content_post_name_prefix', 'cxth' );

	$content_post = get_post( [
		'name' => "$prefix-$name",
		'post_type' => 'any',
	] );

	echo $before;

	if ( 0&&$content_post ) {
		echo apply_filters( 'the_content', $content_post->post_content );
	} else {
		get_template_part( "template-parts/$name" );
	}

	echo $after;
}