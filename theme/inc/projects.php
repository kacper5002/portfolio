<?php
/** Presentation blocks for the native query and existing project data. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kacper_portfolio_projects_archive_url() {
	$url = get_post_type_archive_link( 'project' );
	$lang = function_exists( 'pll_current_language' ) ? pll_current_language() : '';
	return $lang ? apply_filters( 'wpml_permalink', $url, $lang ) : $url;
}

add_action( 'init', function () {
	wp_register_script( 'kacper-projects-editor', get_theme_file_uri( '/assets/js/projects-editor.js' ),
		array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-server-side-render' ),
		filemtime( __DIR__ . '/../assets/js/projects-editor.js' ), true );
	foreach ( array( 'project-card', 'project-contact', 'project-back' ) as $name ) {
		register_block_type( 'kacper-portfolio/' . $name, array(
			'api_version' => 3,
			'editor_script' => 'kacper-projects-editor',
			'uses_context' => array( 'postId', 'postType' ),
			'render_callback' => 'kacper_portfolio_render_' . str_replace( '-', '_', $name ),
			'supports' => array( 'html' => false ),
		) );
	}
} );

function kacper_portfolio_render_project_card( $attributes, $content, $block ) {
	$id = absint( $block->context['postId'] ?? 0 );
	if ( ! $id || 'project' !== get_post_type( $id ) || 'publish' !== get_post_status( $id ) ) {
		return '';
	}
	$protected = post_password_required( $id );
	$image = $protected ? '' : get_the_post_thumbnail( $id, 'large', array(
		'class' => 'project-card__image',
		'sizes' => '(min-width: 1440px) 636px, (min-width: 782px) calc((100vw - 128px) / 2), calc(100vw - 44px)',
		'alt' => '', // The heading names this single link.
	) );
	$excerpt = $protected ? '' : wp_trim_words( wp_strip_all_tags( get_the_excerpt( $id ) ), 32 );
	$terms = $protected ? array() : get_the_terms( $id, 'project_technology' );
	$heading_id = wp_unique_id( 'project-card-title-' );
	ob_start();
	?>
	<article <?php echo get_block_wrapper_attributes( array( 'class' => 'project-card' . ( $image ? '' : ' project-card--no-image' ) ) ); ?>>
		<a class="project-card__link" href="<?php echo esc_url( get_permalink( $id ) ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
			<?php if ( $image ) : ?>
				<?php echo $image; ?>
			<?php else : ?>
				<span class="project-card__placeholder" aria-hidden="true">Projekt<?php if ( ! $protected && get_post_meta( $id, 'project_year', true ) ) { echo ' / ' . esc_html( get_post_meta( $id, 'project_year', true ) ); } ?></span>
			<?php endif; ?>
			<div class="project-card__info">
				<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
					<ul class="project-card__tags" aria-label="Technologien">
						<?php foreach ( $terms as $term ) : ?><li><?php echo esc_html( $term->name ); ?></li><?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<h2 id="<?php echo esc_attr( $heading_id ); ?>"><?php echo esc_html( get_the_title( $id ) ); ?></h2>
				<?php if ( $excerpt ) : ?><p><?php echo esc_html( $excerpt ); ?></p><?php endif; ?>
				<span class="project-card__action">Projekt ansehen <span aria-hidden="true">↗</span></span>
			</div>
		</a>
	</article>
	<?php
	return ob_get_clean();
}

function kacper_portfolio_render_project_contact() {
	$lang = function_exists( 'pll_current_language' ) ? pll_current_language() : 'de';
	$page = kacper_portfolio_hub_page( 'kontakt', $lang ?: 'de' );
	if ( ! $page ) {
		return '';
	}
	return '<div ' . get_block_wrapper_attributes() . '><a class="project-button" href="' . esc_url( get_permalink( $page ) ) . '">Kontakt aufnehmen</a></div>';
}

function kacper_portfolio_render_project_back() {
	return '<div ' . get_block_wrapper_attributes() . '><a class="project-back" href="' . esc_url( kacper_portfolio_projects_archive_url() ) . '"><span aria-hidden="true">←</span> Alle Projekte</a></div>';
}
