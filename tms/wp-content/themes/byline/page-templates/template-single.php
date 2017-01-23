<?php
/**
 * Template Name: Single Home
 *
 * This template allows you to display one full post including comments on your
 * home page. Doesn't work too well with sticky posts so they are excluded.
 *
 * @package Byline
 * @since Byline 1.0
 */
get_header();
?>

	<div id="primary">
		<?php
		/**
		 * You can overwrite the following arguments in your child theme's functions.php by
		 * hooking into the 'byline_single_home_query' and returning a custom array.
		 *
		 * https://codex.wordpress.org/Function_Reference/add_filter
		 */
		$byline_single_home_query = new WP_Query( apply_filters( 'byline_single_home_query', array(
			'posts_per_page' => 1,
			'ignore_sticky_posts' => 1,
		) ) );

		while ( $byline_single_home_query->have_posts() ) : $byline_single_home_query->the_post();
			get_template_part( 'template-parts/content' );

			byline_single_pagination();

			comments_template( '', true );
		endwhile;

		wp_reset_postdata();
		?>
	</div>

<?php get_footer(); ?>