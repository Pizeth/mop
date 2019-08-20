<?php
/**
 * The sidebar containing the main widget area.
 * @package WordPress - Themonic Framework
 * @subpackage Iconic_One
 * @since Iconic One 1.0
 */
?>

	<!-- <?php if ( is_active_sidebar( 'themonic-sidebar' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'themonic-sidebar' ); ?>
		</div>
	<?php else : ?>	
	 		<div id="secondary" class="widget-area" role="complementary">
			<div class="widget widget_search">
				<?php get_search_form(); ?>
			</div>
			<div class="widget widget_recent_entries">
				<p class="widget-title"><?php _e( 'Recent Posts', 'iconic-one' ); ?></p>
				<ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
			</div>
			<div class="widget widget_pages">
			<p class="widget-title"><?php _e( 'Pages', 'iconic-one' ); ?></p>
          <ul><?php wp_list_pages('title_li='); ?></ul>
      </div>
	  
	  <div class="widget widget_tag_cloud">
       <p class="widget-title"><?php _e( 'Tag Cloud', 'iconic-one' ); ?></p>
        <?php wp_tag_cloud('smallest=10&largest=20&number=30&unit=px&format=flat&orderby=name'); ?>
			</div>
		</div>
	<?php endif; ?> -->

	<div class="col-4 list-wrap" id="minister">
		<?php if (is_home()) { ?>
			<!-- Minister Section -->
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
			<!-- End of Minister Section -->
		<?php } ?>
		<!-- Facebook Widget -->
		<?php if(is_active_sidebar('facebook-sidebar')) dynamic_sidebar('facebook-sidebar'); ?>
		<!-- End of Facebook Widget -->
		<!-- Sub Organization Menu -->
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
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg">
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
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Logo_OCM.svg">
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
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/MFAIC.svg">
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
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Logo_MoP.svg">
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
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/GS-NSTC.svg">
												<!-- <img src="<?php echo get_bloginfo( 'wpurl' );?>/wp-content/uploads/2019/04/GS-NSTC_V2_Eng-1.png"> -->
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
		<!-- End of Sub Organization Menu -->
		<!-- Weathering Widget -->
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
		<!-- End of Weather Widget -->
		<!-- Calendar Widget -->
		<?php if(is_active_sidebar('calendar-sidebar')) dynamic_sidebar('calendar-sidebar'); ?>
		<?php if(is_active_sidebar('social-sidebar')) dynamic_sidebar('social-sidebar'); ?>
		<!-- End of Calendar Widget -->
		<!-- Social Widget -->
		<div class="card panel-default border-left border-right">
			<div class="card-header">
				<h3 class="card-title no-pad">គណនីយបណ្ដាញសង្គមផ្សេងៗរបស់ក្រសួង</h3>
			</div>
			<div class="card-body">
				<!-- <svg>
					<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/brands.svg#gitlab"></use>
				</svg> -->
				<svg width="65" height="60" viewBox="0 0 210 194" class="footer-logo">
					<path d="M105.0614,193.655 L105.0614,193.655 L143.7014,74.734 L66.4214,74.734 L105.0614,193.655 L105.0614,193.655 Z" fill="#E24329" class="logo-svg-shape logo-dark-orange-shape"></path>
					<path d="M105.0614,193.6548 L66.4214,74.7338 L12.2684,74.7338 L105.0614,193.6548 Z" fill="#FC6D26" class="logo-svg-shape logo-orange-shape"></path>
					<path d="M12.2685,74.7341 L12.2685,74.7341 L0.5265,110.8731 C-0.5445,114.1691 0.6285,117.7801 3.4325,119.8171 L105.0615,193.6551 L12.2685,74.7341 Z" fill="#FCA326" class="logo-svg-shape logo-light-orange-shape"></path>
					<path d="M12.2685,74.7342 L66.4215,74.7342 L43.1485,3.1092 C41.9515,-0.5768 36.7375,-0.5758 35.5405,3.1092 L12.2685,74.7342 Z" fill="#E24329" class="logo-svg-shape logo-dark-orange-shape"></path>
					<path d="M105.0614,193.6548 L143.7014,74.7338 L197.8544,74.7338 L105.0614,193.6548 Z" fill="#FC6D26" class="logo-svg-shape logo-orange-shape"></path>
					<path d="M197.8544,74.7341 L197.8544,74.7341 L209.5964,110.8731 C210.6674,114.1691 209.4944,117.7801 206.6904,119.8171 L105.0614,193.6551 L197.8544,74.7341 Z" fill="#FCA326" class="logo-svg-shape logo-light-orange-shape"></path>
					<path d="M197.8544,74.7342 L143.7014,74.7342 L166.9744,3.1092 C168.1714,-0.5768 173.3854,-0.5758 174.5824,3.1092 L197.8544,74.7342 Z" fill="#E24329" class="logo-svg-shape logo-dark-orange-shape"></path>
				</svg>
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
		<!-- End of Social Widget -->
		<?php if(is_active_sidebar('login-sidebar')) dynamic_sidebar('login-sidebar'); ?>
	</div>