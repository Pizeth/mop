<?php
/*
 * Category pages section display - posts with excerpt and thumbs.
 * @package WordPress - Themonic Framework
 * @subpackage Iconic_One
 * @since Iconic One 1.0
 */

get_header(); ?>
	<div class="container-fluid main">
		<div class="container">
			<div class="row">
				<div class="col-8 main-content">
					<div class="row list-wrap">
						<div class="col-12 headcrumb">
						<!-- <div class="hr"></div> -->
							<div class="breadcrumb"><?php get_breadcrumb(); ?></div>
							<!-- <ul class="cat-post no-pad">
								<li><?php the_category(' &bull; '); ?></li>
							</ul> -->
							<!-- <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?> -->
						</div>
						<section id="primary" class="site-content col-12">
							<div id="content" role="main">
							<?php if (have_posts()) : ?>
								<header class="archive-header">
									<h1 class="archive-title"><?php printf(__('ប្រភេទអត្ថបទ: %s', 'mop'), '<span>' . single_cat_title('', false) . '</span>'); ?></h1>
								<?php if (category_description()) : // Show an optional category description ?>
									<div class="archive-meta"><?php echo category_description(); ?></div>
								<?php endif; ?>
								</header><!-- .archive-header -->
								<?php
								/* Start the Loop */
								while (have_posts()) : the_post();
									/* Include the post format-specific template for the content. If you want to
									* this in a child theme then include a file called called content-___.php
									* (where ___ is the post format) and that will be used instead.
									*/
									get_template_part('content', get_post_format());
								endwhile;
								// themonic_content_nav( 'nav-below' );
								?>
							<?php else : ?>
								<?php get_template_part('content', 'none'); ?>
							<?php endif; ?>
							</div><!-- #content -->
						</section><!-- #primary -->
						<?php
						$the_query = new WP_Query( 'category_name=news' );
						echo 'id = ' . $the_query->get_queried_object_id();
 
						if ( $the_query->have_posts() ) {
							echo '<ul>';
							while ( $the_query->have_posts() ) {
								$the_query->the_post();
								echo '<li>' . get_the_title() . '</li>';
							}
							echo '</ul>';
						} else {
							// no posts found
						}
						/* Restore original Post Data */
						wp_reset_postdata();
						?>
					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>	
	</div>
<?php get_footer(); ?>