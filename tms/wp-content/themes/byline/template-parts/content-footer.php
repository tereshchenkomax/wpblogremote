<?php
/**
 * The template for displaying article footers
 *
 * @since 1.0.0
 */
if ( is_singular() ) {
?>
		<footer>
		    <?php
			wp_link_pages( array(
				'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'byline' ) . '</span>',
				'after' => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>',
				'pagelink' => '<span class="screen-reader-text">' . __( 'Page', 'byline' ) . ' </span>%',
				'separator' => '<span class="screen-reader-text">, </span>',
			) );

			the_tags( '<p class="tags"><span> ' . __( 'Tags:', 'byline' ) . '</span>', ' ', '</p>' );
		    ?>
		</footer><!-- .entry -->

	</div>
<?php
}