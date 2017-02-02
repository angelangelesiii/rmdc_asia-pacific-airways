<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Asia_Pacific_Airways
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="wrapper">
				<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title">Error 404: Not found</h1>
						</header><!-- .page-header -->
					
						<div class="page-content">
							<p>The page you are trying to look for does not exist. Please make sure that the URL you are trying to access is valid.</p>
							<p><a href="<?php echo get_home_url() ?>">Back to Home</a></p>

					
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
