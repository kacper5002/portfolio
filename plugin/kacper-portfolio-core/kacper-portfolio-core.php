<?php
/**
 * Plugin Name: Kacper Portfolio Core
 * Description: Registriert Projekte für das Portfolio von Kacper Koszarski.
 * Version: 1.0.0
 * Author: Kacper Koszarski
 * Text Domain: kacper-portfolio-core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register portfolio projects with the native WordPress block editor.
 */
function kacper_portfolio_core_register_project() {
	$labels = array(
		'name'                     => __( 'Projekte', 'kacper-portfolio-core' ),
		'singular_name'            => __( 'Projekt', 'kacper-portfolio-core' ),
		'menu_name'                => __( 'Projekte', 'kacper-portfolio-core' ),
		'name_admin_bar'           => __( 'Projekt', 'kacper-portfolio-core' ),
		'add_new'                  => __( 'Projekt hinzufügen', 'kacper-portfolio-core' ),
		'add_new_item'             => __( 'Neues Projekt hinzufügen', 'kacper-portfolio-core' ),
		'edit_item'                => __( 'Projekt bearbeiten', 'kacper-portfolio-core' ),
		'new_item'                 => __( 'Neues Projekt', 'kacper-portfolio-core' ),
		'view_item'                => __( 'Projekt ansehen', 'kacper-portfolio-core' ),
		'view_items'               => __( 'Projekte ansehen', 'kacper-portfolio-core' ),
		'search_items'             => __( 'Projekte suchen', 'kacper-portfolio-core' ),
		'not_found'                => __( 'Keine Projekte gefunden.', 'kacper-portfolio-core' ),
		'not_found_in_trash'       => __( 'Keine Projekte im Papierkorb gefunden.', 'kacper-portfolio-core' ),
		'all_items'                => __( 'Alle Projekte', 'kacper-portfolio-core' ),
		'archives'                 => __( 'Projektarchiv', 'kacper-portfolio-core' ),
		'attributes'               => __( 'Projektattribute', 'kacper-portfolio-core' ),
		'insert_into_item'         => __( 'In das Projekt einfügen', 'kacper-portfolio-core' ),
		'uploaded_to_this_item'    => __( 'Zu diesem Projekt hochgeladen', 'kacper-portfolio-core' ),
		'featured_image'           => __( 'Projektbild', 'kacper-portfolio-core' ),
		'set_featured_image'       => __( 'Projektbild festlegen', 'kacper-portfolio-core' ),
		'remove_featured_image'    => __( 'Projektbild entfernen', 'kacper-portfolio-core' ),
		'use_featured_image'       => __( 'Als Projektbild verwenden', 'kacper-portfolio-core' ),
		'filter_items_list'        => __( 'Projektliste filtern', 'kacper-portfolio-core' ),
		'filter_by_date'           => __( 'Nach Datum filtern', 'kacper-portfolio-core' ),
		'items_list_navigation'    => __( 'Navigation der Projektliste', 'kacper-portfolio-core' ),
		'items_list'               => __( 'Projektliste', 'kacper-portfolio-core' ),
		'item_published'           => __( 'Projekt veröffentlicht.', 'kacper-portfolio-core' ),
		'item_published_privately' => __( 'Projekt privat veröffentlicht.', 'kacper-portfolio-core' ),
		'item_reverted_to_draft'   => __( 'Projekt auf Entwurf zurückgesetzt.', 'kacper-portfolio-core' ),
		'item_trashed'             => __( 'Projekt in den Papierkorb verschoben.', 'kacper-portfolio-core' ),
		'item_scheduled'           => __( 'Veröffentlichung des Projekts geplant.', 'kacper-portfolio-core' ),
		'item_updated'             => __( 'Projekt aktualisiert.', 'kacper-portfolio-core' ),
		'item_link'                => __( 'Projektlink', 'kacper-portfolio-core' ),
		'item_link_description'    => __( 'Ein Link zu einem Projekt.', 'kacper-portfolio-core' ),
	);

	register_post_type(
		'project',
		array(
			'labels'       => $labels,
			'public'       => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-portfolio',
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
			'rewrite'      => array(
				'slug'       => 'projekte',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'kacper_portfolio_core_register_project' );

/**
 * Refresh project URLs once when the plugin is activated.
 */
function kacper_portfolio_core_activate() {
	kacper_portfolio_core_register_project();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'kacper_portfolio_core_activate' );

/**
 * Remove project URL rules on deactivation without deleting project content.
 */
function kacper_portfolio_core_deactivate() {
	unregister_post_type( 'project' );
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'kacper_portfolio_core_deactivate' );
