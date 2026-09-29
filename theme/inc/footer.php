<?php
/** Footer links appear only when their legal pages are published. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kacper_portfolio_register_legal_links() {
	wp_register_script( 'kacper-legal-links-editor', get_theme_file_uri( '/assets/js/legal-links-editor.js' ), array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-server-side-render' ), filemtime( __DIR__ . '/../assets/js/legal-links-editor.js' ), true );
	register_block_type( 'kacper-portfolio/legal-links', array(
		'api_version' => 3,
		'title' => 'Impressum / Datenschutz',
		'category' => 'widgets',
		'editor_script' => 'kacper-legal-links-editor',
		'render_callback' => 'kacper_portfolio_render_legal_links',
		'supports' => array( 'html' => false ),
	) );
}
add_action( 'init', 'kacper_portfolio_register_legal_links' );

function kacper_portfolio_render_legal_links() {
	$impressum = get_page_by_path( 'impressum', OBJECT, 'page' );
	$ids = array( $impressum ? $impressum->ID : 0, absint( get_option( 'wp_page_for_privacy_policy' ) ) );
	$lang = function_exists( 'pll_current_language' ) ? pll_current_language() : '';
	$links = array();
	foreach ( array_unique( $ids ) as $id ) {
		if ( ! $id || 'publish' !== get_post_status( $id ) || post_password_required( $id ) ) {
			continue;
		}
		$translated = $lang && function_exists( 'pll_get_post' ) ? pll_get_post( $id, $lang ) : 0;
		if ( $translated && 'publish' === get_post_status( $translated ) && ! post_password_required( $translated ) ) {
			$id = $translated;
		}
		$links[] = '<a href="' . esc_url( get_permalink( $id ) ) . '">' . esc_html( get_the_title( $id ) ) . '</a>';
	}
	return $links ? '<div ' . get_block_wrapper_attributes( array( 'class' => 'portfolio-footer__legal' ) ) . '>' . implode( ' ', $links ) . '</div>' : '';
}
