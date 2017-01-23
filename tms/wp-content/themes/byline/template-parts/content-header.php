<?php
/**
 * The template for displaying article headers
 *
 * @since 1.0.0
 */
$background_header_image = ( ( is_singular() ) && has_post_thumbnail( $post->ID ) ) ? 'style="background-image: url(' .  esc_url( wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) ) . ')"' : '';
$background_header_image = ( has_header_image() && empty( $background_header_image ) && ( is_singular() ) ) ? 'style="background-image: url(' .  esc_url( get_header_image() ) . ')"' : $background_header_image;
?>

	<header <?php echo $background_header_image; ?>>
		<?php if ( is_singular() ) { ?>
		<div class="header-meta">
			<div class="container">

				<?php if ( is_single() || is_page_template( 'page-templates/template-single.php' ) ) { ?>
					<div class="entry-category entry-meta">
						<?php the_category( ', ' ); ?>
					</div>
				<?php } ?>
		<?php } ?>

				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				endif;
				?>

				<div class="entry-meta">
					<?php if ( is_home() || is_archive() || is_search() ) { ?>
					<span class="vcard author show-tablet">
						<span class="fn">
							<?php printf( __( 'By %s', 'byline' ), '<strong><a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" title="' . esc_attr( sprintf( __( 'Posts by %s', 'byline' ), get_the_author() ) ) . '" rel="author">' . get_the_author() . '</a></strong>' ); ?>
						</span>
					</span>
					<?php } ?>

					<?php if ( ! is_page() || is_page_template( 'page-templates/template-single.php' ) ) { ?>
						<a href="<?php echo esc_url( get_permalink() ); ?>" class="time"><i class="fa fa-clock-o"></i> <time class="date published updated" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo get_the_date(); ?></time></a>
					<?php } ?>

					<?php if ( comments_open() ) { ?>
					<span class="comment-count"><i class="fa fa-comment"></i> <?php comments_popup_link( __( '0 Comments', 'byline' ), __( '1 Comment', 'byline' ), __( '% Comments', 'byline' ), '', '' ); ?></span>
					<?php } ?>
				</div>

				<?php if ( is_singular() ) { ?>
			</div>
		</div>
		<?php } ?>
	</header>

	<?php if ( is_singular() ) { ?>
		<div class="container">
				<?php } ?>