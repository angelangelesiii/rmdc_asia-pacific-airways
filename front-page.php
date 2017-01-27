<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Asia_Pacific_Airways
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="wrapper">
				<div class="static-content">
					<blockquote>
						<?php echo wpautop(get_theme_mod('apa_fp_dp_text')) ?>
						<div style="text-align: right;"><a href="<?php echo get_permalink(get_theme_mod('apa_fp_dp_link')) ?>" class="large-link">Click Here <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></div>
					</blockquote>

					<div class="front-page-cards row">
						<div class="column large-4 small-12 card clearfix">
							<div class="thumbnail">
								<a href="<?php echo get_permalink(get_theme_mod('apa_fp_callout1_link')) ?>"><img src="<?php echo wp_get_attachment_url(get_theme_mod('apa_fp_callout1_image')) ?>" alt=""></a>
							</div>
							<div class="card-content">
								<h2><a href="<?php echo get_permalink(get_theme_mod('apa_fp_callout1_link')) ?>"><?php echo get_theme_mod('apa_fp_callout1_headline') ?></a></h2>
								<?php echo wpautop(get_theme_mod('apa_fp_callout1_text')) ?>
							</div>
						</div>
						<div class="column large-4 small-12 card clearfix">
							<div class="thumbnail">
								<a href="<?php echo get_permalink(get_theme_mod('apa_fp_callout2_link')) ?>"><img src="<?php echo wp_get_attachment_url(get_theme_mod('apa_fp_callout2_image')) ?>" alt=""></a>
							</div>
							<div class="card-content">
								<h2><a href="<?php echo get_permalink(get_theme_mod('apa_fp_callout2_link')) ?>"><?php echo get_theme_mod('apa_fp_callout2_headline') ?></a></h2>
								<?php echo wpautop(get_theme_mod('apa_fp_callout2_text')) ?>
							</div>
						</div>
						<div class="column large-4 small-12 card clearfix">
							<div class="thumbnail">
								<a href="<?php echo get_permalink(get_theme_mod('apa_fp_callout3_link')) ?>"><img src="<?php echo wp_get_attachment_url(get_theme_mod('apa_fp_callout3_image')) ?>" alt=""></a>
							</div>
							<div class="card-content">
								<h2><a href="<?php echo get_permalink(get_theme_mod('apa_fp_callout3_link')) ?>"><?php echo get_theme_mod('apa_fp_callout3_headline') ?></a></h2>
								<?php echo wpautop(get_theme_mod('apa_fp_callout3_text')) ?>
							</div>
						</div>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
