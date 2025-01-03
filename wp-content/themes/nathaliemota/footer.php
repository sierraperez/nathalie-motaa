<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nathalie_Mota
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'footer-menu',
				)
			);
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<<<<<<< HEAD
<script>
    jQuery(document).ready(function($) {
        $('select.select2').select2();
    });
</script>
=======
>>>>>>> 77b9d1e36f701a5d43afe5b872592c91e74ec2f6

<?php wp_footer(); ?>



</body>
</html>
