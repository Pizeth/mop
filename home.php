<?php get_header(); ?>
<div class="container-fluid main">
	<div class="container">
		<div class="main-content">
			<!-- Image Carousel Slide bar -->
			<?php if (is_home()) { ?>
				<div class="slide-show row">
					<div class="carousel slide fade padding-0" data-ride="carousel" id="MoPCarousel">
						<div class="carousel-inner">
							<?php 
								$c = 0;
								$class = '';
								query_posts('category_name="Minister" &posts_per_page=5');
								if (have_posts()) : while (have_posts()) : the_post(); 
									$c++; 
									$class = ($c == 1) ? 'active' : '';
							?>
							<div class="carousel-item <?php echo $class; ?>">
								<div class="img-slide relative">
									<div class="slide-img-wrap">
										<?php the_post_thumbnail('post-slide', array('class' => 'img-thumbnail')); ?>
									</div>
									<div class="hidden-xs carousel-caption">
										<div class="carousel-caption-inner bg-light-gray">
											<div class="col-9 no-pad">
												<a href="<?php the_permalink($post->ID); ?>">
													<h4 class="slide-title ">
														<?php the_title(); ?>​
													</h4>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>						
							<?php endwhile; endif; ?>							
							<?php wp_reset_query(); ?>
						</div>
						<ol class="carousel-indicators">
							<?php	
								$c = 0;
								$class = '';
								query_posts('category_name="Minister" &posts_per_page=5');
								if (have_posts()) : while (have_posts()) : the_post(); 
									$class = ($c == 0) ? 'active' : '';
									echo "<li class='". $class . "' data-slide-to='" . $c ."' data-target='#MoPCarousel'></li>";
									$c++; 
								endwhile; 
								endif; 
								wp_reset_query(); 
							?>
						</ol>
						<a class="carousel-control-prev" href="#MoPCarousel" data-slide="prev">
							<i class="fas fa-chevron-left fa-3x"></i>
						</a>
						<a class="carousel-control-next" href="#MoPCarousel" data-slide="next">
							<i class="fas fa-chevron-right fa-3x"></i>
						</a>
					</div>
				</div>
			<?php } ?>
			<!-- End of Image Carousel Slide bar -->
			<!-- Dynamic Page Content --> 
			<div class="row">
				<div class="col-8 main-content">
					<div class="row list-wrap">
						<div class="col-12">
							<div class="hr"></div>
						</div>
						<?php if (is_home()) { ?>
						<!--display the the widget with the category-->
						<!-- News Section -->
						<div class="col-6">
							<div class="panel fix-height" style="box-shadow: none;">
								<div class="panel-heading">
									<?php
										$news = new WP_Query('category_name="News" &posts_per_page=10');
										$id = $news->get_queried_object_id(); 
									?>
									<h3 class="panel-title block-title">
										<a class="hvr-underline-from-center" href="<?php echo get_category_link($id); ?> ">
										<i class="far fa-newspaper"></i> <?php echo get_cat_name($id) . "ថ្មីៗ" ?>
										</a>
									</h3>
								</div>
								<div class="panel-body">
									<div class="news">
										<?php //query_posts('category_name="News" &posts_per_page=10'); ?>
										<?php if ($news->have_posts()) : while($news->have_posts()) : $news->the_post(); ?>
											<div class="row no-margin">
												<div class="col-4 img-thumb">
													<a href="<?php the_permalink($post->ID); ?>" rel="bookmark" 
														title="<?php the_title(); ?>">
														<div class="wrapper">
															<div class="inner item flash">
																<figure class="imghvr-zoom-in">
																	<?php the_post_thumbnail('post-thumbnail', array('class'  => 'img-thumbnail')); ?>
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
											<?php echo get_continue("មានបន្ត") ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End of News Section -->
						<!-- Announcement Section -->
						<div class="col-6">
							<div class="panel fix-height" style="box-shadow: none;">
								<div class="panel-heading">
									<?php
										$announcement = new WP_Query('category_name="Announcement" &posts_per_page=10');
										$id = $announcement->get_queried_object_id(); 
									?>
									<h3 class="panel-title block-title">
										<a class="hvr-underline-from-center" href="<?php echo get_category_link($id); ?> ">
										<i class="fas fa-bullhorn"></i> <?php echo get_cat_name($id) . "ថ្មីៗ" ?>
										</a>
									</h3>
								</div>
								<div class="panel-body">
									<ul class="list-group">
										<?php //query_posts('category_name="Announcement" &posts_per_page=10'); ?>
										<?php if ($announcement->have_posts()) : while ($announcement->have_posts()) : $announcement->the_post(); ?>
											<li class="list-group-item">
												<a class="title" href="<?php the_permalink($post->ID); ?>">
													<!-- <?php the_post_thumbnail('post-thumbnail', array( 'class'  => 'img-thumbnail' )); ?> -->
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
											<?php echo get_continue("មានបន្ត") ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End of Announcement Section -->
						<?php } ?>
					</div>
				</div>
				<!-- Widget -->
				<?php get_sidebar(); ?>
				<!-- <div class="col-4 list-wrap" id="minister">
					
					<div class="card panel-default margin-0 card-he">
						<div class="card-header">
							<?php
								$minister = new WP_Query('category_name="Minister" &posts_per_page=5');
								$id = $minister->get_queried_object_id(); 
							?>
							<a href="<?php echo get_category_link($id); ?>">
								<h3 class="card-title no-border">
									<?php echo get_cat_name($id) ?>
								</h3>
							</a>
						</div>
						<div class="card-body">
							<a class="" href="<?php echo get_category_link($id); ?>"><img src=
							"https://scontent-sin6-1.xx.fbcdn.net/v/t1.0-9/67404061_2501977810025092_344138188782043136_n.jpg?_nc_cat=107&_nc_eui2=AeFSHla53zfK86KrWqTGr1FG6LCE-EsXmn_hg2_bwM6uG-M99_NTuO9g5uuFRzpx6LTSCZOpeZOKLejAU-6jd8IezFCI8DlbSeyL4wlKuAnnBQ&_nc_oc=AQnelKsQiZO3R7AFuSFpZleoTJrMg5J2z7T9aRYG6R7Vw1HlZhCLmwG_EulUvXregts&_nc_ht=scontent-sin6-1.xx&oh=e1fd22a054992fcecf5f61f4a65d20ff&oe=5DA48343" width="100%"></a>
						</div>
					</div>
					<div class="card border-left border-right">
						<div class="card-body">
							<ul class="list-group">
								<?php //query_posts('category_name="Minister" &posts_per_page=5'); ?>
								<?php if ($minister->have_posts()) : while($minister->have_posts()) : $minister->the_post(); ?>
									<li class="list-group-item border-bottom no-background">
										<a class="title" href="<?php the_permalink($post->ID); ?>">
										<?php the_title(); ?></a>
										<span class="badge badge-pill badge-danger">ទាន់ហេតុការណ៍</span>
										<p class="date"><i class=" far fa-calendar-alt fa-fw"></i><?php the_time('D j F Y'); ?></p>
									</li>								
								<?php endwhile; endif; ?>							
								<?php wp_reset_query(); ?>
							</ul>
							<div class="hr"></div>
							<div class="card-bottom">
								<div class="sign">
									<?php echo get_continue("មានបន្ត") ?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="card panel-default border-left border-right">
						<div class="card-header">
							<h3 class="card-title no-margin ico-badge">
								<i class="ico fab fa-facebook"></i>
								ព័ត៌មានបណ្តាញសង្គម
							</h3>
						</div>
						<div class="card-body">
							<div class="space-3"></div>
							<iframe 
								src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmop.gov.kh%2F&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" 
								width="100%" height="300" style="border:none;overflow:hidden" scrolling="no" 
								frameborder="0" allowTransparency="true" allow="encrypted-media">
							</iframe>	
						</div>
					</div>
					
					<div class="card panel-default border-left border-right">
						<div class="card-header">
							<h3 class="card-title no-margin ico-badge">
								<i class="ico fas fa-sitemap"></i>
								អង្គភាពចំនុះ
							</h3>
						</div>
						<div class="card-body">
							<div class="row no-margin">
								<table class="style-menu table table-hover no-margin">
									<thead>
										<tr>
											<th>
												<a class="row no-margin flash" href="#" target="_blank">
													<span class="col-md-10 no-pad">
														អគ្គនាយកដ្ឋានផែនការ
													</span>
													<span class="pull-right col-md-2 logo-pad" 
														data-target="#Demo0" data-toggle="collapse">
														<figure class>
															<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/logo.svg">
														</figure>
													</span>
												</a>
											</th>
										</tr>
									</thead>
									<thead>
										<tr>
											<th>
												<a class="row no-margin flash" href="#" target="_blank">
													<span class="col-md-10 no-pad">
														វិទ្យាស្ថានជាតិស្ថិតិ
													</span>
													<span class="pull-right col-md-2 logo-pad" 
														data-target="#Demo0" data-toggle="collapse">
														<figure class>
															<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/logo-1.svg">
														</figure>
													</span>
												</a>
											</th>
										</tr>
									</thead>
									<thead>
										<tr>
											<th>
												<a class="row no-margin flash" href="#" target="_blank">
													<span class="col-md-10 no-pad">
														អគ្គាធិការដ្ឋាន
													</span>
													<span class="pull-right col-md-2 logo-pad" 
														data-target="#Demo0" data-toggle="collapse">
														<figure class>
															<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/MFAIC.svg">
														</figure>
													</span>
												</a>
											</th>
										</tr>
									</thead>
									<thead>
										<tr>
											<th>
												<a class="row no-margin flash" href="#" target="_blank">
													<span class="col-md-10 no-pad">
														អគ្គលេខាធិការដ្ឋានប្រជាជននិងការអភិវឌ្ឍ
													</span>
													<span class="pull-right col-md-2 logo-pad" 
														data-target="#Demo0" data-toggle="collapse">
														<figure class>
															<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/logo-1.svg">
														</figure>
													</span>
												</a>
											</th>
										</tr>
									</thead>
									<thead>
										<tr>
											<th>
												<a class="row no-margin flash" href="#" target="_blank">
													<span class="col-md-10 no-pad">
													អគ្គលេខាធិការដ្ឋាននៃក្រុមប្រឹក្សាជាតិ​វិទ្យាសាស្រ្ត​និងបច្ចេកវិទ្យា
													</span>
													<span class="pull-right col-md-2 logo-pad" 
														data-target="#Demo0" data-toggle="collapse">
														<figure class>
															<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/04/GS-NSTC_V2_Eng-1.png">
														</figure>
													</span>
												</a>
											</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
					
					<div class="card panel-default border-left border-right">
						<div class="card-header">
							<h3 class="card-title no-margin ico-badge">
								<i class="ico fas fa-cloud-sun-rain"></i>
								<i class="far fa-snowflake fa-spin"></i>
								ព្យាករណ៍អាកាសធាតុប្រចាំថ្ងៃ
								<i class="far fa-sun fa-spin"></i>
								<i class="ico-right fas fa-cloud-moon-rain"></i>
							</h3>
						</div>
						<div class="card-body">
							<a class="weatherwidget-io" href="https://forecast7.com/en/11d54104d89/phnom-penh/" data-label_1="សីតុណ្ហភាព" 
								data-label_2="រាជធានីភ្នំពេញ" data-icons="Climacons Animated" data-theme="clear" >
								សីតុណ្ហភាព ភ្នំពេញ
							</a>
						</div>
					</div>
					
					<div class="card panel-default border-left border-right">
						<div class="card-header">
							<h3 class="card-title no-pad">គណនីយបណ្ដាញសង្គមផ្សេងៗរបស់ក្រសួង</h3>
						</div>
						<div class="card-body">
							<svg>
								<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/brands.svg#gitlab"></use>
							</svg>
							<svg width="65" height="60" viewBox="0 0 210 194" class="footer-logo">
								<path d="M105.0614,193.655 L105.0614,193.655 L143.7014,74.734 L66.4214,74.734 L105.0614,193.655 L105.0614,193.655 Z" fill="#E24329" class="logo-svg-shape logo-dark-orange-shape"></path>
								<path d="M105.0614,193.6548 L66.4214,74.7338 L12.2684,74.7338 L105.0614,193.6548 Z" fill="#FC6D26" class="logo-svg-shape logo-orange-shape"></path>
								<path d="M12.2685,74.7341 L12.2685,74.7341 L0.5265,110.8731 C-0.5445,114.1691 0.6285,117.7801 3.4325,119.8171 L105.0615,193.6551 L12.2685,74.7341 Z" fill="#FCA326" class="logo-svg-shape logo-light-orange-shape"></path>
								<path d="M12.2685,74.7342 L66.4215,74.7342 L43.1485,3.1092 C41.9515,-0.5768 36.7375,-0.5758 35.5405,3.1092 L12.2685,74.7342 Z" fill="#E24329" class="logo-svg-shape logo-dark-orange-shape"></path>
								<path d="M105.0614,193.6548 L143.7014,74.7338 L197.8544,74.7338 L105.0614,193.6548 Z" fill="#FC6D26" class="logo-svg-shape logo-orange-shape"></path>
								<path d="M197.8544,74.7341 L197.8544,74.7341 L209.5964,110.8731 C210.6674,114.1691 209.4944,117.7801 206.6904,119.8171 L105.0614,193.6551 L197.8544,74.7341 Z" fill="#FCA326" class="logo-svg-shape logo-light-orange-shape"></path>
								<path d="M197.8544,74.7342 L143.7014,74.7342 L166.9744,3.1092 C168.1714,-0.5768 173.3854,-0.5758 174.5824,3.1092 L197.8544,74.7342 Z" fill="#E24329" class="logo-svg-shape logo-dark-orange-shape"></path>
							</svg>
							<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
								<div id="secondary" class="widget-area" role="complementary">
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
								</div>
							<?php endif; ?>
							<nav class="social-button">
								<ul>
									<li><a href=""><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
									<li><a href=""><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href=""><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
									<li><a href=""><i class="fab fa-telegram-plane" aria-hidden="true"></i></a></li>
									<li><a href=""><i class="fab fa-facebook-messenger" aria-hidden="true"></i></a></li>
								</ul>
							</nav>
						</div>
					</div>
					
				</div> -->
				<!-- End of Widget -->
			</div>	
			<!-- End of Dynamic Page Content --> 
			<!-- Home Page Content -->
			<div class="hr"></div>
			<!-- Image Gallery Section -->
			<div class="row list-panel-wrap">
				<div class="col-12">
					<div class="panel panel-default new-panel no-border margin-0">
						<div class="panel-heading">
							<div class="space-2"></div>
								<h3 class="panel-title block-title padding-left-0-im">
									<a class="hvr-underline-from-center" href="#"><i class="far fa-images"></i> កម្រងរូបភាព</a>
								</h3>
							<div class="space-2"></div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12 big-box-container">
								<a href="/posts/871">
								<div class="big-box shine">
									<div class="image-wrapper">
										<figure>
											<img alt="740" class="image-scale-center" src="https://scontent.fpnh3-1.fna.fbcdn.net/v/t1.0-9/59608352_2296074093937753_7513538194743230464_n.jpg?_nc_cat=101&_nc_ht=scontent.fpnh3-1.fna&oh=35da62fcbf185cb18098f1c1c9b41ac6&oe=5D976BFB">
										</figure>
									</div>
									<div class="mask-gradient-bg">
										<div class="title">
											សម្តេច​តេជោ ​ហ៊ុន​ សែន​ អញ្ជើញ​ជា​អធិបតី​ភាព​
											ក្នុង​ពិធី​រំលឹក​ខួប​អនុស្សាវរីយ៍​លើក​ទី​២០​
											ថ្ងៃ​បង្កើត​បញ្ជាការ​ដ្ឋាន​កង​ទ័ព​ជើង​គោក នៃ​​កង​យោធពល​ខេមរ​ភូមិន្ទ​​
											(​២៤​.​មករា​.​១៩៩៩​-​២៤​.ម​ករា​.​២០១៩​)
										</div>
										<div class="category-name">
											ព័ត៌មានក្នងស្រុក
										</div>
										<div class="time-ago">
											<i class="far fa-clock"></i> <time class="timeago" datetime=
											"January 24, 2019 9:52" title="២៤ មករា ២០១៩">២៤ មករា ២០១៩</time>
										</div>
									</div>
								</div></a>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12 small-box-container">
								<div class="row">
									<div class="col-sm-6 col-xs-12 p-r-0">
										<a href="/posts/843">
										<div class="small-box shine">
											<div class="image-wrapper">
												<figure>
													<img alt="697" class="image-scale-center" src="https://scontent.fpnh3-1.fna.fbcdn.net/v/t1.0-9/59608352_2296074093937753_7513538194743230464_n.jpg?_nc_cat=101&_nc_ht=scontent.fpnh3-1.fna&oh=35da62fcbf185cb18098f1c1c9b41ac6&oe=5D976BFB">
												</figure>
											</div>
											<div class="mask-gradient-bg">
												<div class="title">
													មិទ្ទិញ​អបអរ​សាទរ​ខួប​លើក​ទី​​៤០ នៃ​ថ្ងៃ​ជ័យ​ជម្នះ​ ៧ ​មករា​
												</div>
												<div class="category-name">
													ព័ត៌មានក្នងស្រុក
												</div>
												<div class="time-ago">
													<i class="far fa-clock"></i> <time class="timeago" datetime=
													"January 08, 2019 8:38" title="៨ មករា ២០១៩">៨ មករា ២០១៩</time>
												</div>
											</div>
										</div></a>
									</div>
									<div class="col-sm-6 col-xs-12 p-l-0">
										<a href="/posts/790">
										<div class="small-box shine">
											<div class="image-wrapper">
												<figure>
													<img alt="697" class="image-scale-center" src="https://scontent.fpnh3-1.fna.fbcdn.net/v/t1.0-9/59608352_2296074093937753_7513538194743230464_n.jpg?_nc_cat=101&_nc_ht=scontent.fpnh3-1.fna&oh=35da62fcbf185cb18098f1c1c9b41ac6&oe=5D976BFB">
												</figure>
											</div>
											<div class="mask-gradient-bg">
												<div class="title">
													សម្តេច​ពិជ័យ​សេនា ​ទៀ បាញ់ ​ទទួល​ដំណើរ​កង​វិស្វកម្ម​លេខ​៩៥៤​
												</div>
												<div class="category-name">
													ព័ត៌មានក្នងស្រុក
												</div>
												<div class="time-ago">
													<i class="far fa-clock"></i> <time class="timeago" datetime=
													"November 05, 2018 20:06" title="៥ វិច្ឆិកា ២០១៨">៥ វិច្ឆិកា
													២០១៨</time>
												</div>
											</div>
										</div></a>
									</div>
									<div class="col-sm-6 col-xs-12 p-r-0">
										<a href="/posts/788">
										<div class="small-box shine">
											<div class="image-wrapper">
												<figure>
													<img alt="697" class="image-scale-center" src="https://scontent.fpnh3-1.fna.fbcdn.net/v/t1.0-9/59608352_2296074093937753_7513538194743230464_n.jpg?_nc_cat=101&_nc_ht=scontent.fpnh3-1.fna&oh=35da62fcbf185cb18098f1c1c9b41ac6&oe=5D976BFB">
												</figure>
											</div>
											<div class="mask-gradient-bg">
												<div class="title">
													នាយ​ឧត្តមសេនីយ៍ ​ប៉ុល ​សារឿន
													​ជូន​ដំណើ​កង​កម្លាំង​មួក​ខៀវ​ទៅ​បំពេញ​បេសកកម្ម​UN ​នៅ​អាហ្វ្រិក​កណ្តាល​
												</div>
												<div class="category-name">
													ព័ត៌មានក្នងស្រុក
												</div>
												<div class="time-ago">
													<i class="far fa-clock"></i> <time class="timeago" datetime=
													"November 03, 2018 15:18" title="៣ វិច្ឆិកា ២០១៨">៣ វិច្ឆិកា
													២០១៨</time>
												</div>
											</div>
										</div></a>
									</div>
									<div class="col-sm-6 col-xs-12 p-l-0">
										<a href="/posts/786">
										<div class="small-box shine">
											<div class="image-wrapper">
												<figure>
													<img alt="697" class="image-scale-center" src="https://scontent.fpnh3-1.fna.fbcdn.net/v/t1.0-9/59608352_2296074093937753_7513538194743230464_n.jpg?_nc_cat=101&_nc_ht=scontent.fpnh3-1.fna&oh=35da62fcbf185cb18098f1c1c9b41ac6&oe=5D976BFB">
												</figure>
											</div>
											<div class="mask-gradient-bg">
												<div class="title">
													សម្តេច​ពិជ័យ​សេនា ​ទៀ បាញ់
													​ដឹក​នាំ​គណៈប្រតិ​ភូ​ក្រសួង​ការ​ពារ​ជាតិ​ចូល​រួម​ក្នុង​វេទិកា​សៀង​សាន​លើក​ទី​៨
													​នៅ​ទី​ក្រុង​ប៉េ​កាំង​
												</div>
												<div class="category-name">
													ព័ត៌មានក្នងស្រុក
												</div>
												<div class="time-ago">
													<i class="far fa-clock"></i> <time class="timeago" datetime=
													"October 26, 2018 20:33" title="២៦ តុលា ២០១៨">២៦ តុលា ២០១៨</time>
												</div>
											</div>
										</div></a>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer continue">
							<div class="sign">
								<a class="cta" href="#">
									<span class="continues">មានបន្ត</span> 
									<span class="continues">
										<svg height="17px" version="1.1" viewbox="0 0 66 43" width="17px" xmlns="http://www.w3.org/2000/svg">
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
						<div class="space-3"></div>
					</div>
				</div>
			</div>
			<!-- End of Image Gallery Section -->	
			<div class="hr"></div>
			<!-- Sub Organization -->
			<div class="row list-panel-wrap">
				<div class="col-12">
					<div class="panel panel-default new-panel padding-0 no-border">
						<div class="panel-heading">
							<div class="space-2"></div>
							<h3 class="panel-title block-title padding-left-0-im">
								<a class="hvr-underline-from-center" href="#"><i class="fas fa-sitemap"></i> អង្គភាពចំនុះ</a>
							</h3>
						</div>
						<div class="row dep">
							<div class="col text-center">
								<a href="#">
									<figure class="imghvr-shutter-in-out-diag-2">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg">
										<figcaption>
											<span>អគ្គនាយកដ្ឋានផែនការ</span>
										</figcaption>
									</figure>
								</a>
								<div class="media-body">
									<a class="media-heading" href="#" target="_blank">
										អគ្គនាយកដ្ឋានផែនការ
									</a>
								</div>
							</div>
							<div class="col text-center">
								<a href="#">
									<figure class="imghvr-shutter-in-out-diag-2">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Logo_OCM.svg">
										<figcaption>
											<span>វិទ្យាស្ថានជាតិស្ថិតិ</span>
										</figcaption>
									</figure>
								</a>
								<div class="media-body">
									<a class="media-heading" href="#" target="_blank">
										វិទ្យាស្ថានជាតិស្ថិតិ
									</a>
								</div>
							</div>
							<div class="col text-center">
								<a href="#">
									<figure class="imghvr-shutter-in-out-diag-2">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/MFAIC.svg">
										<figcaption>
											<span>អគ្គាធិការដ្ឋាន</span>
										</figcaption>
									</figure>
								</a>
								<div class="media-body">
									<a class="media-heading" href="#" target="_blank">
										អគ្គាធិការដ្ឋាន
									</a>
								</div>
							</div>
							<div class="col text-center">
								<a href="#">
									<figure class="imghvr-shutter-in-out-diag-2">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Logo_MoP.svg">
										<figcaption>
											<span>អគ្គលេខាធិការដ្ឋានប្រជាជននិងការអភិវឌ្ឍ</span>
										</figcaption>
									</figure>
								</a>
								<div class="media-body">
									<a class="media-heading" href="#" target="_blank">
										អគ្គលេខាធិការដ្ឋានប្រជាជននិងការអភិវឌ្ឍ
									</a>
								</div>
							</div>
							<div class="col text-center">
								<a href="https://www.snt.gov.kh">
									<figure class="imghvr-shutter-in-out-diag-2">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/GS-NSTC.svg">
										<figcaption>
											<span>អគ្គលេខាធិការដ្ឋាននៃក្រុមប្រឹក្សាជាតិ​វិទ្យាសាស្រ្ត​និងបច្ចេកវិទ្យា</span>
										</figcaption>
									</figure>
								</a>
								<div class="media-body">
									<a class="media-heading" href="https://www.snt.gov.kh" target="_blank">
										អគ្គលេខាធិការដ្ឋាននៃក្រុមប្រឹក្សាជាតិ​វិទ្យាសាស្រ្ត​និងបច្ចេកវិទ្យា
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End of Sub Organization -->
			<div class="space-3"></div>
			<div class="hr"></div>
			<!-- Law and Regulation -->
			<div class="list-panel-wrap">
				<div class="panel panel-default new-panel padding-0 no-border">
					<div class="panel-heading">
						<div class="space-2"></div>
						<h3 class="panel-title block-title padding-left-0-im">
							<a class="hvr-underline-from-center" href="#"><i class="far fa-file-alt"></i> ច្បាប់ និងបទបញ្ញត្តិ</a>
						</h3>
						<div class="space-2"></div>
					</div>
					<div class="row regulation">
						<div class="col-3">
							<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link	mop-underline-from-left mop-overline-from-right" id="announcement-tab" data-toggle="pill" href="#announcement" 
									role="tab" aria-controls="announcement" aria-selected="false">
									<i class="fas fa-bullhorn fa-fw"></i>&nbsp;សេចក្ដីប្រកាស
								</a>
								<a class="nav-link mop-underline-from-left mop-overline-from-right" id="circulation-tab" data-toggle="pill" href="#circulation" 
									role="tab" aria-controls="circulation" aria-selected="false">
									<i class="fas fa-file-alt fa-fw"></i>&nbsp;សារាចរ
								</a>
								<a class="nav-link mop-underline-from-left mop-overline-from-right active show" id="royal-decree-tab" data-toggle="pill" 
									href="#royal-decree" role="tab" aria-controls="royal-decree" aria-selected="true">
									<i class="fas fa-crown fa-fw"></i>&nbsp;ព្រះរាជក្រឹត្យ
								</a>
								<a class="nav-link mop-underline-from-left mop-overline-from-right" id="sub-decree-tab" data-toggle="pill" href="#sub-decree" 
									role="tab" aria-controls="sub-decree" aria-selected="false">
									<i class="fas fa-landmark fa-fw"></i>&nbsp;អនុក្រឹត្យ
								</a>
								<a class="nav-link mop-underline-from-left mop-overline-from-right" id="recommendation-tab" data-toggle="pill" href="#recommendation" 
									role="tab" aria-controls="recommendation" aria-selected="false">
									<i class="fas fa-book fa-fw"></i>&nbsp;សេចក្ដីណែនាំ
								</a>
								<a class="nav-link mop-underline-from-left mop-overline-from-right" id="decision-tab" data-toggle="pill" href="#decision" 
									role="tab" aria-controls="decision" aria-selected="false">
									<i class="fas fa-file-invoice fa-fw"></i>&nbsp;សេចក្ដីសម្រេច
								</a>
							</div>
						</div>
						<div class="col-9">
							<div class="tab-content" id="v-pills-tabContent">
								<div class="tab-pane fade" id="announcement" role="tabpanel" aria-labelledby="announcement-tab">
									<div class="media" style="padding-left: 280px;">
										<div class="media-left pull-left">
											<img alt="click to download" class="media-object" src=
												"https://www.mptc.gov.kh/assets/img/pdfdownload.png" width="50">
										</div>
										<div class="media-body">
											<h4 class="media-heading font-15">
												គោលនយោបាយ​អភិវឌ្ឍន៍​វិស័យ​ទូរគមនាគមន៍​-បច្ចេកវិទ្យា​គមនាគមន៍ និងព័ត៌មានឆ្នាំ២០២០
											</h4>
											<span class="color-8" style="font-size: 12px;">
												<span class="fa fa-calendar fa-fw"></span> ថ្ងៃ ពុធ ទី ១១ ខែ ឧសាភា ឆ្នាំ ២០១៦
											</span><br>
											<a href="https://www.mptc.gov.kh/storage/files/2016/05/546/tictpolicy.pdf" target="_blank">
												<span class="fa fa-folder-open-o"></span> 
												<span style="color:#007AC6;">View</span>
											</a>&nbsp;&nbsp; 
											<a href="https://www.mptc.gov.kh/storage/files/2016/05/546/tictpolicy.pdf">
												<span class="fa fa-cloud-download"></span> 
												<span style="color:#007AC6;">Download</span>
											</a>
											<a class="pull-right" href="https://www.mptc.gov.kh/topic/policies" 
												style="margin-right: 10px; color:#007AC6;">
												មានបន្ត <span class="fa fa-angle-double-right"></span>
											</a>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="circulation" role="tabpanel" aria-labelledby="circulation-tab">
									<div class="vc_tta-panels-container">
										<div class="vc_tta-panels">
											<div class="vc_tta-panel vc_active" data-vc-content=".vc_tta-panel-body" id=
											"01">
												<div class="vc_tta-panel-heading">
													<h4 class="vc_tta-panel-title"><a data-vc-accordion="" data-vc-container=
													".vc_tta-container" href="#01"><span class=
													"vc_tta-title-text">ព្រះរាជក្រឹត្យ</span></a></h4>
												</div>
												<div class="vc_tta-panel-body">
													<div class="wpb_text_column wpb_content_element">
														<div class="wpb_wrapper">
															<div class="dataTables_wrapper no-footer" id="dt01_wrapper">
																<div class="dataTables_length" id="dt01_length">
																	<label>Show <select aria-controls="dt01" class="" name="dt01_length">
																		<option value="10">
																			10
																		</option>
																		<option value="25">
																			25
																		</option>
																		<option value="50">
																			50
																		</option>
																		<option value="100">
																			100
																		</option>
																	</select> entries</label>
																</div>
																<div class="dataTables_filter" id="dt01_filter">
																	<label>Search:<input aria-controls="dt01" class="" placeholder=""
																	type="search"></label>
																</div>
																<table aria-describedby="dt01_info" cellspacing="0" class=
																"display dataTable no-footer" data-page-length="4" id="dt01" role=
																"grid" style="width: 100%;" width="100%">
																	<thead>
																		<tr role="row">
																			<th aria-controls="dt01" aria-label=
																			"ល.រ: activate to sort column descending" aria-sort="ascending"
																			class="sorting_asc" colspan="1" rowspan="1" style="width: 23px;"
																			tabindex="0">ល.រ</th>
																			<th aria-controls="dt01" aria-label=
																			"ចំណងជើង: activate to sort column ascending" class="sorting"
																			colspan="1" rowspan="1" style="width: 359px;" tabindex="0">
																			ចំណងជើង</th>
																			<th aria-controls="dt01" aria-label=
																			"ទាញយក: activate to sort column ascending" class="sorting" colspan=
																			"1" rowspan="1" style="width: 52px;" tabindex="0">ទាញយក</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr class="odd" role="row">
																			<td align="center" class="sorting_1">1</td>
																			<td>
																				<a href="http://www.moe.gov.kh/index/5329" target=
																				"_blank">ព្រះរាជក្រឹត្យស្តីពី ការរំសាយដែនជម្រកសត្វព្រៃស្នួល
																				ស្ថិតក្នុងខេត្តក្រចេះ និងការរំសាយដែនជម្រកសត្វព្រៃរនាមដូនសំ
																				ក្នុងខេត្តបាត់ដំបង</a>
																			</td>
																			<td align="center">
																				<a href="http://www.moe.gov.kh/index/5329" style=
																				"padding:8px 10px;text-decoration: none;" target=
																				"_blank"><i aria-hidden="true" class="fa fa-eye"></i></a> <a href=
																				"" style="padding:8px 10px;text-decoration: none;" target=
																				"_blank"><i aria-hidden="true" class="fa fa-download"></i></a>
																			</td>
																		</tr>
																		<tr class="even" role="row">
																			<td align="center" class="sorting_1">2</td>
																			<td>
																				<a href="http://www.moe.gov.kh/index/786" target=
																				"_blank">ព្រះរាជក្រឹត្យស្តីពីការរៀបចំនឹងការប្រព្រឹត្តទៅនៃក្រុមប្រឹក្សាជាតិអភិវឌ្ឍន៍ដោយចីរភាព</a>
																			</td>
																			<td align="center">
																				<a href="http://www.moe.gov.kh/index/786" style=
																				"padding:8px 10px;text-decoration: none;" target=
																				"_blank"><i aria-hidden="true" class="fa fa-eye"></i></a> <a href=
																				"http://www.moe.gov.kh/wp-content/uploads/2016/10/1445158372332.pdf"
																				style="padding:8px 10px;text-decoration: none;" target=
																				"_blank"><i aria-hidden="true" class="fa fa-download"></i></a>
																			</td>
																		</tr>
																		<tr class="odd" role="row">
																			<td align="center" class="sorting_1">3</td>
																			<td>
																				<a href="http://www.moe.gov.kh/index/783" target=
																				"_blank">ច្បាប់ស្តីពីការអនុម័តយល់ព្រមឲ្យព្រះរាជាណាចក្រកម្ពុជាចូលជាសមាជិកនៃកិច្ចព្រមព្រៀងស្តីពី</a>
																			</td>
																			<td align="center">
																				<a href="http://www.moe.gov.kh/index/783" style=
																				"padding:8px 10px;text-decoration: none;" target=
																				"_blank"><i aria-hidden="true" class="fa fa-eye"></i></a> <a href=
																				"http://www.moe.gov.kh/wp-content/uploads/2016/10/1445159030177.pdf"
																				style="padding:8px 10px;text-decoration: none;" target=
																				"_blank"><i aria-hidden="true" class="fa fa-download"></i></a>
																			</td>
																		</tr>
																	</tbody>
																</table>
																<div aria-live="polite" class="dataTables_info" id="dt01_info" role=
																"status">
																	Showing 1 to 3 of 3 entries
																</div>
																<div class="dataTables_paginate paging_simple_numbers" id=
																"dt01_paginate">
																	<a aria-controls="dt01" class="paginate_button previous disabled"
																	data-dt-idx="0" id="dt01_previous" tabindex=
																	"0">Previous</a><span><a aria-controls="dt01" class=
																	"paginate_button current" data-dt-idx="1" tabindex=
																	"0">1</a></span><a aria-controls="dt01" class=
																	"paginate_button next disabled" data-dt-idx="2" id="dt01_next"
																	tabindex="0">Next</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade active show" id="royal-decree" role="tabpanel" aria-labelledby="royal-decree-tab">
									<div class="box">
										<!-- /.box-header -->
										<div class="box-body">
											<table id="example1" class="table table-bordered table-striped">
												<thead>
													<tr class="t-header">
														<th>ល.រ</th>
														<th>ចំណងជើង</th>
														<th>ប្រភេទឯកសារ</th>
														<th>កាលបរិច្ឆេទ</th>
														<th>ប្រតិបត្តិការ</th>
													</tr>
												</thead>
												<tbody>
													<tr class="text-center t-content">
														<td>1</td>
														<td>
															<a class="doc" href="http://mop.test:8080/wp-content/uploads/2019/04/Royal_Decree.pdf" target=
															"_blank">ព្រះរាជក្រឹត្យស្តីពីការបង្កើត ក.ជ.វ.ប.</a>
														</td>
														<td>
															<i class="far fa-file-pdf fa-2x text-danger" 
																​data-toggle="tooltip" data-placement="top" title="PDF"></i>
														</td>
														<td>
															០៨/០៤/២០១៩
														</td>
														<td>
															<a class="view" href="http://mop.test:8080/wp-content/uploads/2019/04/Royal_Decree.pdf" target="_blank">
																<i aria-hidden="true" class="fa fa-eye px-2" 
																	data-toggle="tooltip" data-placement="top" title="ចូលមើល"></i>
															</a> 
															<a class="download" href="http://mop.test:8080/wp-content/uploads/2019/04/Royal_Decree.pdf" target="_blank">
																<i aria-hidden="true" class="fa fa-download px-2"
																	data-toggle="tooltip" data-placement="top" title="ទាញយក"></i>
															</a>
														</td>
													</tr>
												</tbody>
												<tfoot class="t-footer">
													<tr>
														<th>ល.រ</th>
														<th>ចំណងជើង</th>
														<th>ប្រភេទឯកសារ</th>
														<th>កាលបរិច្ឆេទ</th>
														<th>ប្រតិបត្តិការ</th>
													</tr>
												</tfoot>
											</table>
										</div>
										<!-- /.box-body -->
									</div>
								</div>
								<div class="tab-pane fade" id="sub-decree" role="tabpanel" aria-labelledby="sub-decree-tab">
									<p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.</p>
								</div>
								<div class="tab-pane fade" id="recommendation" role="tabpanel" aria-labelledby="recommendation-tab">
									<p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.</p>
								</div>
								<div class="tab-pane fade" id="decision" role="tabpanel" aria-labelledby="decision-tab">
									<p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End of Law and Regulation -->
			<div class="space-2"></div>
			<div class="space-3"></div>
		</div>
	</div>			
</div>
<?php get_footer(); ?>			