<?php
/**
 * A small, language-aware selection of published portfolio projects.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kacper_portfolio_register_selected_projects() {
	wp_register_script( 'kacper-selected-projects-editor', plugins_url( 'selected-projects.js', __FILE__ ), array( 'wp-blocks', 'wp-element', 'wp-block-editor' ), filemtime( __DIR__ . '/selected-projects.js' ), true );
	register_block_type( 'kacper-portfolio/selected-projects', array(
		'api_version'     => 3,
		'title'           => 'Selected projects',
		'category'        => 'widgets',
		'editor_script'   => 'kacper-selected-projects-editor',
		'render_callback' => 'kacper_portfolio_render_selected_projects',
		'supports'        => array( 'html' => false ),
	) );
}
add_action( 'init', 'kacper_portfolio_register_selected_projects' );

function kacper_portfolio_render_selected_projects() {
	$lang = function_exists( 'pll_current_language' ) ? pll_current_language() : 'de';
	$labels = array(
		'de' => array( 'Projekt ansehen', 'Weitere Projekte sind in Arbeit.' ),
		'en' => array( 'Explore project', 'More projects are in progress.' ),
		'pl' => array( 'Zobacz projekt', 'Kolejne projekty są w przygotowaniu.' ),
	);
	$copy = $labels[ $lang ] ?? $labels['de'];
	$args = array( 'post_type' => 'project', 'post_status' => 'publish', 'has_password' => false, 'numberposts' => 3, 'orderby' => array( 'menu_order' => 'ASC', 'date' => 'DESC' ), 'suppress_filters' => false );
	$projects = get_posts( $args );
	// Existing projects without a language remain available without altering data.
	if ( empty( $projects ) && function_exists( 'pll_get_post_language' ) ) {
		$args['suppress_filters'] = true;
		$args['lang'] = '';
		$args['tax_query'] = array( array( 'taxonomy' => 'language', 'operator' => 'NOT EXISTS' ) );
		$projects = get_posts( $args );
	}
	if ( empty( $projects ) ) {
		return '<p class="work-empty">' . esc_html( $copy[1] ) . '</p>';
	}
	ob_start();
	?>
	<div <?php echo get_block_wrapper_attributes( array( 'class' => 'selected-projects' ) ); ?>>
		<?php foreach ( $projects as $index => $project ) :
			$url = get_permalink( $project );
			$year = get_post_meta( $project->ID, 'project_year', true );
			$terms = get_the_terms( $project->ID, 'project_technology' );
			$excerpt = $project->post_excerpt ?: wp_trim_words( wp_strip_all_tags( strip_shortcodes( $project->post_content ) ), 28 );
			?>
			<article class="work-card reveal">
				<div class="work-card__visual" aria-hidden="true">
					<?php if ( has_post_thumbnail( $project ) ) : ?>
						<?php echo get_the_post_thumbnail( $project, 'large', array( 'class' => 'work-card__image', 'alt' => '', 'loading' => 'lazy' ) ); ?>
					<?php else : ?>
						<div class="work-art"><span class="work-art__index"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span><span class="work-art__title"><?php echo esc_html( $project->post_title ); ?></span><span class="work-art__line"></span><span class="work-art__caption">KACPER KOSZARSKI / SELECTED WORK</span></div>
					<?php endif; ?>
				</div>
				<div class="work-card__details">
					<p class="home-kicker"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?> / <?php echo esc_html( $year ); ?></p>
					<h3><a class="work-card__link" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $project->post_title ); ?><span aria-hidden="true">↗</span></a></h3>
					<?php if ( $excerpt ) : ?><p class="work-card__excerpt"><?php echo esc_html( $excerpt ); ?></p><?php endif; ?>
					<?php if ( $terms && ! is_wp_error( $terms ) ) : ?><ul class="work-card__tags"><?php foreach ( $terms as $term ) : ?><li><?php echo esc_html( $term->name ); ?></li><?php endforeach; ?></ul><?php endif; ?>
					<p class="work-card__cta" aria-hidden="true"><?php echo esc_html( $copy[0] ); ?> <span>↗</span></p>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
	<?php
	return ob_get_clean();
}
