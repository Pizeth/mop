<?php
/**
 * MoP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage MoP
 * @since 1.0.0
 */

require_once get_template_directory() . '/inc/simple-social-icons.php';
require_once get_template_directory() . '/inc/tabbed-login.php';
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * MoP only works in WordPress 4.7 or later.
 */
function custom_new_menu() {
	register_nav_menu('mop-menu',__('Ministry of Planning Menu'));
	// register_nav_menu(array('mop-menu',__( 'Ministry of Planning Menu' ),
	// 						'header-menu' => __( 'Header Menu' ),
	// 						'extra-menu' => __( 'Extra Menu' )));
}
add_action( 'init', 'custom_new_menu' );

function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$new_filetypes['webp'] = 'image/webp';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');
// add_theme_support( 'post-thumbnails' );
// set_post_thumbnail_size( 150, 150);

	// Adds support for Navigation menu, Iconic One uses wp_nav_menu() in one location.
	// register_nav_menu( 'primary', __( 'Primary Menu', 'MoP' ) );

		// Iconic One supports custom background color and image using default wordpress funtions.
	add_theme_support( 'custom-background', array(
		'default-color' => 'e8e8e8',
	) );

	// Uncomment the following two lines to add support for post thumbnails - for classic blog layout
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 600, 9999 ); // Unlimited height, soft crop
	//Defining home page thumbnail size
	add_image_size('excerpt-thumbnail', 200, 140, true);
	add_image_size( 'homepage-thumb', 220, 180 );
	//set image size
	add_image_size( 'post-thumbnail', 640, 9999, false );
	add_image_size( 'post-slide', 9999, 9999, false );
	add_image_size( 'entry-thumbnail', 100, 9999, false );

	add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
	
	function remove_width_attribute( $html ) {
	   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	   return $html;
	}	
	
	// Default fall back thumbnail
	add_filter('post_thumbnail_html', 'my_post_thumbnail_html');

	function my_post_thumbnail_html($html) {
		if (empty($html))
			$html = '<img src="' . trailingslashit(get_template_directory_uri()) . '/img/default-thumbnail.png' . '" alt="" />';
			// $html = '<img src="' . get_bloginfo("template_url") . '/img/default-thumbnail.png' . '" alt="" />';
		return $html;
	}

	// Check whether it is the current post is the last post
	function more_posts() {
		global $wp_query;
		return $wp_query->current_post + 1 < $wp_query->post_count;
	}

	//Format date in khmer
	add_filter('the_time', 'modify_date_format');

	function modify_date_format(){
		$month_names = array(1=>'មករា','កុម្ភៈ','មីនា','មេសា','ឧសភា','មិថុនា','កក្កដា','សីហា','កញ្ញា','តុលា','វិច្ឆិកា','ធ្នូ');
		$week_names = array(1=>'ថ្ងៃចន្ទ','ថ្ងៃអង្គារ','ថ្ងៃពុធ','ថ្ងៃព្រហស្បតិ៍','ថ្ងៃសុក្រ','ថ្ងៃសៅរ៍','ថ្ងៃអាទិត្យ');
		return $week_names[get_the_time('w')].' ទី'.khmerNumber(get_the_time('j'), true).' ខែ'.$month_names[get_the_time('n')].' ឆ្នាំ'.khmerNumber(get_the_time('Y'));
	}

	function khmerNumber($input, $prefex_num = false) {
		$standard_numsets = array("0","1","2","3","4","5","6","7","8","9");
		$khmer_numsets = array("០","១","២","៣","៤","៥","៦","៧","៨","៩");
		$result = str_replace($standard_numsets, $khmer_numsets, $input);
		if($prefex_num) $result = strlen($input) == 1 ? '០' . $result : $result;
		return $result;
	}
	// function khmerDate() {
	// 	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
	// 						esc_url( get_permalink() ),
	// 						esc_attr( get_the_time() ),
	// 						esc_attr( get_the_date( 'c' ) ),
	// 						esc_html( get_the_date() )
	// 					);
	// 					$date = str_replace('1', '១', $date);
	// 					$date = str_replace('2', '២', $date);
	// 					$date = str_replace('3', '៣', $date);
	// 					$date = str_replace('4', '៤', $date);
	// 					$date = str_replace('5', '៥', $date);
	// 					$date = str_replace('6', '៦', $date);
	// 					$date = str_replace('7', '៧', $date);
	// 					$date = str_replace('8', '៨', $date);
	// 					$date = str_replace('9', '៩', $date);
	// 					$date = str_replace('0', '០', $date);
	// 	printf($date); 
	// }

	function human_time_diff_kh( $from, $to = '' ) {
		if ( empty( $to ) ) {
			$to = time();
		}

		$time_suffex = '';
	 
		$diff = (int) abs( $to - $from );
	 
		if ( $diff < HOUR_IN_SECONDS ) {
			$mins = round( $diff / MINUTE_IN_SECONDS );
			if ( $mins <= 1 ) {
				$mins = 1;
			}
			$mins = khmerNumber($mins);
			$time_suffex = 'នាទី';
			/* translators: Time difference between two dates, in minutes (min=minute). %s: Number of minutes */
			$since = sprintf( _n( '%s' . $time_suffex, '%s' . $time_suffex, $mins ), $mins );
		} elseif ( $diff < DAY_IN_SECONDS && $diff >= HOUR_IN_SECONDS ) {
			$hours = round( $diff / HOUR_IN_SECONDS );
			if ( $hours <= 1 ) {
				$hours = 1;
			}
			$hours = khmerNumber($hours);
			$time_suffex = 'ម៉ោង';
			/* translators: Time difference between two dates, in hours. %s: Number of hours */
			$since = sprintf( _n( '%s' . $time_suffex, '%s' . $time_suffex, $hours ), $hours );
		} elseif ( $diff < WEEK_IN_SECONDS && $diff >= DAY_IN_SECONDS ) {
			$days = round( $diff / DAY_IN_SECONDS );
			if ( $days <= 1 ) {
				$time_suffex = 'ម្សិលម៉ិញ';
				$days = '';
			}  else {
				$time_suffex = 'ថ្ងៃ';
				$days = khmerNumber($days);
			}
			/* translators: Time difference between two dates, in days. %s: Number of days */
			$since = sprintf( _n( '%s' . $time_suffex, '%s' . $time_suffex, $days ), $days );
		} elseif ( $diff < MONTH_IN_SECONDS && $diff >= WEEK_IN_SECONDS ) {
			$weeks = round( $diff / WEEK_IN_SECONDS );
			if ( $weeks <= 1 ) {
				$weeks = 1;
			}
			$weeks = khmerNumber($weeks);
			$time_suffex = 'សប្ដាហ៍';
			/* translators: Time difference between two dates, in weeks. %s: Number of weeks */
			$since = sprintf( _n( '%s' . $time_suffex, '%s' . $time_suffex, $weeks ), $weeks );
		} elseif ( $diff < YEAR_IN_SECONDS && $diff >= MONTH_IN_SECONDS ) {
			$months = round( $diff / MONTH_IN_SECONDS );
			if ( $months <= 1 ) {
				$months = 1;
			}
			$months = khmerNumber($months);
			$time_suffex = 'ខែ';
			/* translators: Time difference between two dates, in months. %s: Number of months */
			$since = sprintf( _n( '%s' . $time_suffex, '%s' . $time_suffex, $months ), $months );
		} elseif ( $diff >= YEAR_IN_SECONDS ) {
			$years = round( $diff / YEAR_IN_SECONDS );
			if ( $years <= 1 ) {
				$years = 1;
			}
			$years = khmerNumber($years);
			$time_suffex = 'ឆ្នាំ';
			/* translators: Time difference between two dates, in years. %s: Number of years */
			$since = sprintf( _n( '%s' . $time_suffex, '%s' . $time_suffex, $years ), $years );
		}
	 
		/**
		 * Filters the human readable difference between two timestamps.
		 *
		 * @since 4.0.0
		 *
		 * @param string $since The difference in human readable text.
		 * @param int    $diff  The difference in seconds.
		 * @param int    $from  Unix timestamp from which the difference begins.
		 * @param int    $to    Unix timestamp to end the time difference.
		 */
		return apply_filters( 'human_time_diff', $since, $diff, $from, $to );
	}

	// Get the time ago format in post
	function dynamictime() {
		global $post;
		$date = $post->post_date;
		$time = get_post_time('G', true, $post);
		$mytime = (int) abs(time() - $time);
		$time_suffex = '';
		if($mytime > 0 && $mytime < DAY_IN_SECONDS || $mytime >= 2 * DAY_IN_SECONDS)
			$time_suffex = 'មុន';
			// $mytimestamp = sprintf(__('%sមុន'), human_time_diff_kh($time));
		// else if($mytime < 2 * DAY_IN_SECONDS) && round($mytime / DAY_IN_SECONDS) <= 1)
			// $mytimestamp = sprintf(__('%s'), human_time_diff_kh($time)) . $time_suffex;
			// $time_suffex = '';
		// else if($mytime < 365*24*60*60)
			// $time_suffex = 'មុន';
			// $mytimestamp = sprintf(__('%sមុន'), human_time_diff_kh($time));
		// else
		$mytimestamp = sprintf(__('%s'), human_time_diff_kh($time)) . $time_suffex;
		  	//$mytimestamp = date(get_option('date_format'), strtotime($date));
		return $mytimestamp;
	}

	// Get Post Label base on Published Date
	function get_post_label($post_date, $label, $optional = false) {
		$time = (int) abs(time() - get_post_time());

		if($optional) {
			$label = '<i class="notes"> ' . $label . '</i>';
		}

		if($time > 0 && $time <= 15 * DAY_IN_SECONDS) 
			$label = '<span class="badge badge-pill badge-danger">' . $label . '</span>';
		else 
			$label = '';
		return $label;
	}

	// function meks_convert_to_time_ago( $orig_time ) {
	// 	global $post;
	// 	$orig_time = strtotime( $post->post_date ); 
	// 	return human_time_diff( $orig_time, current_time( 'timestamp' ) ).' '.__( 'ago' );
	// }

	// Shorten the text base on characters
	function shorten_title($title, $max) {
		// $newTitle = substr( $title, 0, 200 );
		// $max = 70; 
		if(strlen($title) > $max) {
			return mb_substr($title, 0, $max, 'utf-8'). " &hellip;";
		} else {
			return $title;
		}
		// $newTitle = mb_substr($title, 0, 70, "utf-8");
		// return $newTitle . " &hellip;";
	}
	// add_filter( 'the_title', 'shorten_title', 10, 1 );	
	// function max_title_length( $title ) {
	// 	$max = 20;
	// 	if( strlen( $title ) > $max ) {
	// 		return substr( $title, 0, $max ). " &hellip;";
	// 	} else {
	// 		return $title;
	// 	}
	// }
	// add_filter( 'the_title', 'max_title_length');

	function my_login_logo() { ?>
		<style type="text/css">
			#login h1 a, .login h1 a {
				background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg);
				background-repeat: no-repeat;
				padding-bottom: 65px;
				width: 150px;
				background-size: 150px;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );

	function my_login_logo_url() {
		return home_url();
	}
	add_filter( 'login_headerurl', 'my_login_logo_url' );
	
	function my_login_logo_url_title() {
		return 'Ministry of Planning';
	}
	add_filter( 'login_headertitle', 'my_login_logo_url_title' );

	// @ini_set( 'upload_max_size' , '15M' );
	// @ini_set( 'post_max_size', '15M');
	// @ini_set( 'memory_limit', '15M' );

	/**
	 * Filter the upload size limit for non-administrators.
	 *
	 * @param string $size Upload size limit (in bytes).
	 * @return int (maybe) Filtered size limit.
	 */
	function filter_site_upload_size_limit( $size ) {
		// Set the upload size limit to 60 MB for users lacking the 'manage_options' capability.
		if ( ! current_user_can( 'manage_options' ) ) {
			// 60 MB.
			$size = 60 * 1024 * 1024;
		}
		return $size;
	}
	add_filter( 'upload_size_limit', 'filter_site_upload_size_limit', 20 );

	// Custom Excerpt Function

	function wpex_get_excerpt( $args = array() ) {
		// Defaults
		$defaults = array(
			'post'            => '',
			'length'          => 30,
			'readmore'        => false,
			'readmore_text'   => esc_html__( 'read more', 'text-domain' ),
			'readmore_after'  => '',
			'custom_excerpts' => true,
			'disable_more'    => false,
			'boutique_style'  => '[...]',
		);
		// Apply filters
		$defaults = apply_filters( 'wpex_get_excerpt_defaults', $defaults );
		// Parse args
		$args = wp_parse_args( $args, $defaults );
		// Apply filters to args
		$args = apply_filters( 'wpex_get_excerpt_args', $defaults );
		// Extract
		extract( $args );
		// Get global post data
		if ( ! $post ) {
			global $post;
		}
		// Get post ID
		$post_id = $post->ID;
		// Check for custom excerpt
		if ( $custom_excerpts && has_excerpt( $post_id ) ) {
			$output = $post->post_excerpt;
		}
		// No custom excerpt...so lets generate one
		else {
			// Readmore link
			$readmore_link = '<a href="' . get_permalink( $post_id ) . '" class="readmore">' . $readmore_text . $readmore_after . '</a>';
			// Check for more tag and return content if it exists
			if ( ! $disable_more && strpos( $post->post_content, '<!--more-->' ) ) {
				$output = apply_filters( 'the_content', get_the_content( $readmore_text . $readmore_after ) );
			}
			// No more tag defined so generate excerpt using wp_trim_words
			else {
				// Generate excerpt
				$output = wp_trim_words( strip_shortcodes( $post->post_content ), $length, $boutique_style );
				// Add readmore to excerpt if enabled
				if ( $readmore ) {
					$output .= apply_filters( 'wpex_readmore_link', $readmore_link );
				}
			}
		}
		// Apply filters and echo
		return apply_filters( 'wpex_get_excerpt', $output );
	}

	/**
	 * Generate class for categories
	 * @author CodexWorld
	 * @authorURL www.codexworld.com
	 */
	function add_class_to_category( $thelist, $separator, $parents){
		$class_to_add = 'hvr-underline-from-center';
		return str_replace('<a href="',  '<a class="'. $class_to_add. '" href="', $thelist);
	}
	
	// add_filter('the_category', __NAMESPACE__ . '\\add_class_to_category',10,3);	

	/**
	 * Generate breadcrumbs
	 * @author CodexWorld
	 * @authorURL www.codexworld.com
	 */
	function get_breadcrumb() {
		echo '<a class="hvr-icon-pulse" href="'.home_url().'" rel="nofollow"><i class="fas fa-home hvr-icon"></i> ទំព័រដើម</a>';
		if (is_single()) {
			echo "&nbsp;&nbsp;<i class='next fas fa-angle-double-right'></i>&nbsp;&nbsp;";
			the_category(' &bull; ');
				if (is_single()) {
					echo " &nbsp;&nbsp;<i class='next fas fa-angle-double-right'></i>&nbsp;&nbsp; ";
					echo "<span>" . shorten_title(get_the_title(), 70) . "</span>";
				}
		} 
		else if (is_category()) {
			echo "&nbsp;&nbsp;<i class='next fas fa-angle-double-right'></i>&nbsp;&nbsp;";
			echo "<span>";
			echo single_term_title();
			echo "</span>";
		} 
		elseif (is_page()) {
			echo "&nbsp;&nbsp;<i class='next fas fa-angle-double-right'></i>&nbsp;&nbsp;";
			echo shorten_title(get_the_title(), 70);
		} elseif (is_search()) {
			echo "&nbsp;&nbsp;<i class='next fas fa-angle-double-right'></i>&nbsp;&nbsp;Search Results for... ";
			echo '"<em>';
			echo the_search_query();
			echo '</em>"';
		}
	}	


/*=============================================
                BREADCRUMBS
=============================================*/
//  to include in functions.php
	function the_breadcrumb() {
		$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter = '&raquo;'; // delimiter between crumbs
		$home = 'ទំព័រដើម'; // text for the 'Home' link
		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before = '<span class="current">'; // tag before the current crumb
		$after = '</span>'; // tag after the current crumb
		global $post;
		$homeLink = get_bloginfo('url');
		if (is_home() || is_front_page()) {
			if ($showOnHome == 1) {
				echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
			}
		} else {
			echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
			if (is_category()) {
				$thisCat = get_category(get_query_var('cat'), false);
				if ($thisCat->parent != 0) {
					echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
				}
				echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
			} elseif (is_search()) {
				echo $before . 'Search results for "' . get_search_query() . '"' . $after;
			} elseif (is_day()) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
				echo $before . get_the_time('d') . $after;
			} elseif (is_month()) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo $before . get_the_time('F') . $after;
			} elseif (is_year()) {
				echo $before . get_the_time('Y') . $after;
			} elseif (is_single() && !is_attachment()) {
				if (get_post_type() != 'post') {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
					if ($showCurrent == 1) {
						echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
					}
				} else {
					$cat = get_the_category();
					$cat = $cat[0];
					$cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
					if ($showCurrent == 0) {
						$cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
					}
					echo $cats;
					if ($showCurrent == 1) {
						echo $before . get_the_title() . $after;
					}
				}
			} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;
			} elseif (is_attachment()) {
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID);
				$cat = $cat[0];
				echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
				echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
				if ($showCurrent == 1) {
					echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
				}
			} elseif (is_page() && !$post->post_parent) {
				if ($showCurrent == 1) {
					echo $before . get_the_title() . $after;
				}
			} elseif (is_page() && $post->post_parent) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) {
						echo ' ' . $delimiter . ' ';
					}
				}
				if ($showCurrent == 1) {
					echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
				}
			} elseif (is_tag()) {
				echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
			} elseif (is_author()) {
				global $author;
				$userdata = get_userdata($author);
				echo $before . 'Articles posted by ' . $userdata->display_name . $after;
			} elseif (is_404()) {
				echo $before . 'Error 404' . $after;
			}
			if (get_query_var('paged')) {
				if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
					echo ' (';
				}
				echo __('Page') . ' ' . get_query_var('paged');
				if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
					echo ')';
				}
			}
			echo '</div>';
		}
	} // end the_breadcrumb()	


	/* Add Contact Methods in the User Profile - https://codex.wordpress.org/Plugin_API/Filter_Reference/user_contactmethods */

	function add_user_contact_methods( $user_contact ) {
		// $user_contact['askfm'] = __( 'Ask.fm Channel' );
		$user_contact['500px'] = __('500px Profile');
		$user_contact['artstation'] = __('ArtStation Profile');
		$user_contact['behance'] = __('Behance Profile');
		$user_contact['bitbucket'] = __('Bitbucket Profile');
		$user_contact['codepen'] = __('CodePen Profile');
		$user_contact['deviantart'] = __('Deviantart Channel');
		$user_contact['discord'] = __('Discord Channel');
		$user_contact['docker'] = __('Docker Hub Profile');
		$user_contact['dribbble'] = __('Dribbble Profile');
		$user_contact['ebay'] = __('Ebay Profile');
		// $user_contact['etsy'] = __('Etsy Profile');
		$user_contact['facebook'] = __('Facebook URL');
		$user_contact['flickr'] = __('Flickr Profile');
		$user_contact['flipboard'] = __('Flipboard Profile');
		$user_contact['getpocket'] = __('Getpocket Profile');
		$user_contact['github'] = __('Github Profile'); 
		$user_contact['gitlab'] = __('Gitlab Profile');
		$user_contact['instagram'] = __('Instagram Profile');
		$user_contact['jsfiddle'] = __('jsfiddle Profile');
		// $user_contact['imdb'] = __('IMDB Profile');
		// $user_contact['line'] = __( 'Line Username' );
		$user_contact['kickstarter'] = __('KICKSTARTER Profile');
		$user_contact['linkedin'] = __('LinkedIn Profile');
		$user_contact['medium'] = __('Medium Profile');
		$user_contact['messenger'] = __('Messenger ID');
		$user_contact['microsoft'] = __('Microsoft Teams Channel');
		$user_contact['mix'] = __('Mix Profile');
		// $user_contact['googleplus'] = __( 'Google +' );
		$user_contact['periscope'] = __('Periscope Profile');
		$user_contact['pinterest'] = __('Pinterest Profile');
		$user_contact['reddit'] = __('reddit Profile');
		$user_contact['sketchfab'] = __('Sketchfab Profile');
		$user_contact['skype'] = __('Skype Username');
		$user_contact['slack'] = __('Slack Channel');
		$user_contact['spotify'] = __('Spotify Profile');
		$user_contact['soundcloud'] = __('SoundCloud Profile');
		$user_contact['stackoverflow'] = __('Stack Overflow Account');
		$user_contact['steam'] = __('Steam Profile');
		$user_contact['telegram'] = __('Telegram profile');
		$user_contact['trello'] = __('Trello profile');
		$user_contact['tumblr'] = __('Tumblr Profile');
		$user_contact['twitch'] = __('Twitch Profile');
		$user_contact['twitter'] = __('Twitter Handle');
		$user_contact['vimeo'] = __('Vimeo Profile');
		$user_contact['whatsapp'] = __('WhatsApp Profile');
		$user_contact['wordpress'] = __('Wordpress Site');
		$user_contact['xing'] = __('Xing Profile'); 
		$user_contact['youtube'] = __('Youtube Channel');
		return $user_contact; 
   	}
  	add_filter( 'user_contactmethods', 'add_user_contact_methods' );
   
   
   	//Load Fontawesome
   	// function themeprefix_fontawesome_styles() {
	// 	wp_register_style( 'fontawesome' , 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', '' , '4.4.0', 'all' );
	// 	wp_enqueue_style( 'fontawesome' );
   	// }
   	// add_action( 'wp_enqueue_scripts', 'themeprefix_fontawesome_styles' ); 
   
   
	function author_info_box($content = null) {
	
		global $post;
		
		// Detect if it is a single post with a post author
		if ( is_single() && isset( $post->post_author ) ) {
		
			// Get author's display name - NB! changed display_name to first_name. Error in code.
			$display_name = get_the_author_meta( 'first_name', $post->post_author );
		
			// If display name is not available then use nickname as display name
			if ( empty( $display_name ) )
				$display_name = get_the_author_meta( 'nickname', $post->post_author );
		
			// Get author's biographical information or description
			$user_description = get_the_author_meta( 'user_description', $post->post_author );
			
			// Get author's website URL 
			$user_website = get_the_author_meta('url', $post->post_author);
			
			// Get author's email
			$user_email = get_the_author_meta('email', $post->post_author);

			// Get author's ask.fm
			// $user_askfm = get_the_author_meta('askfm', $post->post_author);

			// Get author's ArtStation
			$user_artstation = get_the_author_meta('artstation', $post->post_author);

			// Get author's 500px
			$user_500px = get_the_author_meta('500px', $post->post_author);

			// Get author's Behance
			$user_behance = get_the_author_meta('behance', $post->post_author);
			
			// Get author's Bitbucket
			$user_bitbucket = get_the_author_meta('bitbucket', $post->post_author);

			// Get author's CodePen
			$user_codepen = get_the_author_meta('codepen', $post->post_author);

			// Get author's Deviantart
			$user_deviantart = get_the_author_meta('deviantart', $post->post_author);

			// Get author's Discord
			$user_discord = get_the_author_meta('discord', $post->post_author);

			// Get author's Discord
			$user_docker = get_the_author_meta('docker', $post->post_author);

			// Get author's Dribbble
			$user_dribbble = get_the_author_meta('dribbble', $post->post_author);

			// Get author's ebay
			$user_ebay = get_the_author_meta('ebay', $post->post_author);

			// Get author's Facebook
			$user_facebook = get_the_author_meta('facebook', $post->post_author);

			// Get author's Flickr
			$user_flickr = get_the_author_meta('flickr', $post->post_author);

			// Get author's Flpboard
			$user_flipboard = get_the_author_meta('flipboard', $post->post_author);

			// Get author's Getpocket
			$user_getpocket = get_the_author_meta('getpocket', $post->post_author);

			// Get author's Github
			$user_github = get_the_author_meta('github', $post->post_author);

			// Get author's Gitlab
			$user_gitlab = get_the_author_meta('gitlab', $post->post_author);

			// Get author's Instagram
			$user_instagram = get_the_author_meta('instagram', $post->post_author);

			// Get author's jsfiddle
			$user_jsfiddle = get_the_author_meta('jsfiddle', $post->post_author);

			// Get author's KICKSTARTER
			$user_kickstarter = get_the_author_meta('kickstarter', $post->post_author);

			// Get author's LinkedIn 
			$user_linkedin = get_the_author_meta('linkedin', $post->post_author);

			// Get author's Medium 
			$user_medium = get_the_author_meta('medium', $post->post_author);

			// Get author's Messenger 
			$user_messenger = get_the_author_meta('messenger', $post->post_author);

			// Get author's Microsoft 
			$user_microsoft = get_the_author_meta('microsoft', $post->post_author);

			// Get author's Mix 
			$user_mix = get_the_author_meta('mix', $post->post_author);

			// Get author's Microsoft
			$user_microsoft = get_the_author_meta('microsoft', $post->post_author);

			// Get author's Periscope
			$user_periscope = get_the_author_meta('periscope', $post->post_author);

			// Get author's Pinterest
			$user_pinterest = get_the_author_meta('pinterest', $post->post_author);

			// Get author's reddit
			$user_reddit = get_the_author_meta('reddit', $post->post_author);
			
			// Get author's Sketchfab
			$user_sketchfab = get_the_author_meta('sketchfab', $post->post_author);
			
			// Get author's Skype
			$user_skype = get_the_author_meta('skype', $post->post_author);

			// Get author's Slack
			$user_slack = get_the_author_meta('slack', $post->post_author);

			// Get author's Spotify
			$user_spotify = get_the_author_meta('spotify', $post->post_author);

			// Get author's SoundCloud
			$user_soundcloud = get_the_author_meta('soundcloud', $post->post_author);

			// Get author's Stack Overflow
			$user_stackoverflow = get_the_author_meta('stackoverflow', $post->post_author);

			// Get author's Steam
			$user_steam = get_the_author_meta('steam', $post->post_author);

			// Get author's Telegram
			$user_telegram = get_the_author_meta('telegram', $post->post_author);

			// Get author's Trello
			$user_trello = get_the_author_meta('trello', $post->post_author);

			// Get author's Tumblr
			$user_tumblr = get_the_author_meta('tumblr', $post->post_author);
			
			// Get author's Twitter
			$user_twitter = get_the_author_meta('twitter', $post->post_author);
			
			// Get author's Twitch
			$user_twitch = get_the_author_meta('twitch', $post->post_author);

			// Get author's Vimeo
			$user_vimeo = get_the_author_meta('vimeo', $post->post_author);

			// Get author's Whatsapp
			$user_whatsapp = get_the_author_meta('whatsapp', $post->post_author);

			// Get author's WordPress
			$user_wordpress = get_the_author_meta('wordpress', $post->post_author);
				
			// Get author's Xing
			$user_xing = get_the_author_meta('xing', $post->post_author);

			// Get author's Youtube
			$user_youtube = get_the_author_meta('youtube', $post->post_author);
			
			// Get author's Google+
			// $user_googleplus = get_the_author_meta('googleplus', $post->post_author);
		
			// Get link to the author archive page
			$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
			if ( ! empty( $display_name ) )
				$author_details = '<div class="col-3 center author-frame"><p class="author_name">អត្ថបទដោយ ' . $display_name . '</p>';
		
			// Author avatar - - the number 120 is the px size of the image.
			$author_details .= '<a class="shine author_image" href="' . $user_posts . '"><figure>' . get_avatar( get_the_author_meta('ID') , 100 ) . '</figure></a>';
			// Check if author has a website in their profile
			if ( ! empty( $user_website ) ) {
				// Display author website link
				$author_details .= '<a href="' . $user_website .'" target="_blank" rel="nofollow" >គេហទំព័រ</a></div>';
			} else { 
				// if there is no author website link then just close the paragraph
				$author_details .= '</div>';
			}
			$author_details .= '<div class="col-9"><p class="author_bio">' . get_the_author_meta( 'description' ). '</p>';
			$author_details .= '<p class="author_links"><a href="'. $user_posts .'">មើលអត្ថបទដ៏ទៃទៀតរបស់ ' . $display_name . '</a></p></div>'; 
		
			// Display
			
			// Fontawesome icons: https://fontawesome.io/icons/
			
			// Display author Email link
			$author_details .= '<div class="col-12 social-bar"><div class="hr"></div></div><div class="social-btns col-12"> <a href="mailto:' . $user_email .'" target="_blank" rel="nofollow" title="E-mail" class="btn mail"><i class="fas fa-envelope"></i> </a>';

			// Check if author has 500px in their profile
			if ( ! empty( $user_500px ) ) {
				// Display author 500px link
				$author_details .= ' <a href="' . $user_500px .'" target="_blank" rel="nofollow" title="500px" class="btn f-500px"><i class="fab fa-500px"></i> </a>';
			} else { 
				// if there is no author 500px link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has ArtsSation in their profile
			if ( ! empty( $user_artstation ) ) {
				// Display author ArtsSation link
				$author_details .= ' <a href="' . $user_artstation .'" target="_blank" rel="nofollow" title="ArtsSation" class="btn f-artstation"><i class="fab fa-artstation"></i> </a>';
			} else { 
				// if there is no author ArtsSation link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Behance in their profile
			if ( ! empty( $user_behance ) ) {
				// Display author Behance link
				$author_details .= ' <a href="' . $user_behance .'" target="_blank" rel="nofollow" title="Behance" class="btn behance"><i class="fab fa-behance"></i> </a>';
			} else { 
				// if there is no author Behance link then just close the paragraph
				// $author_details .= '</p>';
			}
			
			// Check if author has Bitbucket in their profile
			if ( ! empty( $user_bitbucket ) ) {
				// Display author Bitbucket link
				$author_details .= ' <a href="' . $user_bitbucket .'" target="_blank" rel="nofollow" title="Bitbucket" class="btn bitbucket"><i class="fab fa-bitbucket"></i> </a>';
			} else { 
				// if there is no author Bitbucket link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has CodePen in their profile
			if ( ! empty( $user_codepen ) ) {
				// Display author CodePen link
				$author_details .= ' <a href="' . $user_codepen .'" target="_blank" rel="nofollow" title="CodePen" class="btn codepen"><i class="fab fa-codepen"></i> </a>';
			} else { 
				// if there is no author CodePen link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Deviantart in their profile
			if ( ! empty( $user_deviantart ) ) {
				// Display author Deviantart link
				$author_details .= ' <a href="' . $user_deviantart .'" target="_blank" rel="nofollow" title="Deviantart" class="btn deviantart"><i class="fab fa-deviantart"></i> </a>';
			} else { 
				// if there is no author Deviantart link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Discord in their profile
			if ( ! empty( $user_discord ) ) {
				// Display author Discord link
				$author_details .= ' <a href="' . $user_discord .'" target="_blank" rel="nofollow" title="Discord" class="btn discord"><i class="fab fa-discord"></i> </a>';
			} else { 
				// if there is no author Discord link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Docker in their profile
			if ( ! empty( $user_docker ) ) {
				// Display author Docker link
				$author_details .= ' <a href="' . $user_docker .'" target="_blank" rel="nofollow" title="Docker" class="btn docker"><i class="fab fa-docker"></i> </a>';
			} else { 
				// if there is no author Docker link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Dribbble in their profile
			if ( ! empty( $user_dribbble ) ) {
				// Display author Dribbble link
				$author_details .= ' <a href="' . $user_dribbble .'" target="_blank" rel="nofollow" title="Dribbble" class="btn dribbble"><i class="fab fa-dribbble"></i> </a>';
			} else { 
				// if there is no author Dribbble link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has ebay in their profile
			if ( ! empty( $user_ebay ) ) {
				// Display author ebay link
				$author_details .= ' <a href="' . $user_ebay .'" target="_blank" rel="nofollow" title="ebay" class="btn ebay"><i class="fab fa-ebay"></i> </a>';
			} else { 
				// if there is no author ebay link then just close the paragraph
				// $author_details .= '</p>';
			}
			
			// Check if author has Facebook in their profile
			if ( ! empty( $user_facebook ) ) {
				// Display author Facebook link
				$author_details .= ' <a href="' . $user_facebook .'" target="_blank" rel="nofollow" title="Facebook" class="btn facebook"><i class="fab fa-facebook-f"></i> </a>';
			} else { 
				// if there is no author Facebook link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Flickr in their profile
			if ( ! empty( $user_flickr ) ) {
				// Display author Flickr link
				$author_details .= ' <a href="' . $user_flickr .'" target="_blank" rel="nofollow" title="Flickr" class="btn flickr"><i class="fab fa-flickr"></i> </a>';
			} else { 
				// if there is no author Flickr link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Flipboard in their profile
			if ( ! empty( $user_flipboard ) ) {
				// Display author Flipboard link
				$author_details .= ' <a href="' . $user_flipboard .'" target="_blank" rel="nofollow" title="Flipboard" class="btn flipboard"><i class="fab fa-flipboard"></i> </a>';
			} else { 
				// if there is no author Flipboard link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Getpocket in their profile
			if ( ! empty( $user_getpocket ) ) {
				// Display author Getpocket link
				$author_details .= ' <a href="' . $user_getpocket .'" target="_blank" rel="nofollow" title="Getpocket" class="btn getpocket"><i class="fab fa-get-pocket"></i> </a>';
			} else { 
				// if there is no author Getpocket link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Github in their profile
			if ( ! empty( $user_github ) ) {
				// Display author Github link
				$author_details .= ' <a href="' . $user_github .'" target="_blank" rel="nofollow" title="Github" class="btn github"><i class="fab fa-github"></i> </a>';
			} else { 
				// if there is no author Github link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Gitlab in their profile
			if ( ! empty( $user_gitlab ) ) {
				// Display author Gitlab link
				$author_details .= ' <a href="' . $user_gitlab .'" target="_blank" rel="nofollow" title="Gitlab" class="btn gitlab"><i class="fab fa-gitlab"></i> </a>';
			} else { 
				// if there is no author Gitlab link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Instagram in their profile
			if ( ! empty( $user_instagram ) ) {
				// Display author Instagram link
				$author_details .= ' <a href="' . $user_instagram .'" target="_blank" rel="nofollow" title="Instagram" class="btn instagram"><i class="fab fa-instagram"></i> </a>';
			} else { 
				// if there is no author Instagram link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has jsfiddle in their profile
			if ( ! empty( $user_jsfiddle ) ) {
				// Display author jsfiddle link
				$author_details .= ' <a href="' . $user_jsfiddle .'" target="_blank" rel="nofollow" title="jsfiddle" class="btn jsfiddle"><i class="fab fa-jsfiddle"></i> </a>';
			} else { 
				// if there is no author jsfiddle link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has KICKSTARTER in their profile
			if ( ! empty( $user_kickstarter ) ) {
				// Display author KICKSTARTER link
				$author_details .= ' <a href="' . $user_kickstarter .'" target="_blank" rel="nofollow" title="KICKSTARTER" class="btn kickstarter"><i class="fab fa-kickstarter-k"></i> </a>';
			} else { 
				// if there is no author KICKSTARTER link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has LinkedIn in their profile
			if ( ! empty( $user_linkedin ) ) {
				// Display author LinkedIn link
				$author_details .= ' <a href="' . $user_linkedin .'" target="_blank" rel="nofollow" title="LinkedIn" class="btn linkedin"><i class="fab fa-linkedin-in"></i> </a>';
			} else { 
				// if there is no author LinkedIn link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Medium in their profile
			if ( ! empty( $user_medium ) ) {
				// Display author Medium link
				$author_details .= ' <a href="' . $user_medium .'" target="_blank" rel="nofollow" title="Medium" class="btn medium"><i class="fab fa-medium-m"></i> </a>';
			} else { 
				// if there is no author Medium link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Messenger in their profile
			if ( ! empty( $user_messenger ) ) {
				// Display author Messenger link
				$author_details .= ' <a href="' . $user_messenger .'" target="_blank" rel="nofollow" title="Messenger" class="btn messenger"><i class="fab fa-facebook-messenger"></i> </a>';
			} else { 
				// if there is no author Messenger link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Microsoft in their profile
			if ( ! empty( $user_mix ) ) {
				// Display author Microsoft link
				$author_details .= ' <a href="' . $user_microsoft .'" target="_blank" rel="nofollow" title="Microsoft" class="btn microsoft"><i class="fab fa-microsoft"></i> </a>';
			} else { 
				// if there is no author Microsoft link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Mix in their profile
			if ( ! empty( $user_mix ) ) {
				// Display author Mix link
				$author_details .= ' <a href="' . $user_mix .'" target="_blank" rel="nofollow" title="Mix" class="btn mix"><i class="fab fa-mix"></i> </a>';
			} else { 
				// if there is no author Mix link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Periscope in their profile
			if ( ! empty( $user_periscope ) ) {
				// Display author Periscope link
				$author_details .= ' <a href="' . $user_periscope .'" target="_blank" rel="nofollow" title="Periscope" class="btn periscope"><i class="fab fa-periscope"></i> </a>';
			} else { 
				// if there is no author Periscope link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Pinterest in their profile
			if ( ! empty( $user_pinterest ) ) {
				// Display author Pinterest link
				$author_details .= ' <a href="' . $user_pinterest .'" target="_blank" rel="nofollow" title="Pinterest" class="btn pinterest"><i class="fab fa-pinterest"></i> </a>';
			} else { 
				// if there is no author Pinterest link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has reddit in their profile
			if ( ! empty( $user_reddit ) ) {
				// Display author reddit link
				$author_details .= ' <a href="' . $user_reddit .'" target="_blank" rel="nofollow" title="reddit" class="btn reddit"><i class="fab fa-reddit-alien"></i> </a>';
			} else { 
				// if there is no author reddit link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Sketchfab in their profile
			if ( ! empty( $user_sketchfab ) ) {
				// Display author Sketchfab link
				$author_details .= ' <a href="' . $user_sketchfab .'" target="_blank" rel="nofollow" title="Sketchfab" class="btn sketchfab"><i class="fas fa-dice-d6"></i> </a>';
			} else { 
				// if there is no author Sketchfab link then just close the paragraph
				// $author_details .= '</p>';
			}
		
			// Check if author has Skype in their profile
			if ( ! empty( $user_skype ) ) {
				// Display author Skype link
				$author_details .= ' <a href="' . $user_skype .'" target="_blank" rel="nofollow" title="Username paaljoachim Skype" class="btn skype"><i class="fab fa-skype"></i> </a>';
			} else { 
				// if there is no author Skype link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Slack in their profile
			if ( ! empty( $user_slack ) ) {
				// Display author Slack link
				$author_details .= ' <a href="' . $user_slack .'" target="_blank" rel="nofollow" title="Slack" class="btn slack"><i class="fab fa-slack"></i> </a>';
			} else { 
				// if there is no author Slack link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Spotify in their profile
			if ( ! empty( $user_spotify ) ) {
				// Display author Spotify link
				$author_details .= ' <a href="' . $user_spotify .'" target="_blank" rel="nofollow" title="Spotify" class="btn spotify"><i class="fab fa-spotify"></i> </a>';
			} else { 
				// if there is no author Spotify link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has SoundCloud in their profile
			if ( ! empty( $user_soundcloud ) ) {
				// Display author SoundCloud link
				$author_details .= ' <a href="' . $user_soundcloud .'" target="_blank" rel="nofollow" title="SoundCloud" class="btn soundcloud"><i class="fab fa-soundcloud"></i> </a>';
			} else { 
				// if there is no author SoundCloud link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Stack Overflow in their profile
			if ( ! empty( $user_facebook ) ) {
				// Display author Stack Overflow link
				$author_details .= ' <a href="' . $user_stackoverflow .'" target="_blank" rel="nofollow" title="Stack Overflow" class="btn stackoverflow"><i class="fab fa-stack-overflow"></i> </a>';
			} else { 
				// if there is no author Stack Overflow link then just close the paragraph
				$author_details .= '</p>';
			}

			// Check if author has Steam in their profile
			if ( ! empty( $user_steam ) ) {
				// Display author Steam link
				$author_details .= ' <a href="' . $user_steam .'" target="_blank" rel="nofollow" title="Steam" class="btn steam"><i class="fab fa-steam"></i> </a>';
			} else { 
				// if there is no author Steam link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Telegram in their profile
			if ( ! empty( $user_telegram ) ) {
				// Display author Telegram link
				$author_details .= ' <a href="' . $user_telegram .'" target="_blank" rel="nofollow" title="Telegram" class="btn telegram"><i class="fab fa-telegram-plane"></i> </a>';
			} else { 
				// if there is no author Telegram link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Trello in their profile
			if ( ! empty( $user_trello ) ) {
				// Display author Trello link
				$author_details .= ' <a href="' . $user_trello .'" target="_blank" rel="nofollow" title="Trello" class="btn trello"><i class="fab fa-trello"></i> </a>';
			} else { 
				// if there is no author Trello link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Tumblr in their profile
			if ( ! empty( $user_tumblr ) ) {
				// Display author Tumblr link
				$author_details .= ' <a href="' . $user_tumblr .'" target="_blank" rel="nofollow" title="Tumblr" class="btn tumblr"><i class="fab fa-tumblr"></i> </a>';
			} else { 
				// if there is no author Tumblr link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Twitch in their profile
			if ( ! empty( $user_twitch ) ) {
				// Display author Twitch link
				$author_details .= ' <a href="' . $user_twitch .'" target="_blank" rel="nofollow" title="Twitch" class="btn twitch"><i class="fab fa-twitch"></i> </a>';
			} else { 
				// if there is no author Twitch link then just close the paragraph
				// $author_details .= '</p>';
			}
		
			// Check if author has Twitter in their profile
			if ( ! empty( $user_twitter ) ) {
				// Display author Twitter link
				$author_details .= ' <a href="' . $user_twitter .'" target="_blank" rel="nofollow" title="Twitter" class="btn twitter"><i class="fab fa-twitter"></i> </a>';
			} else { 
				// if there is no author Twitter link then just close the paragraph
				// $author_details .= '</p>';
			}

			// Check if author has Vimeo in their profile
			if ( ! empty( $user_vimeo ) ) {
				// Display author Vimeo link
				$author_details .= ' <a href="' . $user_vimeo .'" target="_blank" rel="nofollow" title="Vimeo" class="btn vimeo"><i class="fab fa-vimeo-v"></i> </a>';
			} else { 
				// if there is no author Vimeo link then just close the paragraph
				$author_details .= '</p>';
			}

			// Check if author has Whatsapp in their profile
			if ( ! empty( $user_whatsapp ) ) {
				// Display author Whatsapp link
				$author_details .= ' <a href="' . $user_whatsapp .'" target="_blank" rel="nofollow" title="Whatsapp" class="btn whatsapp"><i class="fab fa-whatsapp"></i> </a>';
			} else { 
				// if there is no author Whatsapp link then just close the paragraph
				$author_details .= '</p>';
			}

			// Check if author has Wordpress in their profile
			if ( ! empty( $user_wordpress ) ) {
				// Display author Wordpress link
				$author_details .= ' <a href="' . $user_wordpress .'" target="_blank" rel="nofollow" title="Wordpress" class="btn wordpress"><i class="fab fa-wordpress-simple"></i> </a>';
			} else { 
				// if there is no author Wordpress link then just close the paragraph
				$author_details .= '</p>';
			}

			// Check if author has Xing in their profile
			if ( ! empty( $user_xing ) ) {
				// Display author Xing link
				$author_details .= ' <a href="' . $user_xing .'" target="_blank" rel="nofollow" title="Xing" class="btn xing"><i class="fab fa-xing"></i> </a>';
			} else { 
				// if there is no author Xing link then just close the paragraph
				$author_details .= '</p>';
			}
		
			// Check if author has Youtube in their profile
			if ( ! empty( $user_youtube ) ) {
				// Display author Youtube link
				$author_details .= ' <a href="' . $user_youtube .'" target="_blank" rel="nofollow" title="Youtube" class="btn youtube"><i class="fab fa-youtube"></i> </a>';
			} else { 
				// if there is no author Youtube link then just close the paragraph
				// $author_details .= '</p>';
			}
		
			// Pass all this info to post content 
			$content = $content . '<footer class="author_bio_section row no-margin" >' . $author_details . '</div></footer>';
		}
		return $content;
	}
	
	// Add our function to the post content filter 
	// add_filter('the_content', 'author_info_box');
	
	// Allow HTML in author bio section 
	remove_filter('pre_user_description', 'wp_filter_kses');

	if ( ! function_exists( 'themonic_content_nav' ) ) :
		/**
		 * Displays navigation to next/previous pages when applicable.
		 *
		 * @since Iconic One 1.0
		 */
		function themonic_content_nav( $html_id ) {
			global $wp_query;
		
			$html_id = esc_attr( $html_id );
		
			if ( $wp_query->max_num_pages > 1 ) : ?>
				<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
					<div class="assistive-text"><?php _e( 'Post navigation', 'iconic-one' ); ?></div>
					<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'iconic-one' ) ); ?></div>
					<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'iconic-one' ) ); ?></div>
				</nav><!-- #<?php echo $html_id; ?> .navigation -->
			<?php endif;
		}
	endif;	

	/* ------------------------------------------------------------------*/
	/* PAGINATION */
	/* ------------------------------------------------------------------*/

	//Call this function this where the pagination must appear

	function generate_pagination() {
		global $wp_query;
		$total = $wp_query->max_num_pages;
		// only bother with the rest if we have more than 1 page!
		if ( $total > 1 )  {
			// get the current page
			if ( !$current_page = get_query_var('paged') )
				$current_page = 1;
			// structure of "format" depends on whether we're using pretty permalinks
			if( get_option('permalink_structure') ) {
				$format = '&paged=%#%';
			} else {
				$format = 'page/%#%/';
			}
			echo paginate_links(array(
				'base'     => get_pagenum_link(1) . '%_%',
				'format'   => $format,
				'current'  => $current_page,
				'total'    => $total,
				'mid_size' => 4,
				'type'     => 'list'
			));
		}
	}



	// Numeric Page Navi
	function page_navi($before = '', $after = '') {
		global $wpdb, $wp_query;
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		if ( $numposts <= $posts_per_page ) { return; }
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = 7;
		$pages_to_show_minus_1 = $pages_to_show-1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
			
		echo $before.'<nav class="pagination"><ul class="clearfix">'."";
		if ($paged > 1) {
			$first_page_text = "«";
			echo '<li class="prev"><a href="'.get_pagenum_link().'" title="First">'.$first_page_text.'</a></li>';
		}
			
		$prevposts = get_previous_posts_link('← Previous');
		if($prevposts) { echo '<li>' . $prevposts  . '</li>'; }
		else { echo '<li class="disabled"><a href="#">← Previous</a></li>'; }
		
		for($i = $start_page; $i  <= $end_page; $i++) {
			if($i == $paged) {
				echo '<li class="active"><a href="#">'.$i.'</a></li>';
			} else {
				echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
			}
		}
		echo '<li class="">';
		next_posts_link('Next →');
		echo '</li>';
		if ($end_page < $max_page) {
			$last_page_text = "»";
			echo '<li class="next"><a href="'.get_pagenum_link($max_page).'" title="Last">'.$last_page_text.'</a></li>';
		}
		echo '</ul></nav>'.$after."";
	}

	/* ------------------------------------------------------------------*/
	/* PAGINATION */
	/* ------------------------------------------------------------------*/

	//Call this function this where the pagination must appear
	// Numeric Page Navi
	function get_pagination( \WP_Query $wp_query = null, $echo = true ) {
		if ( null === $wp_query ) {
			global $wp_query;
		}
		$pages = paginate_links( [
				'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'format'       => '?paged=%#%',
				'current'      => max( 1, get_query_var( 'paged' ) ),
				'total'        => $wp_query->max_num_pages,
				'type'         => 'array',
				'show_all'     => false,
				'end_size'     => 5,
				'mid_size'     => 2,
				'prev_next'    => true,
				'prev_text'    => __( '<i class="fas fa-angle-double-left"></i> ទំព័រក្រោយ' ),
				'next_text'    => __( 'ទំព័របន្ទាប់ <i class="fas fa-angle-double-right"></i>' ),
				'add_args'     => false,
				'add_fragment' => ''
			]
		);
		if ( is_array( $pages ) ) {
			//$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
			$pagination = '<nav class="navigation"><ul class="pagination justify-content-center">';
			foreach ($pages as $page) {
							$pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
					}
			$pagination .= '</ul></nav>';
			if ( $echo ) {
				echo $pagination;
			} else {
				return $pagination;
			}
		}
		return null;
	}	


	/* ------------------------------------------------------------------*/
	/* Widhet Menu */
	/* ------------------------------------------------------------------*/

	//Call this function this where the widget must appear
	// Widget Menu

	function mop_widgets_init() {

		register_sidebar( array(
			'name' => __( 'Calendar', 'mop' ),
			'id' => 'calendar-sidebar',
			'description' => __( 'The calendar sidebar appears on the right on each page', 'mop' ),
			'before_widget' => '<div class="card panel-default border-left border-right widget %2$s">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="card-header"><h3 class="card-title no-margin ico-badge"><i class="ico far fa-calendar-alt"></i>',
			'after_title' => '</h3></div><div class="card-body">',
		) );

		register_sidebar( array(
			'name' => __( 'Facebook', 'mop' ),
			'id' => 'facebook-sidebar',
			'description' => __( 'The Facebook sidebar appears on the right on each page', 'mop' ),
			'before_widget' => '<div class="card panel-default border-left border-right widget %2$s">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="card-header"><h3 class="card-title no-margin ico-badge"><i class="ico fab fa-facebook"></i>',
			'after_title' => '</h3></div><div class="card-body"><div class="space-3"></div>',
		) );

		register_sidebar( array(
			'name' => __( 'Login', 'mop' ),
			'id' => 'login-sidebar',
			'description' => __( 'The login sidebar appears on the right on each page', 'mop' ),
			'before_widget' => '<div class="card panel-default border-left border-right widget %2$s">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="card-header"><h3 class="card-title no-margin ico-badge"><i class="fas fa-sign-in-alt"></i></i>',
			'after_title' => '</h3></div><div class="card-body"><div class="space-3"></div>',
		) );

		register_sidebar( array(
			'name' => __( 'Social', 'mop' ),
			'id' => 'social-sidebar',
			'description' => __( 'The social sidebar appears on the right on each page', 'mop' ),
			'before_widget' => '<div class="card panel-default border-left border-right widget %2$s">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="card-header"><h3 class="card-title no-margin ico-badge"><i class="ico fas fa-globe"></i>',
			'after_title' => '</h3></div><div class="card-body">',
		) );
	
		register_sidebar( array(
			'name' => __( 'Main Sidebar', 'mop' ),
			'id' => 'sidebar-1',
			'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'mop' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	
		register_sidebar( array(
			'name' =>__( 'Front page sidebar', 'wpb'),
			'id' => 'sidebar-2',
			'description' => __( 'Appears on the static front page template', 'wpb' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		}
	
	add_action( 'widgets_init', 'mop_widgets_init' );


	// add_filter('get_previous_posts_link', 'post_link_attributes');
	// add_filter('get_next_posts_link', 'post_link_attributes');

	// function post_link_attributes($output) {
	// 	$code = 'class="link-item"';
	// 	return str_replace('<a href=', '<a '.$code.' href=', $output);
	// }

	function getPagination() {
		

		// <nav aria-label="Page navigation">
		// 	<ul class="pagination justify-content-center">
		// 		<li class="page-item disabled">
		// 		<a class="page-link" href="#" tabindex="-1">Previous</a>
		// 		</li>
		// 		<li class="page-item"><a class="page-link" href="#">1</a></li>
		// 		<li class="page-item"><a class="page-link" href="#">2</a></li>
		// 		<li class="page-item"><a class="page-link" href="#">3</a></li>
		// 		<li class="page-item">
		// 		<a class="page-link" href="#">Next</a>
		// 		</li>
		// 	</ul>
		// </nav>

		$prev_post = get_previous_post();
		// if (!empty( $prev_post ))

			//  <div class="nav-previous alignleft">
			// 	<a href="echo get_permalink( $prev_post->ID ); ">« Previous</a>
			

		$next_post = get_next_post();
		// if ( is_a( $next_post , 'WP_Post' ) ) {

			//  <div class="nav-next alignright">
			// 	<a href="<?php get_permalink( $next_post->ID );">Next »</a>


		if( is_singular() )
			return;
		global $wp_query;
		/** Stop execution if there's only 1 page */
		if( $wp_query->max_num_pages <= 1 )
			return;
		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );
		/** Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;
		/** Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}
		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
		echo '<div class="navigation"><ul>' . "\n";
		// echo '<nav aria-label="Page navigation">' . "\n";
		/** Previous Post Link */
		if ( get_previous_posts_link() )
			printf( '<li class="page-item">%s</li>' . "\n", get_previous_posts_link('ទំព័រក្រោយ') );
		/** Link to first page, plus ellipses if necessary */
		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="page-item active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
			if ( ! in_array( 2, $links ) )
				echo '<li>…</li>';
		}
		/** Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="page-item active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}
		/** Link to last page, plus ellipses if necessary */
		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) )
				echo '<li>…</li>' . "\n";
			$class = $paged == $max ? ' class="page-item active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}
		/** Next Post Link */
		if ( get_next_posts_link() )
			printf( '<li>%s</li>' . "\n", get_next_posts_link('ទំព័របន្ទាប់') );
		echo '</ul></div>' . "\n";
	}


	/* Set up Social Menu Location */
	
	function register_my_menu() {
		register_nav_menu('social',__('Social Menu'));
	}
	add_action('init', 'register_my_menu');
	
	/** Add your Social Menu to genesis_header - you can use other hook locations as you wish **/
	
	add_action('genesis_header', 'twp_genesis_add_social', 10 );
	/**
	* Set up Custom Menu for Social Icons.
	*
	* @link https://thewebprincess.com/new-genesis-social-icon-menu/
	* @author The Web Princess
	*
	* @return null Return early if menu does not exist.
	*/
	
	function twp_genesis_add_social() {
		if (!has_nav_menu( 'social')) {
			return;
		}
		echo '<h4 class="social-title widgettitle widget-title">Connect</h4>';
		$nav_args = array(
				'theme_location' => 'social',
				'container' => 'div',
				'container_id' => 'menu-social',
				'container_class' => 'menu menu-social',
				'menu_id' => 'menu-social-items',
				'menu_class' => 'menu-items',
				'depth' => 1,
				'link_before' => '<span class="screen-reader-text">',
				'link_after' => '</span>',
				'fallback_cb' => '',
		);
		wp_nav_menu( $nav_args );
	}	

	/* Show Continue Reading */

	function get_continue($text, $link, $post, $limit) {
		$svg = 	$post > $limit ? '<a class="cta" href="' . $link . '">
					<span class="continues">' . $text . '</span> 
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
				</a>' : '';
		return $svg;
	}

	// Feature Post
	function mop_custom_meta() {
		add_meta_box('mop_meta', __('Featured Posts', 'mop-textdomain'), 'mop_meta_callback', 'post', 'side');
	}
	function mop_meta_callback($post) {
		$featured = get_post_meta($post->ID);
		echo '<p>
				<div class="sm-row-content">
					<label for="meta-checkbox">
						<input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes"';
						if(isset($featured['meta-checkbox'])) checked($featured['meta-checkbox'][0], 'yes') . '/>';
						// _e('Featured this post', 'mop-textdomain');
		echo 'Featured this post </label></div></p>';
	}
	add_action('add_meta_boxes', 'mop_custom_meta');

	/**
	 * Saves the custom meta input
	 */
	function mop_meta_save($post_id) {
		// Checks save status
		$is_autosave = wp_is_post_autosave($post_id);
		$is_revision = wp_is_post_revision($post_id);
		$is_valid_nonce = (isset($_POST['mop_nonce']) && wp_verify_nonce($_POST['mop_nonce'], basename(__FILE__))) ? 'true' : 'false';
	
		// Exits script depending on save status
		if ($is_autosave || $is_revision || !$is_valid_nonce ) {
			return;
		}
	
		// Checks for input and saves
		if(isset($_POST['meta-checkbox'])) {
			update_post_meta($post_id, 'meta-checkbox', 'yes');
		} else {
			update_post_meta($post_id,'meta-checkbox', '');
		}
	}
	add_action( 'save_post', 'mop_meta_save' );
	
	
/*
* Loads the MoP Customizer for live customization, to learn more visit Themonic.com
*/
require_once( get_template_directory() . '/inc/mop-customizer.php' );
require_once( get_template_directory() . '/inc/mop-options.php' );	
require_once( get_template_directory() . '/inc/extra-functions.php' );
