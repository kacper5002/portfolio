<?php
/** Configure the existing project archive, preserving language constraints. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', function () {
	register_taxonomy( 'project_category', array( 'project' ), array(
		'labels' => array(
			'name' => __( 'Projektkategorien', 'kacper-portfolio-core' ),
			'singular_name' => __( 'Projektkategorie', 'kacper-portfolio-core' ),
		),
		'public' => false,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
		'rewrite' => false,
		'query_var' => false,
	) );
} );

add_filter( 'query_vars', function ( $vars ) {
	$vars[] = 'project_category';
	return $vars;
} );

function kacper_portfolio_core_project_category_filter() {
	$value = get_query_var( 'project_category', '' );
	return in_array( $value, array( 'anwendungen', 'websites' ), true ) ? $value : '';
}

function kacper_portfolio_core_configure_project_archive( $query ) {
	if ( is_admin() || ! $query->is_main_query() || ! $query->is_post_type_archive( 'project' ) ) {
		return;
	}
	$query->set( 'posts_per_page', 6 );
	$query->set( 'post_status', 'publish' );
	// Keep projects without a year; dated projects come first, newest year first.
	$year_query = array(
		'relation' => 'OR',
		'project_year_order' => array( 'key' => 'project_year', 'compare' => 'EXISTS', 'type' => 'NUMERIC' ),
		array( 'key' => 'project_year', 'compare' => 'NOT EXISTS' ),
	);
	$meta_query = $query->get( 'meta_query' );
	$query->set( 'meta_query', $meta_query ? array( 'relation' => 'AND', $meta_query, $year_query ) : $year_query );
	$query->set( 'orderby', array( 'project_year_order' => 'DESC', 'date' => 'DESC', 'ID' => 'DESC' ) );
	$category = $query->get( 'project_category' );
	if ( in_array( $category, array( 'anwendungen', 'websites' ), true ) ) {
		$category_query = array( 'taxonomy' => 'project_category', 'field' => 'slug', 'terms' => $category );
		$tax_query = $query->get( 'tax_query' );
		$query->set( 'tax_query', $tax_query ? array( 'relation' => 'AND', $tax_query, $category_query ) : array( $category_query ) );
	}
}
add_action( 'pre_get_posts', 'kacper_portfolio_core_configure_project_archive', 20 );
