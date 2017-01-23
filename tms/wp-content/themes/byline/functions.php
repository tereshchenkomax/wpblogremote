<?php
/**
 * Byline functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package Byline
 * @since Byline 1.0
 *
 * Namespace prefix byline_ = Byline Theme
 */

// Defining constants
$byline_theme_data = wp_get_theme( 'byline' );
define( 'BYLINE_THEME_URL', get_template_directory_uri() );
define( 'BYLINE_THEME_TEMPLATE', get_template_directory() );
define( 'BYLINE_THEME_VERSION', trim( $byline_theme_data->Version ) );
define( 'BYLINE_THEME_NAME', $byline_theme_data->Name );

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

foreach ( glob( BYLINE_THEME_TEMPLATE . '/inc/*' ) as $filename ) {
	include $filename;
}

add_action( 'after_setup_theme', 'byline_setup' );
if ( ! function_exists( 'byline_setup' ) ) {
	function byline_setup() {
		load_theme_textdomain( 'byline', BYLINE_THEME_TEMPLATE . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption'
		) );
		add_theme_support( 'custom-header', array(
			'header-text' => false,
			'flex-height' => true,
			'flex-width' => true,
			'random-default' => true,
			'width' => apply_filters( 'byline_header_image_width', 1500 ),
			'height' => apply_filters( 'byline_header_image_height', 600 ),
		) );
		add_theme_support( 'custom-logo' );

		register_default_headers( array(
			'header01' => array(
				'url' => '%s/images/header01.jpg',
				'thumbnail_url' => '%s/images/header01-thumbnail.jpg',
				'description' => __( 'Default Header 1', 'byline' )
			),
		) );

		add_editor_style( array( 'css/admin/editor-style.css', '/css/font-awesome.css', byline_fonts_url() ) );

		register_nav_menu( 'primary', __( 'Primary Menu', 'byline' ) );

		add_filter( 'use_default_gallery_style', '__return_false' );
	}
}

add_action( 'wp_enqueue_scripts', 'byline_enqueue' );
if ( ! function_exists( 'byline_enqueue' ) ) {
	function byline_enqueue() {
		wp_enqueue_script( 'jquery-mobile', BYLINE_THEME_URL .'/js/jquery.mobile.custom.js', array( 'jquery' ), '4.1.2', true );
		wp_enqueue_script( 'byline-script', BYLINE_THEME_URL .'/js/theme.js', array( 'jquery', 'jquery-mobile' ), '', true );

		wp_enqueue_style( 'byline-stylesheet', get_stylesheet_uri() );
		wp_enqueue_style( 'byline-google-fonts', byline_fonts_url() );
		wp_enqueue_style( 'font-awesome', BYLINE_THEME_URL .'/css/font-awesome.css', false, '4.4.0' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

if ( ! function_exists( 'byline_fonts_url' ) ) {
	function byline_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Roboto, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'byline' ) ) {
			$fonts[] = 'Roboto:300,400,400italic,500,700,700italic';
		}

		/*
		 * Translators: To add an additional character subset specific to your language,
		 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'byline' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'devanagari' == $subset ) {
			$subsets .= ',devanagari';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}

add_action( 'widgets_init', 'byline_widgets_init' );
if ( ! function_exists( 'byline_widgets_init' ) ) {
	function byline_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Sidebar', 'byline' ),
			'id' => 'sidebar',
			'description' => __( 'This section appears below the sidebar menu area.', 'byline' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
}