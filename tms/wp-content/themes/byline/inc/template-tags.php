<?php
/**
 * Custom template tags for Collect
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Byline
 * @since Byline 1.0
*/
function byline_single_pagination() {
		?>
		<div class="posts-navigation single-pagination" role="navigation">
		<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'byline' ); ?></h3>
		<?php
		$prev = get_previous_post();

		$prev_style = '';
		if ( $prev ) {
			$prev_title = $prev->post_title;
			$prev_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $prev->ID ), 'large' );
			$prev_style = ( $prev_featured_image ) ? ' style="background-image: url(' . esc_url( $prev_featured_image[0] ) . '); background-size: cover; background-position: center;"' : '';
			$prev_ex_con = ( $prev->post_excerpt ) ? $prev->post_excerpt : strip_shortcodes( $prev->post_content );
			$prev_text = wp_trim_words( apply_filters( 'the_excerpt', $prev_ex_con ), 15 );

		}
		?>
		<div class="nav-previous"<?php echo $prev_style; ?>>
			<?php if ( $prev ) { ?>
			<a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>">
				<span class="pagination-content">
					<i class="fa fa-chevron-left"></i>
					<span class="hide-mobile">
						<strong><?php echo $prev_title; ?></strong>
						<br />
						<?php echo $prev_text; ?>
						<br />
						<em><?php printf( __( '%1$s ago - by %2$s', 'byline' ), human_time_diff( get_the_time( 'U', $prev->ID ), current_time( 'timestamp' ) ), get_the_author_meta( 'display_name', $prev->post_author ) ); ?></em>
					</span>
					<span class="show-mobile">
						<strong><?php _e( 'Previous', 'byline' ); ?></strong>
					</span>
				</span>
			</a>
			<?php } ?>
		</div>

		<?php
		$next = get_next_post();
		$next_style = '';
		if ( $next ) {
			$next_title = $next->post_title;
			$next_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'large' );
			$next_style = ( $next_featured_image ) ? ' style="background-image: url(' . esc_url( $next_featured_image[0] ) . '); background-size: cover; background-position: center;"' : '';
			$next_ex_con = ( $next->post_excerpt ) ? $next->post_excerpt : strip_shortcodes( $next->post_content );
			$next_text = wp_trim_words( apply_filters( 'the_excerpt', $next_ex_con ), 15 );
		}
		?>
		<div class="nav-next"<?php echo $next_style; ?>>
			<?php if ( $next ) { ?>
			<a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>">
				<span class="pagination-content">
					<i class="fa fa-chevron-right"></i>
					<div class="hide-mobile">
						<strong><?php echo $next_title; ?></strong>
						<br />
						<?php echo $next_text; ?>
						<br />
						<em><?php printf( __( '%1$s ago - by %2$s', 'byline' ), human_time_diff( get_the_time( 'U', $next->ID ), current_time( 'timestamp' ) ), get_the_author_meta( 'display_name', $next->post_author ) ); ?></em>
					</div>
					<div class="show-mobile">
						<strong><?php _e( 'Next', 'byline' ); ?></strong>
					</div>
				</span>
			</a>
			<?php } ?>
		</div>
	</div><!-- #posts-pagination -->
	<?php
}

function byline_default_menu( $args ) {
	extract( $args );

	$output = wp_list_categories( array(
		'title_li' => '',
		'echo' => 0,
		'number' => 5,
		'depth' => 1,
	) );

	echo '<ul class="' . esc_attr( $menu_class ) . '">' . $output . '</ul>';
}

function byline_search_title() {
	global $wp_query;
    $num = $wp_query->found_posts;
	printf( __( '%1$s search results for "%2$s"', 'byline'),
	    absint( $wp_query->found_posts ),
	    get_search_query()
	);
}

function byline_word_count() {
	return sprintf(
		__( '%s words', 'byline' ),
		str_word_count( strip_tags( get_post_field( 'post_content', get_the_ID() ) ) )
	);
}

add_action( 'post_class', 'byline_post_class' );
function byline_post_class( $classes ) {
	if ( is_singular() || is_404() ) {
		$classes[] = 'big-header';
	}

	return $classes;
}

add_filter( 'excerpt_more', 'byline_excerpt_more' );
if ( ! function_exists( 'byline_excerpt_more' ) ) {
	function byline_excerpt_more( $more ) {
		$byline_default_theme_options = byline_default_theme_options();

		return '&hellip; <div><a class="more-link" href="' . esc_url( get_permalink() ) . '">' . byline_sanitize_text( get_theme_mod( 'read_more_text', $byline_default_theme_options['read_more_text'] ) ) . ' <span class="screen-reader-text">' . get_the_title() . '</span></a></div>';
	}
}

add_filter( 'the_content_more_link', 'byline_remove_more_link_scroll' );
if ( ! function_exists( 'byline_remove_more_link_scroll' ) ) {
	function byline_remove_more_link_scroll( $link ) {
		return preg_replace( '|#more-[0-9]+|', '', $link );
	}
}