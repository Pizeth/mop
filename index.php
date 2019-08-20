<?php get_header(); ?>
<div class="container-fluid main">
	<div class="container">
		<div class="main-content">
			<?php if (is_home()) { ?>
				<div class="slide-show row">
					<div class="carousel slide fade padding-0" data-ride="carousel" id="MoPCarousel">
						<div class="carousel-inner">
							<?php 
								$c = 0;
								$class = '';
								query_posts('category_name="Minister" &posts_per_page=5');
								if ( have_posts() ) : while ( have_posts() ) : the_post(); 
									$c++; 
									$class = ($c == 1) ? 'active' : '';
							?>
								<!-- <li class="list-group-item">
									<a class="title" href="<?php the_permalink($post->ID); ?>">
										<?php the_post_thumbnail('post-slide', array( 'class'  => 'img-thumbnail' )); ?>
										<?php echo shorten_title(get_the_title(), 120); ?>	
									</a>
									<span class="badge badge-pill badge-danger">ថ្មី!</span>
									<p class="date"><i class=" far fa-calendar-alt fa-fw"></i></span><?php the_time('D j F Y'); ?></p>
								</li> -->

								<div class="carousel-item <?php echo $class; ?>">
									<div class="img-slide relative">
										<div class="slide-img-wrap">
											<?php the_post_thumbnail('post-slide', array( 'class'  => 'img-thumbnail' )); ?>
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
									<!-- <div class="hidden-xs carousel-caption" href="#myCarousel" style="width:100%; left:0; padding-bottom:0">
										<div class="bg-light-gray">
											<p class="text-white mb0 pr25 pl25 pt10 pb10">ពិធីផ្សព្វផ្សាយនិងដាក់ឲ្យអនុវត្តនូវជាផ្លូវការនូវឯកសារ ក្របខ័ណ្ឌគោលដៅអភិវឌ្ឍប្រកបដោយចីរភាពកម្ពុជា ២០១៦-២០៣០</p>
										</div>
									</div> -->
								</div>						
							<?php endwhile; endif; ?>							
							<?php wp_reset_query(); ?>

							<!-- <div class="carousel-item active">
								<div class="img-slide relative">
									<div class="slide-img-wrap"><img src=
									"http://www.mop.gov.kh/ImageSlider/photo_2019-03-12_08-51-36.jpg"></div>
									<div class="hidden-xs carousel-caption">
										<div class="carousel-caption-inner bg-light-gray">
											<div class="col-9 no-pad">
												<a href="https://www.mptc.gov.kh/article/3761">
													<h4 class="slide-title ">
														ពិធីផ្សព្វផ្សាយក្របខ័ណ្ឌគោលដៅអភិវឌ្ឍប្រកបដោយចីរភាពកម្ពុជា ២០១៦-២០៣០ កាលពីថ្ងៃទី១១ ខែមីនា ឆ្នាំ២០១៩​
													</h4>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="hidden-xs carousel-caption" href="#myCarousel" style="width:100%; left:0; padding-bottom:0">
									<div class="bg-light-gray">
										<p class="text-white mb0 pr25 pl25 pt10 pb10">ពិធីផ្សព្វផ្សាយនិងដាក់ឲ្យអនុវត្តនូវជាផ្លូវការនូវឯកសារ ក្របខ័ណ្ឌគោលដៅអភិវឌ្ឍប្រកបដោយចីរភាពកម្ពុជា ២០១៦-២០៣០</p>
									</div>
								</div>							
							</div>
							<div class="carousel-item">
								<div class="img-slide relative">
									<div class="slide-img-wrap"><img src=
									"https://i.imgur.com/eqS33lH.jpg"></div>
									<div class="hidden-xs carousel-caption">
										<div class="carousel-caption-inner bg-light-gray">
											<div class="col-9 no-pad">
												<a href="https://www.mptc.gov.kh/article/3760">
													<h4 class="slide-title">
														ពិធីផ្សព្វផ្សាយក្របខ័ណ្ឌគោលដៅអភិវឌ្ឍប្រកបដោយចីរភាពកម្ពុជា ២០១៦-២០៣០ កាលពីថ្ងៃទី១១ ខែមីនា ឆ្នាំ២០១៩​
													</h4>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div class="img-slide relative">
									<div class="slide-img-wrap"><img src=
									"https://www.mptc.gov.kh/storage/posts/February2019/3jQUrH72s0ExTQoTXQ5y.jpg"></div>
									<div class="hidden-xs carousel-caption">
										<div class="carousel-caption-inner bg-light-gray">
											<div class="col-9 no-pad">
												<a href="https://www.mptc.gov.kh/article/3757">
												<h4 class="slide-title">ឯកឧត្តមរដ្ឋមន្ត្រី ត្រាំ អុីវតឹក
												អញ្ជើញដឹកនាំគណៈប្រតិភូក្រសួងទៅចូលរួមមហាសន្និបាតទូរស័ព្ទចល័តពិភពលោក
												នៅប្រទេសអេស្ប៉ាញ</h4></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div class="img-slide relative">
									<div class="slide-img-wrap"><img src=
									"https://www.mptc.gov.kh/storage/files/2019/02/1432/Cover.jpg"></div>
									<div class="hidden-xs carousel-caption">
										<div class="carousel-caption-inner bg-light-gray">
											<div class="col-9 no-pad">
												<a href="https://www.mptc.gov.kh/article/3756">
												<h4 class="slide-title">​ឯកឧត្ដម​រដ្ឋមន្ត្រី​ ​ត្រាំ​ អុី​វ​តឹក​
												​អញ្ជើញ​ជា​អធិបតី​ក្នុង​ពិធី​ចុះហត្ថលេខា​លើ​អនុស្សរណៈ​យោគ​យល់គ្នា​ស្តីពី​ដៃគូ​វិនិយោគ​ឯកជន​និង​សាធារណៈ​
												​រវាង​ ទូរគមនាគមន៍កម្ពុជា​ ​ជាមួយ​ ​ក្រុមហ៊ុន​ ​Seat​e​l​</h4></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div class="img-slide relative">
									<div class="slide-img-wrap"><img src=
									"https://www.mptc.gov.kh/storage/files/2019/02/1426/Cover.jpg"></div>
									<div class="hidden-xs carousel-caption">
										<div class="carousel-caption-inner bg-light-gray">
											<div class="col-9 no-pad">
												<a href="https://www.mptc.gov.kh/article/3751">
												<h4 class="slide-title">​​ឯកឧត្តមរដ្ឋមន្ត្រី​ ​ត្រាំ​ អុី​វ​តឹក​
												បាន​អញ្ជើញ​ជា​អធិបតីភាព​ដ៏​ខ្ពង់ខ្ពស់​ ​ក្នុង​ពិធី​ប្រកាស​តែងតាំង​ ​ប្រធាន​ថ្មី
												នៃមន្ទីរប្រៃសណីយ៍​ ​និង​ទូរគមនាគមន៍​ខេត្ត​ឧត្តរមានជ័យ​</h4></a>
											</div>
										</div>
									</div>
								</div>
							</div> -->
						</div>
						<ol class="carousel-indicators">
							<?php	
								$c = 0;
								$class = '';
								query_posts('category_name="Minister" &posts_per_page=5');
								if ( have_posts() ) : while ( have_posts() ) : the_post(); 
									$class = ($c == 0) ? 'active' : '';
									echo "<li class='". $class . "' data-slide-to='" . $c ."' data-target='#MoPCarousel'></li>";
									$c++; 
								endwhile; 
								endif; 
								wp_reset_query(); 
							?>
							<!-- <li class="active" data-slide-to="0" data-target="#MoPCarousel"></li>
							<li class="" data-slide-to="1" data-target="#MoPCarousel"></li>
							<li class="" data-slide-to="2" data-target="#MoPCarousel"></li>
							<li class="" data-slide-to="3" data-target="#MoPCarousel"></li>
							<li class="" data-slide-to="4" data-target="#MoPCarousel"></li> -->
						</ol>
						<a class="carousel-control-prev" href="#MoPCarousel" data-slide="prev">
							<!-- <span class="carousel-control-prev-icon"></span> -->
							<!-- <i class="fas fa-chevron-circle-left fa-3x"></i> -->
							<i class="fas fa-chevron-left fa-3x"></i>
						</a>
						<a class="carousel-control-next" href="#MoPCarousel" data-slide="next">
							<!-- <span class="carousel-control-next-icon"></span> -->
							<!-- <i class="fas fa-chevron-circle-right fa-3x"></i> -->
							<i class="fas fa-chevron-right fa-3x"></i>
						</a>
					</div>
				</div>
			<?php } ?>
			<div class="row">
				<div class="col-8 main-content">
					<div class="row list-wrap">
						<div class="col-12">
							<div class="hr"></div>
						</div>
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
									<!-- <ul class="list-group">
										<?php query_posts('category_name="News" &posts_per_page=5'); ?>
										<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
											<li class="list-group-item">
												<a class="title" href="<?php the_permalink($post->ID); ?>">
													<div class="wrapper">
														<div class="inner item">
															<?php the_post_thumbnail('post-thumbnail', array( 'class'  => 'img-thumbnail' )); ?>
														</div>
													</div>
													
													<?php the_title(); ?>	
												</a>
												<span class="badge badge-pill badge-danger">ទាន់ហេតុការណ៍!</span>
												<p class="date"><i class=" far fa-calendar-alt fa-fw"></i></span><?php the_time('D j F Y'); ?></p>
											</li>								
										<?php endwhile; endif; ?>							
										<?php wp_reset_query(); ?>
									</ul>
									<div class="panel-footer">
										<a href="https://www.mptc.gov.kh/topic/activities">មានបន្ត<span class=
										"fa fa-angle-double-right"></span></a>
									</div> -->

									<!-- <div class="news">
										<?php query_posts('category_name="News" &posts_per_page=5'); ?>
										<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
											<div class="td-block-span12">
												<div class="td_module_6 td_module_wrap td-animation-stack">
													<div class="td-module-thumb">
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
													<div class="item-details">
														<h3 class="entry-title td-module-title">
															<a href="<?php the_permalink($post->ID); ?>" 
																rel="bookmark" title="<?php the_title(); ?>">
																<?php echo shorten_title(get_the_title(), 70); ?> <span class="badge badge-pill badge-danger"><i class="notes"> ទាន់ហេតុការណ៍!</i></span>
															</a>
														</h3>
														<div class="td-module-meta-info">
															<span class="td-post-date">
																<time class="entry-date updated td-module-date" 
																	datetime="2019-01-03T13:33:19+00:00">
																	<p class="date"><i class=" far fa-calendar-alt fa-fw"></i></span><?php the_time('D j F Y'); ?></p>
																</time>
															</span>
														</div>
													</div>
												</div>
											</div>
										<?php endwhile; endif; ?>							
										<?php wp_reset_query(); ?>
									</div> -->


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


											<!-- <a class="row no-margin" href="<?php the_permalink($post->ID); ?>" 
												rel="bookmark" title="<?php the_title(); ?>">
												<div class="col-4 img-thumb">
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
												</div>
												<div class="col-8 no-pad">
													<h3 class="entry-title">
														<?php echo shorten_title(get_the_title(), 70); ?> 
														<span class="badge badge-pill badge-danger">
															<i class="notes"> ទាន់ហេតុការណ៍!</i>
														</span>
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
											</a> -->
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
										<!-- <a href="https://www.mptc.gov.kh/topic/activities">មានបន្ត<span class=
										"fa fa-angle-double-right"></span></a> -->
									</div>
								</div>
							</div>
						</div><!--display the the widget with the category-->
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
												<!-- <span class="badge badge-pill badge-danger">ថ្មី!</span> -->
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
										<!-- <a href="https://www.mptc.gov.kh/topic/instructions">មានបន្ត<span class=
										"fa fa-angle-double-right"></span></a> -->
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- <div class="row list-panel-wrap list-wrap">
						<div class="col-12">
							<div class="panel panel-default new-panel margin-0">
								<div class="panel-heading">
									<div class="space-2"></div>
									<h3 class="panel-title padding-left-0-im">បណ្ណាល័យរូបភាព</h3>
									<div class="space-2"></div>
								</div>
								<div class="">
									<a href="">
										<figure class="imghvr-push-up">
											<img src="https://www.mptc.gov.kh/storage/files/2019/02/1429/19.jpg" width=
											"100%">
											<figcaption>
												<h3>Yolo</h3>
												<p>Papipuru</p>
											</figcaption>
										</figure>	
									</a>
									<div class="text-left panel-footer padding-0 relative">
										<div class="space-2"></div>
										<div class="photo-album-title padding-0">
											<p>​​ឯកឧត្តម​ ​ត្រាំ​ អុី​វ​តឹក​ ​រដ្ឋមន្ត្រី​ក្រសួង​ប្រៃសណីយ៍​ ​និង​ទូរគមនាគមន៍​
											​បាន​អញ្ជើញ​ជា​អធិបតីភាព​ដ៏​ខ្ពង់ខ្ពស់​ ​ក្នុង​ពិធី​ប្រកាស​តែងតាំង​
											​ប្រធាន​ថ្មីនៃមន្ទីរប្រៃសណីយ៍​ ​និង​ទូរគមនាគមន៍​ខេត្ត​ឧត្តរមានជ័យ​&nbsp;​</p>
										</div>
										<div class="absolute" style="right:0;bottom:0;">
											<a href="https://www.mptc.gov.kh/topic/photo-gallery">មានបន្ត<span class=
											"fa fa-angle-double-right"></span></a>
										</div>
										<div class="clear-float"></div>
									</div>
								</div>



								<h2 id="flash">13. Flashing</h2>
								<div class="flash column">
								<div>
									<figure class="imghvr-push-up">
											<img src="https://picsum.photos/300/200?image=244" />
											<figcaption>
												Hover
											</figcaption>
										</figure>
								</div>
								</div>

								<h2 id="shine">14. Shine</h2>
								<div class="shine column">
								<div>
									<figure><img src="https://picsum.photos/300/200?image=244" /></figure>
									<span>Hover</span>
								</div>
								</div>


								<div class="space-3"></div>
								<div class="space-2"></div>
							</div>
						</div>
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
												<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/logo.svg">
												<figcaption>
													<span>អគ្គនាយកដ្ឋានផែនការ</span>
												</figcaption>
											</figure>
										</a>
										<div class="media-body">
											<a class="media-heading" href="http://www.tc.com.kh/" target="_blank">
												អគ្គនាយកដ្ឋានផែនការ
											</a>
										</div>
									</div>
									<div class="col text-center">
										<a href="#">
											<figure class="imghvr-shutter-in-out-diag-2">
												<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/Logo-1.svg">
												<figcaption>
													<span>វិទ្យាស្ថានជាតិស្ថិតិ</span>
												</figcaption>
											</figure>
										</a>
										<div class="media-body">
											<a class="media-heading" href="http://www.tc.com.kh/" target="_blank">
												វិទ្យាស្ថានជាតិស្ថិតិ
											</a>
										</div>
									</div>
									<div class="col text-center">
										<a href="#">
											<figure class="imghvr-shutter-in-out-diag-2">
												<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/MFAIC.svg">
												<figcaption>
													<span>អគ្គាធិការដ្ឋាន</span>
												</figcaption>
											</figure>
										</a>
										<div class="media-body">
											<a class="media-heading" href="http://www.tc.com.kh/" target="_blank">
												អគ្គាធិការដ្ឋាន
											</a>
										</div>
									</div>
									<div class="col text-center">
										<a href="#">
											<figure class="imghvr-shutter-in-out-diag-2">
												<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/Logo-1.svg">
												<figcaption>
													<span>អគ្គលេខាធិការដ្ឋានប្រជាជននិងការអភិវឌ្ឍ</span>
												</figcaption>
											</figure>
										</a>
										<div class="media-body">
											<a class="media-heading" href="http://www.tc.com.kh/" target="_blank">
												អគ្គលេខាធិការដ្ឋានប្រជាជននិងការអភិវឌ្ឍ
											</a>
										</div>
									</div>
									<div class="col text-center">
										<a href="#">
											<figure class="imghvr-shutter-in-out-diag-2">
												<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/04/admin-ajax.jpeg">
												<figcaption>
													<span>អគ្គលេខាធិការដ្ឋាននៃក្រុមប្រឹក្សាជាតិ​វិទ្យាសាស្រ្ត​និងបច្ចេកវិទ្យា</span>
												</figcaption>
											</figure>
										</a>
										<div class="media-body">
											<a class="media-heading" href="http://www.tc.com.kh/" target="_blank">
												អគ្គលេខាធិការដ្ឋាននៃក្រុមប្រឹក្សាជាតិ​វិទ្យាសាស្រ្ត​និងបច្ចេកវិទ្យា
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="video-album relative">
							<ul class="col-7 video-gallery-front padding-0 margin-0">
								<li>
									<a class="yt-vid" href="#yt-gal-1" title=""><img alt="" src=
									"https://www.mptc.gov.kh/storage/posts/March2019/ubl5dmDlNaULNRFTnUD5.jpg"></a>
								</li>
							</ul>
							<div class="col-4 offset-1 video-album-title pull-right">
								<div class="space-1 visible-xs"></div>
								<p>​ឯកឧត្ដម​រដ្ឋមន្ត្រី​ ​ត្រាំ​ អុី​វ​តឹក​
								​អញ្ជើញ​ជា​អធិបតី​ក្នុង​ពិធី​ចុះហត្ថលេខា​លើ​អនុស្សរណៈ​យោគ​យល់គ្នា​ស្តីពី​ដៃគូ​វិនិយោគ​ឯកជន​និង​សាធារណៈ​
								​រវាង​ទូរគមនាគមន៍កម្ពុជា ​ជាមួយ​ ​ក្រុមហ៊ុន​ ​Seat​e​l​</p>
							</div>
							<div class="clear-float"></div>
							<div class="panel-footer padding-0 absolute" style="right:0;bottom:0;">
								<a href="https://www.mptc.gov.kh/topic/video-gallery">មានបន្ត<span class=
								"fa fa-angle-double-right"></span></a>
							</div>
						</div>

						<div class="col-12">
							<div class="panel panel-default new-panel no-border margin-0">
								<div class="panel-heading">
									<div class="space-2"></div>
										<h3 class="panel-title block-title padding-left-0-im">
											<a class="hvr-underline-from-center" href="#"><i class="far fa-file-alt"></i> ច្បាប់ និងបទបញ្ញត្តិ</a>
										</h3>
									<div class="space-2"></div>
								</div>
								<div class="row regulation">
									<div class="col-6 col-sm-2 col-md-2">
										<a href="#">
											<figure class="imghvr-shutter-in-out-diag-2">
												<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/04/bull-horn-announcer.svg">
												<figcaption>
													<span>សេចក្ដីប្រកាស</span>
												</figcaption>
											</figure>
										</a>
									</div>
									<div class="col-6 col-sm-2 col-md-2">
										<a href="#">
											<figure class="imghvr-shutter-in-out-diag-2">
												<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/04/pad.svg">
												<figcaption>
													<span>សរាចរ</span>
												</figcaption>
											</figure>
										</a>
									</div>
									<div class="col-6 col-sm-2 col-md-2">
										<a href="#">
											<figure class="imghvr-shutter-in-out-diag-2">
												<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/logo.svg">
												<figcaption>
													<span>ព្រះរាជក្រឹត្យ</span>
												</figcaption>
											</figure>
										</a>
									</div>
									<div class="col-6 col-sm-2 col-md-2">
										<a href="#">
											<figure class="imghvr-shutter-in-out-diag-2">
												<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/Logo-1.svg">
												<figcaption>
													<span>អនុក្រឹត្យ</span>
												</figcaption>
											</figure>
										</a>
									</div>
									<div class="col-6 col-sm-2 col-md-2">
										<a href="#">
											<figure class="imghvr-shutter-in-out-diag-2">
												<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/MFAIC.svg">
												<figcaption>
													<span>សេចក្ដីណែនាំ</span>
												</figcaption>
											</figure>
										</a>
									</div>
									<div class="col-6 col-sm-2 col-md-2">
										<a href="#">
											<figure class="imghvr-shutter-in-out-diag-2">
												<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/04/bull-horn-announcer.svg">
												<figcaption>
													សេចក្ដីសម្រេច
												</figcaption>
											</figure>
										</a>
									</div>
									
								</div>
								<div class="space-3"></div>
							</div>
						</div>
					</div> -->
				</div>
				<div class="col-4 list-wrap" id="minister">
					<div class="card panel-default margin-0 card-he">
						<div class="card-header">
							<a href="#">
							<h3 class="card-title no-border">ទំព័រ​រដ្ឋមន្ត្រី​</h3></a>
						</div>
						<div class="card-body">
							<a class="" href="http://www.mptc.gov.kh/site/detail/15"><img src=
							"https://scontent-sin6-1.xx.fbcdn.net/v/t1.0-9/67404061_2501977810025092_344138188782043136_n.jpg?_nc_cat=107&_nc_eui2=AeFSHla53zfK86KrWqTGr1FG6LCE-EsXmn_hg2_bwM6uG-M99_NTuO9g5uuFRzpx6LTSCZOpeZOKLejAU-6jd8IezFCI8DlbSeyL4wlKuAnnBQ&_nc_oc=AQnelKsQiZO3R7AFuSFpZleoTJrMg5J2z7T9aRYG6R7Vw1HlZhCLmwG_EulUvXregts&_nc_ht=scontent-sin6-1.xx&oh=e1fd22a054992fcecf5f61f4a65d20ff&oe=5DA48343" width="100%"></a>
						</div>
					</div>
					<div class="card border-left border-right">
						<!-- <div class="space-1"></div> -->
						<div class="card-body">
							<ul class="list-group">
								<?php query_posts('category_name="Minister" &posts_per_page=5'); ?>
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
									<li class="list-group-item border-bottom no-background">
										<a class="title" href="<?php the_permalink($post->ID); ?>">
										<?php the_title(); ?></a>
										<!-- <p class="label label-danger" style="font-size: 9px; display: inline-block;">HOT !</p> -->
										<span class="badge badge-pill badge-danger">ទាន់ហេតុការណ៍</span>
										<p class="date"><i class=" far fa-calendar-alt fa-fw"></i><?php the_time('D j F Y'); ?></p>
									</li>								
								<?php endwhile; endif; ?>							
								<?php wp_reset_query(); ?>
							</ul>
							<div class="hr"></div>

							<div class="card-bottom">
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
							

							<!-- <div class="card-footer">
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
								<a href="https://www.mptc.gov.kh/topic/minister-activities">មានបន្ត<span class=
								"fa fa-angle-double-right"></span></a>
							</div> -->

							<!-- <div>
								<a href="https://www.mptc.gov.kh/topic/other-activities" style=
								"font-size: 16px; color: #1382BF; font-weight: bold; padding: 15px; border-top: 1px solid #C2C2C2; display: block; padding-left: 35px;">
								សកម្មភាពផ្សេងៗ</a>
							</div>
							<ul class="list-group">
								<?php query_posts('category_name="Others" &posts_per_page=5'); ?>
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
									<li class="list-group-item border-bottom no-background">
										<a class="title" href="<?php the_permalink($post->ID); ?>">
										<?php the_title(); ?></a>
										<p class="label label-danger" style="font-size: 9px; display: inline-block;">HOT !</p>
										<p class="date"><span class=" fa fa-calendar fa-fw"></span><?php the_time('D j F Y'); ?></p>
									</li>								
								<?php endwhile; endif; ?>							
								<?php wp_reset_query(); ?>
							</ul> -->
						</div>
						<!-- <div class="space-3"></div> -->
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
							<!-- <ol>
								<li>ឯកឧត្តម មាស ប៉ូ<br>
									<i class="fa fa-fw fa-phone color-8"></i> <a href="tel:+012876087">012876087</a>
								</li>
								<li>ឯកឧត្តម ខូវ មករា<br>
									<i class="fa fa-fw fa-phone color-8"></i> <a href="tel:+077213238">077213238</a>
								</li>
							</ol>
							<hr>
							<div class="padding-left-15 padding-right-15">
								<h4 class="font-size-16">សារអេឡិកត្រូនិច</h4>
								<p class="font-size-15"><i class="fa fa-envelope-o"></i> <a class="color-7" href=
								"mailto:spokesperson@mptc.gov.kh">spokesperson@mptc.gov.kh</a></p>
							</div> -->
							
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
									<!-- <thead class="collapse" id="Demo0">
										<tr>
											<td>
												<a href=
												"/km-kh/Home/Download/01acc6c1-6f40-4f8d-95d3-7c11b5a3a938">ការតាមដានត្រួតពិនិត្យនិងវាយតម្លៃ
												( M &amp; E)</a>
											</td>
										</tr>
										<tr>
											<td>
												<a href=
												"/km-kh/Home/Download/179ed035-23df-42c0-82b9-9627704922f1">MTR-២០១១</a>
											</td>
										</tr>
										<tr>
											<td>
												<a href=
												"/km-kh/Home/Download/4b174b06-46e1-493e-985d-01109265d09c">កាត់បន្ថយភាពក្រីក្រ</a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="http://www.idpoor.gov.kh/">IDPoor</a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="/km-kh/Home/Download/6afb458b-a0b5-4a37-af71-df47540c18ca">P I
												P</a>
											</td>
										</tr>
										<tr>
											<td>
												<a href=
												"/km-kh/Home/Download/6f1bd59c-14ae-4049-9e8c-4e7876058961">MPSP</a>
											</td>
										</tr>
										<tr>
											<td>
												<a href=
												"/km-kh/Home/Download/882eb1f9-266c-4042-9d56-10d722ba5d2a">CSDG</a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="/km-kh/Home/Download/89b91a60-c8a8-482b-8e60-cd946ec0d94f">NSDP
												២០១៤-២០១៨</a>
											</td>
										</tr>
										<tr>
											<td>
												<a href=
												"/km-kh/Home/Download/db85936b-ed90-4a67-ac04-ca015aded675">AOP</a>
											</td>
										</tr>
									</thead> -->
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
											<!-- <th class="row no-margin">
												<a class="col-md-10 no-pad" href="http://www.nis.gov.kh/" target="_blank">
													វិទ្យាស្ថានជាតិស្ថិតិ
												</a> 
												<span class="pull-right col-md-2 no-pad" 
													data-target="#Demo1" data-toggle="collapse">
													<figure class="imghvr-shutter-in-out-diag-2">
														<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/logo-1.svg">
														<figcaption>
															<span>អគ្គនាយកដ្ឋានផែនការ</span>
														</figcaption>
													</figure>
												</span>
											</th> -->
										</tr>
									</thead>
									<!-- <thead class="collapse" id="Demo1"></thead> -->
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
											<!-- <th class="row no-margin">
												<a class="col-md-10 no-pad" href="#" target="_blank">
													អគ្គាធិការដ្ឋាន
												</a>
												<span class="pull-right col-md-2 no-pad"
													data-target="#Demo2" data-toggle="collapse">
													<figure class="imghvr-shutter-in-out-diag-2">
														<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/MFAIC.svg">
														<figcaption>
															<span>អគ្គនាយកដ្ឋានផែនការ</span>
														</figcaption>
													</figure>
												</span>
											</th> -->
										</tr>
									</thead>
									<!-- <thead class="collapse" id="Demo2"></thead> -->
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
											<!-- <th class="row no-margin">
												<a class="col-md-10 no-pad" href="#" target="_blank">
													អគ្គលេខាធិការដ្ឋានប្រជាជននិងការអភិវឌ្ឍ
												</a> 
												<span class="pull-right col-md-2 no-pad" 
													data-target="#Demo3" data-toggle="collapse">
													<figure class="imghvr-shutter-in-out-diag-2">
														<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/logo-1.svg">
														<figcaption>
															<span>អគ្គនាយកដ្ឋានផែនការ</span>
														</figcaption>
													</figure>
												</span>
											</th> -->
										</tr>
									</thead>
									<!-- <thead class="collapse" id="Demo3"></thead> -->
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
											<!-- <th class="row no-margin">
												<a class="col-md-10 no-pad" href="http://www.snt.gov.kh/" target="_blank">
													អគ្គលេខាធិការដ្ឋាននៃក្រុមប្រឹក្សាជាតិ​វិទ្យាសាស្រ្ត​និងបច្ចេកវិទ្យា
												</a>
												<span class="pull-right col-md-2 no-pad"
													data-target="#Demo4" data-toggle="collapse">
													<figure class="imghvr-shutter-in-out-diag-2">
														<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/04/GS-NSTC_V2_Eng-1.png">
														<figcaption>
															<span>អគ្គនាយកដ្ឋានផែនការ</span>
														</figcaption>
													</figure>
												</span>
											</th> -->
										</tr>
									</thead>
									<!-- <thead class="collapse" id="Demo4">
										<tr>
											<td>
												<a href=
												"/km-kh/Home/Download/e8410c05-00a3-4909-bd27-1e1e141f4a59">អំពីអគ្គលេខាធិការដ្ឋាននៃ
												ក្រុមប្រឹក្សាជាតិវិទ្យាសាស្រ្តនិងបច្ចេកវិទ្យា</a>
											</td>
										</tr>
									</thead> -->
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
								<!-- <i class="ico fas fa-sun fa-spin"></i> -->
								<i class="far fa-sun fa-spin"></i>
								<i class="ico-right fas fa-cloud-moon-rain"></i>
							</h3>
						</div>
						<div class="card-body">
							<!-- <a class="weatherwidget-io" href="https://forecast7.com/en/11d54104d89/phnom-penh/" data-label_1="ភ្នំពេញ" 
								data-label_2="អាកាសធាតុ" data-icons="Climacons Animated" data-theme="original" >
								ភ្នំពេញ អាកាសធាតុ
							</a> -->
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
							<nav class="social-button">
								<ul>
									<!-- <li><a href=""><i class="fab fa-codepen" aria-hidden="true"></i></a></li> -->
									<li><a href=""><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
									<li><a href=""><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href=""><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
									<li><a href=""><i class="fab fa-telegram-plane" aria-hidden="true"></i></a></li>
									<li><a href=""><i class="fab fa-facebook-messenger" aria-hidden="true"></i></a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>	
					
					

					<!-- <div class="social-btns">
						<a class="btn facebook" href="#">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a class="btn twitter" href="#">
							<i class="fab fa-twitter"></i>
						</a>
						<a class="btn youtube" href="#">
							<i class="fab fa-youtube"></i>
						</a>
						<a class="btn dribbble" href="#">
							<i class="fab fa-dribbble"></i>
						</a>
						<a class="btn skype" href="#">
							<i class="fab fa-skype"></i>
						</a>
					</div> -->

			</div>	

			<div class="hr"></div><!--list 4 column-->
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


					<!-- <div class="">
						<div class="video-album relative">
							<ul class="col-xs-7 video-gallery-front padding-0 margin-0">
								<li>
									<a href="https://youtu.be/QlmRu4M7Hpc"></a>
								</li>
							</ul>
							<div class="col-xs-4 col-xs-offset-1 video-album-title pull-right">
								<div class="space-1 visible-xs"></div>
								<p>​ឯកឧត្ដម​រដ្ឋមន្ត្រី​ ​ត្រាំ​ អុី​វ​តឹក​
								​អញ្ជើញ​ជា​អធិបតី​ក្នុង​ពិធី​ចុះហត្ថលេខា​លើ​អនុស្សរណៈ​យោគ​យល់គ្នា​ស្តីពី​ដៃគូ​វិនិយោគ​ឯកជន​និង​សាធារណៈ​
								​រវាង​ទូរគមនាគមន៍កម្ពុជា ​ជាមួយ​ ​ក្រុមហ៊ុន​ ​Seat​e​l​</p>
							</div>
							<div class="clear-float"></div>
							<div class="panel-footer padding-0 absolute" style="right:0;bottom:0;">
								<a href="https://www.mptc.gov.kh/topic/video-gallery">មានបន្ត<span class=
								"fa fa-angle-double-right"></span></a>
							</div>
						</div>
					</div>
					<div class="space-3"></div> -->
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
							<!-- <a href="https://www.mptc.gov.kh/topic/video-gallery">មានបន្ត<span class=
							"fa fa-angle-double-right"></span></a> -->
						</div>
						<div class="space-3"></div>
						
					</div>
				</div>
			</div>	


			<div class="hr"></div>
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
										<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/logo.svg">
										<figcaption>
											<span>អគ្គនាយកដ្ឋានផែនការ</span>
										</figcaption>
									</figure>
								</a>
								<div class="media-body">
									<a class="media-heading" href="http://www.tc.com.kh/" target="_blank">
										អគ្គនាយកដ្ឋានផែនការ
									</a>
								</div>
							</div>
							<div class="col text-center">
								<a href="#">
									<figure class="imghvr-shutter-in-out-diag-2">
										<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/Logo-1.svg">
										<figcaption>
											<span>វិទ្យាស្ថានជាតិស្ថិតិ</span>
										</figcaption>
									</figure>
								</a>
								<div class="media-body">
									<a class="media-heading" href="http://www.tc.com.kh/" target="_blank">
										វិទ្យាស្ថានជាតិស្ថិតិ
									</a>
								</div>
							</div>
							<div class="col text-center">
								<a href="#">
									<figure class="imghvr-shutter-in-out-diag-2">
										<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/MFAIC.svg">
										<figcaption>
											<span>អគ្គាធិការដ្ឋាន</span>
										</figcaption>
									</figure>
								</a>
								<div class="media-body">
									<a class="media-heading" href="http://www.tc.com.kh/" target="_blank">
										អគ្គាធិការដ្ឋាន
									</a>
								</div>
							</div>
							<div class="col text-center">
								<a href="#">
									<figure class="imghvr-shutter-in-out-diag-2">
										<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/Logo-1.svg">
										<figcaption>
											<span>អគ្គលេខាធិការដ្ឋានប្រជាជននិងការអភិវឌ្ឍ</span>
										</figcaption>
									</figure>
								</a>
								<div class="media-body">
									<a class="media-heading" href="http://www.tc.com.kh/" target="_blank">
										អគ្គលេខាធិការដ្ឋានប្រជាជននិងការអភិវឌ្ឍ
									</a>
								</div>
							</div>
							<div class="col text-center">
								<a href="#">
									<figure class="imghvr-shutter-in-out-diag-2">
										<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/04/GS-NSTC_V2_Eng-1.png">
										<figcaption>
											<span>អគ្គលេខាធិការដ្ឋាននៃក្រុមប្រឹក្សាជាតិ​វិទ្យាសាស្រ្ត​និងបច្ចេកវិទ្យា</span>
										</figcaption>
									</figure>
								</a>
								<div class="media-body">
									<a class="media-heading" href="http://www.tc.com.kh/" target="_blank">
										អគ្គលេខាធិការដ្ឋាននៃក្រុមប្រឹក្សាជាតិ​វិទ្យាសាស្រ្ត​និងបច្ចេកវិទ្យា
									</a>
								</div>
							</div>
						</div>	

						<!-- <div class="row no-margin dep">
							<div class="col-12">
								<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
										
											<div class="col text-center">
												
													<figure class="imghvr-shutter-in-out-diag-2">
														<img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/03/logo.svg">
														<figcaption>
															<span>អគ្គនាយកដ្ឋានផែនការ</span>
														</figcaption>
													</figure>
												
												<div class="media-body">
													<a class="media-heading" href="http://www.tc.com.kh/" target="_blank">
														អគ្គនាយកដ្ឋានផែនការ
													</a>
												</div>
											</div>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
									</li>
								</ul>
								<div class="tab-content" id="pills-tabContent">
									<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
									<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
									<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
								</div>
							</div>	
						</div> -->


						<!-- <ul class="panel-body list-group padding-0 row">
								<li class="col-4 list-group-item text-center">
										<div class="media1">
												<a class="pull-left1" href="https://www.trc.gov.kh" target="_blank"><img alt="" class=
												"media-object thumbnail1" src=
												"https://www.mptc.gov.kh/storage/link-items/May2018/8E6Ga0nJNktTvzmNselN.jpg" style=
												"margin: 0 auto;" width=""></a>
												<div class="media-body">
														<a class="media-heading color-8" href="https://www.trc.gov.kh" target=
														"_blank">និយ័តករទូរគមនាគមន៍កម្ពុជា</a>
												</div>
										</div>
										<div class="space-3"></div>
								</li>
								<li class="col-4 list-group-item text-center">
										<div class="media1">
												<a class="pull-left1" href="http://www.tc.com.kh/" target="_blank"><img alt="" class=
												"media-object thumbnail1" src=
												"https://www.mptc.gov.kh/storage/link-items/May2018/mgmUvHSuL8HS3wU6frHd.jpg" style=
												"margin: 0 auto;" width=""></a>
												<div class="media-body">
														<a class="media-heading color-8" href="http://www.tc.com.kh/" target=
														"_blank">ទូរគមនាគមន៍កម្ពុជា</a>
												</div>
										</div>
										<div class="space-3"></div>
								</li>
								<li class="col-4 list-group-item text-center">
										<div class="media1">
												<a class="pull-left1" href="http://www.cambodiapost.post/" target="_blank"><img alt=""
												class="media-object thumbnail1" src=
												"https://www.mptc.gov.kh/storage/link-items/May2018/GJGisMOrGadDF0GVmQ20.jpg" style=
												"margin: 0 auto;" width=""></a>
												<div class="media-body">
														<a class="media-heading color-8" href="http://www.cambodiapost.post/" target=
														"_blank">ប្រៃ​សណីយ៍កម្ពុជា</a>
												</div>
										</div>
										<div class="space-3"></div>
								</li>
						</ul> -->
					</div>
				</div>
			</div>
				<!-- <div class="row">
					<div class="col-xs-12">
							<div class="hr"></div>
					</div>
					<div class="col-xs-12 space-3"></div>
					<div class="col-xs-6 text-center border-right2">
							<a class="color-default font-15 bold text-decoration-none" href=
							"/otherlinks">ភ្ជាប់ទៅកាន់គេហទំព័រដទៃ</a>
					</div>
					<div class="col-xs-6 text-center">
							<a class="color-default font-15 bold text-decoration-none" href=
							"/topic/postage-stamps">បណ្តុំតែមប្រៃសណីយ៍</a>
					</div>
					<div class="col-xs-12 space-3"></div>
					<div class="col-xs-12">
					<div class="hr"></div>
					</div>
				</div> -->
				<!-- Start Tab Contents: 24-Feb-2015  -->
				<div class="space-3"></div>
				<div class="hr"></div>
				<div class="list-panel-wrap">
					<div class="panel panel-default new-panel padding-0 no-border">
						<div class="panel-heading">
							<div class="space-2"></div>
							<h3 class="panel-title block-title padding-left-0-im">
								<a class="hvr-underline-from-center" href="#"><i class="far fa-file-alt"></i> ច្បាប់ និងបទបញ្ញត្តិ</a>
							</h3>
							<!-- Start Tab Contents: 24-Feb-2015  -->
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
										<!-- <p>Culpa dolor voluptate do laboris laboris irure reprehenderit id incididunt duis pariatur mollit aute magna pariatur consectetur. Eu veniam duis non ut dolor deserunt commodo et minim in quis laboris ipsum velit id veniam. Quis ut consectetur adipisicing officia excepteur non sit. Ut et elit aliquip labore Lorem enim eu. Ullamco mollit occaecat dolore ipsum id officia mollit qui esse anim eiusmod do sint minim consectetur qui.</p> -->
									




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
											<!-- <div class="box-header">
											<h3 class="box-title">Data Table With Full Features</h3>
											</div> -->
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



							<!-- <div class="panel-body" style="">
									<div class="tabs-left">
											<ul class="nav nav-tabs tabs-left no-border margin-0" id="demo-pill-nav">
													<li class="active">
															
															<a class="no-border" data-toggle="tab" href="#tab-r1"><span class="fa fa-book"></span>
															គោលនយោបាយ</a>
															<div class="hr"></div>
													</li>
													<li class="">
															
															<a class="no-border" data-toggle="tab" href="#tab-r2"><span class="fa fa-list-alt"></span>
															ឯកសារបណ្តុះបណ្តាល</a>
															<div class="hr"></div>
													</li>
													<li class="">
														
															<a class="no-border" data-toggle="tab" href="#tab-r3"><span class=
															"fa fa-cloud-download"></span> ខ្មែរ Unicode</a>
													</li>
											</ul>
											<div class="tab-content">
													<div class="tab-pane" id="tab-r1">
															<div class="media" style="padding-left: 280px;">
																	<div class="media-left pull-left"><img alt="click to download" class="media-object" src=
																	"https://www.mptc.gov.kh/assets/img/pdfdownload.png" width="50"></div>
																	<div class="media-body">
																			<h4 class="media-heading font-15">
																			គោលនយោបាយ​អភិវឌ្ឍន៍​វិស័យ​ទូរគមនាគមន៍​-បច្ចេកវិទ្យា​គមនាគមន៍ និងព័ត៌មាន
																			ឆ្នាំ២០២០</h4><span class="color-8" style="font-size: 12px;"><span class=
																			" fa fa-calendar fa-fw"></span> ថ្ងៃ ពុធ ទី ១១ ខែ ឧសាភា ឆ្នាំ ២០១៦</span><br>
																			<a href="https://www.mptc.gov.kh/storage/files/2016/05/546/tictpolicy.pdf" target=
																			"_blank"><span class="fa fa-folder-open-o"></span> <span style=
																			"color:#007AC6;">View</span></a>&nbsp;&nbsp; <a href=
																			"https://www.mptc.gov.kh/storage/files/2016/05/546/tictpolicy.pdf"><span class=
																			"fa fa-cloud-download"></span> <span style="color:#007AC6;">Download</span></a>
																			<a class="pull-right" href="https://www.mptc.gov.kh/topic/policies" style=
																			"margin-right: 10px; color:#007AC6;">មានបន្ត <span class=
																			"fa fa-angle-double-right"></span></a>
																	</div>
															</div>
													</div>
													<div class="tab-pane active" id="tab-r2">
															<div class="media" style="padding-left: 280px;">
																	<div class="media-left pull-left"><img alt="click to download" class="media-object" src=
																	"https://www.mptc.gov.kh/assets/img/pdfdownload.png" width="50"></div>
																	<div class="media-body">
																			<h4 class="media-heading font-15">
																			ការ​ផ្សព្វ​ផ្សាយ​វគ្គ​បណ្តុះ​បណ្តាល​នៅ​ប្រទេស​ឥណ្ឌា​ជួន​មន្ត្រី​រាជ​ការ​ក្រសួង​ប្រៃសណីយ៍​
																			និង​ទូរគមនាគមន៍​សម្រាប់​ឆ្នាំ​សិក្សា​ ២០១៧​~២០១៨</h4><span class="color-8" style=
																			"font-size: 12px;"><span class=" fa fa-calendar fa-fw"></span> ថ្ងៃ អង្គារ ទី ០៩ ខែ
																			ឧសាភា ឆ្នាំ ២០១៧</span><br>
																			<a href="https://www.mptc.gov.kh/storage/files/2017/05/856/scan_for_all_documents.pdf"
																			target="_blank"><span class="fa fa-folder-open-o"></span> <span style=
																			"color:#007AC6;">View</span></a>&nbsp;&nbsp; <a href=
																			"https://www.mptc.gov.kh/storage/files/2017/05/856/scan_for_all_documents.pdf"><span class="fa fa-cloud-download">
																			</span> <span style="color:#007AC6;">Download</span></a> <a class="pull-right" href=
																			"https://www.mptc.gov.kh/topic/training-documents" style=
																			"margin-right: 10px; color:#007AC6;">មានបន្ត <span class=
																			"fa fa-angle-double-right"></span></a>
																	</div>
															</div>
													</div>
													<div class="tab-pane" id="tab-r3">
															<div class="media" style="padding-left: 280px;">
																	<div class="media-left pull-left">
																			<a href="#"></a>
																	</div>
																	<div class="media-body">
																			<h4 class="media-heading font-15"></h4><span class="color-8" style=
																			"font-size: 12px;"><img src="https://www.mptc.gov.kh/assets/img/unicode.gif" width=
																			"350"></span><br>
																			<a href="https://drive.google.com/file/d/0B3VjtKdS2QmVSFQzUUdYRktpNG8/view?usp=sharing"
																			target="_blank"><span class="fa fa-cloud-download"></span> <span style=
																			"color:#007AC6;">Download</span></a>
																	</div>
															</div>
													</div>
											</div>
									</div>
							</div> -->
					</div>
				</div>
				<div class="space-2"></div>
				<div class="space-3"></div>

				
				<!-- <div class="scroll-top-wrap text-right">
						<div class="scroll-top">
								<i class="fa fa-stack fa-lg fa-angle-up"></i>
						</div>
				</div> -->
		</div>
	</div>			



		<?php 
			// if ( have_posts() ) : while ( have_posts() ) : the_post();
			// 	get_template_part( 'content', get_post_format() );
			// endwhile; else :
			// 	esc_html_e( 'Sorry, no posts matched your criteria.' );
			// endif; 
		?>
</div>
	
<?php get_footer(); ?>			