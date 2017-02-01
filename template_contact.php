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
						<h1><?php the_field('contact_us_heading'); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content contact-us-content row">
						<div class="page-content large-7 medium-6 small-12 column">
						<?php
							the_content();
						?>
						</div>
						<div class="page-meta large-5 medium-6 small-12 column">
							
							<?php //REPEATER

							if (have_rows('contact_details')) {
								while (have_rows('contact_details')) {
									the_row(); // start ?>
							
								<?php if (!empty(get_sub_field('name'))) { // NAME ?>
								<h4><?php the_sub_field('name'); ?></h4>
								<?php } ?>
								<table>
									<?php if (!empty(get_sub_field('description'))) { // DESCRIPTION ?>
									<tr>
										<td colspan="2">
											<?php the_sub_field('description') ?>
										</td>
									</tr>
									<?php } ?>
									<?php if (!empty(get_sub_field('address'))) { // ADDRESS ?>
									<tr>
										<td colspan="2">
											<?php the_sub_field('address') ?>
										</td>
									</tr>
									<?php } ?>
									<?php if (!empty(get_sub_field('telephone'))) { // TELEPHONE ?>
									<tr>
										<td>Telephone:</td>
										<td><?php the_sub_field('telephone') ?></td>
									</tr>
									<?php } ?>
									<?php if (!empty(get_sub_field('fax'))) { // FAX ?>
									<tr>
										<td>Fax:</td>
										<td><?php the_sub_field('fax') ?></td>
									</tr>
									<?php } ?>
									<?php if (!empty(get_sub_field('email'))) { // FAX ?>
									<tr>
										<td>Email:</td>
										<td><?php the_sub_field('email') ?></td>
									</tr>
									<?php } ?>

								</table>
								

							<?php
								} // end while
							} else { //else ?>
							

							<?php } // end if ?>
							

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
