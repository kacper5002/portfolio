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
			'has_archive'  => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-portfolio',
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields' ),
			'rewrite'      => array(
				'slug'       => 'projekte',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'kacper_portfolio_core_register_project' );

/**
 * Allow metadata changes only for users who can edit the project.
 */
function kacper_portfolio_core_can_edit_meta( $allowed, $meta_key, $post_id ) {
	return current_user_can( 'edit_post', $post_id );
}

/**
 * Register project details for WordPress and the REST API.
 */
function kacper_portfolio_core_register_project_meta() {
	register_post_meta(
		'project',
		'project_year',
		array(
			'type'              => 'integer',
			'single'            => true,
			'show_in_rest'      => true,
			'sanitize_callback' => static function ( $value ) {
				return intval( $value );
			},
			'auth_callback'     => 'kacper_portfolio_core_can_edit_meta',
		)
	);

	foreach ( array( 'project_github_url', 'project_live_url' ) as $meta_key ) {
		register_post_meta(
			'project',
			$meta_key,
			array(
				'type'              => 'string',
				'single'            => true,
				'default'           => '',
				'show_in_rest'      => true,
				'sanitize_callback' => static function ( $value ) {
					return is_string( $value ) ? esc_url_raw( $value ) : '';
				},
				'auth_callback'     => 'kacper_portfolio_core_can_edit_meta',
			)
		);
	}
}
add_action( 'init', 'kacper_portfolio_core_register_project_meta' );

/**
 * Add the native project details panel below the editor.
 */
function kacper_portfolio_core_add_project_meta_box() {
	add_meta_box(
		'kacper-portfolio-project-details',
		__( 'Projektdetails', 'kacper-portfolio-core' ),
		'kacper_portfolio_core_render_project_meta_box',
		'project',
		'normal'
	);
}
add_action( 'add_meta_boxes_project', 'kacper_portfolio_core_add_project_meta_box' );

/**
 * Render escaped values and a nonce for the project details form.
 */
function kacper_portfolio_core_render_project_meta_box( $post ) {
	wp_nonce_field( 'kacper_portfolio_save_project_details', 'kacper_portfolio_details_nonce' );
	$year = metadata_exists( 'post', $post->ID, 'project_year' )
		? get_post_meta( $post->ID, 'project_year', true ) : '';
	?>
	<p>
		<label for="project_year"><?php esc_html_e( 'Jahr', 'kacper-portfolio-core' ); ?></label><br>
		<input type="number" step="1" id="project_year" name="project_year" value="<?php echo esc_attr( $year ); ?>">
	</p>
	<p>
		<label for="project_github_url"><?php esc_html_e( 'GitHub URL (optional)', 'kacper-portfolio-core' ); ?></label><br>
		<input type="url" id="project_github_url" name="project_github_url" value="<?php echo esc_attr( get_post_meta( $post->ID, 'project_github_url', true ) ); ?>">
	</p>
	<p>
		<label for="project_live_url"><?php esc_html_e( 'Live-Demo URL (optional)', 'kacper-portfolio-core' ); ?></label><br>
		<input type="url" id="project_live_url" name="project_live_url" value="<?php echo esc_attr( get_post_meta( $post->ID, 'project_live_url', true ) ); ?>">
	</p>
	<?php
}

/**
 * Save only explicitly submitted details from an authorized editor.
 */
function kacper_portfolio_core_save_project_details( $post_id ) {
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		|| wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) ) {
		return;
	}

	if ( ! isset( $_POST['kacper_portfolio_details_nonce'] )
		|| ! is_string( $_POST['kacper_portfolio_details_nonce'] )
		|| ! wp_verify_nonce(
			sanitize_text_field( wp_unslash( $_POST['kacper_portfolio_details_nonce'] ) ),
			'kacper_portfolio_save_project_details'
		) ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['project_year'] ) && is_string( $_POST['project_year'] ) ) {
		$year = trim( wp_unslash( $_POST['project_year'] ) );
		if ( '' === $year ) {
			delete_post_meta( $post_id, 'project_year' );
		} else {
			update_post_meta( $post_id, 'project_year', intval( $year ) );
		}
	}

	foreach ( array( 'project_github_url', 'project_live_url' ) as $meta_key ) {
		if ( isset( $_POST[ $meta_key ] ) && is_string( $_POST[ $meta_key ] ) ) {
			$url = esc_url_raw( wp_unslash( $_POST[ $meta_key ] ) );
			update_post_meta( $post_id, $meta_key, wp_slash( $url ) );
		}
	}
}
add_action( 'save_post_project', 'kacper_portfolio_core_save_project_details' );

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
