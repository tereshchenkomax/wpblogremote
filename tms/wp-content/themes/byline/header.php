<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main>
 *
 * @package Byline
 * @since Byline 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page">
		<header id="masthead" role="banner">
			<div class="container">
				<div class="site-meta">
					<?php
					if ( function_exists( 'the_custom_logo' ) )  {
						the_custom_logo();
					}
					?>

					<?php
					$tag = ( is_front_page() && is_home() ) ? 'h1' : 'div';
					// Requires ABC Premium Features plugin
					$hide_title_tagline = byline_sanitize_checkbox( get_theme_mod( 'abc_hide_title_tagline' ) );
					$class = ( $hide_title_tagline ) ? 'screen-reader-text' : '';
					?>
					<<?php echo $tag; ?> class="site-title <?php echo esc_attr( $class ); ?>">
						<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</<?php echo $tag; ?>>

					<div class="site-description <?php echo esc_attr( $class ); ?>"><?php bloginfo( 'description' ); ?></div>
				</div>

				<button type="button" class="offcanvas-toggle" data-toggle="offcanvas">
					<span class="screen-reader-text"><?php _e( 'Toggle sidebar', 'byline' ); ?></span>
					<i class="fa fa-bars"></i>
				</button>
			</div>
		</header>

		<main id="content" class="site-content">
			<a class="screen-reader-text" href="#primary" title="<?php esc_attr_e( 'Skip to content', 'byline' ); ?>"><?php _e( 'Skip to content', 'byline' ); ?></a>
