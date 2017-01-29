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
Template Name: Services List
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="wrapper">
				<h1><?php the_field('display_title'); ?></h1>
					<?php 
					wp_reset_postdata();
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$servicesArgs = array(
						'post_type'				=> 'services',
						'posts_per_page'		=> '12',
						'paged'					=> $paged
						);
					
					$servicesQuery = new WP_Query($servicesArgs);
					
					if ($servicesQuery->have_posts()) { ?>

				<div class="row medium-up-3 small-up-1 services-offers-list">

					<?php
						while($servicesQuery->have_posts()) {
							$servicesQuery -> the_post(); // START LOOP
					?>
					
					<div class="column column-block service-item services-offers-item">
						<div class="image-container">
							<?php if(has_post_thumbnail()) { ?>
							<a href="<?php the_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url('large') ?>" alt="<?php the_title(); ?>"></a>
							<?php } ?>
						</div>
						<div class="content-container">
							<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
							<p><?php the_excerpt(); ?></p>
						</div>
					</div>
					
					<?php } // end while ?>

				</div>

				<?php if ($servicesQuery->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
				  	<nav class="prev-next-posts clearfix">
				  		<div class="next-posts-link">
					      	<?php echo get_previous_posts_link( 'Previous' ); // display newer posts link ?>
					    </div>
				    	<div class="prev-posts-link">
				      		<?php echo get_next_posts_link( 'Next', $servicesQuery->max_num_pages ); // display older posts link ?>
				    	</div>
				  	</nav>
				<?php } ?>

				<?php } else { ?>
				
				<p>Nothing to display.</p>

				<?php 
				
				}// end if
				
				?>	
				
				
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
