<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Byline
 * @since Byline 1.0
 */
get_header(); ?>

    <section id="primary">
	    <?php
		if ( have_posts() ) : ?>
			<header id="archive-header" style="background-image: url(<?php echo esc_url( get_header_image() ); ?>)">
				<div class="header-meta">
					<div class="container">
						<h1 class="entry-title"><?php byline_search_title( $wp_query ); ?></h1>
					</div>
				</div>
			</header>

			<div class="container">
				<?php
				while ( have_posts() ) : the_post();

					$format = ( 'post' == get_post_type() ) ? '' : 'page';
					get_template_part( 'template-parts/content', $format );

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