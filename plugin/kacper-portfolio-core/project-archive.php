<?php
/** Configure the existing project archive, preserving language constraints. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kacper_portfolio_core_configure_project_archive( $query ) {
	if ( is_admin() || ! $query->is_main_query() || ! $query->is_post_type_archive( 'project' ) ) {
		return;
	}
	$query->set( 'posts_per_page', 6 );
	$query->set( 'post_status', 'publish' );
	$query->set( 'orderby', array( 'date' => 'DESC', 'ID' => 'DESC' ) );
}
add_action( 'pre_get_posts', 'kacper_portfolio_core_configure_project_archive', 20 );
