<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Asia_Pacific_Airways
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'asiapacificairways' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div id="top-bar">
			<div class="wrapper">
				<p>Wholly Owned Subsidiary of Group of Seabrook Holding, UK</p>
			</div>
		</div>

		<div class="site-branding">

		<?php if(is_front_page()) { // IF FRONT PAGE?>

			<div class="front-page-header">

				<nav class="site-nav front-page-nav">
					<div class="wrapper">
						<div class="nav-container clearfix">
							<div class="logo">
								<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri().'/img/brand/logo.jpg' ?>" alt=""></a>
							</div>
							<div class="nav-menu">
								<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
							</div>
						</div>
					</div>
				</nav>

				<div class="carousel owl-carousel">
					<?php 
					wp_reset_postdata();
					$carouselItems = array(
						'post_type'				=> 'carousel',
						'posts_per_page'		=> '6',
						'ignore_sticky_posts'	=> true
						);
					$carouselQuery = new WP_Query($carouselItems);

					if ($carouselQuery->have_posts()) {
						while($carouselQuery->have_posts()) {
							$carouselQuery->the_post();
					?>
					
					<div class="carousel-item" style="background: url('<?php the_field('carousel_image'); ?>')"></div>

					<?php } } else { // FALLBACK ?>



					<?php 
					}
					wp_reset_postdata();
					?>
				</div>

			</div>

		<?php } else { // IF NOT FRONT PAGE?>

			<nav class="site-nav">
				<div class="wrapper">
					<div class="nav-container clearfix">
						<div class="logo">
							<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri().'/img/brand/logo.jpg' ?>" alt=""></a>
						</div>
						<div class="nav-menu">
							<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
						</div>
					</div>
				</div>
			</nav>
			
			<?php if (has_post_thumbnail()) { ?>
			<div class="featured-image-container" style="background: url('<?php echo the_post_thumbnail_url(); ?>');" ></div>
			<?php } ?>

		<?php } // END IF ?>


		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
