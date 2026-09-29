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

require_once __DIR__ . '/blocks/selected-projects.php';

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
			'taxonomies'   => array( 'project_technology' ),
			'rewrite'      => array(
				'slug'       => 'projekte',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'kacper_portfolio_core_register_project' );

/**
 * Register technologies as non-hierarchical terms for projects only.
 */
function kacper_portfolio_core_register_project_technology() {
	$labels = array(
		'name'                       => __( 'Technologien', 'kacper-portfolio-core' ),
		'singular_name'              => __( 'Technologie', 'kacper-portfolio-core' ),
		'menu_name'                  => __( 'Technologien', 'kacper-portfolio-core' ),
		'search_items'               => __( 'Technologien suchen', 'kacper-portfolio-core' ),
		'popular_items'              => __( 'Häufig verwendete Technologien', 'kacper-portfolio-core' ),
		'all_items'                  => __( 'Alle Technologien', 'kacper-portfolio-core' ),
		'edit_item'                  => __( 'Technologie bearbeiten', 'kacper-portfolio-core' ),
		'view_item'                  => __( 'Technologie ansehen', 'kacper-portfolio-core' ),
		'update_item'                => __( 'Technologie aktualisieren', 'kacper-portfolio-core' ),
		'add_new_item'               => __( 'Neue Technologie hinzufügen', 'kacper-portfolio-core' ),
		'new_item_name'              => __( 'Name der neuen Technologie', 'kacper-portfolio-core' ),
		'separate_items_with_commas' => __( 'Technologien durch Kommas trennen', 'kacper-portfolio-core' ),
		'add_or_remove_items'        => __( 'Technologien hinzufügen oder entfernen', 'kacper-portfolio-core' ),
		'choose_from_most_used'      => __( 'Aus den häufig verwendeten Technologien wählen', 'kacper-portfolio-core' ),
		'not_found'                  => __( 'Keine Technologien gefunden.', 'kacper-portfolio-core' ),
		'no_terms'                   => __( 'Keine Technologien', 'kacper-portfolio-core' ),
		'items_list_navigation'      => __( 'Navigation der Technologieliste', 'kacper-portfolio-core' ),
		'items_list'                 => __( 'Technologieliste', 'kacper-portfolio-core' ),
		'back_to_items'              => __( 'Zurück zu den Technologien', 'kacper-portfolio-core' ),
		'item_link'                  => __( 'Technologielink', 'kacper-portfolio-core' ),
		'item_link_description'      => __( 'Ein Link zu einer Technologie.', 'kacper-portfolio-core' ),
	);

	register_taxonomy(
		'project_technology',
		array( 'project' ),
		array(
			'labels'            => $labels,
			'hierarchical'      => false,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'public'            => true,
			'rewrite'           => array( 'slug' => 'technologien' ),
		)
	);
}
add_action( 'init', 'kacper_portfolio_core_register_project_technology' );

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
 * Register a server-rendered block for project templates.
 */
function kacper_portfolio_core_register_project_details_block() {
	wp_register_script(
		'kacper-portfolio-core-blocks-editor',
		plugins_url( 'blocks/editor.js', __FILE__ ),
		array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-server-side-render' ),
		filemtime( __DIR__ . '/blocks/editor.js' ),
		true
	);
	register_block_type(
		'kacper-portfolio/project-details',
		array(
			'api_version'     => 3,
			'title'           => __( 'Projektdetails', 'kacper-portfolio-core' ),
			'category'        => 'widgets',
			'uses_context'    => array( 'postId', 'postType' ),
			'editor_script'   => 'kacper-portfolio-core-blocks-editor',
			'render_callback' => 'kacper_portfolio_core_render_project_details',
			'supports'        => array( 'html' => false ),
		)
	);
}
add_action( 'init', 'kacper_portfolio_core_register_project_details_block' );

/**
 * Render only the details supplied for the project in this block's context.
 */
function kacper_portfolio_core_render_project_details( $attributes, $content, $block ) {
	$post_id = absint( $block->context['postId'] ?? 0 );
	if ( ! $post_id || 'project' !== get_post_type( $post_id ) || post_password_required( $post_id ) ) {
		return '';
	}

	$year         = get_post_meta( $post_id, 'project_year', true );
	$technologies = get_the_terms( $post_id, 'project_technology' );
	$github_url   = esc_url( get_post_meta( $post_id, 'project_github_url', true ) );
	$live_url     = esc_url( get_post_meta( $post_id, 'project_live_url', true ) );
	$details      = '';

	if ( ! empty( $year ) ) {
		$details .= '<dt>' . esc_html__( 'Jahr', 'kacper-portfolio-core' ) . '</dt>';
		$details .= '<dd>' . esc_html( $year ) . '</dd>';
	}

	if ( ! is_wp_error( $technologies ) && ! empty( $technologies ) ) {
		$details .= '<dt>' . esc_html__( 'Technologien', 'kacper-portfolio-core' ) . '</dt><dd><ul>';
		foreach ( $technologies as $technology ) {
			$details .= '<li>' . esc_html( $technology->name ) . '</li>';
		}
		$details .= '</ul></dd>';
	}

	$links = '';
	if ( '' !== $github_url ) {
		$links .= '<li><a href="' . $github_url . '">' . esc_html__( 'GitHub', 'kacper-portfolio-core' ) . '</a></li>';
	}
	if ( '' !== $live_url ) {
		$links .= '<li><a href="' . $live_url . '">' . esc_html__( 'Live Demo', 'kacper-portfolio-core' ) . '</a></li>';
	}
	if ( '' !== $links ) {
		$details .= '<dt>' . esc_html__( 'Links', 'kacper-portfolio-core' ) . '</dt><dd><ul>' . $links . '</ul></dd>';
	}

	if ( '' === $details ) {
		return '';
	}

	return '<dl ' . get_block_wrapper_attributes() . '>' . $details . '</dl>';
}

/**
 * Register the PHP navigation block without Site Editor navigation entities.
 */
function kacper_portfolio_core_register_site_navigation() {
	register_block_type(
		'kacper-portfolio/site-navigation',
		array(
			'api_version'     => 3,
			'title'           => __( 'Portfolio Navigation', 'kacper-portfolio-core' ),
			'category'        => 'widgets',
			'editor_script'   => 'kacper-portfolio-core-blocks-editor',
			'render_callback' => 'kacper_portfolio_core_render_site_navigation',
			'supports'        => array( 'html' => false ),
		)
	);
}
add_action( 'init', 'kacper_portfolio_core_register_site_navigation' );

/**
 * Resolve page translations and switcher destinations through public APIs.
 */
function kacper_portfolio_core_render_site_navigation() {
	$labels = array(
		'de' => array( 'Startseite', 'Über mich', 'Projekte', 'Lebenslauf', 'Kontakt', 'Hauptnavigation' ),
		'en' => array( 'Home', 'About', 'Projects', 'Resume', 'Contact', 'Primary navigation' ),
		'pl' => array( 'Strona główna', 'O mnie', 'Projekty', 'CV', 'Kontakt', 'Nawigacja główna' ),
	);
	$lang = function_exists( 'pll_current_language' ) ? pll_current_language() : 'de';
	$lang = isset( $labels[ $lang ] ) ? $lang : 'de';
	$home = function_exists( 'pll_home_url' ) ? pll_home_url( $lang ) : home_url( '/' );
	$menu = '';

	foreach ( array( 'home', 'ueber-mich', 'project', 'lebenslauf', 'kontakt' ) as $index => $key ) {
		$url     = '';
		$current = false;
		if ( 'home' === $key ) {
			$url     = $home;
			$current = is_front_page();
		} elseif ( 'project' === $key ) {
			// Polylang filters this native link for the current request language.
			$url     = get_post_type_archive_link( 'project' );
			$current = is_post_type_archive( 'project' ) && ! is_paged();
		} else {
			$base = get_page_by_path( $key, OBJECT, 'page' );
			if ( $base ) {
				$id = function_exists( 'pll_get_post' ) ? pll_get_post( $base->ID, $lang ) : $base->ID;
				if ( $id && 'publish' === get_post_status( $id ) ) {
					$url     = get_permalink( $id );
					$current = is_page( $id );
				}
			}
		}
		if ( $url ) {
			$menu .= '<li><a href="' . esc_url( $url ) . '"' . ( $current ? ' aria-current="page"' : '' ) . '>';
			$menu .= esc_html( $labels[ $lang ][ $index ] ) . '</a></li>';
		}
	}

	$switcher = '';
	if ( function_exists( 'pll_the_languages' ) ) {
		$languages = pll_the_languages(
			array(
				'raw'                    => 1,
				'echo'                   => 0,
				'show_flags'             => 0,
				'display_names_as'       => 'slug',
				'hide_if_empty'          => 0,
				'hide_if_no_translation' => 0,
				'hide_current'           => 0,
				'force_home'             => 0,
			)
		);
		foreach ( array( 'de', 'en', 'pl' ) as $code ) {
			if ( ! is_array( $languages ) || empty( $languages[ $code ]['url'] ) ) {
				continue;
			}
			$language = $languages[ $code ];
			if ( is_post_type_archive( 'project' ) && has_filter( 'wpml_permalink' ) ) {
				$archive_url = get_post_type_archive_link( 'project' );
				if ( $archive_url ) {
					// Public compatibility filter implemented by Polylang Free.
					$language['url'] = apply_filters( 'wpml_permalink', $archive_url, $code );
				}
			}
			$current  = ! empty( $language['current_lang'] );
			$switcher .= '<li class="' . esc_attr( 'lang-item lang-item-' . $code . ( $current ? ' current-lang' : '' ) ) . '">';
			$switcher .= '<a href="' . esc_url( $language['url'] ) . '" hreflang="' . esc_attr( $code ) . '" lang="' . esc_attr( $code ) . '"';
			$switcher .= ( $current ? ' aria-current="true"' : '' ) . '>' . esc_html( strtoupper( $code ) ) . '</a></li>';
		}
	}

	$html = '<nav ' . get_block_wrapper_attributes( array( 'class' => 'portfolio-navigation', 'aria-label' => $labels[ $lang ][5] ) ) . '>';
	$html .= '<ul class="portfolio-navigation__menu">' . $menu . '</ul>';
	if ( '' !== $switcher ) {
		$html .= '<div class="portfolio-navigation__languages"><ul>' . $switcher . '</ul></div>';
	}
	return $html . '</nav>';
}

/**
 * Refresh project URLs once when the plugin is activated.
 */
function kacper_portfolio_core_activate() {
	kacper_portfolio_core_register_project();
	kacper_portfolio_core_register_project_technology();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'kacper_portfolio_core_activate' );

/**
 * Remove project URL rules on deactivation without deleting project content.
 */
function kacper_portfolio_core_deactivate() {
	unregister_taxonomy( 'project_technology' );
	unregister_post_type( 'project' );
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'kacper_portfolio_core_deactivate' );
