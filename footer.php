<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Asia_Pacific_Airways
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="site-map-container">
			<div class="wrapper row medium-up-5 small-up-2">
				<nav class="site-map column column-block">
					<?php wp_nav_menu( array( 'theme_location' => 'sitemap-1', 'menu_id' => 'sitemap-1' ) ); ?>
				</nav>
				<nav class="site-map column column-block">
					<?php wp_nav_menu( array( 'theme_location' => 'sitemap-2', 'menu_id' => 'sitemap-2' ) ); ?>
				</nav>
				<nav class="site-map column column-block">
					<?php wp_nav_menu( array( 'theme_location' => 'sitemap-3', 'menu_id' => 'sitemap-3' ) ); ?>
				</nav>
				<nav class="site-map column column-block">
					<?php wp_nav_menu( array( 'theme_location' => 'sitemap-4', 'menu_id' => 'sitemap-4' ) ); ?>
				</nav>
				<nav class="site-map column column-block">
					<?php wp_nav_menu( array( 'theme_location' => 'sitemap-5', 'menu_id' => 'sitemap-5' ) ); ?>
				</nav>
			</div>
		</div>

		<div class="site-info">
			<nav class="footer-main-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'footer-menu-1' ) ); ?>
			</nav>
			<nav class="footer-secondary-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-3', 'menu_id' => 'footer-menu-2' ) ); ?>
			</nav>
			<span class="footer-message">Design and Development by <a href="http://wearermdc.com"><strong>RMDC</strong></a></span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
