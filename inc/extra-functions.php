<?php
/**
 * MoP One Extra Functions
 */
function iconic_one_excerpts() { ?>
		<div class="entry-summary row">
			<!-- Ico nic One home page thumbnail with custom excerpt -->
			<div class="excerpt-thumb col-4 img-thumb">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'iconic-one' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
					<div class="wrapper">
						<div class="inner item flash">
							<figure class="imghvr-zoom-in">
								<?php 
									//if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { 
									the_post_thumbnail('post-thumbnail', array( 'class' => 'img-thumbnail' )); 
									// else {
									//	 echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />';
									// }
								?>
								<figcaption>
									<span class="badge badge-pill badge-danger big-badge">មើលលម្អិត</span>
								</figcaption>
							</figure>
						</div>
					</div>
				</a>
			</div>
			<div class="col-8 summary">
			<?php echo trim(wpex_get_excerpt ( $defaults = array(
				'length'          => 30,
				'readmore'        => true,
				'readmore_text'   => esc_html__( 'read more', 'wpex-boutique' ),
				'custom_excerpts' => true,
			) )); ?>
			</div>
		</div><!-- .entry-summary -->
		<?php }

?>