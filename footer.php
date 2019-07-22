<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Caxton theme
 */

?>

</div><!-- .col-full -->
</div><!-- #content -->

<?php
cxth_get_content_post( 'footer', '<footer id="colophon" class="site-footer">', '</footer><!-- #colophon -->' );
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
