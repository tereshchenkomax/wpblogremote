<?php
error_log(print_r(array(1,2,3,4), true));
error_log(print_r($wpdb->queries, true));
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Byline
 * @since Byline 1.0
 */
get_header(); ?>

	<div id="primary">
		<?php if ( have_posts() ) : ?>

			<header id="archive-header" style="background-image: url(<?php echo esc_url( get_header_image() ); ?>)">
				<div class="header-meta">
					<div class="container">
					</div>
				</div>
			</header><!-- #archive-header -->

			<div class="container">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content' );
				endwhile;
				?>

				<?php the_posts_navigation(); ?>

			</div>
			<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</div>

<?php get_footer(); ?>