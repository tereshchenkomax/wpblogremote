<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Byline
 * @since Byline 1.0
 */
get_header();
?>

	<div id="primary">
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'page' );

			comments_template( '', true );
		endwhile;
		?>
	</div>

<?php get_footer(); ?>