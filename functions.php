<?php
/**
 * Wijhe Studio theme setup.
 *
 * @package WijheStudio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme assets, block styles and custom blocks.
 */
function wijhe_studio_setup(): void {
	add_theme_support( 'wp-block-styles' );
	add_editor_style( 'assets/css/editor.css' );

	register_block_style(
		'core/button',
		array(
			'name'  => 'ghost',
			'label' => __( 'Transparant', 'wijhe-studio' ),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'glass-card',
			'label' => __( 'Glazen kaart', 'wijhe-studio' ),
		)
	);
}
add_action( 'after_setup_theme', 'wijhe_studio_setup' );

/**
 * Enqueue small progressive-enhancement stylesheet for theme components.
 */
function wijhe_studio_enqueue_assets(): void {
	wp_enqueue_style(
		'wijhe-studio-theme',
		get_theme_file_uri( 'assets/css/theme.css' ),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'wijhe_studio_enqueue_assets' );
add_action( 'enqueue_block_editor_assets', 'wijhe_studio_enqueue_assets' );

/**
 * Register custom blocks bundled with the theme.
 */
function wijhe_studio_register_blocks(): void {
	register_block_type( __DIR__ . '/blocks/audience-tabs' );
}
add_action( 'init', 'wijhe_studio_register_blocks' );
