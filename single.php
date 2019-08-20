<?php
/*
 * The Template for displaying all single posts.
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
						<?php if (is_home()) { ?>
						<!--display the the widget with the category-->
							<div class="col-6">
								<div class="panel fix-height" style="box-shadow: none;">
									<div class="panel-heading">
										<h3 class="panel-title block-title">
											<a class="hvr-underline-from-center" href="<?php echo get_category_link(3); ?> ">
											<i class="far fa-newspaper"></i> <?php echo get_cat_name(3) . "ថ្មីៗ" ?>
											</a>
										</h3>
									</div>
									<div class="panel-body">
										<div class="news">
											<?php query_posts('category_name="News" &posts_per_page=10'); ?>
											<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
												<div class="row no-margin">
													<div class="col-4 img-thumb">
														<a href="<?php the_permalink($post->ID); ?>" rel="bookmark" 
															title="<?php the_title(); ?>">
															<div class="wrapper">
																<div class="inner item flash">
																	<figure class="imghvr-zoom-in">
																		<?php the_post_thumbnail('post-thumbnail', array( 'class'  => 'img-thumbnail' )); ?>
																		<figcaption>
																			<span class="badge badge-pill badge-primary">មើលលម្អិត</span>
																		</figcaption>
																	</figure>
																</div>
															</div>
														</a>
													</div>
													<div class="col-8 no-pad">
														<h3 class="entry-title">
															<a href="<?php the_permalink($post->ID); ?>" 
																rel="bookmark" title="<?php the_title(); ?>">
																<?php echo shorten_title(get_the_title(), 70); ?> 
																<span class="badge badge-pill badge-danger">
																	<i class="notes"> ទាន់ហេតុការណ៍!</i>
																</span>
															</a>
														</h3>
														<div class="meta-info">
															<span class="post-date">
																<time class="entry-date updated" 
																	datetime="2019-01-03T13:33:19+00:00">
																	<p class="date">
																		<i class=" far fa-calendar-alt fa-fw"></i>
																		</span><?php the_time('D j F Y'); ?>
																	</p>
																</time>
															</span>
														</div>
													</div>
												</div>
											<?php endwhile; endif; ?>							
											<?php wp_reset_query(); ?>
										</div>
										<hr>
										<div class="panel-footer">
											<div class="sign">
												<a class="cta" href="#">
													<span class="continues">មានបន្ត</span> 
													<span class="continues">
														<svg class="sign-next" height="17px" version="1.1" viewbox="0 0 66 43" width="17px" xmlns="http://www.w3.org/2000/svg">
															<g fill="none" fill-rule="evenodd" id="arrow" stroke="none" stroke-width="1">
																<path class="one" d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 
																	L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 
																	65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 
																	C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 
																	L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 
																	56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 
																	40.1522686,3.89694235 40.1543933,3.89485454 Z" fill="#FFFFFF">
																</path>
																<path class="two" d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 
																	L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 
																	45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 
																	C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 
																	L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 
																	36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 
																	20.1522686,3.89694235 20.1543933,3.89485454 Z" fill="#FFFFFF">
																</path>
																<path class="three" d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 
																	L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 
																	25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479
																	C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985
																	L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 
																	16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 
																	0.152268631,3.89694235 0.154393339,3.89485454 Z" fill="#FFFFFF">
																</path>
															</g>
														</svg>
													</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="panel fix-height" style="box-shadow: none;">
									<div class="panel-heading">
										<h3 class="panel-title block-title">
											<a class="hvr-underline-from-center" href="<?php echo get_category_link(4); ?> ">
											<i class="fas fa-bullhorn"></i> <?php echo get_cat_name(4) . "ថ្មីៗ" ?>
											</a>
										</h3>
									</div>
									<div class="panel-body">
										<ul class="list-group">
											<?php query_posts('category_name="Announcement" &posts_per_page=10'); ?>
											<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
												<li class="list-group-item">
													<a class="title" href="<?php the_permalink($post->ID); ?>">
														<?php the_post_thumbnail('post-thumbnail', array( 'class'  => 'img-thumbnail' )); ?>
														<?php echo shorten_title(get_the_title(), 120); ?>	
														<span class="badge badge-pill badge-danger">ថ្មី!</span>
													</a>
													<p class="date"><i class=" far fa-calendar-alt fa-fw"></i></span><?php the_time('D j F Y'); ?></p>
												</li>								
											<?php endwhile; endif; ?>							
											<?php wp_reset_query(); ?>
										</ul>
										<hr>
										<div class="panel-footer">
											<div class="sign">
												<a class="cta" href="#">
													<span class="continues">មានបន្ត</span> 
													<span class="continues">
														<svg class="sign-next" height="17px" version="1.1" viewbox="0 0 66 43" width="17px" xmlns="http://www.w3.org/2000/svg">
															<g fill="none" fill-rule="evenodd" id="arrow" stroke="none" stroke-width="1">
																<path class="one" d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 
																	L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 
																	65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 
																	C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 
																	L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 
																	56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 
																	40.1522686,3.89694235 40.1543933,3.89485454 Z" fill="#FFFFFF">
																</path>
																<path class="two" d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 
																	L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 
																	45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 
																	C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 
																	L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 
																	36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 
																	20.1522686,3.89694235 20.1543933,3.89485454 Z" fill="#FFFFFF">
																</path>
																<path class="three" d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 
																	L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 
																	25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479
																	C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985
																	L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 
																	16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 
																	0.152268631,3.89694235 0.154393339,3.89485454 Z" fill="#FFFFFF">
																</path>
															</g>
														</svg>
													</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } else { ?>
							<div id="primary" class="site-content col-12">
								<div id="content" role="main">

									<?php while ( have_posts() ) : the_post(); ?>

										<?php get_template_part( 'content', get_post_format() ); ?>
										<!-- <nav class="nav-single"> -->
											<!-- <div class="assistive-text"><?php _e( 'Post navigation', 'iconic-one' ); ?></div> -->
											<!-- <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'iconic-one' ) . '</span> %title' ); ?></span> -->
											<!-- <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'iconic-one' ) . '</span>' ); ?></span> -->
										<!-- </nav> -->

										<?php //comments_template( '', true ); ?>
									<?php endwhile; // end of the loop. ?>

								</div>
								<!-- #content -->
							</div><!-- #primary -->
						<?php } ?>
					</div>
				</div>
				<!-- Widget -->
				<?php get_sidebar(); ?>
			</div>
		</div>			
	</div>
<?php get_footer(); ?>