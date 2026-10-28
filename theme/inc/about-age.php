<?php
/**
 * Computed age for the native paragraph in the About hero.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kacper_portfolio_age_in_years( ?DateTimeImmutable $today = null ) {
	$today    = $today ?? current_datetime();
	$birthday = new DateTimeImmutable( '1999-11-21', $today->getTimezone() );
	return (int) $birthday->diff( $today )->format( '%r%y' );
}

add_action( 'init', function () {
	register_block_bindings_source( 'kacper-portfolio/age', array(
		'label'              => 'Alter (automatisch)',
		'get_value_callback' => static function () {
			return esc_html( kacper_portfolio_age_in_years() . ' Jahre' );
		},
	) );
} );
