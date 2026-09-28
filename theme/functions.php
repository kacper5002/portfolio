<?php
/**
 * Theme assets and initial color preference.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kacper_portfolio_enqueue_assets() {
	wp_enqueue_style( 'kacper-portfolio', get_stylesheet_uri(), array(), filemtime( get_theme_file_path( '/style.css' ) ) );
	wp_enqueue_script( 'kacper-portfolio-theme-toggle', get_theme_file_uri( '/assets/js/theme-toggle.js' ), array(), filemtime( get_theme_file_path( '/assets/js/theme-toggle.js' ) ), true );
}
add_action( 'wp_enqueue_scripts', 'kacper_portfolio_enqueue_assets' );

function kacper_portfolio_initialize_color_theme() {
	?>
	<script id="portfolio-theme-init">
	(function () {
		var theme;
		try { theme = localStorage.getItem('portfolio-theme'); } catch (error) {}
		if (theme !== 'light' && theme !== 'dark') {
			theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
		}
		document.documentElement.dataset.theme = theme;
	}());
	</script>
	<?php
}
add_action( 'wp_head', 'kacper_portfolio_initialize_color_theme', 0 );

function kacper_portfolio_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'kacper_portfolio_editor_styles' );
