<?php
/**
 * The template for displaying pages
 *
 * @since 1.0.0
 */
$byline_default_theme_options = byline_default_theme_options();
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	    <?php get_template_part( 'template-parts/content', 'header' ); ?>

	    <div class="entry-content centered">
		    <?php
			if ( is_search() )
				the_excerpt();
			else
			    the_content( byline_sanitize_text( get_theme_mod( 'read_more_text', $byline_default_theme_options['read_more_text'] ) ) . ' <span class="screen-reader-text">' . get_the_title() . '</span>' );
			?>
	    </div><!-- .entry-content -->

	    <?php get_template_part( 'template-parts/content', 'footer' ); ?>

	</article><!-- #post-<?php the_ID(); ?> -->