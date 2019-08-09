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
	'container_class'     => 'main-navigation menu dn db-l',
	'container_id'        => 'main-menu',
	'echo'           => false,
] );

$mobile_menu = wp_nav_menu( [
	'theme_location' => has_nav_menu( 'mobile-menu' ) ? 'mobile-menu' : 'main-menu',
	'container_class'     => 'mobile-navigation menu absolute border-box dn right-0 w-100',
	'container_id'        => 'mobile-menu',
	'echo'           => false,
] );

?>
<nav class="site-navigation">

	<?php echo $main_menu; ?>

	<a class="btn dn-l" data-toggle-slide=".mobile-navigation" href=""></a>
	<?php echo $mobile_menu; ?>

</nav>