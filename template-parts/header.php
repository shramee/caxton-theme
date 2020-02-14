<?php
/**
 * Template part for showing header
 *
 * @package Caxton theme
 */

?>

<div class="flex items-center">
<?php
cxth_get_tpl( 'header/site-branding', '<div class="site-branding">', '</div><!-- .site-branding -->' );
cxth_get_tpl( 'header/site-navigation', '<nav class="site-navigation">', '</nav>' );
?>
</div>