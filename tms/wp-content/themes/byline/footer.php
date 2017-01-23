<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the main and #page div elements.
 *
 * @package Byline
 * @since Byline 1.0
 */
// Requires ABC Premium Features plugin
$remove_credit = byline_sanitize_checkbox( get_theme_mod( 'abc_remove_credit' ) );
$class = ( $remove_credit ) ? 'screen-reader-text' : 'abc-credit';
?>
		</main><!-- main -->

		<footer id="footer" role="contentinfo">
			<div class="container">
				<?php do_action( 'byline_extended_footer' ); ?>

				<div class="copyright">
					<span id="abc-custom-copyright"><?php echo apply_filters( 'byline_footer_notice', sprintf( __( 'Copyright &copy; %1$s %2$s. All Rights Reserved.', 'byline' ), date_i18n( 'Y' ), ' <a href="' . home_url() . '">' . get_bloginfo( 'name' ) .'</a>' ) ); ?></span>
					<span id="abc-credit-link" class="<?php echo esc_attr( $class ); ?>">&nbsp;&vert;&nbsp;<?php printf( __( 'The %1$s Theme by %2$s.', 'byline' ), BYLINE_THEME_NAME, '<a href="https://alphabetthemes.com/downloads/byline-wordpress-theme">Alphabet Themes</a>' ); ?></span>
				</div>
			</div>
		</footer><!-- #footer -->
	</div><!-- #page -->

<?php get_sidebar(); ?>
<?php wp_footer(); ?>
</body>
</html>