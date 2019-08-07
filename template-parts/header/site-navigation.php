<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

$main_menu = wp_nav_menu( [
	'theme_location' => 'main-menu',
	'menu_class'     => 'main-navigation menu dn db-l',
	'echo'           => false,
] );

$mobile_menu = wp_nav_menu( [
	'theme_location' => has_nav_menu( 'mobile-menu' ) ? 'mobile-menu' : 'main-menu',
	'menu_class'     => 'mobile-navigation menu absolute dn-l right-0 w-100',
	'echo'           => false,
] );

?>
<nav class="site-navigation">

	<?php echo $main_menu; ?>

	<button class="btn dn-l" data-toggle-slide=".mobile-navigation">Mobile menu</button>
	<?php echo $mobile_menu; ?>

</nav>