<?php
/**
 * All of the custom premium plugin filters.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package Byline
 * @since Byline 1.0
 */
add_filter( 'abc_custom_color_defaults', 'byline_custom_color_defaults' );
if ( ! function_exists( 'byline_custom_color_defaults' ) ) {
	function byline_custom_color_defaults() {
		return array(
			'background_color' => '#2E3739',
			'page_background_color' => '#ffffff',
			'site_title_color' => '#ffffff',
			'site_description_color' => '#ffffff',
			'headers_color' => '#282828',
			'main_text_color' => '#282828',
			'post_title_color' => '#282828',
			'post_meta_color' => '#282828',
			'link_color' => '#141414',
			'link_hover_color' => '#000000',
		);
	}
}

add_filter( 'abc_fonts_manager_defaults', 'byline_fonts_manager_defaults' );
if ( ! function_exists( 'byline_fonts_manager_defaults' ) ) {
	function byline_fonts_manager_defaults() {
		return array(
			'site_title_font' => 'Roboto||"Roboto", sans-serif',
			'site_title_font_size' => '32',
			'site_description_font' => 'Roboto||"Roboto", sans-serif',
			'site_description_font_size' => '16',
			'main_text_font' => 'Roboto||"Roboto", sans-serif',
			'main_text_font_size' => '16',
			'headers_font' => 'Roboto||"Roboto", sans-serif',
			'post_title_font' => 'Roboto||"Roboto", sans-serif',
			'post_title_font_size' => '48',
			'post_meta_font' => 'Georgia, Times, "Times New Roman", serif',
			'post_meta_font_size' => '12',
		);
	}
}

add_filter( 'abc_fonts_manager_google_fonts_defaults', 'byline_fonts_manager_google_fonts_defaults' );
if ( ! function_exists( 'byline_fonts_manager_google_fonts_defaults' ) ) {
	function byline_fonts_manager_google_fonts_defaults() {
		return array (
			'Roboto' => array(
				'weight' => '300,400,400italic,500,700,700italic',
				'css' => '"Roboto", sans-serif',
			),
			'Open Sans' => array(
				'weight' => '400,400italic,700,700italic',
				'css' => '"Open Sans", sans-serif',
			),
		);
	}
}