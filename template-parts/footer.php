<?php
/**
 * Template part for showing footer
 *
 * @package Caxton theme
 */

$footer_text = get_option( 'footer-text', get_bloginfo( 'site_title' ) . ' &copy; ' . date( 'Y' ) );

?>
<div class="flex items-center">

	<div class="footer-text">
		<?php echo $footer_text; ?>
	</div><!-- .footer-text -->

	<?php
	if ( is_nav_menu( 'footer-menu' ) ) {
		wp_nav_menu( [
			'theme_location' => 'footer-menu',
			'menu_class'     => 'footer-navigation menu dn db-l',
//			'echo'           => false,
		] );
	}
	?>

</div>
