<?php
/**
 * The about admin page.
 *
 * @package Byline
 * @since Abacus 1.0
 */
class Byline_Documentation {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ), 1 );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	/**
	 * Add a 'Documentation' menu item to the Appearance panel
	 *
	 * This function is attached to the 'admin_menu' action hook.
	 *
	 * @since 1.0.0
	 */
	public function admin_menu() {
		add_theme_page( sprintf( __( 'Welcome to %1$s %2$s', 'byline' ), BYLINE_THEME_NAME, BYLINE_THEME_VERSION ), sprintf( __( '%s Theme Info', 'byline' ), BYLINE_THEME_NAME ), 'edit_theme_options', 'byline_documentation', array( $this, 'byline_documentation' ) );
	}

	public function admin_enqueue_scripts( $hook ) {
		if ( 'appearance_page_byline_documentation' == $hook ) {
		    wp_enqueue_style( 'byline-about', BYLINE_THEME_URL . '/css/admin/about.css' );
		}
	}

	public function byline_documentation() {
		$abc_url = 'https://alphabetthemes.com';
		?>
		<div class="wrap about-wrap" id="custom-background">
			<h1><?php echo get_admin_page_title(); ?></h1>

			<div class="about-text">
				<?php printf( __( 'Enjoy the flexible design and efficient codebase that %1$s provides. Be sure to %2$scheck out the demo%3$s to see some of the possibilities.', 'byline' ), BYLINE_THEME_NAME, '<a href="//demos.alphabetthemes.com/?theme=' . sanitize_title( BYLINE_THEME_NAME ) . '" target="_blank">', '</a>' ); ?>
			</div>

			<div class="theme-badge">
				<img src="<?php echo BYLINE_THEME_URL; ?>/images/monster-pointing-green.png" />
			</div>
			<hr />

			<div class="changelog point-releases">
				<h2><?php _e( 'Enhance Your Website', 'byline' ); ?></h2>
				<p><?php printf( __( 'Upgrading %s with the ABC Premium Features plugin will unlock the following options to help you improve your site&rsquo;s look and functionality.', 'byline' ), BYLINE_THEME_NAME ); ?></p>
			</div>

			<div class="feature-section two-col">
				<div class="col">
					<div class="media-container">
						<img src="<?php echo BYLINE_THEME_URL; ?>/images/custom-colors-plugin.jpg" />
						<h3 class="plugin-title"><?php _e( 'Custom Colors', 'byline' ); ?></h3>
					</div>
					<p><?php _e( 'Why settle on one color when you can choose from any color imaginable. With the Custom Color plugin, you have the ability to set different colors for text elements, page backgrounds and more.', 'byline' ); ?></p>
				</div>

				<div class="col">
					<div class="media-container">
						<img src="<?php echo BYLINE_THEME_URL; ?>/images/font-manager-plugin.jpg" />
						<h3 class="plugin-title"><?php _e( 'Fonts Manager', 'byline' ); ?></h3>
					</div>
					<p><?php _e( 'A font can say a lot about a site, so why not test out a few to see which one might work better. With our Font Manager plugin, you can easily pick from over 600 Google Fonts or even set up Typekit.', 'byline' ); ?></p>
				</div>

				<div class="col">
					<div class="media-container">
						<img src="<?php echo BYLINE_THEME_URL; ?>/images/extended-footer-plugin.jpg" />
						<h3 class="plugin-title"><?php _e( 'Custom Footer', 'byline' ); ?></h3>
					</div>
					<p><?php _e( 'Sometimes you need a little bit more space in your footer for widgets. With this plugin, you can add up to six columns above the footer and even customize the text in your footer notice.', 'byline' ); ?></p>
				</div>

				<div class="col">
					<div class="media-container">
						<img src="<?php echo BYLINE_THEME_URL; ?>/images/social-icons.jpg" />
						<h3 class="plugin-title"><?php _e( 'Social Icons', 'byline' ); ?></h3>
					</div>
					<p><?php _e( 'Being socially active online is a must for any business. That&rsquo;s why we created the ABC Social Icons premium plugin. Now you can direct any of your visitors to the social networks you use so they can stay up to date.', 'byline' ); ?></p>
				</div>
			</div>

			<div class="feature-section three-col" style="overflow:hidden;">
				<p class="want-more">
				<?php printf( __( 'Want more? Take a look at alphabetthemes.com to see what options are available when you upgrade. %1$sUpgrade now &rarr;%2$s', 'byline' ), '<a href="' . esc_url( $abc_url ) . '/downloads/abc-premium-features/" class="button button-primary" target="_blank">', '</a>' ); ?> </p>

				<div class="col">
					<div class="media-container">
						<img src="<?php echo BYLINE_THEME_URL; ?>/images/docs.jpg" />
					</div>

					<h4><?php _e( 'View Documentation', 'byline' ); ?></h4>
					<p><?php printf( __( 'You can read detailed information on how to use %s&rsquo;s features in our online documentation section.', 'byline' ), BYLINE_THEME_NAME ); ?></p>
					<p><a href="<?php echo esc_url( $abc_url ); ?>/documentation/" class="button" target="_blank"><?php _e( 'View documentation &rarr;', 'byline' ); ?></a></p>
				</div>

				<div class="col">
					<div class="media-container">
						<img src="<?php echo BYLINE_THEME_URL; ?>/images/free-plugins.jpg" />
					</div>

					<h4><?php _e( 'Install Free Plugins', 'byline' ); ?></h4>
					<p><?php printf( __( 'Check out some available free plugins that work with %s.', 'byline' ), BYLINE_THEME_NAME ); ?></p>
					<ul class="free-plugins">
						<li>
							<a href="https://wordpress.org/plugins/abc-responsive-videos/"><?php _e( 'ABC Responsive Videos', 'byline' ); ?></a>
						</li>
						<li>
							<a href="https://wordpress.org/plugins/jetpack/"><?php _e( 'Jetpack by WordPress.com', 'byline' ); ?></a>
						</li>
					</ul>
				</div>

				<div class="col">
					<h4 class="no-top"><?php _e( 'Need Support?', 'byline' ); ?></h4>
					<p><?php printf( __( 'If you&rsquo;ve purchased a license from Alphabet Themes, you can access our %1$ssupport form%2$s to ask any questions you might have about one of our themes or plugins.', 'byline' ), '<a href="' . esc_url( $abc_url ) . '/my-account/#tab_support" target="_blank">', '</a>' ); ?></p>

					<h4><?php printf( __( 'Are you enjoying %s?', 'byline' ), BYLINE_THEME_NAME ); ?></h4>
					<p><?php printf( __( 'Why not leave a review on %1$sWordPress.org%2$s? We&rsquo;d really appreciate it! %3$s', 'byline' ), '<a href="https://wordpress.org/support/theme/' . get_option( 'template' ) . '/reviews" target="_blank">', '</a>', convert_smilies( ';)' ) ); ?> </p>
				</div>
			</div>
			<?php
			// Action hook for ABC Premium Features license requirements
			do_action( 'byline_licenses' );
			?>
		</div>
		<?php
	}
}
$byline_documentation = new Byline_Documentation;