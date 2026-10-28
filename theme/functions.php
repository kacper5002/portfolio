<?php
/**
 * Theme assets and initial color preference.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/inc/home-hub.php';
require_once __DIR__ . '/inc/footer.php';
require_once __DIR__ . '/inc/about-age.php';

// The editorial layout is enabled by its content, not a language-specific URL.
function kacper_portfolio_is_about_story() {
	return is_page_template( 'about' ) && str_contains( get_post_field( 'post_content', get_queried_object_id() ), 'about-story' );
}

add_filter( 'body_class', function ( $classes ) {
	if ( kacper_portfolio_is_about_story() ) {
		$classes[] = 'portfolio-about';
	}
	return $classes;
} );

function kacper_portfolio_enqueue_assets() {
	wp_enqueue_style( 'kacper-portfolio', get_stylesheet_uri(), array(), filemtime( get_theme_file_path( '/style.css' ) ) );
	wp_enqueue_script( 'kacper-portfolio-theme-toggle', get_theme_file_uri( '/assets/js/theme-toggle.js' ), array(), filemtime( get_theme_file_path( '/assets/js/theme-toggle.js' ) ), true );
	if ( is_front_page() || kacper_portfolio_is_about_story() ) {
		wp_enqueue_style( 'kacper-portfolio-header', get_theme_file_uri( '/assets/css/header.css' ), array( 'kacper-portfolio' ), filemtime( get_theme_file_path( '/assets/css/header.css' ) ) );
		wp_enqueue_script( 'kacper-portfolio-header', get_theme_file_uri( '/assets/js/header.js' ), array(), filemtime( get_theme_file_path( '/assets/js/header.js' ) ), true );
	}
	if ( kacper_portfolio_is_about_story() ) {
		wp_enqueue_style( 'kacper-portfolio-about', get_theme_file_uri( '/assets/css/about.css' ), array( 'kacper-portfolio' ), filemtime( get_theme_file_path( '/assets/css/about.css' ) ) );
		wp_enqueue_script( 'kacper-portfolio-about', get_theme_file_uri( '/assets/js/about.js' ), array(), filemtime( get_theme_file_path( '/assets/js/about.js' ) ), true );
	}
	// Cross-document navigation only; these assets do not change subpage layouts.
	if ( is_front_page() || is_page_template( array( 'about', 'resume', 'contact' ) ) || is_post_type_archive( 'project' ) ) {
		wp_enqueue_style( 'kacper-portfolio-transitions', get_theme_file_uri( '/assets/css/page-transitions.css' ), array(), filemtime( get_theme_file_path( '/assets/css/page-transitions.css' ) ) );
		wp_enqueue_script( 'kacper-portfolio-transitions', get_theme_file_uri( '/assets/js/page-transitions.js' ), array(), filemtime( get_theme_file_path( '/assets/js/page-transitions.js' ) ), false );
		$home_urls = array( home_url( '/' ) );
		if ( function_exists( 'pll_home_url' ) ) {
			$home_urls = array_map( 'pll_home_url', array( 'de', 'en', 'pl' ) );
		}
		wp_localize_script( 'kacper-portfolio-transitions', 'portfolioHubNavigation', array( 'homeUrls' => $home_urls ) );
	}
	if ( is_front_page() ) {
		wp_enqueue_style( 'kacper-portfolio-home', get_theme_file_uri( '/assets/css/home.css' ), array( 'kacper-portfolio' ), filemtime( get_theme_file_path( '/assets/css/home.css' ) ) );
		wp_enqueue_script( 'kacper-portfolio-home', get_theme_file_uri( '/assets/js/home.js' ), array(), filemtime( get_theme_file_path( '/assets/js/home.js' ) ), true );
	}
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
	add_editor_style( 'assets/css/editor.css' );
	add_editor_style( 'assets/css/about.css' );
}
add_action( 'after_setup_theme', 'kacper_portfolio_editor_styles' );
