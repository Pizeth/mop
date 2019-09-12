<?php
/**
 * The sidebar containing the main widget area.
 * @package WordPress - Themonic Framework
 * @subpackage Iconic_One
 * @since Iconic One 1.0
 */
?>

	<!-- <?php //if ( is_active_sidebar( 'themonic-sidebar' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php //dynamic_sidebar( 'themonic-sidebar' ); ?>
		</div>
	<?php //else : ?>	
	 		<div id="secondary" class="widget-area" role="complementary">
			<div class="widget widget_search">
				<?php //get_search_form(); ?>
			</div>
			<div class="widget widget_recent_entries">
				<p class="widget-title"><?php _e( 'Recent Posts', 'iconic-one' ); ?></p>
				<ul><?php //wp_get_archives('type=postbypost&limit=5'); ?></ul>
			</div>
			<div class="widget widget_pages">
			<p class="widget-title"><?php _e( 'Pages', 'iconic-one' ); ?></p>
          <ul><?php //wp_list_pages('title_li='); ?></ul>
      </div>
	  
	  <div class="widget widget_tag_cloud">
       <p class="widget-title"><?php _e( 'Tag Cloud', 'iconic-one' ); ?></p>
        <?php //wp_tag_cloud('smallest=10&largest=20&number=30&unit=px&format=flat&orderby=name'); ?>
			</div>
		</div>
	<?php //endif; ?> -->

	<div class="col-4 list-wrap minister">
		<?php if (is_home()) { ?>
			<!-- Minister Section -->
			<div class="card panel-default margin-0 card-he">
				<div class="card-header">
					<?php
						$minister = new WP_Query('category_name="Minister" &posts_per_page=5');
						$id = $minister->get_queried_object_id(); 
						$count = $minister->found_posts;
						$cat_link = get_category_link($id);
						$post_per_page = $minister->query_vars['posts_per_page'];
					?>
					<a href="<?php echo $cat_link; ?>">
						<h3 class="card-title no-border">
							<?php echo get_cat_name($id) ?>
						</h3>
					</a>
				</div>
				<div class="card-body">
					<!-- <a class="shine" href="<?php echo $cat_link; ?>">
						<figure>
							<img src="<?php echo esc_url(get_theme_mod('minister_img')); ?>">
						</figure>
					</a> -->
					<div class="effect-apollo">
					<!-- <a class="effect-apollo md-trigger" data-modal="modal-16" href="#"> -->
						<figure>
							<img src="<?php echo esc_url(get_theme_mod('minister_img')); ?>" alt="img22"/>
							<figcaption>
								<!-- <h2>Strong <span>Apollo</span></h2> -->
								<!-- <p>សារទេសរដ្ឋមន្រ្តី</p> -->
								<!-- <a href="#">View more</a> -->
								<h2 class="md-trigger" data-modal="modal-16"><i class="far fa-comment-dots fa-flip-horizontal"></i> សារទេសរដ្ឋមន្រ្តី</h2>
								<p class="icon-links">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Angkor_Wat.svg" class="svg">
									<a href="/ministry-vision" data-toggle="tooltip" data-placement="top" title="" data-original-title="ព័ត៌មានសង្ខេបអំពីក្រសួង"><span class="fas fa-landmark"></span></a>
									<a href="/ministry-infrastructure" data-toggle="tooltip" data-placement="top" title="" data-original-title="រចនាសម្ព័ន្ធក្រសួង"><span class="fas fa-sitemap"></span></a>
									<a href="/minister-biography" data-toggle="tooltip" data-placement="top" title="" data-original-title="ជីវប្រវត្តិរដ្ឋមន្រ្តី"><span class="far fa-id-card"></span></a>
									<!-- <object type="image/svg+xml" data="<?php echo get_stylesheet_directory_uri(); ?>/img/Angkor_Wat.svg"></object> -->
								</p>
								<!-- <p class="description">សារទេសរដ្ឋមន្រ្តី</p> -->
							</figcaption>			
						</figure>
					</div>
					<!-- </a> -->
				</div>

				<!-- <h2>Zoe</h2>
				<div class="effect-zoe">
					<figure class="">
					<img src="<?php //echo esc_url(get_theme_mod('minister_img')); ?>" alt="img22"/>
						<figcaption>
							<h2>សារ<span>ទេសរដ្ឋមន្រ្តី</span></h2>
							<p class="icon-links">
								<a href="#"><span class="far fa-heart"></span></a>
								<a href="#"><span class="far fa-eye"></span></a>
								<a href="#"><span class="fas fa-paperclip"></span></a>
							</p>
							<p class="description">សារទេសរដ្ឋមន្រ្តី</p>
						</figcaption>			
					</figure>
				</div> -->


			</div>
			<div class="card border-left border-right">
				<div class="card-body">
					<ul class="list-group">
						<?php if ($minister->have_posts()) : while($minister->have_posts()) : $minister->the_post(); ?>
							<li class="list-group-item border-bottom no-background">
								<a class="title" href="<?php the_permalink($post->ID); ?>"><?php the_title(); ?></a>
								<?php echo get_post_label(get_post_time(), 'ទាន់ហេតុការណ៍!'); ?>
								<!-- <span class="badge badge-pill badge-danger">ទាន់ហេតុការណ៍</span> -->
								<p class="date"><i class=" far fa-calendar-alt fa-fw"></i> <?php the_time('D j F Y'); ?></p>
							</li>								
						<?php endwhile; endif; ?>							
						<?php wp_reset_query(); ?>
					</ul>
					<div class="hr"></div>
					<div class="card-bottom" <?php echo $count <= $post_per_page ? 'hidden' : ''; ?>>
						<div class="sign">
							<?php echo get_continue("មានបន្ត", $cat_link, $count, $post_per_page); ?>
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
		<!-- Calendar Widget -->
		<?php if(is_active_sidebar('calendar-sidebar')) dynamic_sidebar('calendar-sidebar'); ?>
		<!-- End of Calendar Widget -->
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
		<!-- Social Widget -->
		<?php if(is_active_sidebar('social-sidebar')) dynamic_sidebar('social-sidebar'); ?>
		<!-- <div class="card panel-default border-left border-right">
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
		</div> -->
		<!-- End of Social Widget -->
		<!-- Login Widget -->
		<div class="card panel-default border-left border-right">
			<div class="card-header">
				<h3 class="card-title no-margin ico-badge">
					<i class="ico fas fa-users"></i>ចូលប្រើប្រាស់គណនី
					<?php $current_url='http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT']!='80'?':'.$_SERVER['SERVER_PORT']:'').$_SERVER['REQUEST_URI']; ?>
				</h3>
			</div>
			<div class="card-body">
				<div class="login-wrap">
					<div class="login-html">
					<?php if(!$user_ID) { ?>
						<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">ចូលប្រើ</label>
						<?php  if(get_option('users_can_register')) { ?>
							<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">ភ្លេចពាក្យសម្ងាត់?</label>
						<?php }; ?>
						<input id="tab-3" type="radio" name="tab" class="forgot"><label for="tab-3" class="tab">ភ្លេចពាក្យសម្ងាត់?</label>
						<div class="login-form">
							<div class="sign-in-htm">
								<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
									<!-- <div class="group">
										<label for="user" class="label"><i class="fas fa-user"></i> Username</label>
										<input id="user" type="text" class="input" placeholder="ឈ្មោះអ្នកប្រើប្រាស់">
									</div>
									<div class="group">
										<label for="pass" class="label"><i class="fas fa-lock"></i> Password</label>
										<input id="pass" type="password" class="input" placeholder="ពាក្យសម្ងាត់" data-type="password">
									</div> -->
									<div class="input-group flex-nowrap group">
										<div class="input-group-prepend">
											<label for="user_login" class="input-group-text label" id="addon-wrapping"><i class="fas fa-user"></i></label>
										</div>
										<input name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" id="user_login" type="text" class="form-control input" placeholder="ឈ្មោះអ្នកប្រើប្រាស់" aria-label="Username" aria-describedby="addon-wrapping">
									</div>
									<div class="input-group flex-nowrap group">
										<div class="input-group-prepend">
											<label for="user_pass" class="input-group-text label" id="addon-wrapping"><i class="fas fa-lock"></i></label>
										</div>
										<input name="pwd" id="user_pass" type="password" class="form-control input" placeholder="ពាក្យសម្ងាត់" data-type="password" aria-label="Password" aria-describedby="addon-wrapping">
									</div>
									<div class="group">
										<input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" class="check" checked>
										<label for="rememberme"><span class="icon"></span> រក្សាការចូលប្រើប្រាស់</label>
									</div>
									<div class="group">
										<?php //do_action('login_form'); ?>
										<button type="submit" class="button" value="Sign In"><i class="fas fa-sign-in-alt"></i> ចូល</button>
										<input type="hidden" name="redirect_to" value="<?php echo $current_url; ?>" />
										<input type="hidden" name="user-cookie" value="1" />
									</div>
								</form>
							</div>
							<!-- <div class="sign-up-htm">
								<div class="group">
									<label for="user" class="label">Username</label>
									<input id="user" type="text" class="input">
								</div>
								<div class="group">
									<label for="pass" class="label">Password</label>
									<input id="pass" type="password" class="input" data-type="password">
								</div>
								<div class="group">
									<label for="pass" class="label">Repeat Password</label>
									<input id="pass" type="password" class="input" data-type="password">
								</div>
								<div class="group">
									<label for="pass" class="label">Email Address</label>
									<input id="pass" type="text" class="input">
								</div>
								<div class="group">
									<input type="submit" class="button" value="Sign Up">
								</div>
								<div class="hr"></div>
								<div class="foot-lnk">
									<label for="tab-1">Already Member?</a>
								</div>
							</div> -->
							<div class="forgot-htm">
								<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
									<!-- <div class="group">
										<label for="pass" class="label">Email Address</label>
										<input id="pass" type="text" class="input">
									</div> -->
									<div class="input-group flex-nowrap group">
										<div class="input-group-prepend">
											<label for="user_email" class="input-group-text label" id="addon-wrapping"><i class="fas fa-envelope"></i></label>
										</div>
										<input name="user_login" value="" id="user_email" type="text" class="form-control input" placeholder="អ៊ីម៉ែល ឬ ឈ្មោះអ្នកប្រើប្រាស់" data-type="email" aria-label="Email" aria-describedby="addon-wrapping">
									</div>
									<div class="group">
										<button type="submit" class="button" value="Reset"><i class="fas fa-paper-plane"></i> បញ្ជូន</button>
										<?php do_action('login_form', 'resetpass'); ?>
										<?php $reset = $_GET['reset']; if($reset == true) { echo '<p>'.__('A message was sent to your email address.','tabbed-login').'</p>'; } ?>
										<input type="hidden" name="redirect_to" value="<?php echo $current_url; ?>?reset=true" />
										<input type="hidden" name="user-cookie" value="1" />
									</div>
								</form>
							</div>
						</div>
					<?php } else { ?>
						<input id="tab-4" type="radio" name="tab" class="signed-in" checked>
						<label for="tab-4" class="tab">
						<?php 
							// _e('Welcome, ', 'tabbed-login'); 
							// echo 'សូមស្វាគមន៍ ' . $user_identity; 
							// if ( is_user_logged_in() ) {
							// 	$current_user = wp_get_current_user();
							// 	if ( ($current_user instanceof WP_User) ) {
							// 		echo 'Welcome : ' . esc_html( $current_user->display_name );
							// 		echo get_avatar( $current_user->ID, 32 );
							// 	}
							// }
							$current_user = wp_get_current_user();
							// echo 'សូមស្វាគមន៍ ' . get_the_author_meta('first_name');
							echo 'សូមស្វាគមន៍ ' . esc_html($current_user->display_name);
						?>
						</label>
						<div class="login-form">
							<div class="signed-in-htm">
								<?php if(version_compare($GLOBALS['wp_version'], '2.5', '>=')) {
									if(get_option('show_avatars')) {
								?>
								<div class="usericon">
									<a class="shine author_image" href="<?php echo admin_url() . 'profile.php'; ?>">
										<!-- <figure><?php //echo get_avatar(get_the_author_meta('ID'), 50);?></figure> -->
										<figure><?php echo get_avatar($current_user->ID, 50);?></figure>
									</a>
								</div>
								<?php  } else { ?>
								<style type="text/css">.userinfo p{margin-left: 0px !important;text-align:center;}.userinfo{width:100%;}</style>
								<?php }}?>
								<div class="userinfo">
									<p>
									<?php 
										// _e('You are logged in as ', 'tabbed-login'); 
										// echo 'អ្នកកំពុងចូលប្រើប្រាស់គណនី <strong>' . get_the_author_meta('first_name') . '</strong>';
										echo 'អ្នកកំពុងចូលប្រើប្រាស់គណនី <strong>' . esc_html($current_user->display_name) . '</strong>';
									?>
									</p>
									<p>
										<a href="<?php echo wp_logout_url($current_url); ?>">
										<i class="fas fa-sign-out-alt"></i>
										<?php 
											// _e('Log out', 'tabbed-login'); 
											echo 'ចាកចេញ';
										?>
										</a> |
										<?php 
											if (current_user_can('manage_options')) {
												echo '<a href="' . admin_url() . '"><i class="fas fa-user-cog"></i> ' . __('Admin', 'tabbed-login') . '</a> | ';
												// echo '<a href="' . admin_url() . 'profile.php"><i class="fas fa-user"></i> ' . __('Profile', 'tabbed-login') . '</a>'; 
												 
											} 
											echo '<a href="' . admin_url() . 'profile.php"><i class="fas fa-user"></i> ' . __('Profile', 'tabbed-login') . '</a> | '; 
											echo '<a href="' . admin_url() . 'post-new.php"><i class="fas fa-address-card"></i> ' . __('New Post', 'tabbed-login') . '</a>';
										?>
									</p>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<?php //if(is_active_sidebar('login-sidebar')) dynamic_sidebar('login-sidebar'); ?>
		


		<!-- <script type='text/javascript'>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'http';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://static1.twitcount.com/js/twitcount.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitcount_plugins');</script> -->
	</div>