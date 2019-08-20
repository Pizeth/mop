<div class="media author-box">
    <div class="media-figure">
        <?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
    </div>
    <div class="media-body">
        <h2><?php the_author_posts_link(); ?></h2>
        <p><?php the_author_meta('description'); ?></p>
        <div class="author-icons">
            <a href="<?php the_author_meta('user_url'); ?>" class="author-website">
                <img src="/wp-content/uploads/icon-link.png" alt="Website" />
            </a>
            <a href="<?php the_author_meta('twitter'); ?>" class="author-twitter">
                <img src="/wp-content/uploads/icon-twitter.png" alt="Twitter" />
            </a>
            <a href="<?php the_author_meta('facebook'); ?>" class="author-facebook">
                <img src="/wp-content/uploads/icon-facebook.png" alt="Facebook" />
            </a>
        </div>
    </div>
</div>
<?php
// Get Author Data
$author             = get_the_author();
$author_description = get_the_author_meta( 'description' );
$author_url         = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
$author_avatar      = get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpex_author_bio_avatar_size', 75 ) );

// Only display if author has a description
if ( $author_description ) : ?>

    <div class="author-info clr">
        <h4 class="heading"><span><?php printf( esc_html__( 'Written by %s', 'text_domain' ), esc_html( $author ) ); ?></span></h4>
        <div class="author-info-inner clr">
            <?php if ( $author_avatar ) { ?>
                <div class="author-avatar clr">
                    <a href="<?php echo esc_url( $author_url ); ?>" rel="author">
                        <?php echo $author_avatar; ?>
                    </a>
                </div><!-- .author-avatar -->
            <?php } ?>
            <div class="author-description">
                <p><?php echo wp_kses_post( $author_description ); ?></p>
                <p><a href="<?php echo esc_url( $author_url ); ?>" title="<?php esc_html_e( 'View all author posts', 'text_domain' ); ?>"><?php esc_html_e( 'View all author posts', 'text_domain' ); ?> →</a></p>
            </div><!-- .author-description -->
        </div><!-- .author-info-inner -->
    </div><!-- .author-info -->

<?php endif; ?>

<?php if (get_the_author_meta('description')) : // Checking if the user has added any author descript or not. If it is added only, then lets move ahead ?>
    <div class="author-box">
        <div class="author-img"><?php echo get_avatar(get_the_author_meta('user_email'), '100'); // Display the author gravatar image with the size of 100 ?></div>
        <h3 class="author-name"><?php esc_html(the_author_meta('display_name')); // Displays the author name of the posts ?></h3>
        <p class="author-description"><?php esc_textarea(the_author_meta('description')); // Displays the author description added in Biographical Info ?></p>
    </div>
<?php endif; ?>