<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Asia_Pacific_Airways
 */

/*
Template Name: Offices
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="wrapper">
			<?php while(have_posts()) { 
				the_post();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="office-list-content row">
						<div class="office-list large-4 medium-4 small-12 column">
						<!-- MAIN OFFICE -->
							<h4>Operation Head Office:</h4>
							<p><?php the_field('head_office'); ?></p>
						</div>
						<div class="office-list large-8 medium-8 small-12 column">
						<!-- OTHER OFFICES -->
							<h4><?php the_field('other_offices_heading'); ?></h4>
							<div class="office-list-items">
								<?php 
								if (have_rows('other_offices_list')) { 
									while (have_rows('other_offices_list')) {
										the_row();
								?>

									<?php if (!empty(get_sub_field('office'))) { // NAME ?>
									<span class="office-item"><?php the_sub_field('office'); ?></span><br />
									<?php } ?>

								<?php } // end while
								} else { // else ?>



								<?php } // end if ?>
							</div>
						</div>
					</div>
					



					<?php if ( get_edit_post_link() ) : ?>
						<footer class="entry-footer">
							<?php
								edit_post_link(
									sprintf(
										/* translators: %s: Name of current post */
										esc_html__( 'Edit %s', 'asiapacificairways' ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									),
									'<span class="edit-link">',
									'</span>'
								);
							?>
						</footer><!-- .entry-footer -->
					<?php endif; ?>
				</article><!-- #post-## -->
			
			<?php } ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
