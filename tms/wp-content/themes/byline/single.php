<?php
/**
 * The template for displaying all posts.
 *
 * This is the template that displays all posts by default.
 *
 * @package Byline
 * @since Byline 1.0
 */
get_header();
?>

	<div id="primary">
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content' );

			byline_single_pagination();

			comments_template( '', true );
		endwhile;
		?>
	</div>

<?php get_footer(); ?>