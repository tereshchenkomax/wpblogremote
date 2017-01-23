<?php
/**
 * The default template for displaying content
 *
 * Used for both single and front-page/index/archive/search.
 *
 * @since 1.0.0
 */
$byline_default_theme_options = byline_default_theme_options();
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	    <?php get_template_part( 'template-parts/content', 'header' ); ?>

		<div class="row">
			<?php $class = ( is_home() || is_archive() || is_search() ) ? ' hide-tablet' : ''; ?>
			<div class="content-thin<?php echo esc_attr( $class ); ?>">
				<div class="vcard author">
					<strong><span class="fn"><span class="byline-text"><?php echo byline_sanitize_text( get_theme_mod( 'byline_text', $byline_default_theme_options['byline_text'] ) ); ?></span> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'Posts by %s', 'byline' ), get_the_author() ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></span></strong>
				</div>

				<?php printf( __( '%s ago', 'byline' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?>

				<?php if ( ! is_attachment() ) { ?>
				<p><?php echo byline_word_count(); ?></p>
				<?php } ?>

			    <?php edit_post_link( __( 'Edit', 'byline' ), '<p class="edit-link">', '</p>' ); ?>
			</div>

			<div class="content-wide">
			    <div class="entry-content">
				    <?php
					if ( is_singular() ) {
					    the_content( byline_sanitize_text( get_theme_mod( 'read_more_text', $byline_default_theme_options['read_more_text'] ) ) . ' <span class="screen-reader-text">' . get_the_title() . '</span>' );
					} else {
						the_post_thumbnail( 'large', array( 'class' => 'alignnone' ) );
						the_excerpt();
					}
					?>
			    </div><!-- .entry-content -->

				<?php get_template_part( 'template-parts/content', 'footer' ); ?>
			</div>
		</div>

	</article> <!-- #post-<?php the_ID(); ?> -->