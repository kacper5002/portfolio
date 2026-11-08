<?php
/** Serve the existing portrait sizes according to its actual layout width. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'render_block_core/image', function ( $content, $block ) {
	if ( ! in_array( 'about-portrait', explode( ' ', $block['attrs']['className'] ?? '' ), true ) ) {
		return $content;
	}
	$id = absint( $block['attrs']['id'] ?? 0 );
	$image = wp_get_attachment_image_src( $id, 'large' );
	if ( ! $image ) {
		return $content;
	}
	$html = new WP_HTML_Tag_Processor( $content );
	if ( $html->next_tag( 'img' ) ) {
		$html->set_attribute( 'src', $image[0] );
		$html->set_attribute( 'width', $image[1] );
		$html->set_attribute( 'height', $image[2] );
		$srcset = wp_get_attachment_image_srcset( $id, 'large' );
		if ( $srcset ) {
			$html->set_attribute( 'srcset', $srcset );
			$html->set_attribute( 'sizes', '(min-width: 1100px) 500px, (min-width: 1000px) 40vw, (min-width: 600px) 500px, calc(100vw - 44px)' );
		}
		$html->set_attribute( 'loading', 'eager' );
		$html->set_attribute( 'fetchpriority', 'high' );
	}
	return $html->get_updated_html();
}, 10, 2 );
