<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Byline
 * @since Byline 1.0
 */
get_header(); ?>

	<section id="primary">

		<?php if ( have_posts() ) : ?>

			<header id="archive-header" style="background-image: url(<?php echo esc_url( get_header_image() ); ?>)">
				<div class="header-meta">
					<div class="container">
						<?php
						the_archive_title( '<h1 class="archive-title">', '</h1>' );
						the_archive_description( '<div class="archive-meta hide-mobile">', '</div>' );
						?>
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

	</section><!-- #primary.c8 -->

<?php get_footer(); ?>