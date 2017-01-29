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
Template Name: Contact Us
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
						<h1><?php the_field('heading'); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content contact-us-content row">
						<div class="page-content large-7 medium-6 small-12 column">
						<?php
							the_content();
						?>
						</div>
						<div class="page-meta large-5 medium-6 small-12 column">
							<h3>Contact Details</h3>
							<p>
								<?php the_field('address'); ?>
							</p>
							<table>
								<tbody>
									<tr>
										<td>Telephone</td>
										<td>: <?php the_field('telephone'); ?></td>
									</tr>
									<tr>
										<td>Fax</td>
										<td>: <?php the_field('fax'); ?></td>
									</tr>
									<tr>
										<td>Email</td>
										<td>: <?php the_field('email'); ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div><!-- .entry-content -->
					



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
