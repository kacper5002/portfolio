<?php
/** Homepage presentation. Content stays in the translated page's block attributes. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kacper_portfolio_register_home_hub() {
	wp_register_script( 'kacper-home-hub-editor', get_theme_file_uri( '/assets/js/home-hub-editor.js' ), array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-i18n' ), filemtime( __DIR__ . '/../assets/js/home-hub-editor.js' ), true );
	$attributes = array( 'portraitId' => array( 'type' => 'integer', 'default' => 0 ) );
	foreach ( array( 'aboutText', 'projectsTitle', 'projectsText', 'resumeText', 'contactText' ) as $key ) {
		$attributes[ $key ] = array( 'type' => 'string', 'default' => '' );
	}
	register_block_type( 'kacper-portfolio/home-hub', array(
		'api_version' => 3,
		'title' => 'Portfolio hub',
		'category' => 'design',
		'attributes' => $attributes,
		'editor_script' => 'kacper-home-hub-editor',
		'render_callback' => 'kacper_portfolio_render_home_hub',
		'supports' => array( 'html' => false, 'multiple' => false ),
	) );
}
add_action( 'init', 'kacper_portfolio_register_home_hub' );

/** Resolve translated pages, without storing database IDs or domains in code. */
function kacper_portfolio_hub_page( $slug, $lang ) {
	$base = get_page_by_path( $slug, OBJECT, 'page' );
	$id = $base ? $base->ID : 0;
	if ( $id && function_exists( 'pll_get_post' ) ) {
		$id = pll_get_post( $id, $lang );
	}
	return $id && 'publish' === get_post_status( $id ) ? get_post( $id ) : null;
}

function kacper_portfolio_render_home_hub( $attributes ) {
	$lang = function_exists( 'pll_current_language' ) ? pll_current_language() : 'de';
	$pages = array();
	foreach ( array( 'about' => 'ueber-mich', 'resume' => 'lebenslauf', 'contact' => 'kontakt' ) as $key => $slug ) {
		$pages[ $key ] = kacper_portfolio_hub_page( $slug, $lang );
	}
	$args = array( 'post_type' => 'project', 'post_status' => 'publish', 'has_password' => false, 'numberposts' => 1, 'orderby' => array( 'menu_order' => 'ASC', 'date' => 'DESC' ), 'suppress_filters' => false );
	$projects = get_posts( $args );
	if ( ! $projects && function_exists( 'pll_get_post_language' ) ) {
		$args['suppress_filters'] = true;
		$args['lang'] = '';
		$args['tax_query'] = array( array( 'taxonomy' => 'language', 'operator' => 'NOT EXISTS' ) );
		$projects = get_posts( $args );
	}
	$project = $projects[0] ?? null;
	$archive = get_post_type_archive_link( 'project' );
	$cards = array(
		'about' => array( 'page' => $pages['about'], 'text' => $attributes['aboutText'] ),
		'projects' => array( 'page' => null, 'text' => $attributes['projectsText'] ),
		'resume' => array( 'page' => $pages['resume'], 'text' => $attributes['resumeText'] ),
		'contact' => array( 'page' => $pages['contact'], 'text' => $attributes['contactText'] ),
	);
	ob_start();
	?>
	<div <?php echo get_block_wrapper_attributes( array( 'class' => 'portfolio-hub' ) ); ?>>
		<h1 class="screen-reader-text"><?php echo esc_html( get_bloginfo( 'name' ) ); ?> — Portfolio</h1>
		<div class="hub-background" aria-hidden="true"><span>KACPER</span><span>KOSZARSKI</span></div>
		<div class="hub-caption" aria-hidden="true">DIGITAL PORTFOLIO <span>↘</span></div>
		<div class="hub-stage">
		<?php foreach ( $cards as $key => $card ) :
			$url = 'projects' === $key ? $archive : ( $card['page'] ? get_permalink( $card['page'] ) : '' );
			$title = 'projects' === $key ? $attributes['projectsTitle'] : ( $card['page'] ? get_the_title( $card['page'] ) : '' );
			if ( ! $url ) { continue; }
			?>
			<article class="hub-slot hub-slot--<?php echo esc_attr( $key ); ?>">
				<a class="hub-card hub-card--<?php echo esc_attr( $key ); ?>" data-hub-card="<?php echo esc_attr( $key ); ?>" href="<?php echo esc_url( $url ); ?>" aria-labelledby="hub-title-<?php echo esc_attr( $key ); ?>">
					<span class="hub-arrow" aria-hidden="true">↗</span>
					<?php if ( 'about' === $key && ! empty( $attributes['portraitId'] ) ) : ?>
						<?php echo wp_get_attachment_image( absint( $attributes['portraitId'] ), 'large', false, array( 'class' => 'hub-portrait', 'alt' => '', 'loading' => 'eager', 'fetchpriority' => 'high', 'sizes' => '(min-width: 1100px) 360px, (min-width: 600px) 45vw, 90vw' ) ); ?>
					<?php elseif ( 'projects' === $key ) : ?>
						<div class="hub-project-visual" aria-hidden="true">
						<?php if ( $project && has_post_thumbnail( $project ) ) : ?>
							<?php echo get_the_post_thumbnail( $project, 'large', array( 'alt' => '', 'class' => 'hub-project-image' ) ); ?>
						<?php elseif ( $project ) : ?>
							<div class="hub-project-type"><span class="hub-project-mark">[ M ]</span><strong><?php echo esc_html( get_the_title( $project ) ); ?></strong><span class="hub-project-rule"></span></div>
						<?php endif; ?>
						</div>
					<?php elseif ( 'resume' === $key ) : ?>
						<div class="hub-document" aria-hidden="true"><span>KK.</span><i></i><i></i><i></i><i></i></div>
					<?php elseif ( 'contact' === $key ) : ?>
						<div class="hub-contact-mark" aria-hidden="true">↗</div>
					<?php endif; ?>
					<div class="hub-card__copy">
						<h2 id="hub-title-<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $title ); ?></h2>
						<p><?php echo esc_html( $card['text'] ); ?></p>
					</div>
				</a>
			</article>
		<?php endforeach; ?>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
