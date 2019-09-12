<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
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
							<ul class="cat-post no-pad">
								<li><?php the_category(' &bull; '); ?></li>
							</ul>
							<!-- <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?> -->
						</div>
						<div id="primary" class="site-content col-12">
							<div id="content" role="main">
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'content', 'page' ); ?>
								<?php endwhile; // end of the loop. ?>
							</div><!-- #content -->
						</div><!-- #primary -->
					</div>
				</div>
				<!-- Widget -->
				<?php get_sidebar(); ?>
			</div>
		</div>			
	</div>

<?php get_footer(); ?>