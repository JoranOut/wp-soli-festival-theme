<?php
/**
 * Soli Festival Theme functions and definitions.
 *
 * @package Soli_Festival_Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme version constant.
 *
 * @since 1.0.0
 */
define( 'SOLI_FESTIVAL_THEME_VERSION', '1.0.0' );

/**
 * Theme setup.
 *
 * @since 1.0.0
 */
function soli_festival_theme_setup(): void {
	load_child_theme_textdomain(
		'soli-festival-theme',
		get_stylesheet_directory() . '/languages'
	);
}
add_action( 'after_setup_theme', 'soli_festival_theme_setup' );

/**
 * Enqueue child theme styles.
 *
 * @since 1.0.0
 */
function soli_festival_theme_enqueue_styles(): void {
	$css_file = get_stylesheet_directory() . '/assets/css/festival.css';
	wp_enqueue_style(
		'soli-festival-theme-style',
		get_stylesheet_directory_uri() . '/assets/css/festival.css',
		array(),
		filemtime( $css_file )
	);
}
add_action( 'wp_enqueue_scripts', 'soli_festival_theme_enqueue_styles' );

/**
 * Initialize GitHub theme updater.
 *
 * @since 1.0.0
 */
function soli_festival_theme_github_updater(): void {
	include_once get_stylesheet_directory() . '/updater.php';

	if ( class_exists( 'Soli\FestivalTheme\WP_GitHub_Theme_Updater' ) ) {
		$config = array(
			'slug'         => 'wp-soli-festival-theme',
			'api_url'      => 'https://api.github.com/repos/Muziekvereniging-Soli/wp-soli-festival-theme',
			'raw_url'      => 'https://raw.githubusercontent.com/Muziekvereniging-Soli/wp-soli-festival-theme/main',
			'github_url'   => 'https://github.com/Muziekvereniging-Soli/wp-soli-festival-theme',
			'zip_url'      => 'https://github.com/Muziekvereniging-Soli/wp-soli-festival-theme/releases/latest/download/wp-soli-festival-theme.zip',
			'requires'     => '6.7.0',
			'tested'       => '6.7.0',
			'requires_php' => '8.0',
			'readme'       => 'README.md',
		);

		new \Soli\FestivalTheme\WP_GitHub_Theme_Updater( $config );
	}
}
add_action( 'init', 'soli_festival_theme_github_updater' );
