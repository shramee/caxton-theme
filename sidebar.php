<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Caxton theme
 */
?>
</div><!-- #primary -->
<?php

if ( is_active_sidebar( 'sidebar-1' ) ) {
	cxth_get_tpl( 'sidebar', '<aside id="secondary" class="widget-area w-100 w-30-l">', '</aside><!-- #secondary -->' );
}