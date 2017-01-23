<?php
/**
 * The offcanvas right sidebar.
 *
 * @package Byline
 * @since Byline 1.0
 */
?>
	<div id="sidebar" role="complementary">
		<button class="offcanvas-toggle"></button>

		<?php if ( $user_id = absint( get_theme_mod( 'display_author_id' ) ) ) : ?>
			<aside class="widget display-author">
				<div class="textwidget">
					<p><?php echo get_avatar( $user_id, '180', '', '', array( 'class' => 'img-circle' ) ); ?></p>

					<h2><?php the_author_meta( 'display_name', $user_id ); ?></h2>

					<p><?php the_author_meta( 'description', $user_id ); ?></p>
				</div>
			</aside>
		<?php endif; ?>

		<?php
		// Requires ABC Premium Features plugin
		if ( function_exists( 'abc_social_icons_output' ) ) {
			abc_social_icons_output();
		}
		?>

		<nav class="main-navigation widget" role="navigation">
			<h3 class="screen-reader-text"><?php _e( 'Main menu', 'byline' ); ?></h3>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'fallback_cb' => 'byline_default_menu' ) ); ?>
		</nav>

		<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>
			<aside id="meta" class="widget">
				<h3 class="widget-title"><?php _e( 'Default Widget', 'byline' ); ?></h3>
				<p><?php printf( __( 'This is just a default widget. It&rsquo;ll disappear as soon as you add your own widgets on the %1$sWidgets admin page%2$s.', 'byline' ), '<a href="' . admin_url( 'widgets.php' ) . '">', '</a>' ); ?></p>

				<p><?php _e( 'Below is an example of an unordered list.', 'byline' ); ?></p>
				<ul>
					<li><?php _e( 'List item one', 'byline' ); ?></li>
					<li><?php _e( 'List item two', 'byline' ); ?></li>
					<li><?php _e( 'List item three', 'byline' ); ?></li>
					<li><?php _e( 'List item four', 'byline' ); ?></li>
				</ul>
			</aside>
		<?php endif; ?>
	</div><!-- #sidebar -->